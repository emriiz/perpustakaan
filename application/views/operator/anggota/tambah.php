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

		echo form_open_multipart(base_url('operator/anggota/tambah'));
		?>
		<!-- End Notofikasi -->
		<div class="col-md-6">
			<div class="form-group">
				<label>No Anggota</label>
				<input type="text" name="no_anggota" class="form-control" placeholder="Masukkan No Anggota" value="<?= $no_anggota ?>" readonly>
			</div>
			<div class="form-group">
				<label>NIS</label>
				<select name="id_siswa" id="id_siswa" class="form-control">
					<option value="">---Pilih NIS---</option>}
					option
					<?php foreach($siswa as $siswa) {?>
					<option value="<?php echo $siswa->id_siswa?>">
					<?php echo $siswa->nis?> - <?php echo $siswa->nama?>
					</option>
				    <?php }?>
					
				</select>
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama_anggota" class="form-control" id="nama_anggota" placeholder="Masukkan Nama Anggota" value="<?php echo set_value('nama_anggota') ?>" required>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas" value="<?php echo set_value('kelas') ?>" required>
			</div>
			
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal lahir</label>
				<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('tanggal_lahir') ?>" required>
			</div>
			<div class="form-group">
				<label>Alamat Rumah</label>
				<textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat Lengkap" value="<?php echo set_value('alamat');?>"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<input type="text" name="jekel" id="jekel" class="form-control" placeholder="" value="" required readonly>
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo set_value('telepon') ?>" required>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status_anggota" class="form-control">
					<option value="">---Pilih Status---</option>
					<option value="Active">Aktif</option>
					<option value="Non Active">Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" id="password" class="form-control" id="password" placeholder=" Masukkan password" value="<?php echo set_value('password') ?>" required >
			</div>
			<div class="form-group">
				<label>Upload Foto</label>
				<input type="text" name="foto" id="foto" class="form-control" placeholder="" value="<?php echo set_value('foto') ?>" required>
			</div>
			<div id="tampil_foto">

				</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="" value="<?php echo set_value('keterangan') ?>" >
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" style="width: 80px" value="Simpan">&nbsp
				<a href="<?php echo base_url()?>operator/anggota" class="btn btn-primary btn-primary" style="width: 80px"> Batal</a>
			</div>
		</div>
	</div>
	<!-- End Body -->
	<?php echo form_close(); ?>
</div>
<!-- End Box -->

