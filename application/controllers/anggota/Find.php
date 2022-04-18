<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Find extends CI_Controller {


	public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->model('Buku_model');
			$this->load->model('Kategori_model');
			$this->load->model('Bahasa_model');
			$this->load->model('File_buku_model');
		}	
	public function index()
	{
		$buku = $this->Buku_model->listing();
		$data = array( 'title'   => 'Buku',
					   'buku'	 => $buku);
		
		$this->load->view('anggota/cari/search', $data);
	}

	public function cari() {
		$cariberdasarkan = $this->input->post('cariberdasarkan');
		$yangdicari = $this->input->post('yangdicari');
		
		$buku = $this->Buku_model->cari($cariberdasarkan, $yangdicari);
		$jumlah = count($buku);
		$data = array('cariberdasarkan' => $cariberdasarkan,
					  'yangdicari'      => $yangdicari,
					  'buku'            => $buku,
					  'jumlah'          => $jumlah);
		$this->load->view('anggota/cari/search', $data);
	}

}

/* End of file Find.php */
/* Location: ./application/controllers/anggota/Find.php */