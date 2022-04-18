<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['page'] =('admin/pengunjung');
		$this->load->view('admin/template', $data);
		// $this->load->view('admin/dashboard_view');
	}

	
}
