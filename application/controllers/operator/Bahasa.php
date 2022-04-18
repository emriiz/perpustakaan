<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Bahasa_model');
		// $this->load->library('form_validation');
	}

   //Halaman Utama
	public function index()
	{
		$bahasa = $this->Bahasa_model->listing();
		
		$data = array( 'title'   => 'Bahasa'		,
					   'bahasa'	 => $bahasa);
		$data['halaman'] =('operator/bahasa/list');
		$this->load->view('operator/_template', $data);
		// $this->load->view('operator/dashboard_view');
	}

	//Halaman Tambah
	public function tambah() {
		$data = array( 'title'   => 'Pengguna');
		//Validasi 
		$valid = $this ->form_validation;

		$valid->set_rules('kode_bahasa','Kode Bahasa','required|is_unique[tbl_bahasa.kode_bahasa]', 
							array('required'  => 'kode_bahasa harus di isi',
								  'is_unique'=>  ' Kode <strong>'.$this->input->post('kode_bahasa').'</strong> sudah ada, buat kode baru' ));

		$valid->set_rules('nama_bahasa','Kode Bahasa','required', 
							array('required'  => 'kode_bahasa harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi

		$data['halaman'] =('operator/bahasa/tambah');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 'kode_bahasa'        => htmlspecialchars($i->post('kode_bahasa', TRUE)),
						   	'nama_bahasa'		=> $i->post('nama_bahasa')			   
						 );
			$this->Bahasa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/bahasa'),'refresh');
			}	
	}
	// End Halaman Tambah

	// Edit
	public function edit($id_bahasa) {
		$bahasa = $this->Bahasa_model->detail($id_bahasa);
		//Validasi 
		
		$valid = $this ->form_validation;

		$valid->set_rules('nama_bahasa','Kode Bahasa','required', 
							array('required'  => 'kode_bahasa harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi
		$data = array( 'title'   => $bahasa->nama_bahasa,	
					   'bahasa'	 => $bahasa);
		$data['halaman'] =('operator/bahasa/edit');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 	'id_bahasa'			=>$id_bahasa,
							'kode_bahasa'        => htmlspecialchars($i->post('kode_bahasa', TRUE)),
						   	'nama_bahasa'		=> $i->post('nama_bahasa')			   
						 );
			$this->Bahasa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/bahasa'),'refresh');
			}	
			}	
	
	// End Edit

	// Delete
	public function delete($id_bahasa){
		// Proteksi Hapus
		$data = array('id_bahasa'   => $id_bahasa);
		$this->Bahasa_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/bahasa'),'refresh');
			}	
			// End Delete
}

// End Controller

