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
		<p class="box-title"><a href="<?php echo base_url('operator/penerbit/tambah') ?>" class="btn btn-success">
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
					<th>Kode Penerbit</th>
					<th>Nama Penerbit</th>
					<th width="20%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($penerbit as $penerbit ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<th><?php echo $penerbit->kode_penerbit?></th>
					<td><?php echo $penerbit->nama_penerbit ?></td>
					<td>
						<a href="<?php echo base_url('operator/penerbit/edit/'.$penerbit->id_penerbit) ?>" class="btn btn-primary btn-outline-primary-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>
						<?php include('delete.php');?>	
					</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>



