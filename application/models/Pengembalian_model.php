<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select(' tbl_pengembalian.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota,
							tbl_peminjaman.no_peminjaman');
		$this->db->from('tbl_pengembalian');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_pengembalian.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_pengembalian.id_buku');
		$this->db->join('tbl_peminjaman','tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman');
		$this->db->order_by('id_pengembalian','DESC');
		$query = $this->db->get();
		return $query->result();
	}


	// Peminjaman 
	public function peminjaman($id_peminjaman) {
		$this->db->select('tbl_pengembalian.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota,
							tbl_peminjaman.no_peminjaman');
		$this->db->from('tbl_pengembalian');
		// join
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_pengembalian.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_pengembalian.id_buku');
		$this->db->join('tbl_peminjaman','tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman');
		$this->db->where('tbl_pengembalian.id_peminjaman', $id_peminjaman);
		$this->db->where('tbl_peminjaman.status_kembali <>','Dikembalikan');
		$this->db->order_by('id_pengembalian','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail
	public function detail($id_pengembalian) {
		$this->db->select('*');
		$this->db->from('tbl_pengembalian');
		$this->db->where('id_pengembalian', $id_pengembalian);
		$this->db->order_by('id_pengembalian','ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_pengembalian', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_pengembalian',$data['id_pengembalian']);
		$this->db->update('tbl_pengembalian',$data);
	}

	// Hapus Data
	public function delete($data2) {
		$this->db->where('id_pengembalian' ,$data2['id_pengembalian']);
		$this->db->delete('tbl_pengembalian',$data2);
	}

	public function totalData()
	{   
	    $query = $this->db->get('tbl_pengembalian');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}

	public function no_pengembalian(){
		$this->db->select('RIGHT(tbl_pengembalian.no_pengembalian,4) as kode', FALSE);
		$this->db->order_by('no_pengembalian', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_pengembalian');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$kodemax = str_pad($kode,4,"0",STR_PAD_LEFT);
		$kodejadi = "PMB2020.". $kodemax;
		return $kodejadi;
	}

	public function tanggal($tanggal_awal, $tanggal_akhir){
		$this->db->select('tbl_pengembalian.*,
							tbl_buku.judul_buku,
							tbl_buku.kode_buku,
							tbl_buku.stok_buku,
							tbl_anggota.nama_anggota,
							tbl_anggota.no_anggota,
							tbl_peminjaman.no_peminjaman');
		$this->db->from('tbl_pengembalian');
		// JOIN
		$this->db->join('tbl_anggota','tbl_anggota.id_anggota = tbl_pengembalian.id_anggota');
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_pengembalian.id_buku');
		$this->db->join('tbl_peminjaman','tbl_peminjaman.id_peminjaman = tbl_pengembalian.id_peminjaman');
		$this->db->where('tgl_dikembalikan >=',  $tanggal_awal);
		$this->db->where('tgl_dikembalikan <=',  $tanggal_akhir);
		$this->db->order_by('tanggal_pinjam','DESC');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Pengembalian_model.php */
/* Location: ./application/models/Pengembalian_model.php */