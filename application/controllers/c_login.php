<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$username = $this->session->userdata('username');
		if(!empty($username)){
			redirect('c_home');
		}
	}

	public function index()
	{
		$this->load->view('v_login');
	}
	public function getlogin()
	{

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('m_login');
		$this->m_login->getlogin($username,$password);
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */