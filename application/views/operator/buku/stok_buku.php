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
	<!-- <div class="box-header">
		<p class="box-title"><a href="<?php echo base_url('operator/stok_buku/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Data</a></p>
	</div> -->
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
					<th>Cover Buku</th>
					<th>Judul Buku</th>
					<th>Nama Pengarang</th>
					<th>Penerbit</th>
					<th>Stok Buku</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($stok_buku as $buku ) { ?> 
				<!--  -->

				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td><img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60"></td>
					<th><?php echo $buku->judul_buku?></th>
					<td><?php echo $buku->pengarang?></td>
					<td><?php echo $buku->nama_penerbit?></td>
					<td><?php echo $buku->stok_buku?></td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>
<style>
		th, td {
		  text-align: center;
		}
		
	</style>



