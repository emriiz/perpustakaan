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
		$buku = $this->Buku_model->buku();
		$data  = array('title'   => 'Buku',
						'buku'   => $buku);
		$data['halaman'] = 'anggota/home';
		$this->load->view('anggota/template', $data);
	}

	public function peminjaman()
	{
	$id_anggota 	= $this->session->userdata('id_anggota');
	$anggota        = $this->Anggota_model->detail($id_anggota);
	$peminjaman 	= $this->Peminjaman_model->anggota($id_anggota);
	$data = array( 'title'   	 	=> 'Riwayat Peminjaman Buku '.$anggota->nama_anggota,
				   'anggota'		=> $anggota,
				   'peminjaman' 	=> $peminjaman);
		$data['halaman'] = ('anggota/riwayat/list');
	$this->load->view('anggota/template', $data);	
	}

	// Profil Anggota
	public function profile() 
	{
		$id_anggota 	= $this->session->userdata('id_anggota');
		$anggota 	    = $this->Anggota_model->detail($id_anggota);

		$data = array('title'   => 'Anggota');

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
						 'anggota'  => $anggota);
		$data['halaman'] =('anggota/profile/profile');
		$this->load->view('anggota/template', $data);
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
						   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
						   'tempat_lahir'      => $i->post('tempat_lahir') ,
						   'tanggal_lahir'     => $i->post('tanggal_lahir'),
						   'alamat'			   => $i->post('alamat'),
						   'telepon'		   => $i->post('telepon'),
						   'foto'			   => $upload_data['uploads']['file_name'],
						   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('anggota/home/profile'),'refresh');
			}	} else {
				$i = $this->input;
				$data = array( 'id_anggota'        => $id_anggota,
							   'nama_anggota'      => htmlspecialchars($i->post('nama_anggota', TRUE)) ,
							   'tempat_lahir'      => $i->post('tempat_lahir') ,
							   'tanggal_lahir'     => $i->post('tanggal_lahir'),
							   'alamat'			   => $i->post('alamat'),
							   'telepon'		   => $i->post('telepon'),
							   'tanggal'           => $i->post('tanggal')
						 );
			$this->Anggota_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah di Update');
			redirect(base_url('anggota/home/profile'),'refresh');
			}}
		$data    = array('title'	=> $anggota->nama_anggota,
						 'anggota'  => $anggota);
		$data['halaman'] =('anggota/profile/profile');
		$this->load->view('anggota/template', $data);
	}

	// Ubah Password
	public function password(){
		$id_anggota 	= $this->session->userdata('id_anggota');
		$anggota 	    = $this->Anggota_model->detail($id_anggota);

		$valid = $this ->form_validation;

		$valid->set_rules('pass_lama','Password Lama','trim|required|min_length[3]');
		$valid->set_rules('new_password','Password Baru','trim|required|min_length[3]|matches[conf_pass]');
		$valid->set_rules('conf_pass','Konfirmasi Password','trim|required|min_length[3]|matches[new_password]');

		if($valid->run() == FALSE) {
			$data = array('title' => $anggota->nama_anggota,
						  'anggota'  => $anggota);
			$data['halaman'] = 'anggota/home/profile';
			$this->load->view('anggota/template', $data);

		} else {

			// Update Password
			$i = $this->input;
			$data = array('id_anggota'    => $id_anggota,
							'password' => md5($i->post('new_password')));
			// print_r($data);exit;
			// Cek Password Lama
			$result = $this->Anggota_model->cek_password($this->session->userdata('id_anggota'), md5($i->post('pass_lama')));
			// var_dump($result);exit;
			if($result > 0 AND $result === TRUE){
				$result = $this->Anggota_model->update_pass($this->session->userdata('id_anggota'), $data);
				if($result > 0 ){
					$this->session->set_flashdata('sukses', 'Password Berhasil diubah');
					redirect(base_url('anggota/home/profile'),'refresh');
				}else {
					$this->session->set_flashdata('error', '<b>Error : </b> Password tidak dapat di ubah');
					redirect(base_url('anggota/home/profile'),'refresh');
				}
			} else {
				$this->session->set_flashdata('error', '<b>Error : </b> Password lama tidak cocok');
				redirect(base_url('anggota/home/profile'),'refresh');
			}
		}
	}


}

/* End of file Home.php */
/* Location: ./application/controllers/anggota/Home.php */