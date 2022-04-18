<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/bahasa">Bahasa</a>			
	</li>
	<li class="breadcrumb-item active">
		Tambah		
	</li>
</ol>
</ol>
<!-- End Breadcumb -->
<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b>TAMBAH DATA
		<br>
	</div>
	<!-- Body -->
	<div class="box-body">
		<!-- Notifikasi kalau ada input error -->
		<?php 
		echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
		echo form_open(base_url('operator/bahasa/tambah/'));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>Kode Bahasa</label>
				<input type="text" name="kode_bahasa" class="form-control" placeholder="kode bahasa" value="<?php echo set_value('kode_bahasa') ?>" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nama Bahasa</label>
				<input type="text" name="nama_bahasa" class="form-control" placeholder="Nama Bahasa" value="<?php echo set_value('nama_bahasa') ?>" required>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<input type="reset" name="reset" class="btn btn-primary btn-info" value="Batal" >
			</div>
		</div>
	</div>
	<!-- End Body -->
</div>
<!-- End Box -->

