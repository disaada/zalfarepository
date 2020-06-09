<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_squrity extends CI_model {

	public function getsqurity()
	{
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
			redirect('c_login');
		}
	}

	public function check_access($user_group=NULL){
		$_this =& get_instance();
		$_this->load->model('settings/m_users');
		$cek = $_this->m_users->GetAccessUsers($_this->session->userdata('username'));
		if(in_array($cek->id_group, $user_group)){
			return TRUE;
		}
		else{
			redirect('404','refresh');
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */