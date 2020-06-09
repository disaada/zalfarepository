<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Not_found extends CI_Controller {

	public function index()
	{
		$this->m_squrity->getsqurity();
		$isi['content'] 			= 'v_error';
		$isi['back_link'] 			= 'c_home';
		$isi['judul'] 				= 'Error';
		$isi['sub_judul'] 			= '';

		$this->load->view('v_error',$isi);
	}

}

/* End of file not_found.php */
/* Location: ./application/controllers/error/not_found.php */