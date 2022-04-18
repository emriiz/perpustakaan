<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit extends CI_Controller {

	//Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Penerbit_model');
		// $this->load->library('form_validation');
	}

   //Halaman Utama
	public function index()
	{
		$penerbit = $this->Penerbit_model->listing();
		
		$data = array( 'title'   => 'Penerbit'		,
					   'penerbit'	 => $penerbit);
		$data['halaman'] =('operator/penerbit/list');
		$this->load->view('operator/_template', $data);
		// $this->load->view('operator/dashboard_view');
	}

	//Halaman Tambah
	public function tambah() {
		$data = array( 'title'   => 'Pengguna');
		//Validasi 
		$valid = $this ->form_validation;

		$valid->set_rules('kode_penerbit','Kode Penerbit','required|is_unique[tbl_penerbit.kode_penerbit]', 
							array('required'  => 'kode_penerbit harus di isi',
								  'is_unique'=>  ' Kode <strong>'.$this->input->post('kode_penerbit').'</strong> sudah ada, buat kode baru' ));

		$valid->set_rules('nama_penerbit','Kode Penerbit','required', 
							array('required'  => 'kode_penerbit harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi

		$data['halaman'] =('operator/penerbit/tambah');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 'kode_penerbit'        => htmlspecialchars($i->post('kode_penerbit', TRUE)),
						   	'nama_penerbit'		=> $i->post('nama_penerbit')			   
						 );
			$this->Penerbit_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/penerbit'),'refresh');
			}	
	}
	// End Halaman Tambah

	// Edit
	public function edit($id_penerbit) {
		$penerbit = $this->Penerbit_model->detail($id_penerbit);
		//Validasi 
		
		$valid = $this ->form_validation;

		$valid->set_rules('nama_penerbit','Kode Penerbit','required', 
							array('required'  => 'kode_penerbit harus di isi'));

		if($valid->run()== FALSE){
		//End Validasi
		$data = array( 'title'   => $penerbit->nama_penerbit,	
					   'penerbit'	 => $penerbit);
		$data['halaman'] =('operator/penerbit/edit');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			$i = $this->input;
			$data = array( 	'id_penerbit'			=>$id_penerbit,
							'kode_penerbit'        => htmlspecialchars($i->post('kode_penerbit', TRUE)),
						   	'nama_penerbit'		=> $i->post('nama_penerbit')			   
						 );
			$this->Penerbit_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/penerbit'),'refresh');
			}	
			}	
	
	// End Edit

	// Delete
	public function delete($id_penerbit){
		// Proteksi Hapus
		$data = array('id_penerbit'   => $id_penerbit);
		$this->Penerbit_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/penerbit'),'refresh');
			}	
			// End Delete
}

// End Controller

