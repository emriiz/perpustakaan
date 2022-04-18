<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_anggota');
		$this->db->where('status_aktif = 1');
		$this->db->order_by('id_anggota','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function join(){
		$this->db->select('tbl_anggota.*',
							'tbl_siswa.nis');
		$this->db->from('tbl_anggota');
		$this->db->join('tbl_siswa','tbl_siswa.id_siswa = tbl_anggota.id_siswa');
		$this->db->where('status_aktif = 1');
		$this->db->order_by('id_anggota','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function backup() {
		$this->db->select('*');
		$this->db->from('tbl_anggota');
		$this->db->where('status_aktif = 0');
		$this->db->order_by('id_anggota','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_anggota) {
		$this->db->select('*');
		$this->db->from('tbl_anggota');
		$this->db->where('id_anggota', $id_anggota);
		$this->db->order_by('id_anggota','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	public function login($no_anggota, $password) {
		$this->db->select('*');
		$this->db->from('tbl_anggota');
		$this->db->where(array( 'no_anggota'  => $no_anggota,
								'password' => md5($password)));
		$this->db->order_by('id_anggota','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_anggota', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_anggota',$data['id_anggota']);
		$this->db->update('tbl_anggota',$data);
	}

	public function aktif($data) {
		$this->db->where('id_anggota',$data['id_anggota']);
		$this->db->update('tbl_anggota',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_anggota' ,$data['id_anggota']);
		$this->db->delete('tbl_anggota',$data);
	}

	public function totalData()
	{   
	    $query = $this->db->get('tbl_anggota');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function no_anggota(){
		$this->db->select('RIGHT(tbl_anggota.no_anggota,4) as kode', FALSE);
		$this->db->order_by('no_anggota', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_anggota');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
		$kodejadi = "2020.". $kodemax;
		return $kodejadi;
	}

	public function cek_password($id_anggota, $pass_lama){
		$this->db->where('id_anggota', $id_anggota);
		$this->db->where('password', $pass_lama);
		$query = $this->db->get('tbl_anggota');
		if($query->num_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

	public function update_pass($id_anggota, $data) {
		$this->db->set($data);
		$this->db->where('id_anggota',$id_anggota);
		$this->db->update('tbl_anggota');
		if($this->db->affected_rows() > 0){
			return true;
		} else {
			return false;
		}
	}

public function siswa($id_siswa) {
		$this->db->select('tbl_anggota.*,
							tbl_siswa.nis');
		$this->db->from('tbl_anggota');

		$this->db->join('tbl_siswa','tbl_siswa.id_siswa = tbl_anggota.id_siswa','LEFT');
		$this->db->where('tbl_anggota.id_siswa', $id_siswa);
		$this->db->order_by('id_anggota','DSC');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file anggota_model.php */
/* Location: ./application/models/anggota_model.php */