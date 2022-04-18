<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

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
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,
				tbl_user.nama,
				tbl_user.username');
		$this->db->from('tbl_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_buku.id_user', 'LEFT');
		// END JOIN
		$this->db->where('status_a = 1');
		$this->db->order_by('id_buku','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function backup() {
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,
				tbl_user.nama,
				tbl_user.username');
		$this->db->from('tbl_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_buku.id_user', 'LEFT');
		// END JOIN
		$this->db->where('status_a = 0');
		$this->db->order_by('id_buku','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Buku
	public function buku() {
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,
				tbl_user.nama,
				tbl_user.username');
		$this->db->from('tbl_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_buku.id_user', 'LEFT');
		// END JOIN
		// $this->db->where('tbl_buku.status_buku','Tersedia');
		$this->db->order_by('id_buku','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	// Membaca Buku
	public function read($id_buku) {
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,
				tbl_user.nama,
				tbl_user.username');
		$this->db->from('tbl_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_buku.id_user', 'LEFT');
		// END JOIN
		$this->db->where('id_buku', $id_buku);
		$this->db->order_by('id_buku','DESC');
		$query = $this->db->get();
		return $query->row();
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


	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_buku', $data);
	}

	// Edit Data
	public function edit($data) {
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->update('tbl_buku',$data);
	}

	public function aktif($data) {
		$this->db->where('id_buku',$data['id_buku']);
		$this->db->update('tbl_buku',$data);
	}

	// Hapus Data
	public function delete($data) {
		$this->db->where('id_buku' ,$data['id_buku']);
		$this->db->delete('tbl_buku',$data);
	}

	// Total Data Buku
	public function totalData()
	{   
	    $query = $this->db->get('tbl_buku');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
	
	// Cetak Laporan data buku berdasarkan status
	public function tanggal($tanggal_awal, $tanggal_akhir, $status){
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,');
		$this->db->from('tbl_buku');
		// JOIN
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		// Where
		$this->db->where('status_buku', $status);
		$this->db->where('status_a = 1');
		$this->db->where('tanggal_entri >=', $tanggal_awal);
		$this->db->where('tanggal_entri <=', $tanggal_akhir);
		$this->db->order_by('tanggal_entri','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function cetak_semua($tanggal_awal, $tanggal_akhir){
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,');
		$this->db->from('tbl_buku');
		// JOIN
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');
		// Where
		$this->db->where('status_a = 1');
		$this->db->where('tanggal_entri >=', $tanggal_awal);
		$this->db->where('tanggal_entri <=', $tanggal_akhir);
		$this->db->order_by('tanggal_entri','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Pencarian Buku
	public function cari($berdasarkan, $yangdicari){
		$this->db->select('tbl_buku.*,
				tbl_kategori.nama_kategori,
				tbl_kategori.kode_kategori, 
				tbl_bahasa.kode_bahasa,
				tbl_bahasa.nama_bahasa,
				tbl_penerbit.nama_penerbit,
				tbl_penerbit.kode_penerbit,');
		$this->db->from('tbl_buku');
		// JOIN
		$this->db->join('tbl_kategori','tbl_kategori.id_kategori = tbl_buku.id_kategori', 'LEFT');
		$this->db->join('tbl_bahasa','tbl_bahasa.id_bahasa = tbl_buku.id_bahasa', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'LEFT');

		switch ($berdasarkan) {
			case "":
				# code...
			$this->db->like('judul_buku', $yangdicari);
			$this->db->or_like('pengarang', $yangdicari);
			$this->db->or_like('nama_penerbit', $yangdicari);
			$this->db->or_like('letak_buku', $yangdicari);
			$this->db->or_like('stok_buku', $yangdicari);
				break;

			case"stok_buku":
				$this->db->where($berdasarkan, $yangdicari);
				break;

			default:
				# code...
			$this->db->like($berdasarkan, $yangdicari);
				break;
		}
		
		$query = $this->db->get();
		return $query->result();
	}

	public function stok($data){
		$this->db->insert('tbl_stok_buku', $data);
	}

	public function stok_listing() {
		$this->db->select('tbl_stok_buku.*,
				tbl_buku.judul_buku,
				tbl_buku.pengarang,
				tbl_buku.cover_buku,
				tbl_penerbit.nama_penerbit');
		$this->db->from('tbl_stok_buku');
		// JOIN 4 Tabel (tbl_buku, tbl_kategori, tbl_user, tbl_bahasa)
		$this->db->join('tbl_buku','tbl_buku.id_buku = tbl_stok_buku.id_buku', 'LEFT');
		$this->db->join('tbl_penerbit','tbl_penerbit.id_penerbit = tbl_stok_buku.id_penerbit', 'LEFT');
		$this->db->join('tbl_user','tbl_user.id_user = tbl_stok_buku.id_user', 'LEFT');
		// END JOIN
		$this->db->order_by('id_stok','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	function create($table,$data){
    $query = $this->db->insert($table, $data);
    return $this->db->insert_id();// return last insert id
}

}

/* End of file buku_model.php */
/* Location: ./application/models/buku_model.php */