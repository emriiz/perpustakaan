<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File_buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('file_buku.*,
						   tbl_buku.judul_buku,
						   	tbl_user.nama');
		$this->db->from('file_buku');

		$this->db->join('tbl_buku','tbl_buku.id_buku = file_buku.id_buku','LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = file_buku.id_user','LEFT');

		$this->db->order_by('id_file','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing perbuku
	public function buku($id_buku) {
		$this->db->select('file_buku.*,
						   tbl_buku.judul_buku,
						   	tbl_user.nama');
		$this->db->from('file_buku');

		$this->db->join('tbl_buku','tbl_buku.id_buku = file_buku.id_buku','LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = file_buku.id_user','LEFT');

		$this->db->where('file_buku.id_buku', $id_buku);

		$this->db->order_by('id_file','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_file) {
		$this->db->select('*');
		$this->db->from('file_buku');
		$this->db->where('id_file', $id_file);
		$this->db->order_by('id_file','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('file_buku', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_file',$data['id_file']);
		$this->db->update('file_buku',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_file' ,$data['id_file']);
		$this->db->delete('file_buku',$data);
	}

}

/* End of file file_model.php */
/* Location: ./application/models/file_model.php */