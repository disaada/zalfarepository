<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class C_home extends CI_Controller {



	public function index()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('m_home');

		$this->load->model('settings/m_users');

		$GetTotalGuser				= $this->m_home->GetJumlahGuser();

		$GetTotalUser				= $this->m_home->GetJumlahUser();

		$Gethari					= $this->m_home->GetHari();

		$GetGrafik					= $this->m_home->GetGrafik();

		$GetPenjualanMitra			= $this->m_home->GetPenjualanMitra(date('m'), date('Y'));

		$isi['content'] 			= 'v_dashboard';

		$isi['base_link'] 			= 'c_home';

		$isi['judul'] 				= 'Dashboard';

		$isi['sub_judul'] 			= '';

		$isi['GetJumlahGuser']		= $GetTotalGuser;

		$isi['GetJumlahUser']		= $GetTotalUser;		

		$isi['hari']				= $Gethari;

		$isi['grafik']				= $GetGrafik;

		$isi['penjualan_mitra']		= $GetPenjualanMitra;

		////////////////////////// grafik keuangan ////////////////////////

		$this->load->view('v_home',$isi);

	}

	public function lap_penjualan_mitra()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('m_home');

		$this->load->model('settings/m_users');

		$GetTotalGuser				= $this->m_home->GetJumlahGuser();

		$GetTotalUser				= $this->m_home->GetJumlahUser();

		$Gethari					= $this->m_home->GetHari();

		$GetGrafik					= $this->m_home->GetGrafik();

		$bulan						= $this->input->post('bulan');

		$tahun						= $this->input->post('tahun');

		$GetPenjualanMitra			= $this->m_home->GetPenjualanMitra($bulan, $tahun);

		$isi['content'] 			= 'v_dashboard';

		$isi['base_link'] 			= 'c_home';

		$isi['judul'] 				= 'Dashboard';

		$isi['sub_judul'] 			= '';

		$isi['GetJumlahGuser']		= $GetTotalGuser;

		$isi['GetJumlahUser']		= $GetTotalUser;		

		$isi['hari']				= $Gethari;

		$isi['grafik']				= $GetGrafik;

		$isi['penjualan_mitra']		= $GetPenjualanMitra;

		////////////////////////// grafik keuangan ////////////////////////

		$this->load->view('v_home',$isi);

	}

	public function viewdetailproduk()

	{		

		$this->m_squrity->getsqurity();

		$this->load->model('m_home');

		$this->load->model('settings/m_users');

		$kode 				= $this->uri->segment(3);

		$bulan 				= $this->uri->segment(4);

		$tahun 				= $this->uri->segment(5);

		$getdetailproduk	= $this->m_home->GetDetailProduk($kode, $bulan, $tahun);


		$isi['content'] 	= 'v_detail_produk';

		$isi['back_link'] 	= 'c_home';

		$isi['base_link'] 	= 'c_home';

		$isi['judul'] 		= 'Dashboard ';

		$isi['sub_judul'] 	= '';


		$isi['data']		= $getdetailproduk;

  
		$this->load->view('v_home',$isi);

	}

	public function penjualanproduk()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('m_home');

		$this->load->model('settings/m_users');

		$GetTotalGuser				= $this->m_home->GetJumlahGuser();

		$GetTotalUser				= $this->m_home->GetJumlahUser();

		$Gethari					= $this->m_home->GetHari();

		$GetGrafik					= $this->m_home->GetGrafik();

		$GetPenjualanProduk			= $this->m_home->GetPenjualanProduk(date('m'), date('Y'));

		$isi['content'] 			= 'v_penjualan_produk';

		$isi['base_link'] 			= 'c_home/penjualanproduk';

		$isi['judul'] 				= 'Dashboard';

		$isi['sub_judul'] 			= '';

		$isi['GetJumlahGuser']		= $GetTotalGuser;

		$isi['GetJumlahUser']		= $GetTotalUser;		

		$isi['hari']				= $Gethari;

		$isi['grafik']				= $GetGrafik;

		$isi['penjualan_produk']	= $GetPenjualanProduk;

		////////////////////////// grafik keuangan ////////////////////////

		$this->load->view('v_home',$isi);

	}

	public function lap_penjualan_produk()

	{

		$this->m_squrity->getsqurity();

		$this->load->model('m_home');

		$this->load->model('settings/m_users');

		$GetTotalGuser				= $this->m_home->GetJumlahGuser();

		$GetTotalUser				= $this->m_home->GetJumlahUser();

		$Gethari					= $this->m_home->GetHari();

		$GetGrafik					= $this->m_home->GetGrafik();

		$bulan						= $this->input->post('bulan');

		$tahun						= $this->input->post('tahun');

		$GetPenjualanProduk			= $this->m_home->GetPenjualanProduk($bulan, $tahun);

		$isi['content'] 			= 'v_penjualan_produk';

		$isi['base_link'] 			= 'c_home/penjualanproduk';

		$isi['judul'] 				= 'Dashboard';

		$isi['sub_judul'] 			= '';

		$isi['GetJumlahGuser']		= $GetTotalGuser;

		$isi['GetJumlahUser']		= $GetTotalUser;		

		$isi['hari']				= $Gethari;

		$isi['grafik']				= $GetGrafik;

		$isi['penjualan_produk']	= $GetPenjualanProduk;

		////////////////////////// grafik keuangan ////////////////////////

		$this->load->view('v_home',$isi);

	}

	public function logout()

	{

		$this->session->sess_destroy();

		redirect('c_login');

	}



}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */

