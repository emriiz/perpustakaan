<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->order_by('id_siswa','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_siswa) {
		$this->db->select('*');
		$this->db->from('tbl_siswa');
		$this->db->where('id_siswa', $id_siswa);
		$this->db->order_by('id_siswa','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_siswa', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_siswa',$data['id_siswa']);
		$this->db->update('tbl_siswa',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_siswa' ,$data['id_siswa']);
		$this->db->delete('tbl_siswa',$data);
	}

	public function totalData()
	{   
	    $query = $this->db->get('tbl_siswa');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function nis(){
		$this->db->select('RIGHT(tbl_siswa.nis,4) as kode', FALSE);
		$this->db->order_by('nis', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_siswa');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
		$kodejadi = date('Y').".". $kodemax;
		return $kodejadi;
	}

}

/* End of file siswa_model.php */
/* Location: ./application/models/siswa_model.php */