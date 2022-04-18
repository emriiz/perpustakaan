<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahasa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_bahasa');
		$this->db->order_by('id_bahasa','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_bahasa) {
		$this->db->select('*');
		$this->db->from('tbl_bahasa');
		$this->db->where('id_bahasa', $id_bahasa);
		$this->db->order_by('id_bahasa','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_bahasa', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_bahasa',$data['id_bahasa']);
		$this->db->update('tbl_bahasa',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_bahasa' ,$data['id_bahasa']);
		$this->db->delete('tbl_bahasa',$data);
	}

}

/* End of file bahasa_model.php */
/* Location: ./application/models/bahasa_model.php */