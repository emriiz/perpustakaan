<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library('form_validation');
		$this->load->model('Buku_model');
		$this->load->model('Kategori_model');
		$this->load->model('Bahasa_model');
		$this->load->model('File_buku_model');
		$this->load->model('Anggota_model');
	}
	public function index()
	{
		$buku = $this->Buku_model->listing();
		$data = array( 'title'   => 'Buku',
					   'buku'	 => $buku);
		$data['halaman'] =('anggota/buku/list');
		$this->load->view('anggota/template', $data);
	}


}

/* End of file Buku.php */
/* Location: ./application/controllers/anggota/Buku.php */