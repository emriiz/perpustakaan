<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="<?php echo base_url()?>operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/file_buku">File Buku</a>			
	</li>
	<li class="breadcrumb-item">
		<a href="#">Kelola</a>			
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>
		<?php 
		// Uri Segmen
		if($this->uri->segment(3) != ""){
			include('tambah.php');
		}else{
		?>
<div class="box">
	<!-- Header -->
	<div class="box-header">
		
		
		<p class="box-title"><a href="<?php echo base_url('operator/buku') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah File Buku</a></p>

	
	</div>
	<!-- End Header -->
	<?php }?>
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
					<th>Nama File</th>
					<th>File</th>
					<th width="27%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($file_buku as $file_buku ) { 
					$id_buku = $file_buku->id_buku;
					$buku = $this->Buku_model->detail($id_buku);
				 ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60">
					</td>
					<td><?php echo $file_buku->judul_buku?></td>
					<td><?php echo $file_buku->judul_file?></td>
					<td><?php echo $file_buku->nama_file ?></td>
					<td>

					<a href="<?php echo base_url('operator/file_buku/unduh/'.$file_buku->id_file) ?>" class="btn btn-warning btn-outline-waning-xs" target="_blank"><i class="fa fa-download"></i> Download</a>

					<a href="<?php echo base_url('operator/file_buku/edit/'.$file_buku->id_file) ?>" class="btn btn-primary btn-outline-primary-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>	
					
					<?php include('delete.php');?>
				</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>

 
 




