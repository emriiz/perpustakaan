<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/penerbit">Penerbit</a>			
	</li>
	<li class="breadcrumb-item active">
		Edit		
	</li>
	<li class="breadcrumb-item active">
		<?php echo $penerbit->nama_penerbit?>	
	</li>
</ol>
</ol>
<!-- End Breadcumb -->
<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b>Edit Data <?php echo $penerbit->nama_penerbit ?>
		<br>
	</div>
	<!-- Body -->
	<div class="box-body">
		<!-- Notifikasi kalau ada input error -->
		<?php 
		echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
		echo form_open(base_url('operator/penerbit/edit/'.$penerbit->id_penerbit));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>Kode Penerbit</label>
				<input type="text" name="kode_penerbit" class="form-control" placeholder="kode penerbit" value="<?php echo $penerbit->kode_penerbit ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nama Penerbit</label>
				<input type="text" name="nama_penerbit" class="form-control" placeholder="Nama Penerbit" value="<?php echo $penerbit->nama_penerbit ?>">
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<a href="http://localhost/perpustakaan/operator/penerbit" class="btn btn-primary btn-outline-primary-xs"> Batal</a>
			</div>
		</div>
	</div>
	<!-- End Body -->
</div>
<!-- End Box -->

