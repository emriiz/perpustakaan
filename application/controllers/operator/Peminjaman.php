<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

	// construct load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Peminjaman_model');
		$this->load->model('Buku_model');
		$this->load->model('Anggota_model');
	}

	public function index()
	{
		$peminjaman  = $this->Peminjaman_model->listing();
		$data['no_peminjaman'] = $this->Peminjaman_model->no_peminjaman();
		$data = array( 'title'   	 => 'Peminjaman Buku',
					   'peminjaman'	 => $peminjaman);
		$data['halaman'] = ('operator/peminjaman/list');
		$this->load->view('operator/_template', $data);
	}

	public function backup()
	{
		$peminjaman  = $this->Peminjaman_model->backup();
		$data['no_peminjaman'] = $this->Peminjaman_model->no_peminjaman();
		$data = array( 'title'   	 => 'Peminjaman Buku',
					   'peminjaman'	 => $peminjaman);
		$data['halaman'] = ('operator/backup/peminjaman/list');
		$this->load->view('operator/_template', $data);
	}

	// Tambah
	public function tambah(){
		$anggota  = $this->Anggota_model->listing();
		$data = array( 'title'   	 => 'Peminjaman Buku',
					   'anggota'	 => $anggota);
		$data['halaman'] = ('operator/peminjaman/list_anggota');
		$this->load->view('operator/_template', $data);
	}

	// Add peminjaman
	public function add($id_anggota)
	{
		$anggota  		= $this->Anggota_model->detail($id_anggota);
		$peminjaman 	= $this->Peminjaman_model->anggota($id_anggota);
		$limit			= $this->Peminjaman_model->limit_peminjaman_anggota($id_anggota);
		$buku   		= $this->Buku_model->listing();
		$no_peminjaman 	= $this->Peminjaman_model->no_peminjaman();
		$peminjam   	= $this->Peminjaman_model->valid_peminjam($this->input->post('id_buku'), $id_anggota);

		// Validasi
		$valid  = $this->form_validation;

		$valid->set_rules(
			'id_buku',
			'Pilih Judul Buku',
			'required',
			array('required'  => 'Pilih Judul buku')
		);

		if ($valid->run() == FALSE) {

			$data = array(
				'title'   	 	=> 'Peminjaman Buku Atas Nama ' . $anggota->nama_anggota,
				'anggota'	 	=> $anggota,
				'buku'		 	=> $buku,
				'peminjaman' 	=> $peminjaman,
				'limit'			=> $limit,
				'no_peminjaman' => $no_peminjaman,
				'peminjam'		=> $peminjam
			);
			$data['halaman'] = ('operator/peminjaman/tambah');
			$this->load->view('operator/_template', $data);
		} else {
			$i = $this->input;
			$check_valid = null;
			// $peminjam = $this->Peminjaman_model->valid_peminjam($i->post('id_buku'), $id_anggota);
			foreach ($peminjam as $validasi) :
				$check_valid = $validasi['status_kembali'];
			endforeach;
			if ($check_valid == 'Dipinjam') {
				$this->session->set_flashdata('required', 'Maaf tidak bisa melakukan transaksi peminjaman, karena buku dengan judul ini sedang dipinjam anggota lain');
				redirect(base_url('operator/peminjaman/add/' . $id_anggota), 'refresh');
			} else if ($check_valid == null) {
				$data = array(
					'id_user'     		=> $this->session->userdata('id_user'),
					'id_buku'	 		=> $i->post('id_buku'),
					'id_anggota' 		=> $id_anggota,
					'no_peminjaman' 	=> $no_peminjaman,
					'tanggal_pinjam' 	=> date('Y-m-d'),
					'tanggal_kembali' 	=> date('Y-m-d', strtotime('+7 days')),
					'status_kembali' 	=> $i->post('status_kembali'),
					'keterangan' 		=> $i->post('keterangan'),
					'status'			=> 1
				);
				$this->Peminjaman_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data Peminjaman Telah di Tambah');
				redirect(base_url('operator/peminjaman/add/' . $id_anggota), 'refresh');
			}
		}
	}

	// Edit
	public function edit($id_peminjaman){
		$peminjaman    = $this->Peminjaman_model->detail($id_peminjaman);
		$id_anggota    = $peminjaman->id_anggota;
		$anggota       = $this->Anggota_model->detail($id_anggota);
		$no_peminjaman = $this->Peminjaman_model->no_peminjaman();
		$buku          = $this->Buku_model->listing();

		// Validasi
		$valid  = $this->form_validation;

		$valid->set_rules('id_buku','Pilih Judul Buku','required',
						array('required'  => 'Pilih Judul buku'));

		if($valid->run()==FALSE){

		$data = array( 'title'   	 	=> 'Edit Peminjaman Buku Atas Nama '. $anggota->nama_anggota,
					   'anggota'	 	=> $anggota,
					   'buku'		 	=> $buku,
					   'peminjaman' 	=> $peminjaman,
					   'no_peminjaman'  => $no_peminjaman);
		$data['halaman'] =('operator/peminjaman/edit');
		$this->load->view('operator/_template', $data);
		}else{
			$i = $this->input;
			$data = array(  'id_peminjaman'		=> $id_peminjaman, 
							'id_user'     		=> $this->session->userdata('id_user'),
							'id_buku'			=> $i->post('id_buku'),
							'id_anggota' 		=> $id_anggota,
							'tanggal_pinjam' 	=> date('Y-m-d'),
							'tanggal_kembali' 	=> $i->post('tanggal_kembali'),
							'status_kembali' 	=> $i->post('status_kembali'),
							'keterangan' 		=> $i->post('keterangan'),
							'status'			=> 1
						);
			$this->Peminjaman_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Peminjaman Telah di Update');
			redirect(base_url('operator/peminjaman'),'refresh');
		}
	}


	public function delete($id_peminjaman){
		// Proteksi Hapus
		$data = array('id_peminjaman'   => $id_peminjaman,
						'status'		=> 0);
		
		$this->Peminjaman_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/peminjaman'),'refresh');
	}

	public function restore($id_peminjaman){
		// Proteksi Hapus
		$data = array('id_peminjaman'   => $id_peminjaman,
						'status'		=> 1);
		
		$this->Peminjaman_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah di kembalikan');
		redirect(base_url('operator/peminjaman/backup'),'refresh');
	}

	public function hapus($id_peminjaman){
		$data = array('id_peminjaman'   => $id_peminjaman);
		
		$this->Peminjaman_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus Secara Permanen');
		redirect(base_url('operator/peminjaman/backup'),'refresh');
	}

	public function laporan()
	{
		$data    = array('title'	=>'Laporan Data Peminjaman');
		$data['halaman'] =('operator/laporan/peminjaman/form_cetak');
		$this->load->view('operator/_template', $data);
	}

	public function cetak(){
		$this->load->library('dompdf_gen');
		$status_kembali    = $this->input->post('status_kembali');
		$tanggal_awal  	   = $this->input->post('tanggal_awal');
		$tanggal_akhir     = $this->input->post('tanggal_akhir');
		if($status_kembali == 'Semua'){
		$semua  = $this->Peminjaman_model->cetak_semua($tanggal_awal, $tanggal_akhir);
		$data    = array('title'	=>'Laporan Data Peminjaman',
						 'subtitle'	=> 'Periode : ' .date('d F Y', strtotime($tanggal_awal)). ' - ' .date('d F Y', strtotime($tanggal_akhir)),
						'filter'    => $semua,
						'status_kembali' => $status_kembali);
		$this->load->view('operator/laporan/peminjaman/cetak_laporan', $data);

		$paper_size = 'A4';
		$orientation = "landscape";
		// Output HTML
		$html = $this->output->get_output();
		// Ukuran Kertas
		$this->dompdf->set_paper($paper_size, $orientation);
		// Convert PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Data Peminjaman Buku.pdf", array('Attachment'=> FALSE));
		} else {
		$filter  = $this->Peminjaman_model->tanggal($tanggal_awal, $tanggal_akhir, $status_kembali);
		$data    = array('title'	=>'Laporan Data Peminjaman',
						 'subtitle'	=> 'Periode : ' .date('d F Y', strtotime($tanggal_awal)). ' - ' .date('d F Y', strtotime($tanggal_akhir)),
						'filter'    => $filter,
						'status_kembali' => $status_kembali);
		$this->load->view('operator/laporan/peminjaman/cetak_laporan', $data);

		$paper_size = 'A4';
		$orientation = "landscape";
		// Output HTML
		$html = $this->output->get_output();
		// Ukuran Kertas
		$this->dompdf->set_paper($paper_size, $orientation);
		// Convert PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan Data Peminjaman Buku.pdf", array('Attachment'=> FALSE));
	}
	}

	public function jumlah_buku()
	{
		$id = $this->input->post('id_buku');
		$data = $this->Peminjaman_model->jmlh_buku($id);
		echo json_encode($data);
	}
}

/* End of file Peminjaman.php */
/* Location: ./application/controllers/operator/Peminjaman.php */