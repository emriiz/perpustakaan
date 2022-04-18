<?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>

<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="#">Restore</a>			
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title?>		
	</li>
</ol>
<div class="box">
	<!-- Body -->
	<div class="box-body">
		<?php 
		//Notifikasi
		if ($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i> ' ;
			echo $this->session->flashdata('sukses');
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
					<th>Status</th>
					<th>Tanggal Hapus</th>
					<th>Petugas</th>
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
					<td><?php echo $peminjaman->nama_anggota?></td>
					<td><?php echo $peminjaman->judul_buku ?></td>
					<td>
						<?php if(($peminjaman->status_kembali)=="Dipinjam") { ?>
							<span class="label label-warning label-warning-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Dikembalikan") { ?>
							<span class="label label-success label-success-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Diperpanjang") { ?>
							<span class="label label-primary label-primary-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Hilang") { ?>
							<span class="label label-danger label-danger-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }?>	
					</td>
					<td><?php echo date('d-m-Y H:i:s', strtotime($peminjaman->tanggal)) ?></td>
					<td><?php echo $user_aktif->nama ?></td>
					<td style="text-align: center">
						<a class="btn btn-success" href="<?php echo base_url('operator/peminjaman/restore/'.$peminjaman->id_peminjaman) ?>"><i class="fa fa-reply"></i> Restore</a>
						<?php include('delete.php')?>
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






