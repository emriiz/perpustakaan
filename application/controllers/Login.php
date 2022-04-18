<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('User_model');
	}


	// Halaman Login
	public function index()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('username', 'Username','required',
				array( 'required'  => 'Username Harus diisi'));

		$valid->set_rules('password', 'Password','required|min_length[3]',
				array( 'required'  => 'Password Harus diisi', 
						'min_length' => 'Password Minimal 3 Karakter'));
		if($valid->run() === FALSE){
			// End Validasi
			$data =  array( 'title'   => 'Login Administrator');
			$this->load->view('login_view', $data, FALSE);
		// Check Username dan Password
			}else{
				$i 		= $this->input;
				$username = $i->post('username');
				$password = $i->post('password');
				// check di database
				$user 			= $this->db->get_where('tbl_user', ['username' => $username])-> row_array() ;
				$check_login	= $this->User_model->login($username, $password);
				// Kalau ada record, maka create session dan redirect ke halaman dasbor
				if(count((array)$check_login)){
					$this->session->set_userdata('username', $username);
					$this->session->set_userdata('hak_akses', $check_login->hak_akses);
					$this->session->set_userdata('id_user', $check_login->id_user);
					$this->session->set_userdata('nama', $check_login->nama);
					if($user['hak_akses'] == 1 ){
						redirect(base_url('admin/dashboard'),'refresh');
					}else{
						redirect(base_url('operator/home'),'refresh');
					}
					
				}else{
					$this->session->set_flashdata('gagal', 'Username dan Password Salah');
					redirect(base_url('login'),'refresh');
				}
			}
	}

	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('hak_akses');
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */