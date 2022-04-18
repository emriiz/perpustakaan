<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/siswa">Siswa</a>			
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
		echo form_open_multipart(base_url('operator/siswa/edit/'.$siswa->id_siswa));
		?>
		<!-- End Notofikasi -->
	<div class="col-md-6">
			<div class="form-group">
				<label>NIS</label>
				<input type="text" name="nis" class="form-control" placeholder="Masukkan NIS" value="<?= $siswa->nis ?>" readonly>
			</div>
			<div class="form-group">
				<label>Nama Siswa</label>
				<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Siswa" value="<?php echo $siswa->nama ?>" required>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas" value="<?php echo $siswa->kelas ?>" required>
			</div>
			
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" name="tempat_lahir" class="form-control" placeholder="Masukkan Tempat Lahir" value="<?php echo $siswa->tempat_lahir ?>" required>
			</div>
			<div class="form-group">
				<label>Tanggal lahir</label>
				<input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $siswa->tanggal_lahir ?>" required>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select name="jekel" class="form-control">
					<option value="Laki-laki" <?php if($siswa->jekel=="Laki-laki"){echo 'selected';}?>>Laki-laki</option>
					<option value="Perempuan" <?php if($siswa->jekel=="Perempuan"){echo 'selected';}?>>Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>No Telepon</label>
				<input type="text" name="no_telepon" class="form-control" placeholder="Masukkan No Telepon" value="<?php echo $siswa->no_telepon ?>" required>
			</div>
			<div class="form-group">
				<label>Status</label>
				<select name="status_siswa" class="form-control">
					<option value="">---Pilih Status---</option>
					<option value="Aktif" <?php if($siswa->status_siswa=="Aktif"){echo 'selected';}?>>Aktif</option>
					<option value="Tidak Aktif" <?php if($siswa->status_siswa=="Tidak Aktif"){echo 'selected';}?>>Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label>Upload Foto</label><br>
				<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $siswa->foto; ?>" width="60"><br>
				<input type="file" name="foto" class="form-control" placeholder="" value="<?php echo $siswa->foto ?>">
			</div>
			<div class="form-group">
				<label>Alamat Rumah</label>
				<input name="alamat" class="form-control" placeholder="Masukkan Alamat Lengkap" value="<?php echo $siswa->alamat?>"></input>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" style="width: 80px" value="Simpan">&nbsp
				<a href="<?php echo base_url()?>operator/siswa" class="btn btn-primary btn-primary" style="width: 80px"> Batal</a>
			</div>
		</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	<!-- End Body -->
</div>
<!-- End Box -->

