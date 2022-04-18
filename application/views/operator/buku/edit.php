<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="http://localhost/perpustakaan/operator/buku">Buku</a>			
	</li>
	<li class="breadcrumb-item active">
		<a href="#">Edit</a>		
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
		echo form_open_multipart(base_url('operator/buku/edit/'.$buku->id_buku));
		?>
		<!-- End Notofikasi -->
	<div class="col-md-12">
			<div class="form-group form-group-lg">
				<label>Judul Buku</label>
				<input type="text" name="judul_buku" class="form-control" placeholder="Masukkan Judul Buku" value="<?php echo $buku->judul_buku ?>" required>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group form-group-lg">
				<label>Nama Pengarang</label>
				<input type="text" name="pengarang" class="form-control" placeholder="Masukkan Nama Pengarang" value="<?php echo $buku->pengarang ?>" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Kode Buku</label>
				<input type="text" name="kode_buku" class="form-control" placeholder="Masukkan Kode Buku" value="<?php echo $buku->kode_buku ?>" required>
			</div>
			<div class="form-group">
				<label>Kategori</label>
				<select name="id_kategori" class="form-control">
					<?php foreach($kategori as $kategori) {?>
					<option value="<?php echo $kategori->id_kategori?>" <?php if($buku->id_kategori==$kategori->id_kategori){ echo "selected"; }?>>
					
					<?php echo $kategori->kode_kategori?> - <?php echo $kategori->nama_kategori?>
					</option>
				    <?php }?>
					
				</select>
			</div>
			<div class="form-group">
				<label>Bahasa</label>
				<select name="id_bahasa" class="form-control">
					<?php foreach($bahasa as $bahasa) {?>
					<option value="<?php echo $bahasa->id_bahasa?>" <?php if($buku->id_bahasa==$bahasa->id_bahasa){ echo "selected"; }?>>
					
					<?php echo $bahasa->kode_bahasa?> - <?php echo $bahasa->nama_bahasa?>
					</option>
				    <?php }?>
				</select>
			</div>
			<div class="form-group">
				<label>NO ISBN</label>
				<input type="text" name="isbn" class="form-control" placeholder="Masukkan No ISBN" value="<?php echo $buku->isbn ?>" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Penerbit</label>
				<select name="id_penerbit" class="form-control">
					<?php foreach($penerbit as $penerbit) {?>
					<option value="<?php echo $penerbit->id_penerbit?>" <?php if($buku->id_penerbit==$penerbit->id_penerbit){ echo "selected"; }?>>
					
					<?php echo $penerbit->kode_penerbit?> - <?php echo $penerbit->nama_penerbit?>
					</option>
				    <?php }?>
				</select>
			</div>
			<div class="form-group">
				<label>Tahun Terbit</label>
				<input type="year" name="tahun_terbit" class="form-control" placeholder="Tahun Terbitr" value="<?php echo $buku->tahun_terbit ?>" required>
			</div>
			<div class="form-group">
				<label>Harga Buku</label>
				<input type="text" name="harga" class="form-control" placeholder=" Masukkan Harga Buku" value="<?php echo $buku->harga ?>" required>
			</div>
			<div class="form-group">
				<label>Letak Buku</label>
				<input type="text" name="letak_buku" class="form-control" placeholder=" Masukkan Letak Buku" value="<?php echo $buku->letak_buku ?>" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Jumlah Buku</label>
				<input type="text" name="stok_buku" class="form-control" placeholder=" Masukkan Jumlah Buku" value="<?php echo $buku->stok_buku ?>" required>
			</div>
			<div class="form-group">
				<label>Status Buku</label>
				<select name="status_buku" class="form-control">
					<option value="Tersedia" <?php if($buku->status_buku=="Tersedia"){echo 'selected';}?>>Tersedia</option>
					<option value="Tidak Tersedia"<?php if($buku->status_buku=="Tidak Tersedia"){echo 'selected';}?>>Tidak Tersedia</option>
					<option value="Hilang"<?php if($buku->status_buku=="Hilang"){echo 'selected';}?>>Hilang</option>
				</select>
			</div>
			<div class="form-group">
				<label>Upload Cover Buku</label>
				<input type="file" name="cover_buku" class="form-control" placeholder="" value="<?php echo set_value('cover_buku') ?>">
			</div>
			<div class="form-group">
				<label>Keterangan</label>
				<input type="text" name="keterangan" class="form-control" placeholder="Keterangan Buku" value="<?php echo $buku->keterangan?>">
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
				<label>Ringkasan</label>
				<textarea name="ringkasan" class="form-control" placeholder="Ringkasan Buku" value="<?php echo $buku->ringkasan?>"></textarea>
			</div>
		</div>
		<div class="col-md-12" style="text-align: center">
				<input type="submit" name="submit" class="btn btn-success btn-success" value="Simpan">
				<a href="<?php echo base_url()?>operator/buku" class="btn btn-primary btn-outline-primary-xs"> Batal</i></a>
			</div>
	</div>
	</div>
	<?php echo form_close(); ?>
	<!-- End Body -->
</div>
<!-- End Box -->

