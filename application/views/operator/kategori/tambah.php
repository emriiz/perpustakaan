<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/kategori">Kategori</a>			
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
		echo form_open(base_url('operator/kategori/tambah/'));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>Kode Kategori</label>
				<input type="text" name="kode_kategori" class="form-control" placeholder="kode kategori" value="<?php echo set_value('kode_kategori') ?>" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Nama Kategori</label>
				<input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?php echo set_value('nama_kategori') ?>" required>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<a href="http://localhost/perpustakaan/operator/kategori" class="btn btn-primary btn-outline-primary-xs"> Batal</a>
			</div>
		</div>
	</div>
	<!-- End Body -->
</div>
<!-- End Box -->

