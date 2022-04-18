<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/anggota">Anggota</a>			
	</li>
	<li class="breadcrumb-item active">
		Edit		
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title?>	
	</li>
</ol>
</ol>
<!-- End Breadcumb -->
<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b>Edit Data <?php echo $title?>
		<br>
	</div>
	<!-- Body -->
	<div class="box-body">
		<!-- Notifikasi kalau ada input error -->
		<?php 
		echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
		echo form_open_multipart(base_url('operator/anggota/edit/'.$anggota->id_anggota));
		?>
		<!-- End Notofikasi -->
	<div class="col-md-6">
			<div class="form-group">
				<label>No Anggota</label>
				<input type="text" name="no_anggota" class="form-control" placeholder="Masukkan No Anggota" value="<?php echo $anggota->no_anggota ?>" readonly disabled>
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama_anggota" class="form-control" placeholder="Masukkan Nama Anggota" value="<?php echo $anggota->nama_anggota ?>" required>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" value="<?php echo $anggota->kelas ?>">
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo $anggota->tempat_lahir ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal lahir</label>
				<input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $anggota->tanggal_lahir ?>" required>
			</div>
			<div class="form-group">
				<label>Alamat Rumah</label>
				<input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" value="<?php echo $anggota->alamat ?>" required>
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
				<input type="text" name="telepon" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo $anggota->telepon ?>" required>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status_anggota" class="form-control">
					<option value="">---Pilih Status---</option>
					<option value="Active" <?php if($anggota->status_anggota=="Active"){echo 'selected';}?>>Aktif</option>
					<option value="Non Active" <?php if($anggota->status_anggota=="Non Active"){echo 'selected';}?>>Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder=" Masukkan password" value="<?php echo set_value('password') ?>">
			</div>
			<div class="form-group">
				<label>Upload Foto</label><br>
				<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $anggota->foto; ?>" width="60"><br>
				<input type="file" name="foto" class="form-control" placeholder="" value="<?php echo $anggota->foto ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" placeholder="" value="<?php echo $anggota->keterangan ?>" >
			</div>
		</div>
		<div class="col-md-12">
			
		</div>
		<div class="col-md-12">
			<div class="form-group" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<a href="<?php echo base_url()?>operator/anggota" class="btn btn-info"> Batal</i></a>
			</div>
		</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	<!-- End Body -->
</div>
<!-- End Box -->

