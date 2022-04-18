<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Pengunjung_model');
		$this->load->model('Anggota_model');
		$this->load->model('Buku_model');
		$this->load->model('Peminjaman_model');
	}

	// HomePage
	public function index()
	{
		$data['total_pengunjung'] = $this->Pengunjung_model->totalData();
		$data['total_anggota'] = $this->Anggota_model->totalData();
		$data['total_buku'] = $this->Buku_model->totalData();
		$data['total_peminjaman'] = $this->Peminjaman_model->totalData();
		$data['halaman'] = 'operator/home_view';
		$this->load->view('operator/_template', $data);
	}

	// Profile
	public function profile() 
	{
		$id_user 	= $this->session->userdata('id_user');
		$user 		= $this->User_model->detail($id_user);

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
				
				$data = array('title' => $user->nama,
							  'user'  => $user);
				$data['halaman'] = 'operator/profile/profile';
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

			if($user->foto != "") {
			unlink('./assets/upload/image/'.$user->foto);
			unlink('./assets/upload/image/thumbs/'.$user->foto);
				}

			$i = $this->input;
			$data = array( 	'id_user'		 => $id_user,
							'nip'            => htmlspecialchars($i->post('nip', TRUE)) ,
						    'nama'           => htmlspecialchars($i->post('nama', TRUE)) ,
						    'foto'			 => $upload_data['uploads']['file_name'],
						 );
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profil telah di update');
			redirect(base_url('operator/home/profile'),'refresh');
			}}else{
				$i = $this->input;
				$data = array(  'id_user'		  => $id_user,
								'nip'             => htmlspecialchars($i->post('nip', TRUE)) ,
							    'nama'            => htmlspecialchars($i->post('nama', TRUE)) ,
						 );
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profil telah di update');
			redirect(base_url('operator/home/profile'),'refresh');
			}}
		$data = array('title' => $user->nama,
					  'user'  => $user);
		$data['halaman'] = 'operator/profile/profile';
		$this->load->view('operator/_template', $data);
	
	}

	public function password(){
		$id_user 	= $this->session->userdata('id_user');
		$user 		= $this->User_model->detail($id_user);

		$valid = $this ->form_validation;

		$valid->set_rules('pass_lama','Password Lama','trim|required|min_length[3]');
		$valid->set_rules('new_password','Password Baru','trim|required|min_length[3]|matches[conf_pass]');
		$valid->set_rules('conf_pass','Konfirmasi Password','trim|required|min_length[3]|matches[new_password]');

		if($valid->run() == FALSE) {
			$data = array('title' => $user->nama,
						  'user'  => $user);
			$data['halaman'] = 'operator/profile/profile';
			$this->load->view('operator/_template', $data);

		} else {

			// Update Password
			$i = $this->input;
			$data = array('id_user'    => $id_user,
							'password' => md5($i->post('new_password')));
			// print_r($data);exit;
			// Cek Password Lama
			$result = $this->User_model->cek_password($this->session->userdata('id_user'), md5($i->post('pass_lama')));
			// var_dump($result);exit;
			if($result > 0 AND $result === TRUE){
				$result = $this->User_model->update_pass($this->session->userdata('id_user'), $data);
				if($result > 0 ){
					$this->session->set_flashdata('sukses', 'Password Berhasil diubah');
					redirect(base_url('operator/home/profile'),'refresh');
				}else {
					$this->session->set_flashdata('error', '<b>Error : </b> Password tidak dapat di ubah');
					redirect(base_url('operator/home/profile'),'refresh');
				}
			} else {
				$this->session->set_flashdata('error', '<b>Error : </b> Password lama tidak cocok');
				redirect(base_url('operator/home/profile'),'refresh');
			}
		}
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/operator/Home.php */