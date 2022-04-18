<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Anggota_model');
		$this->load->model('Siswa_model');

	}

	public function index()
	{
		$anggota = $this->Anggota_model->listing();
		$siswa   = $this->Siswa_model->listing();
		$data = array( 'title'   	 => 'Anggota',
					   'anggota'	 => $anggota,
					   'siswa'		 => $siswa);
		$data['halaman'] = ('operator/anggota/list');
		$this->load->view('operator/_template', $data);
	}


	public function tambah(){
		$siswa     = $this->Siswa_model->listing();
		$data = array( 'title'   => 'Anggota',
						'siswa'  => $siswa);
		$data['no_anggota'] = $this->Anggota_model->no_anggota();
		$valid = $this ->form_validation;

		$valid->set_rules('nama_anggota','Nama','required', array('required'  => 'Nama harus di isi' ));

		$valid->set_rules('no_anggota','No_anggota','required|is_unique[tbl_anggota.no_anggota]', 
							array('required'  => 'No Anggota Harus diisi',
								  'is_unique' =>  ' No Anggota <strong>'.$this->input->post('no_anggota').'</strong> sudah ada' ));

		$valid->set_rules('password','Password','required|min_length[3]', 
							array('required'  => 'password harus di isi',
							'min_length' 	  => 'Password minimal 3 huruf' ));

		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('foto')){	

		$data['halaman'] =('operator/anggota/tambah');
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
						   'no_anggota'        => htmlspecialchars($i->post('no_anggota', TRUE)) ,
						   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'telepon'		   => $i->post('telepon'),
						   'foto'			   => $upload_data['uploads']['file_name'],
						   'password'          => md5($i->post('password')),
						   'status_anggota'    => $i->post('status_anggota'),
						   'keterangan'    	   => $i->post('keterangan'),
						   'status_aktif'		   => 1,
						   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/anggota'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'id_user'		   => $this->session->userdata('id_user'),
							   'no_anggota'        => htmlspecialchars($i->post('no_anggota', TRUE)) ,
							   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
							   'kelas'      	   => $i->post('kelas') ,
							   'tempat_lahir'      => $i->post('tempat_lahir') ,
							   'tanggal_lahir'     => $i->post('tanggal_lahir'),
							   'jekel'		       => $i->post('jekel'),
							   'alamat'			   => $i->post('alamat'),
							   'telepon'		   => $i->post('telepon'),
							   'password'          => md5($i->post('password')),
							   'status_anggota'    => $i->post('status_anggota'),
							   'keterangan'    	   => $i->post('keterangan'),
							   'status_aktif'	   => 1,
							   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/anggota'),'refresh');
			}}

		$data['halaman'] =('operator/anggota/tambah');
		$this->load->view('operator/_template', $data);
	}

	// Edit
	public function edit($id_anggota){
		$anggota = $this->Anggota_model->detail($id_anggota);
		$id_siswa = $anggota->id_siswa;
		$siswa    = $this->Siswa_model->detail($id_siswa);
	
		$valid = $this ->form_validation;

		$valid->set_rules('nama_anggota','Nama','required', array('required'  => 'Nama harus di isi' ));


		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('foto')){
				
		$data    = array('title'	=> $anggota->nama_anggota,
						 'anggota'  => $anggota,
						 'siswa'	=> $siswa);
		$data['halaman'] =('operator/anggota/edit');
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

			if($anggota->foto != "") {
			unlink('./assets/upload/image/'.$anggota->foto);
			unlink('./assets/upload/image/thumbs/'.$anggota->foto);
		}

			$i = $this->input;
			$data = array( 'id_anggota'        => $id_anggota,
						   'id_user'		   => $this->session->userdata('id_user'),
						   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
						   'kelas'      	   => $i->post('kelas') ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'jekel'		       => $i->post('jekel'),
						   'alamat'			   => $i->post('alamat'),
						   'telepon'		   => $i->post('telepon'),
						   'foto'			   => $upload_data['uploads']['file_name'],
						   'password'          => md5($i->post('password')),
						   'status_anggota'    => $i->post('status_anggota'),
						   'keterangan'    	   => $i->post('keterangan'),
						   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/anggota'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'id_anggota'        => $id_anggota,
							   'id_user'		   => $this->session->userdata('id_user'),
							   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
							   'kelas'      	   => $i->post('kelas') ,
							   'tempat_lahir'      => $i->post('tempat_lahir') ,
							   'tanggal_lahir'     => $i->post('tanggal_lahir'),
							   'jekel'		       => $i->post('jekel'),
							   'alamat'			   => $i->post('alamat'),
							   'telepon'		   => $i->post('telepon'),
							   'password'          => md5($i->post('password')),
							   'status_anggota'    => $i->post('status_anggota'),
							   'keterangan'    	   => $i->post('keterangan'),
							   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('operator/anggota'),'refresh');
			}}
		$data    = array('title'	=> $anggota->nama_anggota,
						 'anggota'  => $anggota,
						 'siswa'	=> $siswa);
		$data['halaman'] =('operator/anggota/edit');
		$this->load->view('operator/_template', $data);
	}

	// Hapus Data
	public function delete($id_anggota){
		// Proteksi Hapus
		$anggota = $this->Anggota_model->detail($id_anggota);
		if($anggota->foto != "") {
			unlink('./assets/upload/image/'.$anggota->foto);
			unlink('./assets/upload/image/thumbs/'.$anggota->foto);
		}
		
		$data = array('id_anggota'   => $id_anggota);
		$this->Anggota_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus secara permanen');
		redirect(base_url('operator/anggota/backup'),'refresh');
			}	
		// End Delete

	public function profile($id_anggota){
		$anggota = $this->Anggota_model->detail($id_anggota);

		$data    = array('title'	=> $anggota->nama_anggota,
						 'anggota'  => $anggota);
		$data['halaman'] =('operator/anggota/profile');
		$this->load->view('operator/_template', $data);
	}

	public function backup()
	{
		$anggota  = $this->Anggota_model->backup();
		
		$data = array( 'title'   	 => 'Data Anggota',
					   'anggota'	 => $anggota);
		$data['halaman'] = ('operator/backup/anggota/list');
		$this->load->view('operator/_template', $data);
	}
	public function hapus($id_anggota){
	
		$data = array('id_anggota'   		=> $id_anggota,
						'status_aktif'		=> 0);
		
		$this->Anggota_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/anggota'),'refresh');
	}

	public function restore($id_anggota){
		
		$data = array('id_anggota'   => $id_anggota,
						'status_aktif'	 => 1);
		
		$this->Anggota_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah di kembalikan');
		redirect(base_url('operator/anggota/backup'),'refresh');
	}

	public function anggota_ajax(){

		$output = '';
		$nis = $this->input->post('nis');

		$query = $this->db->query("SELECT * FROM tbl_siswa where id_siswa = '$nis'")->row_array();

		$output = array(
			'siswa' => $query
		);

		echo json_encode($output);
	}
}

/* End of file Anggota.php */
/* Location: ./application/controllers/operator/Anggota.php */