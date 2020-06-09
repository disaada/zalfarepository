<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_pelanggan extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		//hak akses

		/*=========================

			1	: pimpinan

			2	: admin

			3	: staf

		==========================*/

		$this->m_squrity->check_access(array('1', '2'));

		$this->load->model('pesanan/m_pelanggan');

	}



	public function index()

	{		

		$this->m_squrity->getsqurity();

		$getquerytable		= $this->m_pelanggan->GetPelanggan();

		$isi['content'] 	= 'pelanggan/v_pelanggan';

		$isi['base_link'] 	= 'pesanan/c_pelanggan';

		$isi['judul'] 		= 'Pelanggan ';

		$isi['sub_judul'] 	= 'Pelanggan';

		$isi['data'] 		= $getquerytable;

		$this->load->view('v_home',$isi);

	}

	public function tambah_data()

	{

		$this->m_squrity->getsqurity();

		$data['id']			= $this->kode();

		$data['nama']		= $this->input->post('nama');

		$data['alamat']		= $this->input->post('alamat');

		$data['no_hp']		= $this->input->post('no_hp');			


		$this->m_pelanggan->GetInsert($data);

		$this->session->set_flashdata('info','tambah');

		if($this->session->userdata('username') == 'customer'){

			redirect('pesanan/c_pesan');}

		else{

			redirect('pesanan/c_pesan/mitra');}

	}

	public function kode()

	{

		$jumlah = $this->m_pelanggan->GetKode();

		$kode = "";

		do {

		$hasil = $this->m_pelanggan->CekKode("C".$jumlah);

			if($hasil != ""){

				$jumlah = ($jumlah+1);}

			 
		} while ( $hasil != "");

		return "C".$jumlah;

	}

	public function edit_data()

	{

		$this->m_squrity->getsqurity();

		$key = $this->input->post('id');

		$data['nama']		= $this->input->post('nama');

		$data['no_hp']		= $this->input->post('no_hp');

		$data['alamat']		= $this->input->post('alamat');



		$this->m_pelanggan->GetUpdate($key,$data);

		$this->session->set_flashdata('info','edit');

		redirect('pesanan/c_pelanggan');		

	}

	public function hapus_data()

	{

		$this->m_squrity->getsqurity();


		$key = $this->uri->segment(4);

		$this->db->where('id',$key);

		$query = $this->db->get('t_pelanggan');

		if($query->num_rows()>0){

			$this->m_pelanggan->GetDeletePesanan($key);

			$this->m_pelanggan->GetDelete($key);

			$this->session->set_flashdata('info','hapus');

			redirect('pesanan/c_pelanggan');

		}		

	}

	public function cari_data()
	
	{
		if (isset($_GET['term'])) {
            $result = $this->m_pelanggan->GetSearch($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
        else{
        	redirect('pesanan/c_pesan');
        }

	}


}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */