<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/admin/dashboard">Admin</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/admin/user">Pengguna</a>			
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
		echo form_open_multipart(base_url('admin/user/edit/'.$user->id_user));
		?>
		<!-- End Notofikasi -->
	<div class="col-md-6">
			<div class="form-group">
				<label>NIP</label>
				<input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $user->nip ?>">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $user->nama ?>" >
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly disabled>
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Hak Akses</label>
				<select name="hak_akses" class="form-control">
					<option value="1">1 - Admin</option>
					<option value="2" <?php if($user->hak_akses=="2"){echo 'selected';}?>>2 - Operator</option>
				</select>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php echo set_value('password') ?>" required>
			</div>
			<div class="form-group">
				<label>Upload Foto</label>
				<input type="file" name="foto" class="form-control" placeholder="" value="<?php echo set_value('foto') ?>">
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
				<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<a href="<?php echo base_url()?>admin/user" class="btn btn-info"> Batal</i></a>
			</div>
		</div>
			<?php echo form_close(); ?>
	</div>
	
	<!-- End Body -->
</div>
<!-- End Box -->


