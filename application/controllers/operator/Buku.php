<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Buku_model');
		$this->load->model('Kategori_model');
		$this->load->model('Bahasa_model');
		$this->load->model('Penerbit_model');
		$this->load->model('File_buku_model');
	}

	public function index()
	{
		$buku = $this->Buku_model->listing();
		$data = array( 'title'   => 'Buku',
					   'buku'	 => $buku);
		$data['halaman'] =('operator/buku/list');
		$this->load->view('operator/_template', $data);
	}


	public function tambah(){
		$kategori = $this->Kategori_model->listing();
		$bahasa   = $this->Bahasa_model->listing();
		$penerbit   = $this->Penerbit_model->listing();
		$buku 	  = $this->Buku_model->listing();

		$data = array( 'title'   => 'Buku');

		$valid = $this ->form_validation;

		$valid->set_rules('judul_buku','Judul','required', array('required'  => 'Judul Harus diisi harus di isi' ));

		$valid->set_rules('kode_buku','Kode','required|is_unique[tbl_buku.kode_buku]', 
							array('required'  => 'Kode Buku Harus diisi',
								  'is_unique'=>  ' Kode Buku <strong>'.$this->input->post('kode_buku').'</strong> sudah ada' ));

		$valid->set_rules('isbn','ISBN','required|is_unique[tbl_buku.isbn]', 
							array('required'  => 'ISBN Harus diisi',
								  'is_unique'=>  ' ISBN <strong>'.$this->input->post('isbn').'</strong> sudah ada' ));

		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['cover_buku']['name'])) {
				$config['upload_path'] = './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '12000';//KB
			
				$this->upload->initialize($config);
			
				if ( ! $this->upload->do_upload('cover_buku')){
				
					$data    = array( 'title'	=> 'Tambah Buku',
									  'kategori'=> $kategori,
									  'bahasa'	=> $bahasa,
									  'buku'  	=> $buku,
									  'penerbit'=> $penerbit);
					$data['halaman'] =('operator/buku/tambah');
					$this->load->view('operator/_template', $data);
					// jika tidak ada Error, maka masuk ke database
					}else{
						//UPLOAD DATA
						$upload_data	=  array('uploads' => $this->upload->data());

						$config['image_library']	= 'gd2';
						$config['source_image']		= './assets/upload/image/' .$upload_data['uploads']['file_name'];
						$config['new_image']		= './assets/upload/image/thumbs/';
						$config['create_thumb']		= TRUE;
						$config['quality']			= "100%";
						$config['maintain_ratio']	= TRUE;
						$config['width']			= 360;
						$config['height']			= 360;
						$config['x_axis']			= 0;
						$config['y_axis']			= 0;
						$config['thumb_marker']			= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();


						$i = $this->input;
						$data1 = array( 'id_user'		   => $this->session->userdata('id_user'),
									   'id_kategori'	   => $i->post('id_kategori') ,
							           'id_bahasa'		   => $i->post('id_bahasa') ,
							           'id_penerbit'	   => $i->post('id_penerbit') ,
									   'kode_buku'         => htmlspecialchars($i->post('kode_buku', TRUE)) ,
									   'judul_buku'        => htmlspecialchars($i->post('judul_buku', TRUE)) ,
									   'pengarang'         => $i->post('pengarang') ,
									   'tahun_terbit'      => $i->post('tahun_terbit') ,
									   'isbn'              => htmlspecialchars($i->post('isbn', TRUE)) ,
									   'harga'		       => $i->post('harga'),
									   'letak_buku'		   => $i->post('letak_buku'),
									   'cover_buku'		   => $upload_data['uploads']['file_name'],
									   'stok_buku'         => $i->post('stok_buku'),
									   'status_buku'       => $i->post('status_buku'),
									   'ringkasan'         => $i->post('ringkasan'),
									   'keterangan'        => $i->post('keterangan'),
									   'status_a'		   => 1,
										'tanggal_entri'    => date('Y-m-d H:i:s')
									 );
						$id_buku = $this->Buku_model->create('tbl_buku',$data1);
						$data2 = array('id_user'      => $this->session->userdata('id_user'),
										'id_buku' 	  => $id_buku,
										'id_penerbit' => $i->post('id_penerbit'),
										'stok_buku'   => $i->post('stok_buku')
									);
						$this->Buku_model->tambah($data1);
						$this->Buku_model->stok($data2);
						$this->session->set_flashdata('sukses','Data telah ditambah');
						redirect(base_url('operator/buku'),'refresh');
			}}else {
				$i = $this->input;
				$data1 = array( 'id_user'		   => $this->session->userdata('id_user'),
							   'id_kategori'	   => $i->post('id_kategori') ,
					           'id_bahasa'		   => $i->post('id_bahasa') ,
					           'id_penerbit'	   => $i->post('id_penerbit') ,
							   'kode_buku'         => htmlspecialchars($i->post('kode_buku', TRUE)) ,
							   'judul_buku'        => htmlspecialchars($i->post('judul_buku', TRUE)) ,
							   'pengarang'         => $i->post('pengarang') ,
							   'tahun_terbit'      => $i->post('tahun_terbit') ,
							   'isbn'              => htmlspecialchars($i->post('isbn', TRUE)) ,
							   'harga'		       => $i->post('harga'),
							   'letak_buku'		   => $i->post('letak_buku'),
							   'stok_buku'         => $i->post('stok_buku'),
							   'status_buku'       => $i->post('status_buku'),
							   'ringkasan'         => $i->post('ringkasan'),
							   'keterangan'        => $i->post('keterangan'),
							    'status_a'		   => 1,
							   'tanggal_entri'     => date('Y-m-d H:i:s')
						 );
				$id_buku = $this->Buku_model->create('tbl_buku',$data1);
				$data2 = array('id_user'      => $this->session->userdata('id_user'),
								'id_buku' 	  => $id_buku,
								'id_penerbit' => $i->post('id_penerbit'),
								'stok_buku'   => $i->post('stok_buku')
							);
			$this->Buku_model->stok($data2);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('operator/buku'),'refresh');
			}}
		$data    = array( 'title'	 => 'Tambah Buku',
					  	  'kategori' => $kategori,
					 	  'bahasa'	 => $bahasa,
					  	  'buku'  	 => $buku,
						  'penerbit'=> $penerbit);
		$data['halaman'] =('operator/buku/tambah');
		$this->load->view('operator/_template', $data);
	}

	// Edit
	public function edit($id_buku){
		$buku 	  = $this->Buku_model->detail($id_buku);
		$kategori = $this->Kategori_model->listing();
		$penerbit   = $this->Penerbit_model->listing();
		$bahasa   = $this->Bahasa_model->listing();

		$data = array( 'title'   => 'Buku');

		$valid = $this ->form_validation;

		$valid->set_rules('judul_buku','Nama','required', array('required'  => 'Nama harus di isi' ));


		if($valid->run()){
		//End Validasi
			// Kalau cover ga di upload
			if(!empty($_FILES['cover_buku']['name'])) {
			$config['upload_path'] = './assets/upload/image/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '12000';//KB
			
			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('cover_buku')){
				
				$data    = array('title'	=> $buku->judul_buku,
					 			 'kategori' => $kategori,
					 	         'bahasa'	=> $bahasa,
								 'buku'  	=> $buku,
							     'penerbit'=> $penerbit);
				$data['halaman'] =('operator/buku/edit');
				$this->load->view('operator/_template', $data);
				// jika tidak ada Error, maka masuk ke database
				}else{
					//UPLOAD DATA
					$upload_data	=  array('uploads' => $this->upload->data());

					$config['image_library']	= 'gd2';
					$config['source_image']		= './assets/upload/image/' .$upload_data['uploads']['file_name'];
					$config['new_image']		= './assets/upload/image/thumbs/';
					$config['create_thumb']		= TRUE;
					$config['quality']			= "100%";
					$config['maintain_ratio']	= TRUE;
					$config['width']			= 360;
					$config['height']			= 360;
					$config['x_axis']			= 0;
					$config['y_axis']			= 0;
					$config['thumb_marker']			= '';
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if($buku->cover_buku != "") {
						unlink('./assets/upload/image/'.$buku->cover_buku);
						unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
					}

					$i = $this->input;
					$data = array( 'id_buku'           => $id_buku,
								   'id_user'		   => $this->session->userdata('id_user'),
								   'id_kategori'	   => $i->post('id_kategori') ,
						           'id_bahasa'		   => $i->post('id_bahasa') ,
						            'id_penerbit'	   => $i->post('id_penerbit') ,
								   'kode_buku'         => htmlspecialchars($i->post('kode_buku', TRUE)) ,
								   'judul_buku'        => htmlspecialchars($i->post('judul_buku', TRUE)) ,
								   'pengarang'         => $i->post('pengarang') ,
								   'tahun_terbit'      => $i->post('tahun_terbit') ,
								   'isbn'              => htmlspecialchars($i->post('isbn', TRUE)) ,
								   'harga'		       => $i->post('harga'),
								   'letak_buku'		   => $i->post('letak_buku'),
								   'cover_buku'		   => $upload_data['uploads']['file_name'],
								   'stok_buku'         => $i->post('stok_buku'),
								   'status_buku'       => $i->post('status_buku'),
								   'ringkasan'         => $i->post('ringkasan'),
								   'keterangan'        => $i->post('keterangan'),
								 );
					$this->Buku_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah di Update');
					redirect(base_url('operator/buku'),'refresh');
					}	} else {
					$i = $this->input;
					$data = array( 'id_buku'           => $id_buku,
								   'id_user'		   => $this->session->userdata('id_user'),
								   'id_kategori'	   => $i->post('id_kategori') ,
						           'id_bahasa'		   => $i->post('id_bahasa') ,
						            'id_penerbit'	   => $i->post('id_penerbit') ,
								   'kode_buku'         => htmlspecialchars($i->post('kode_buku', TRUE)) ,
								   'judul_buku'        => htmlspecialchars($i->post('judul_buku', TRUE)) ,
								   'pengarang'         => $i->post('pengarang') ,
								   'tahun_terbit'      => $i->post('tahun_terbit') ,
								   'isbn'              => htmlspecialchars($i->post('isbn', TRUE)) ,
								   'harga'		       => $i->post('harga'),
								   'letak_buku'		   => $i->post('letak_buku'),
								   'stok_buku'         => $i->post('stok_buku'),
								   'status_buku'       => $i->post('status_buku'),
								   'ringkasan'         => $i->post('ringkasan'),
								   'keterangan'         => $i->post('keterangan'),
							 );
					$this->Buku_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah di Update');
					redirect(base_url('operator/buku'),'refresh');
			}    }
		$data    = array('title'	=> $buku->judul_buku,
			 			 'kategori' => $kategori,
					 	 'bahasa'	=> $bahasa,
						 'buku'  	=> $buku,
	                     'penerbit'=> $penerbit);
		$data['halaman'] =('operator/buku/edit');
		$this->load->view('operator/_template', $data);
	}

	// Hapus Data
	public function delete($id_buku){
		
		$buku = $this->Buku_model->detail($id_buku);

		if($buku->cover_buku != "") {
			unlink('./assets/upload/image/'.$buku->cover_buku);
			unlink('./assets/upload/image/thumbs/'.$buku->cover_buku);
		}
		
		$data = array('id_buku'   => $id_buku);
		$this->Buku_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus secara permanen');
		redirect(base_url('operator/buku/backup'),'refresh');
			}	
		// End Delete

	public function profile($id_buku){
		$buku = $this->Buku_model->detail($id_buku);

		$data    = array('title' => $buku->judul_buku,
						 'buku'  => $buku);
		$data['halaman'] =('operator/buku/profile');
		$this->load->view('operator/_template', $data);
	}

	// Cetak Laporan
	public function laporan()
	{
		$buku   		= $this->Buku_model->listing();
		$data    = array('title'	=>'Laporan Data Buku',
						 'buku'		=> $buku);
		$data['halaman'] =('operator/laporan/buku/form_cetak');
		$this->load->view('operator/_template', $data);
	}

	public function cetak(){
		$this->load->library('dompdf_gen');
		$status_buku    = $this->input->post('status_buku');
		$tanggal_awal   = $this->input->post('tanggal_awal');
		$tanggal_akhir  = $this->input->post('tanggal_akhir');
		if ($status_buku == 'Semua') {
			$semua  = $this->Buku_model->cetak_semua($tanggal_awal, $tanggal_akhir);
			$data    = array('title'	=>'Laporan Data Buku',
							 'subtitle'	=> 'Periode : ' .date('d F Y', strtotime($tanggal_awal)). ' - ' .date('d F Y', strtotime($tanggal_akhir)),
							'filter'    => $semua,
							'status_a'  => 1,
							'status_buku' => $status_buku);
			$this->load->view('operator/laporan/buku/cetak_laporan', $data);

			$paper_size = 'A4';
			$orientation = "potrait";
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan Data Buku.pdf", array('Attachment'=> FALSE));
		}else{
			$filter  = $this->Buku_model->tanggal($tanggal_awal, $tanggal_akhir, $status_buku);
			$data    = array('title'	=>'Laporan Data Buku',
							 'subtitle'	=> 'Periode : ' .date('d F Y', strtotime($tanggal_awal)). ' - ' .date('d F Y', strtotime($tanggal_akhir)),
							'filter'    => $filter,
							'status_a'  => 1,
							'status_buku' => $status_buku);
			$this->load->view('operator/laporan/buku/cetak_laporan', $data);

			$paper_size = 'A4';
			$orientation = "potrait";
			$html = $this->output->get_output();
			$this->dompdf->set_paper($paper_size, $orientation);
			$this->dompdf->load_html($html);
			$this->dompdf->render();
			$this->dompdf->stream("Laporan Data Buku.pdf", array('Attachment'=> FALSE));
		}
	}

	public function backup()
	{
		$buku  = $this->Buku_model->backup();
		
		$data = array( 'title'   	 => 'Data Buku',
					   'buku'	 => $buku);
		$data['halaman'] = ('operator/backup/buku/list');
		$this->load->view('operator/_template', $data);
	}
	public function hapus($id_buku){
		// Proteksi Hapus
		$data = array('id_buku'   		=> $id_buku,
						'status_a'		=> 0);
		
		$this->Buku_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('operator/buku'),'refresh');
	}

	public function restore($id_buku){
		// Proteksi Hapus
		$data = array('id_buku'   => $id_buku,
						'status_a'	 => 1);
		
		$this->Buku_model->aktif($data);
		$this->session->set_flashdata('sukses', 'Data telah di kembalikan');
		redirect(base_url('operator/buku/backup'),'refresh');
	}
}

/* End of file Buku.php */
/* Location: ./application/controllers/operator/Buku.php */