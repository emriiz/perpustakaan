<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerbit_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_penerbit');
		$this->db->order_by('id_penerbit','DSC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_penerbit) {
		$this->db->select('*');
		$this->db->from('tbl_penerbit');
		$this->db->where('id_penerbit', $id_penerbit);
		$this->db->order_by('id_penerbit','DSC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_penerbit', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_penerbit',$data['id_penerbit']);
		$this->db->update('tbl_penerbit',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_penerbit' ,$data['id_penerbit']);
		$this->db->delete('tbl_penerbit',$data);
	}

}

/* End of file penerbit_model.php */
/* Location: ./application/models/penerbit_model.php */