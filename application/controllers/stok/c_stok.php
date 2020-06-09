<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_stok extends CI_Controller {



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

		$this->load->model('stok/m_stok');

		$this->load->model('pesanan/m_produk');

	}



	public function index()

	{		

		$this->m_squrity->getsqurity();

		$getquerytable		= $this->m_stok->GetStok();

		$getproduk			= $this->m_produk->GetProduk();


		$isi['content'] 	= 'stok/v_stok';

		$isi['base_link'] 	= 'stok/c_stok';

		$isi['judul'] 		= 'Stok ';

		$isi['sub_judul'] 	= 'Stok';


		$isi['data'] 		= $getquerytable;

		$isi['dataproduk'] 	= $getproduk;

		$this->load->view('v_home',$isi);

	}

	public function tambah_data()

	{

		$this->m_squrity->getsqurity();

		$data_password			= $this->input->post('password');

		$data['nama_user']		= $this->input->post('nama_user');

		$data['username']		= $this->input->post('username');

		$data['password']		= md5($data_password);

		$data['id_group']		= $this->input->post('id_group');

		$data['status']			= 'aktif';



		$this->load->model('settings/m_users');

		$this->m_users->GetInsert($data);

		$this->session->set_flashdata('info','tambah');

		redirect('settings/c_user');

	}



	public function edit_data()

	{

		$this->m_squrity->getsqurity();

		$key = $this->input->post('id');

		$data['tipe_stok']		= $this->input->post('tipe_stok');

		$data['id_produk']		= $this->input->post('id_produk');

		$data['jumlah']			= $this->input->post('jumlah');



		$this->m_stok->GetUpdate($key,$data);

		$this->session->set_flashdata('info','edit');

		redirect('stok/c_stok');		

	}



	public function reset_data()

	{

		$this->m_squrity->getsqurity();

		$key = $this->input->post('id');

		$data_password			= $this->input->post('password_baru');

		$data['password']		= md5($data_password);



		$this->load->model('settings/m_users');

		$this->m_users->GetReset($key,$data);

		$this->session->set_flashdata('info','edit');

		redirect('settings/c_user');		

	}



	public function stat_data()

	{

		$this->m_squrity->getsqurity();

		$key 				= $this->uri->segment(5);

		$data['status'] 	= $this->uri->segment(4);



		$this->load->model('settings/m_users');

		$check = $this->m_users->CheckUsers($key)->row_array();

		if($check['id_group']=="1"){

			redirect('404','refresh');

		}else{

			$this->m_users->GetReset($key,$data);

			$this->session->set_flashdata('info','edit');

			redirect('settings/c_user');	

		}

				

	}



	public function hapus_data()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('settings/m_users');



		$key = $this->uri->segment(4);

		$this->db->where('id',$key);

		$query = $this->db->get('t_user');

		if($query->num_rows()>0){

			$this->m_users->GetDelete($key);

			$this->session->set_flashdata('info','hapus');

			redirect('settings/c_user');

		}		

		

	}


	public function laporan()

	{

		$this->m_squrity->getsqurity();

		$data['laporan']		= $this->m_stok->GetStok();
		
		$this->load->view('stok/laporan', $data);
	}


	public function laporan_jual()

	{

		$this->m_squrity->getsqurity();

		$data['laporan']		= $this->m_stok->GetStok();
		
		$this->load->view('stok/laporan', $data);
	}





}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */