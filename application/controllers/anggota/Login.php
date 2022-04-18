<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('Anggota_model');
	}

public function index()
	{
		$valid = $this->form_validation;

		$valid->set_rules('no_anggota', 'no_anggota','required',
				array( 'required'  => 'No Anggota Harus diisi'));

		$valid->set_rules('password', 'Password','required|min_length[3]',
				array( 'required'  => 'Password Harus diisi', 
						'min_length' => 'Password Minmal 3 Karakter'));
		if($valid->run() === FALSE){
			// End Validasi
			$data =  array( 'title'   => 'Login Anggota');
		$this->load->view('anggota/login', $data, FALSE);
		// Check Anggotaname dan Password
			}else{
				$i 		= $this->input;
				$no_anggota = $i->post('no_anggota');
				$password = $i->post('password');
				// check di database
				$anggota 			= $this->db->get_where('tbl_anggota', ['no_anggota' => $no_anggota])-> row_array() ;
				$check_login	= $this->Anggota_model->login($no_anggota, $password);
				// Kalau ada record, maka create session dan redirect ke halaman dasbor
				if(count((array)$check_login)){
					$this->session->set_userdata('no_anggota', $no_anggota);
					$this->session->set_userdata('id_anggota', $check_login->id_anggota);
					$this->session->set_userdata('nama_anggota', $check_login->nama_anggota);
					redirect(base_url('anggota/home'),'refresh');
				}else{
					$this->session->set_flashdata('sukses', 'No Anggota dan Password Salah');
					redirect(base_url('anggota/login'),'refresh');
				}
			}
	}

	
	public function logout() {
		$this->session->unset_userdata('no_anggota');
		$this->session->unset_userdata('nama_anggota');
		$this->session->unset_userdata('id_anggota');
		redirect(base_url('anggota/login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */