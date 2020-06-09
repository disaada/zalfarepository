<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_distributor extends CI_Controller {



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

		$this->load->model('pesanan/m_distributor');

	}



	public function index()

	{		

		$this->m_squrity->getsqurity();

		$getquerytable		= $this->m_distributor->GetDistributor();

		$isi['content'] 	= 'distributor/v_distributor';

		$isi['base_link'] 	= 'pesanan/c_distributor';

		$isi['judul'] 		= 'Mitra ';

		$isi['sub_judul'] 	= 'Mitra';

		$isi['data'] 		= $getquerytable;

		$this->load->view('v_home',$isi);

	}

	public function tambah_data()

	{

		$this->m_squrity->getsqurity();

		$data['id']			= $this->kode();

		$data['jenis']		= $this->input->post('jenis');

		$data['nama']		= $this->input->post('nama');

		$data['no_hp']		= $this->input->post('no_hp');

		$data['alamat']		= $this->input->post('alamat');


		$this->m_distributor->GetInsert($data);

		$this->session->set_flashdata('info','tambah');

		if($this->session->userdata('username') == 'customer'){

			redirect('pesanan/c_pesan');}

		else{

			redirect('pesanan/c_pesan/mitra');}

	}

	public function kode()

	{

		$jumlah = $this->m_distributor->GetKode();

		$kode = "";

		do {

		$hasil = $this->m_distributor->CekKode("D".$jumlah);

			if($hasil != ""){

				$jumlah = ($jumlah+1);}

			 
		} while ( $hasil != "");

		return "D".$jumlah;

	}

	public function edit_data()

	{

		$this->m_squrity->getsqurity();

		$key = $this->input->post('id');

		$data['nama']		= $this->input->post('nama');

		$data['no_hp']		= $this->input->post('no_hp');

		$data['alamat']		= $this->input->post('alamat');


		$this->m_distributor->GetUpdate($key,$data);

		$this->session->set_flashdata('info','edit');

		redirect('pesanan/c_distributor');		

	}

	public function hapus_data()

	{

		$this->m_squrity->getsqurity();


		$key = $this->uri->segment(4);

		$this->db->where('id',$key);

		$query = $this->db->get('t_distributor');

		if($query->num_rows()>0){

			$id_pesan = $this->m_distributor->GetIDDetailPesan($key);	
			
			$this->m_distributor->GetDeleteDetailPesan($id_pesan->id);		

			$this->m_distributor->GetPesanan($key);

			$this->m_distributor->GetDelete($key);

			$this->session->set_flashdata('info','hapus');

			redirect('pesanan/c_distributor');

		}		

		

	}





}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */