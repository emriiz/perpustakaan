<?php if($this->uri->segment(3)=="") { ?>
	<ol class="breadcrumb">
		<li class="breadcrumb-item ">
			<a href="http://localhost/perpustakaan/operator/home">Operator</a>
		</li>
		<li class="breadcrumb-item active">
			<?php echo $title ?>			
		</li>
	</ol>
<?php } ?>

<div class="box">
	<!-- Header -->
	<div class="box-header">
		<?php if($this->uri->segment(3) == "") { ?>
			<p class="box-title"><a href="<?php echo base_url('operator/peminjaman/tambah') ?>" class="btn btn-success">
				<i class="fa fa-plus"></i> Tambah Data</a></p>
			<?php } ?>
		</div>
		<!-- End Header -->
		<!-- Body -->
		<div class="box-body">
			<?php 
		//Notifikasi
			if ($this->session->flashdata('sukses')) {
				echo '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i> ' ;
				echo $this->session->flashdata('sukses');
				echo '</div>';
			} else if($this->session->flashdata('required')){
				echo '<div class="alert alert-danger" role="alert"><i class="fa fa-close"></i> ' ;
				echo $this->session->flashdata('required');
				echo '</div>';
			}
			?>

			<table class="table table-bordered table-hover table-striped" id="dataTables-example">
				<thead >
					<tr>
						<th>No</th>
						<th>No Peminjaman</th>
						<th>Nama Anggota</th>
						<th>Judul Buku</th>
						<th>Tanggal Pinjam</th>
						<th>Tanggal Kembali</th>
						<th>Status</th>
						<th width="20%" style="text-align: center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<!--  -->
					<?php $i=1; foreach($peminjaman as $peminjaman ) { ?> 
						<!--  -->
						<tr class="odd gradex">
							<td><?php echo $i?></td>
							<td><?php echo $peminjaman->no_peminjaman ?></td>
							<td>
								<a href="<?php echo base_url('operator/peminjaman/add/'.$peminjaman->id_anggota)?>">
									<?php echo $peminjaman->nama_anggota?><sup class="fa fa-link"></sup>
								</a>

							</td>
							<td><?php echo $peminjaman->judul_buku ?></td>
							<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
							<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
							<td>
								<?php
									$tgl_kembali = new DateTime($peminjaman->tanggal_kembali);
									$today = new DateTime();
									$diff    = date_diff($tgl_kembali, $today); 
									$kembali = $tgl_kembali->getTimestamp();
		            				$sekarang = $today->getTimestamp();
									if($kembali <= $sekarang){
										$kl = 'class="label label-danger label-danger-lg"';
									}else if($kembali >= $sekarang AND $kembali <= 3){
										$kl = 'class="label label-warning label-warning-lg"';
									}else{
										$kl = 'class="label label-success label-success-lg"';
									}
								?>
								<?php if(($peminjaman->status_kembali)=="Dipinjam") { ?>
									<span <?php echo $kl ?>><?php echo $peminjaman->status_kembali?></span>
								<?php }else if(($peminjaman->status_kembali)=="Dikembalikan") { ?>
									<span class="label label-success label-success-lg"><?php echo $peminjaman->status_kembali?></span>
								<?php }else if(($peminjaman->status_kembali)=="Diperpanjang") { ?>
									<span class="label label-primary label-primary-lg"><?php echo $peminjaman->status_kembali?></span>
								<?php }else if(($peminjaman->status_kembali)=="Hilang") { ?>
									<span class="label label-danger label-danger-lg"><?php echo $peminjaman->status_kembali?></span>
								<?php }?>	
							</td>
							<td style="text-align: center">
								<?php if(($peminjaman->status_kembali)=="Hilang") { ?>
								<?php }else{?>
									<?php if(($peminjaman->status_kembali) == "Dikembalikan") { ?>
									<?php }else{ ?> 
										<a href="<?php echo base_url('operator/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-primary btn-outline-primary-xs"><i class="fa fa-pencil-square-o"></i> Edit</a> 
									<?php } ?>
									<?php include('delete.php');?>
								<?php }?>


							</td>
						</tr>
						<?php $i++;} ?>
					</tbody>
				</table>
			</div>
			<!-- End Body -->
		</div>

		<script>

		</script>






