<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/buku">Buku</a>			
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/file_buku">File Buku</a>			
	</li>
	<li class="breadcrumb-item">
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
		<h1 class="box-title text-primary"><b>Edit File Buku <?php echo $title?>
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

		echo form_open_multipart(base_url('operator/file_buku/edit/'.$file_buku->id_file));
		?>

		<div class="col-md-6">
			<div class="form-group">
	       		<label>Nama File</label>
	       		<input type="text" name="judul_file" class="form-control" value="<?php echo $file_buku->judul_file?>">
	        </div>
		</div>
       <div class="col-md-6">
	       	<div class="form-group">
	       		<label>Upload File <small>(File Lama : <a href="<?php echo base_url('operator/file_buku/unduh/'.$file_buku->id_file)?>" target="_blank" ><i class="fa fa-download"></i><?php echo $file_buku->nama_file?></a>)</small></label>
	       		<input type="file" name="nama_file" class="form-control" value="<?php echo set_value('nama_file')?>">
	       </div>
       </div>
        
       <div class="col-md-12" style="text-align: center">
	       	<div class="form-group">
		   		<input type="submit" name="submit" class="btn btn-success" value="Update">
				<input type="reset" name="reset" class="btn btn-danger" value="Reset">
		    </div>
       </div>
	   
	 			    
	
	<?php echo form_close(); ?>
</div>
</div>

<!-- End Box -->

