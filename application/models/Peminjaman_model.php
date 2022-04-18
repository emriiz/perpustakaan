<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status = 1');
		$this->db->where('status_kembali!=','dikembalikan');
		$this->db->order_by('id_peminjaman','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function list() {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status = 1');
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	
	public function backup() {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status = 0');
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Peminjaman Anggota
	public function anggota($id_anggota) {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		// End Join
		$this->db->where('tbl_peminjaman.id_anggota', $id_anggota);
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function limit_peminjaman_anggota($id_anggota) {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('tbl_peminjaman.id_anggota', $id_anggota);
		$this->db->where('tbl_peminjaman.status_kembali <> ','Dikembalikan');
		$this->db->where('tbl_peminjaman.status_kembali <> ','Hilang');
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_peminjaman) {
		$this->db->select('*');
		$this->db->from('tbl_peminjaman');
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	public function kembali() {
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status = 1');
		$this->db->where('status_kembali =','dipinjam');
		$this->db->order_by('id_peminjaman','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_peminjaman', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_peminjaman',$data['id_peminjaman']);
		$this->db->update('tbl_peminjaman',$data);
	}

	public function aktif($data) {
		$this->db->where('id_peminjaman',$data['id_peminjaman']);
		$this->db->update('tbl_peminjaman',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_peminjaman' ,$data['id_peminjaman']);
		$this->db->delete('tbl_peminjaman',$data);
	}

	public function totalData()
	{   
	    $query = $this->db->get('tbl_peminjaman');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function no_peminjaman(){
		$this->db->select('RIGHT(tbl_peminjaman.no_peminjaman,4) as kode', FALSE);
		$this->db->order_by('no_peminjaman', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_peminjaman');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
		$kodejadi = "PNJ2020.". $kodemax;
		return $kodejadi;
	}

	public function valid_peminjam($id_buku, $id_anggota)
	{
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('tbl_peminjaman.id_buku' , $id_buku);
		$this->db->where('tbl_peminjaman.id_anggota' ,$id_anggota);
		$this->db->where('status_kembali =' ,'Dipinjam');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal($tanggal_awal, $tanggal_akhir, $status){
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// JOIN
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status_kembali ',$status);
		$this->db->where('tanggal_pinjam >=',  $tanggal_awal);
		$this->db->where('tanggal_pinjam <=',  $tanggal_akhir);
		$this->db->where('status = 1');
		$this->db->order_by('tanggal_pinjam','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function cetak_semua($tanggal_awal, $tanggal_akhir){
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// JOIN
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('status_kembali !=','Dikembalikan');
		$this->db->where('tanggal_pinjam >=',  $tanggal_awal);
		$this->db->where('tanggal_pinjam <=',  $tanggal_akhir);
		$this->db->where('status = 1');
		$this->db->order_by('tanggal_pinjam','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function jmlh_buku($id) 
	{
		$this->db->select('tbl_peminjaman.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota');
		$this->db->from('tbl_peminjaman');
		// JOIN
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_peminjaman.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_peminjaman.id_buku');
		$this->db->where('stok_buku <=', 0);
		$this->db->where('id_buku', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

}

/* End of file peminjaman_model.php */
/* Location: ./application/models/peminjaman_model.php */