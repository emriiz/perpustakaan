<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/anggota">Anggota</a>			
	</li>
	<li class="breadcrumb-item active">
		Tambah			
	</li>
</ol>
<!-- End Breadcumb -->
<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b>INPUT DATA ANGGOTA</b></h1>
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

		echo form_open_multipart(base_url('operator/siswa/tambah'));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>NIS</label>
				<input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" value="<?= $nis ?>" readonly>
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa" value="<?php echo set_value('nama') ?>" required>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" value="<?php echo set_value('kelas') ?>" required>
			</div>
			
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal lahir</label>
				<input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tanggal_lahir') ?>" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jekel" class="form-control">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="no_telepon" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo set_value('no_telepon') ?>" required>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status_siswa" class="form-control">
					<option value="Aktif">Aktif</option>
					<option value="Tidak Aktif">Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label>Upload Foto</label>
				<input type="file" name="foto" class="form-control" placeholder="" value="<?php echo set_value('foto') ?>" required>
			</div>
			<div class="form-group">
				<label>Alamat Rumah</label>
				<textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" value="<?php echo set_value('alamat');?>"></textarea>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" style="width: 80px" value="Simpan">&nbsp
				<a href="<?php echo base_url()?>operator/siswa" class="btn btn-primary btn-primary" style="width: 80px"> Batal</a>
			</div>
		</div>
	</div>
	<!-- End Body -->
	<?php echo form_close(); ?>
</div>
<!-- End Box -->

