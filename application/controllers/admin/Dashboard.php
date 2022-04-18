<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Pengunjung_model');
		$this->load->model('Anggota_model');
		$this->load->model('Buku_model');
		$this->load->model('Peminjaman_model');
	}

	public function index()
	{
		$data['total_pengunjung'] = $this->Pengunjung_model->totalData();
		$data['total_anggota'] = $this->Anggota_model->totalData();
		$data['total_buku'] = $this->Buku_model->totalData();
		$data['total_peminjaman'] = $this->Peminjaman_model->totalData();
		$data['page'] = 'admin/dashboard_view';
		$this->load->view('admin/template', $data);

		// $this->load->view('admin/dashboard_view');
	}
}
