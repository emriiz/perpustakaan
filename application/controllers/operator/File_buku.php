<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('File_buku_model');
		$this->load->model('Buku_model');
	}

	public function index()
	{
		$file_buku = $this->File_buku_model->listing();
		$data = array( 'title'   => 'File Buku',
					   'file_buku'	 => $file_buku);
		$data['halaman'] =('operator/file_buku/list');
		$this->load->view('operator/_template', $data);
	}

	public function unduh($id_file){
		$file_buku = $this->File_buku_model->detail($id_file);
		// Proses Download
		$folder   = './assets/upload/file/';
		$file    = $file_buku->nama_file;
		force_download($folder.$file, NULL);
	}

	// Kelola file Buku
	public function kelola($id_buku)
	{
		$file_buku = $this->File_buku_model->buku($id_buku);
		$buku 	   = $this->Buku_model->detail($id_buku);

		$valid = $this ->form_validation;

		$valid->set_rules('judul_file','Judul','required', array('required'  => 'Judul Harus diisi harus di isi' ));

		if($valid->run()){
			$config['upload_path'] = './assets/upload/file/';
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlxs|ppt|pptx';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('nama_file')){
		// End Validasi

		$data = array( 'title'   	 => $buku->judul_buku,
					   'file_buku'	 => $file_buku,
					   'buku'		 => $buku
						);
		$data['halaman'] =('operator/file_buku/list');
		$this->load->view('operator/_template', $data);
		}else{
			//UPLOAD DATA
			$upload_data	=  array('uploads' => $this->upload->data());

			$i = $this->input;
			$data = array( 'id_user'		   => $this->session->userdata('id_user'),
						   'id_buku'	   	   => $id_buku,
				           'judul_file'		   => $i->post('judul_file') ,
						   'nama_file'         => $upload_data['uploads']['file_name']
						 );
			$this->File_buku_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/file_buku/kelola/'.$id_buku),'refresh');
			}}
		$data = array( 'title'   	 => $buku->judul_buku,
					   'file_buku'	 => $file_buku,
					   'buku'		 => $buku);
		$data['halaman'] =('operator/file_buku/list');
		$this->load->view('operator/_template', $data);
	}

	// Edit File
	public function edit($id_file)
	{
		$file_buku = $this->File_buku_model->detail($id_file);
		$id_buku   = $file_buku->id_buku;
		$buku 	   = $this->Buku_model->detail($id_buku);

		$valid = $this ->form_validation;

		$valid->set_rules('judul_file','Judul','required', array('required'  => 'Judul Harus diisi harus di isi' ));

		if($valid->run()){
			if(!empty($_FILES['nama_file']['name'])){

			$config['upload_path'] = './assets/upload/file/';
			$config['allowed_types'] = 'pdf|doc|docx|xls|xlxs|ppt|pptx';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('nama_file')){
		// End Validasi

		$data = array( 'title'   	 => $buku->judul_buku,
					   'file_buku'	 => $file_buku,
					   'buku'		 => $buku,
						'error'		 => $this->upload->display_error());
		$data['halaman'] =('operator/file_buku/edit');
		$this->load->view('operator/_template', $data);
		}else{
			//UPLOAD DATA
			$upload_data	=  array('uploads' => $this->upload->data());

			// Hapus File Lama
			unlink('./assets/upload/file/'.$file_buku->nama_file);
			// ENd Hapus file lama

			$i = $this->input;
			$data = array( 'id_file'			=> $id_file,
							'id_user'		   => $this->session->userdata('id_user'),
						   'id_buku'	   	   => $id_buku,
				           'judul_file'		   => $i->post('judul_file') ,
						   'nama_file'         => $upload_data['uploads']['file_name']
						 );
			$this->File_buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('operator/file_buku/kelola/'.$id_buku),'refresh');
			}}else{
				$i = $this->input;
				$data = array( 'id_file'			=> $id_file,
							'id_user'		   => $this->session->userdata('id_user'),
						   'id_buku'	   	   => $id_buku,
				           'judul_file'		   => $i->post('judul_file'),
						 );
			$this->File_buku_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di update');
			redirect(base_url('operator/file_buku/kelola/'.$id_buku),'refresh');
			}}


		$data = array( 'title'   	 => $buku->judul_buku,
					   'file_buku'	 => $file_buku,
					   'buku'		 => $buku);
		$data['halaman'] =('operator/file_buku/edit');
		$this->load->view('operator/_template', $data);
	}

	// Hapus Data
	public function delete($id_file, $id_buku){
		
		$file_buku = $this->File_buku_model->detail($id_file);

		if($file_buku->nama_file != "") {
			unlink('./assets/upload/file/'.$file_buku->nama_file);
			
		}
		
		$data = array('id_file'   => $id_file);
		$this->File_buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/file_buku/kelola/'.$id_buku),'refresh');
			}	
		// End Delete

	public function profile($id_file){
		$file_buku = $this->File_buku_model->detail($id_file_buku);

		$data    = array('title'	=> $file_buku->judul_file_buku,
						 'file_buku'  => $file_buku);
		$data['halaman'] =('operator/file_buku/profile');
		$this->load->view('operator/_template', $data);
	}
}

/* End of file File_buku.php */
/* Location: ./application/controllers/operator/File_buku.php */