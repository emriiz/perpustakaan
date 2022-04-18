<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>

<div class="box">
	<!-- Header -->
	<div class="box-header">
		<p class="box-title"><a href="<?php echo base_url('operator/pengembalian/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Data</a></p>
	</div>
	<!-- End Header -->
	<!-- Body -->
	<div class="box-body">
		<?php 
		//Notifikasi
		if ($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-success bg-transparent" role="alert"><i class="fa fa-check"></i> ' ;
			echo $this->session->flashdata('sukses');
			echo '</div>';
		}
		?>
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>No Pengembalian</th>
					<th>Nama Anggota</th>
					<th>Judul Buku</th>
					<th>Tgl Dikembalikan</th>
					<th>Keterangan</th>
					<th>Denda</th>
					<!-- <th>Aksi</th> -->
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($pengembalian as $pengembalian ) { 
					$id_peminjaman = $pengembalian->id_peminjaman;
					$peminjaman	 	 = $this->Peminjaman_model->detail($id_peminjaman); 
					?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td><?php echo $pengembalian->no_pengembalian?></td>
					<td><a href="<?php echo base_url('operator/pengembalian/anggota/'.$pengembalian->id_anggota)?>">
									<?php echo $pengembalian->nama_anggota?><sup class="fa fa-link"></sup>
								</a></td>
					<td><?php echo $pengembalian->judul_buku ?></td>
					<td><?php echo date('d-m-Y', strtotime($pengembalian->tgl_dikembalikan)) ?></td>
					<!-- <?php
					$booking = new datetime($peminjaman->tanggal_kembali);
					$today   = new datetime(date('d-m-Y', strtotime($pengembalian->tgl_dikembalikan)));
					$diff    = date_diff($booking, $today);
               		if($booking<$today){
               			$ok =$diff->d;
               			$keterangan = '<span style="color:red;text-align:center;font-weight:bold;">TERLAMBAT '.$ok.' HARI';
               			$denda = 100;
                        $total = $denda*$ok;
               		}else{
               			 $ok2 = ($diff->d)+1;
                        $keterangan = '<span style="color:green;text-align:center;font-weight:bold;">TEPAT WAKTU';
                        $denda = "0";
                        $total = "0";
               		}
					?> -->
					<td><?php echo $keterangan ?></td>
					<td>Rp. <?php echo number_format($total,2,",",".") ?></td>
					<!-- <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?php echo $pengembalian->id_pengembalian?>">Detail</button></td> -->
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>



