<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_op extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Pengunjung_model');
	}

	public function index()
	{
		$pengunjung = $this->Pengunjung_model->listing();
		$data = array( 'title'   => 'Pengunjung Perpustakaan',
					   'pengunjung'	 => $pengunjung);
		$data['halaman'] =('operator/pengunjung');
		$this->load->view('operator/_template', $data);
		// $this->load->view('admin/dashboard_view');
	}

	
}
