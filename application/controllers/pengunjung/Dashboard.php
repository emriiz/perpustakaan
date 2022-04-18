<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// $this->load->model('User_model');
		$this->load->model('Pengunjung_model');
	}

	public function index()
	{
		$this->load->view('pengunjung/pengunjung_view');
		// $this->load->view('admin/dashboard_view');
	}

	public function tambah(){
		$data = array( 'title'   => 'Pengunjung');

		$valid = $this ->form_validation;

		$valid->set_rules('nama_pengunjung','Nama','required', array('required'  => 'Nama harus di isi' ));

		if($valid->run()== FALSE){
		//End Validasi
		$this->load->view('pengunjung/pengunjung_view', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$nama = htmlspecialchars($i->post('nama_pengunjung', TRUE));
			$data = array( 'nama_pengunjung'  =>$nama,     
						   'kelas'            => $i->post('kelas'),
						   'keterangan'		  => $i->post('keterangan')
						 );
			$this->Pengunjung_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Selamat Datang <strong>'.$nama.'</strong>');
			redirect(base_url('pengunjung/dashboard'),'refresh');
			}	
	}
}
