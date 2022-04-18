<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model');
	}

	public function index()
	{
		$user = $this->User_model->listing();
		$data = array( 'title'   => 'Pengguna',
					   'user'	 => $user);
		$data['page'] =('admin/user/list');
		$this->load->view('admin/template', $data);
	}

	public function tambah(){
		$data = array( 'title'   => 'Pengguna');

		$valid = $this ->form_validation;

		$valid->set_rules('nama','Nama','required', array('required'  => 'password harus di isi' ));

		$valid->set_rules('username','Username','required|is_unique[tbl_user.username]', 
							array('required'  => 'username harus di isi',
								  'is_unique'=>  ' Username <strong>'.$this->input->post('username').'</strong> sudah ada, buat username baru' ));

		$valid->set_rules('password','Password','required|min_length[3]', 
							array('required'  => 'password harus di isi',
							'min_length' => 'Password minimal 3 huruf' ));

		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('foto')){
				

		$data['page'] =('admin/user/tambah');
		$this->load->view('admin/template', $data);
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
			$data = array( 'nip'             => htmlspecialchars($i->post('nip', TRUE)) ,
						   'nama'            => htmlspecialchars($i->post('nama', TRUE)) ,
						   'username'        => htmlspecialchars($i->post('username', TRUE)),
						   'password'        => md5($i->post('password')),
						   'foto'			 => $upload_data['uploads']['file_name'],
						   'hak_akses'       => $i->post('hak_akses'),
						   'tanggal'         => $i->post('tanggal')
						 );
			$this->User_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'nip'         => htmlspecialchars($i->post('nip', TRUE)) ,
						   'nama'            => htmlspecialchars($i->post('nama', TRUE)) ,
						   'username'        => htmlspecialchars($i->post('username', TRUE)),
						   'password'        => md5($i->post('password')),
						   'hak_akses'       => $i->post('hak_akses'),
						   'tanggal'         => $i->post('tanggal')
						 );
			$this->User_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
			}}

		$data['page'] =('admin/user/tambah');
		$this->load->view('admin/template', $data);
	}

	// Edit
	public function edit($id_user){
		$user = $this->User_model->detail($id_user);

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
				
		$data    = array('title'	=> $user->nama,
						 'user'  => $user);
		$data['page'] =('admin/user/edit');
		$this->load->view('admin/template', $data);
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

			if($user->foto != "") {
			unlink('./assets/upload/image/'.$user->foto);
			unlink('./assets/upload/image/thumbs/'.$user->foto);
		}

			$i = $this->input;
			$data = array( 'id_user'		 => $id_user,
						   'nip'             => htmlspecialchars($i->post('nip', TRUE)) ,
						   'nama'            => htmlspecialchars($i->post('nama', TRUE)) ,
						   'password'        => md5($i->post('password')),
						   'foto'			 => $upload_data['uploads']['file_name'],
						   'hak_akses'       => $i->post('hak_akses'),
						   'tanggal'         => $i->post('tanggal')
						 );
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'id_user'		 => $id_user, 
							   'nip'             => htmlspecialchars($i->post('nip', TRUE)) ,
							   'nama'            => htmlspecialchars($i->post('nama', TRUE)) ,
							   'password'        => md5($i->post('password')),
							   'hak_akses'       => $i->post('hak_akses'),
							   'tanggal'         => $i->post('tanggal')
						 );
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
			}}
		$data    = array('title'	=> $user->nama,
						 'user'  => $user);
		$data['page'] =('admin/user/edit');
		$this->load->view('admin/template', $data);
	}


	// Hapus Data
	public function delete($id_user){
		// Proteksi Hapus

		$user = $this->User_model->detail($id_user);
		if($user->foto != "") {
			unlink('./assets/upload/image/'.$user->foto);
			unlink('./assets/upload/image/thumbs/'.$user->foto);
		}

		$data = array('id_user'   => $id_user);
		$this->User_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
			}	
			// End Delete

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */