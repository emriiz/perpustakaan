<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		$siswa = $this->Siswa_model->listing();
		$data = array( 'title'   	 => 'Siswa',
					   'siswa'	 => $siswa);
		$data['halaman'] = ('operator/siswa/list');
		$this->load->view('operator/_template', $data);
	}


	public function tambah(){
		$data = array( 'title'   => 'Siswa');
		$data['nis'] = $this->Siswa_model->nis();
		$valid = $this ->form_validation;

		$valid->set_rules('nama','Nama','required', array('required'  => 'Nama harus di isi' ));

		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('foto')){	

		$data['halaman'] =('operator/siswa/tambah');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			//UPLOAD DATA
			$upload_data	=  array('uploads' => $this->upload->data());

			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/image/' .$upload_data['uploads']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb']		= TRUE;
			$config['quality']			= "100%";
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 360;
			$config['height']			= 360;
			$config['x_axis']			= 0;
			$config['y_axis']			= 0;
			$config['thumb_marker']			= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();


			$i = $this->input;
			$data = array( 'id_user'		   => $this->session->userdata('id_user'),
						   'nis'               => htmlspecialchars($i->post('nis', TRUE)) ,
						   'nama'     		   => htmlspecialchars($i->post('nama', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'no_telepon'		   => $i->post('no_telepon'),
						   'foto'			   => $upload_data['uploads']['file_name'],
						   'status_siswa'      => $i->post('status_siswa')
						 );
			$this->Siswa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/siswa'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'id_user'		   => $this->session->userdata('id_user'),
						   'nis'               => htmlspecialchars($i->post('nis', TRUE)) ,
						   'nama'     		   => htmlspecialchars($i->post('nama', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'no_telepon'		   => $i->post('no_telepon'),
						   'status_siswa'    => $i->post('status_siswa')
						 );
			$this->Siswa_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data Siswa telah ditambah');
			redirect(base_url('operator/siswa'),'refresh');
			}}

		$data['halaman'] =('operator/siswa/tambah');
		$this->load->view('operator/_template', $data);
	}

	// Edit
	public function edit($id_siswa){
		$siswa = $this->Siswa_model->detail($id_siswa);

		$data = array( 'title'   => 'Siswa');

		$valid = $this ->form_validation;

		$valid->set_rules('nama','Nama','required', array('required'  => 'Nama harus di isi' ));


		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('foto')){
				
		$data    = array('title'	=> $siswa->nama,
						 'siswa'  => $siswa);
		$data['halaman'] =('operator/siswa/edit');
		$this->load->view('operator/_template', $data);
		// jika tidak ada Error, maka masuk ke database
		}else{
			//UPLOAD DATA
			$upload_data	=  array('uploads' => $this->upload->data());

			$config['image_library']	= 'gd2';
			$config['source_image']		= './assets/upload/image/' .$upload_data['uploads']['file_name'];
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb']		= TRUE;
			$config['quality']			= "100%";
			$config['maintain_ratio']	= TRUE;
			$config['width']			= 360;
			$config['height']			= 360;
			$config['x_axis']			= 0;
			$config['y_axis']			= 0;
			$config['thumb_marker']			= '';
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if($siswa->foto != "") {
			unlink('./assets/upload/image/'.$siswa->foto);
			unlink('./assets/upload/image/thumbs/'.$siswa->foto);
		}

			$i = $this->input;
				$data = array('id_siswa'	   => $id_siswa,  
							'id_user'		   => $this->session->userdata('id_user'),
						   'nama'     		   => htmlspecialchars($i->post('nama', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'no_telepon'		   => $i->post('no_telepon'),
						   'foto'			   => $upload_data['uploads']['file_name'],
						   'status_siswa'    => $i->post('status_siswa')
						 );
			$this->Siswa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/siswa'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array('id_siswa'	   => $id_siswa, 
						   'id_user'		   => $this->session->userdata('id_user'),
						   'nis'               => htmlspecialchars($i->post('nis', TRUE)) ,
						   'nama'     		   => htmlspecialchars($i->post('nama', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'no_telepon'		   => $i->post('no_telepon'),
						   'status_siswa'      => $i->post('status_siswa')
						 );
			$this->Siswa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/siswa'),'refresh');
			}}
		$data    = array('title'	=> $siswa->nama,
						 'siswa'  => $siswa);
		$data['halaman'] =('operator/siswa/edit');
		$this->load->view('operator/_template', $data);
	}

	// Hapus Data
	public function delete($id_siswa){
		// Proteksi Hapus
		$siswa = $this->Siswa_model->detail($id_siswa);
		if($siswa->foto != "") {
			unlink('./assets/upload/image/'.$siswa->foto);
			unlink('./assets/upload/image/thumbs/'.$siswa->foto);
		}
		
		$data = array('id_siswa'   => $id_siswa);
		$this->Siswa_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus secara permanen');
		redirect(base_url('operator/siswa/backup'),'refresh');
			}	
		// End Delete

	public function profile($id_siswa){
		$siswa = $this->Siswa_model->detail($id_siswa);

		$data    = array('title'	=> $siswa->nama,
						 'siswa'  => $siswa);
		$data['halaman'] =('operator/siswa/profile');
		$this->load->view('operator/_template', $data);
	}

	public function backup()
	{
		$siswa  = $this->Siswa_model->backup();
		
		$data = array( 'title'   	 => 'Data Siswa',
					   'siswa'	 => $siswa);
		$data['halaman'] = ('operator/backup/siswa/list');
		$this->load->view('operator/_template', $data);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/operator/Siswa.php */