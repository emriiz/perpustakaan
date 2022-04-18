<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Kategori_model');
		// $this->load->library('form_validation');
	}

   //Halaman Utama
	public function index()
	{
		$kategori = $this->Kategori_model->listing();
		
		$data = array( 'title'   => 'Kategori'		,
					   'kategori'	 => $kategori);
		$data['halaman'] =('operator/kategori/list');
		$this->load->view('operator/_template', $data);
		// $this->load->view('operator/dashboard_view');
	}

	//Halaman Tambah
	public function tambah() {
		$data = array( 'title'   => 'Pengguna');
		//Validasi 
		$valid = $this ->form_validation;

		$valid->set_rules('kode_kategori','Kode Kategori','required|is_unique[tbl_kategori.kode_kategori]', 
							array('required'  => 'kode_kategori harus di isi',
								  'is_unique'=>  ' Kode <strong>'.$this->input->post('kode_kategori').'</strong> sudah ada, buat kode baru' ));

		$valid->set_rules('nama_kategori','Kode Kategori','required', 
							array('required'  => 'kode_kategori harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi

		$data['halaman'] =('operator/kategori/tambah');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 'kode_kategori'        => htmlspecialchars($i->post('kode_kategori', TRUE)),
						   	'nama_kategori'		=> $i->post('nama_kategori')			   
						 );
			$this->Kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/kategori'),'refresh');
			}	
	}
	// End Halaman Tambah

	// Edit
	public function edit($id_kategori) {
		$kategori = $this->Kategori_model->detail($id_kategori);
		//Validasi 
		
		$valid = $this ->form_validation;

		$valid->set_rules('nama_kategori','Kode Kategori','required', 
							array('required'  => 'kode_kategori harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi
		$data = array( 'title'   => $kategori->nama_kategori,	
					   'kategori'	 => $kategori);
		$data['halaman'] =('operator/kategori/edit');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 	'id_kategori'			=>$id_kategori,
							'kode_kategori'        => htmlspecialchars($i->post('kode_kategori', TRUE)),
						   	'nama_kategori'		=> $i->post('nama_kategori')			   
						 );
			$this->Kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/kategori'),'refresh');
			}	
			}	
	
	// End Edit

	// Delete
	public function delete($id_kategori){
		// Proteksi Hapus
		$data = array('id_kategori'   => $id_kategori);
		$this->Kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/kategori'),'refresh');
			}	
			// End Delete
}

// End Controller

