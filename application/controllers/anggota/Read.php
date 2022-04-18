<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Read extends CI_Controller {

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
		$file_buku = $this->File_buku_model->listing();
		$buku = $this->Buku_model->listing();
		$data = array( 'title'   => 'Buku',
					   'file_buku'	 => $file_buku,
						'buku'		=> $buku);
		$data['halaman'] =('anggota/buku/list_baca');
		$this->load->view('anggota/template', $data);
	}

	public function baca($id_file){
		
		$file_buku = $this->File_buku_model->detail($id_file); 
		$id_buku  = $file_buku->id_buku;
		$buku = $this->Buku_model->read($id_buku);

		$data = array( 'title'   => $buku->judul_buku,
					   'buku'	 => $buku,
					   
					   'file_buku' => $file_buku);
		$data['halaman'] =('anggota/buku/baca');
		$this->load->view('anggota/template', $data);
	}

}

/* End of file Buku.php */
/* Location: ./application/controllers/anggota/Buku.php */