<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->order_by('id_kategori','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_kategori) {
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_kategori', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('tbl_kategori',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_kategori' ,$data['id_kategori']);
		$this->db->delete('tbl_kategori',$data);
	}

}

/* End of file kategori_model.php */
/* Location: ./application/models/kategori_model.php */