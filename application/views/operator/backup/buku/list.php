<?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>

<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
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
					<th>Cover</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Tanggal Hapus</th>
					<th>Petugas</th>
					<th width="18%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($buku as $buku ) { 
					$id_buku = $buku->id_buku;
					$file_buku = $this->File_buku_model->buku($id_buku);
				 ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60">
					</td>
					<td><?php echo $buku->judul_buku?></td>
					<td><?php echo $buku->pengarang ?></td>
					<td><?php echo date('d-m-Y H:i:s', strtotime($buku->tanggal_update)) ?></td>
					<td><?php echo $user_aktif->nama ?></td>
					<td style="text-align: center">
						<a class="btn btn-success" href="<?php echo base_url('operator/buku/restore/'.$buku->id_buku) ?>"><i class="fa fa-reply"></i> Restore</a>
						<?php include('delete.php')?>
					</td>
				</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>

 
 




