<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index()
	{
		$this->load->model('muq/m_email');
		$this->m_email->sendMail('djatikusumadata@gmail.com','test','testing');
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */