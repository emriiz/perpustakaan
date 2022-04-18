<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengembalian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengembalian_model');
		$this->load->model('Peminjaman_model');
		$this->load->model('Buku_model');
		$this->load->model('Anggota_model');
	}

	public function index()
	{
		$pengembalian  = $this->Pengembalian_model->listing();
		$anggota  	   = $this->Anggota_model->listing();
		$buku   	   = $this->Buku_model->listing();
		
		$data = array( 'title'   	  => 'Pengembalian',
					   'pengembalian' => $pengembalian,
						'anggota'     => $anggota,
						'buku'		  => $buku);
		$data['halaman'] = ('operator/pengembalian/list');
		$this->load->view('operator/_template', $data);
	}



	public function tambah(){
		$anggota  = $this->Anggota_model->listing();
		$data = array( 'title'   	 => 'Pengembalian',
					   'anggota'	 => $anggota);
		$data['halaman'] = ('operator/pengembalian/list_anggota');
		$this->load->view('operator/_template', $data);
	}


	public function anggota($id_anggota){
		$anggota  = $this->Anggota_model->detail($id_anggota);
		$peminjaman 	= $this->Peminjaman_model->anggota($id_anggota);
		$pengembalian  = $this->Pengembalian_model->listing();
		$buku   	   = $this->Buku_model->listing();
		$data = array( 'title'   		=> $anggota->nama_anggota,
					   'anggota'		=> $anggota,
						'pengembalian'	=> $pengembalian,
						'buku'			=> $buku,
						'peminjaman'	=> $peminjaman);
		$data['halaman'] =('operator/pengembalian/list_pengembalian');
		$this->load->view('operator/_template', $data);
	}

	public function add($id_peminjaman) {
		$peminjaman	 	 = $this->Peminjaman_model->detail($id_peminjaman);
		$id_anggota		 = $peminjaman->id_peminjaman;
		$id_buku		 = $peminjaman->id_buku;
		$id_anggota		 = $peminjaman->id_anggota;
		$pengembalian 	 = $this->Pengembalian_model->peminjaman($id_peminjaman);
		$anggota  		 = $this->Anggota_model->listing();
		$buku   		 = $this->Buku_model->listing();
		$no_pengembalian = $this->Pengembalian_model->no_pengembalian();
		// Validasi
		$valid  = $this->form_validation;
		$valid->set_rules('denda','Denda Perhari','required',
							array('required'  => 'Denda Harus Di isi'));

		if($valid->run()==FALSE){
		// Jika Data salah maka akan kembali
		$data = array( 'title'   		=> 'Pengembalian Buku',
					   'buku'			=> $buku,
					   'peminjaman'		=> $peminjaman,
					   'anggota'		=> $anggota,
					   'no_pengembalian'=> $no_pengembalian);
		$data['halaman'] =('operator/pengembalian/tambah');
		$this->load->view('operator/_template', $data);
		}else{
			// Jika data benar maka akan menyimpan ke database
			$booking = new datetime($peminjaman->tanggal_kembali);
			$today   = new datetime(set_value('tgl_dikembalikan'));
			$diff    = date_diff($booking, $today); 
			$kembali = $booking->getTimestamp();
            $sekarang = $today->getTimestamp();
            // Jika lebih dari tanggal kembali seharusnya
       		if($kembali<=$sekarang){
       			$telat = $diff->d;
       			$keterangan = 'TERLAMBAT '.$telat.' HARI';
       			$denda = 100;
                $total = floatval($denda)*floatval($telat);
       		}else{   
	   			 $keterangan = 'TEPAT WAKTU';
                 $denda = "0";
                 $total = "0";
       		}
			$i = $this->input;
			$data1 = array( 'id_user'     		=> $this->session->userdata('id_user'),
							'id_buku'	 		=> $id_buku,
							'id_peminjaman'		=> $id_peminjaman,
							'id_anggota' 		=> $id_anggota,
							'no_pengembalian' 	=> $no_pengembalian,
							'tgl_dikembalikan'	=> date('Y-m-d'),
							'denda' 			=> $total,
							'keterangan' 		=> $keterangan
						);
			$data2 = array(  'id_peminjaman'	 => $id_peminjaman, 
							 'id_user'           => $this->session->userdata('id_user'),
							 'status_kembali'    => 'Dikembalikan'
						   );
			$this->Pengembalian_model->tambah($data1);
			$this->Peminjaman_model->edit($data2);
			$this->session->set_flashdata('sukses', 'Data Pengembalian Telah di Tambah');
			redirect(base_url('operator/pengembalian'),'refresh');
		}
	}

		public function laporan()
		{
			$data    = array('title'	=>'Laporan Data Pengembalian');
			$data['halaman'] =('operator/laporan/pengembalian/form_cetak');
			$this->load->view('operator/_template', $data);
		}

		public function cetak(){
			$this->load->library('dompdf_gen');
			$tanggal_awal  = $this->input->post('tanggal_awal');
			$tanggal_akhir  = $this->input->post('tanggal_akhir');
			$filter  = $this->Pengembalian_model->tanggal($tanggal_awal, $tanggal_akhir);
			
			$data    = array('title'	=>'Laporan Data Pengembalian',
							 'subtitle'	=> 'Periode : ' .date('d F Y', strtotime($tanggal_awal)). ' - ' .date('d F Y', strtotime($tanggal_akhir)),
							'filter'    => $filter);
			$this->load->view('operator/laporan/pengembalian/cetak_laporan', $data);
			$paper_size = 'A4';
			$orientation = "landscape";
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan Data Pengembalian Buku.pdf", array('Attachment'=> FALSE));
	
		}
	

}

/* End of file Pengembalian.php */
/* Location: ./application/controllers/operator/Pengembalian.php */