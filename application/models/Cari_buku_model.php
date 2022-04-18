<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari_buku_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_user.nama');
		$this->db->from('tbl_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_buku.id_user', 'LEFT');
		// END JOIN
		$this->db->order_by('id_buku','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_buku) {
		$this->db->select('*');
		$this->db->from('tbl_buku');
		$this->db->where('id_buku', $id_buku);
		$this->db->order_by('id_buku','ASC');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file Cari_buku_model.php */
/* Location: ./application/models/Cari_buku_model.php */