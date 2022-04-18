<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#http://localhost/perpustakaan/admin/dashboard">Admin</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/admin/user">Pengguna</a>			
	</li>
	<li class="breadcrumb-item active">
		Tambah			
	</li>
</ol>
<!-- End Breadcumb -->
<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b>INPUT DATA PENGGUNA</b></h1>
		<br>
	</div>
	<!-- Body -->
	<div class="box-body">
		<!-- Notifikasi kalau ada input error -->
		<?php 
		echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');

		// Kalau ada error upload
		if (isset($error)) {
			echo '<div class="alert alert-warning">';
			echo $error;
			echo '</div>';
			# code...
		}

		echo form_open_multipart(base_url('admin/user/tambah'));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>NIP</label>
				<input type="text" name="nip" class="form-control" placeholder="Masukkan NIP" value="<?php echo set_value('nip') ?>" required>
			</div>
			
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" value="<?php echo set_value('nama') ?>" required>
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Masukkan Username" value="<?php echo set_value('username') ?>" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Hak Akses</label>
				<select name="hak_akses" class="form-control">
					<option value="">---Pilih Hak Akses---</option>
					<option value="1">1 - Admin</option>
					<option value="2">2 - Operator</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php echo set_value('password') ?>" required>
			</div>
			<div class="form-group">
				<label>Upload Foto</label>
				<input type="file" name="foto" class="form-control" placeholder="" value="<?php echo set_value('foto') ?>" required>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<input type="reset" name="reset" class="btn btn-primary btn-info">
			</div>
	</div>
	<!-- End Body -->
	<?php echo form_close(); ?>
</div>
<!-- End Box -->

