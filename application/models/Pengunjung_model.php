<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Tampil data
	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_pengunjung');
		$this->db->order_by('id_pengunjung','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Tambah Data
	public function tambah($data){
		$this->db->insert('tbl_pengunjung', $data);
	}

	// Total jumlah pengunjung
	public function totalData()
	{   
	    $query = $this->db->get('tbl_pengunjung');
	    if($query->num_rows()>0)
	    {
	      return $query->num_rows();
	    }
	    else
	    {
	      return 0;
	    }
	}
}

/* End of file pengunjung_model.php */
/* Location: ./application/models/pengunjung_model.php */