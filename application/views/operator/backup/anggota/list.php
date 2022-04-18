<?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>

<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item active">
		Restore			
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>

<div class="box">
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
					<th>Foto</th>
					<th>No Anggota</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Tanggal Hapus</th>
					<th width="27%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($anggota as $anggota ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $anggota->foto; ?>" width="60">
					</td>
					<td><?php echo $anggota->no_anggota?></td>
					<td><?php echo $anggota->nama_anggota ?></td>
					<td><?php echo $anggota->kelas ?></td>
					<td><?php echo $anggota->tanggal?></td>
					<td style="text-align: center">
						<a class="btn btn-success" href="<?php echo base_url('operator/anggota/restore/'.$anggota->id_anggota) ?>"><i class="fa fa-reply"></i> Restore</a>
						
						<?php include('delete.php');?>
					</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>



 
 




