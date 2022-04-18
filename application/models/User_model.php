<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('id_user','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_user) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($username, $password) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username'  => $username,
								'password' => md5($password)));
		$this->db->order_by('id_user','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_user', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('tbl_user',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_user' ,$data['id_user']);
		$this->db->delete('tbl_user',$data);
	}

	public function cek_password($id_user, $pass_lama){
		$this->db->where('id_user', $id_user);
		$this->db->where('password', $pass_lama);
		$query = $this->db->get('tbl_user');
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

	public function update_pass($id_user, $data) {
		$this->db->set($data);
		$this->db->where('id_user',$id_user);
		$this->db->update('tbl_user');
		if($this->db->affected_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */