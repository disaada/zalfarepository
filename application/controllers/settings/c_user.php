<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_user extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		//hak akses

		/*=========================

			1	: pimpinan

			2	: admin

			3	: staf

		==========================*/

		$this->m_squrity->check_access(array('1'));

	}



	public function index()

	{		

		$this->m_squrity->getsqurity();

		$this->load->model('settings/m_users');

		$getquerytable		= $this->m_users->GetUsers();

		$getdatauser		= $this->m_users->GetDataUsers();

		$isi['content'] 	= 'user/v_user';

		$isi['base_link'] 	= 'settings/c_user';

		$isi['judul'] 		= 'Settings ';

		$isi['sub_judul'] 	= 'User';

		$isi['data'] 		= $getquerytable;

		$isi['data_user']	= $getdatauser;

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

		$data_password			= $this->input->post('password');

		$data['nama_user']		= $this->input->post('nama_user');

		$data['username']		= $this->input->post('username');

		$data['password']		= md5($data_password);

		$data['id_group']		= $this->input->post('id_group');



		$this->load->model('settings/m_users');

		$this->m_users->GetUpdate($key,$data);

		$this->session->set_flashdata('info','edit');

		redirect('settings/c_user');		

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





}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */