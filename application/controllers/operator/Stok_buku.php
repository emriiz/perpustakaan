<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Buku_model');
		$this->load->model('Kategori_model');
		$this->load->model('Bahasa_model');
		$this->load->model('Penerbit_model');
		$this->load->model('File_buku_model');
	}

	public function index()
	{
		$stok_buku = $this->Buku_model->stok_listing();
		$data = array( 'title'   => 'Stok Buku',
					   'stok_buku'	 => $stok_buku);
		$data['halaman'] =('operator/buku/stok_buku');
		$this->load->view('operator/_template', $data);
	}

}

/* End of file Stok_buku.php */
/* Location: ./application/controllers/operator/Stok_buku.php */