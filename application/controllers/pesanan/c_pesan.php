<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_pesan extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->m_squrity->check_access(array('1', '2'));

		$this->load->model('pesanan/m_pesan');

		$this->load->model('pesanan/m_pelanggan');

		$this->load->model('pesanan/m_distributor');

		$this->load->model('pesanan/m_produk');
	}



	public function index()

	{		

		$this->m_squrity->getsqurity();

		$this->session->set_userdata('pesanan', 'customer');

		$getpesan			  = $this->m_pesan->GetPesan();

		$getpelanggan		  = $this->m_pelanggan->GetPelanggan();

		$getdistributor		  = $this->m_distributor->GetDistributor();

		$getproduk		  	  = $this->m_produk->GetProduk();


		$isi['content'] 	  = 'pesanan/v_pesan';

		$isi['base_link'] 	  = 'pesanan/c_pesan';

		$isi['judul'] 		  = 'Pemesanan ';

		$isi['sub_judul'] 	  = 'Pemesanan';


		$isi['data']		  	= $getpesan;

		$isi['datapelanggan'] 	= $getpelanggan;

		$isi['datadistributor'] = $getdistributor;

		$isi['dataproduk'] 	  	= $getproduk;


		$this->load->view('v_home',$isi);

	}

	public function mitra()

	{		

		$this->m_squrity->getsqurity();

		$this->session->set_userdata('pesanan', 'mitra');

		$getpesan			  = $this->m_pesan->GetPesan2();

		$getpelanggan		  = $this->m_pelanggan->GetPelanggan();

		$getdistributor		  = $this->m_distributor->GetDistributor();

		$getproduk		  	  = $this->m_produk->GetProduk();


		$isi['content'] 	  = 'pesanan/v_pesan_mitra';

		$isi['base_link'] 	  = 'pesanan/c_pesan';

		$isi['judul'] 		  = 'Pemesanan ';

		$isi['sub_judul'] 	  = 'Pemesanan';


		$isi['data']		  	= $getpesan;

		$isi['datapelanggan'] 	= $getpelanggan;

		$isi['datadistributor'] = $getdistributor;

		$isi['dataproduk'] 	  	= $getproduk;


		$this->load->view('v_home',$isi);

	}

	public function viewdetailpesan()

	{		

		$this->m_squrity->getsqurity();

		$key 				= $this->uri->segment(4);

		$getdetailpesan		= $this->m_pesan->GetDetailPesan($key);


		$isi['content'] 	= 'pesanan/v_detail_pesan';

		$isi['back_link'] 	= 'pesanan/c_pesan';

		$isi['base_link'] 	= 'pesanan/c_pesan';

		$isi['judul'] 		= 'Pemesanan ';

		$isi['sub_judul'] 	= 'Detail Pemesanan';


		$isi['data']		= $getdetailpesan;


		$this->load->view('v_home',$isi);

	}

	public function tambah_data()

	{

		$this->m_squrity->getsqurity();
 
		$data['id_user']		= $this->session->userdata('id');

		$data['tgl_pesan']		= $this->input->post('tgl_pesan');

		$data['id_distributor']	= $this->input->post('nama_pengirim');

		$data['id_pelanggan']	= $this->input->post('nama_pelanggan');

		$data['ekspedisi']		= $this->input->post('kurir');

		$data['kode_pesan']		= $this->kodePesan($data['id_user'], $data['ekspedisi']);

		$xpelanggan = substr($data['id_pelanggan'], 0, 1);

		if ($xpelanggan == 'D'){

			if ($data['id_distributor'] == 'D1') {

				$this->m_pesan->GetInsert($data);

				$this->session->set_flashdata('info','tambah');

				$this->session->set_userdata('pesanan', 'mitra');

				redirect('pesanan/c_pesan/mitra');

			}

			else{

				$this->session->set_flashdata('info','alert');

				redirect('pesanan/c_pesan/mitra');

				}

		}

		else{

			$this->m_pesan->GetInsert($data);

			$this->session->set_flashdata('info','tambah');

			$this->session->set_userdata('pesanan', 'customer');

			redirect('pesanan/c_pesan');

		}

	}

	public function kodePesan($admin, $ekspedisi)

	{

		$this->m_squrity->getsqurity();

		$kode_admin = NULL;

		$kode_kurir = NULL;

		switch ($admin) {
			
			case 2:
			
				$kode_admin = "M";
				
				break;

			case 4:
			
				$kode_admin = "L";
				
				break;
			
			default:
				
				$kode_admin = "SYSTEM";

				break;
		}

		$jumlah_order = $this->m_pesan->GetKodeKurir($ekspedisi);

		switch ($ekspedisi) {

			case 'JNE':

				$kode_kurir = chr(ord("a") + $jumlah_order);

				break;

			case 'JNT':

				$kode_kurir = chr(ord("o") + $jumlah_order);

				break;

			case 'SICEPAT':

				$kode_kurir = 1 + $jumlah_order;

				break;

			case 'POS':

				$hitung = chr(ord("X") + $jumlah_order);

				$kode_kurir = $hitung.$hitung;

				break;

			case 'COD':

				$hitung = 1 + $jumlah_order;

				$kode_kurir = "COD".$hitung;

				break;

			case 'OJOL':

				$hitung = 1 + $jumlah_order;

				$kode_kurir = "OJOL".$hitung;

				break;
		}

		return $kode_admin.".".$kode_kurir;

	}

	public function tambah_detail_data()

	{

		$this->m_squrity->getsqurity();

		$data['id_pesan']		= $this->input->post('id_pesan');

		$jenis					= $this->input->post('jenis_input');

		$jumlah					= $this->input->post('jumlah_input');

		foreach ($jenis as $key => $j) {

			$data['id_produk'] 		= $j;

			$data['jumlah_pesan']	= $jumlah[$key];

			$this->m_pesan->GetInsertDetail($data);
        
        }

		$this->session->set_flashdata('info','tambah');

		if($this->session->userdata('pesanan') == 'customer'){

			redirect('pesanan/c_pesan');}

		else{

			redirect('pesanan/c_pesan/mitra');}

	}

	public function hapus_data()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('settings/m_pesan');



		$key = $this->uri->segment(4);

		$this->db->where('id',$key);

		$query = $this->db->get('t_pesanan');

		if($query->num_rows()>0){

			$this->m_pesan->GetDeleteDetail($key);

			$this->m_pesan->GetDelete($key);

			$this->session->set_flashdata('info','hapus');

			

			if($this->session->userdata('pesanan') == 'customer'){

				$this->index();}

			else{

				$this->mitra();}

		}		

	}

	public function strukPesan()

	{

		$this->m_squrity->getsqurity();

		$key 				 = $this->uri->segment(4);

		$pengirim 			 = $this->uri->segment(5);

		$data['detailpesan'] = $this->m_pesan->GetDetailPesan($key);

		if($this->session->userdata('pesanan') == 'customer'){

			$data['pesan'] 		 = $this->m_pesan->GetStruk($key);

			if($pengirim == "-"){

				$this->load->view('pesanan/v_struk_pesan', $data);}

			else{

				$this->load->view('pesanan/v_struk_pesan_mitra', $data);}

		}

		else{

			$data['pesan'] 		 = $this->m_pesan->GetStrukMitra($key);

			$this->load->view('pesanan/v_struk_pesan', $data);

		}

	}


}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */