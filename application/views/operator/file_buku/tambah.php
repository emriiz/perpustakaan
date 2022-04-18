<!-- Box -->
<div class="box">
	<div class="box-header">
		<h1 class="box-title text-primary"><b><?php echo $title?></b></h1>
		<br>
		<br>
		<p><button type="button" class="btn btn-success " data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Upload File Baru</button></p>
	</div>
	<!-- Body -->
		

		<?php 
		echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');

		// Kalau ada error upload
		if (isset($error)) {
			echo '<div class="alert alert-warning">';
			echo $error;
			echo '</div>';
			# code...
		}

		echo form_open_multipart(base_url('operator/file_buku/kelola/'.$buku->id_buku));
		?>
		<div class="modal fade" id="Tambah">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah File Baru</h4>
              </div>
              <div class="modal-body">
              	<div class="col-md-6">
              		<div class="form-group">
	               		<label>Nama File File</label>
	               		<input type="text" name="judul_file" class="form-control" value="<?php echo set_value('judul_file')?>">
               		</div>
              	</div>
              	<div class="col-md-6">
              		<div class="form-group">
	               		<label>Upload File</label>
	               		<input type="file" name="nama_file" class="form-control" value="<?php echo set_value('nama_file')?>" required>
               		</div>
              	</div>
                
			    <div class="modal-footer" >
	 			    <input type="submit" name="submit" class="btn btn-success" value="Upload File Baru">
	 			     <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
	              </div>
			<!-- /.modal-dialog -->
			 </div>
			</div>
		 </div>
		</div>
			<!-- /.modal --> 
	
	<?php echo form_close(); ?>


