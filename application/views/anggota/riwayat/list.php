<?php
$id_anggota = $this->session->userdata('id_anggota');
$user_aktif = $this->Anggota_model->detail($id_anggota);

?>
<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#">Anggota</a>
	</li>
	<li class="breadcrumb-item">
				<a href="<?php echo base_url()?>anggota/home">Riwayat Peminjaman Buku</a>	
	</li>
	<li class="breadcrumb-item active">
		<?php echo $user_aktif->nama_anggota ?>			
	</li>
</ol>
<div class="row">
	<div class="col-md-12">
	<div class="box">
	<div class="box-body">
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>No Peminjaman</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($peminjaman as $peminjaman ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<<td><?php echo $peminjaman->no_peminjaman ?></td>
					<td><?php echo $peminjaman->judul_buku ?></td>
					<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
					<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
					<td><?php if(($peminjaman->status_kembali)=="Dipinjam") { ?>
							<span class="label label-warning label-warning-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Dikembalikan") { ?>
							<span class="label label-success label-success-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Diperpanjang") { ?>
							<span class="label label-primary label-primary-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Hilang") { ?>
							<span class="label label-danger label-danger-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }?>
					</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	
</div>
</div>
</div>



