<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#">Admin</a>
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>

<div class="box">
	<!-- Header -->
	<div class="box-header">
		<p class="box-title"><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Data</a></p>
	</div>
	<!-- End Header -->
	<!-- Body -->
	<div class="box-body">
		<?php 
		//Notifikasi
		if ($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-success bg-transparent"><i class="fa fa-check"></i> ' ;
			echo $this->session->flashdata('sukses');
			echo '</div>';
		}
		?>
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>NIP</th>
					<th>Foto</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Hak Akses</th>
					
					<th width="18%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($user as $user ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td><?php echo $user->nip?></td>
					<td>
						 <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $user->foto; ?>" width="60">
					</td>
					<td><?php echo $user->nama ?></td>
					<td><?php echo $user->username ?></td>
					<td><?php echo $user->hak_akses?></td>
					
					<td>
						<a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-primary btn-outline-primary-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
						<?php include('delete.php');?>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
	<!-- <div class="box-header">
		<p class="box-title"><a href="#" class="btn btn-success">
		<i class="fa fa-print"></i>  Cetak Laporan</a></p>
	</div>
</div> -->




