<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?php echo $buku->id_buku?>"><i class="fa fa-eye"> Detail</i></button>
<!-- Modal Profile -->
<div class="modal fade" id="modal-default<?php echo $buku->id_buku?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align: center"><strong> Detail Buku : <?php echo $buku->judul_buku?> </strong></h4>
      </div>
      <div class="modal-body">
        <div class="box-body" style="background-color: silver">

	  <div class="col-md-6">
	      <div class="form-group">
	       <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="200" style="align-content: center">
	      </div>
	       <div class="form-group">
	        <label>Jumlah Buku</label>
	          <p><?php echo $buku->stok_buku ?></p>
	      </div>
	       <div class="form-group">
	        <label>Status Buku</label>
	         <p><?php if(($buku->status_buku)=="Tersedia") { ?>
				<span class="label label-success label-success-lg"><?php echo $buku->status_buku?></span>
			<?php }else if(($buku->status_buku)=="Tidak Tersedia") { ?>
				<span class="label label-danger label-danger-lg"><?php echo $buku->status_buku?></span>
			<?php }?>	</p>
	      </div>
	       <div class="form-group">
	        <label>Letak Buku</label>
	          <p><?php echo $buku->letak_buku ?></p>
	      </div>
	    </div>
	    <div class="col-md-6">
	      <div class="form-group">
	        <label>Judul Buku</label>
	       		<p><?php echo $buku->judul_buku ?></p>
	      </div>
	      <div class="form-group">
	        <label>Pengarang</label>
	       		<p><?php echo $buku->pengarang ?></p>
	      </div>
	      <div class="form-group">
	        <label>Penerbit</label>
	       		<p><?php echo $buku->nama_penerbit ?></p>
	      </div>
	      <div class="form-group">
	        <label>Tahun Terbit</label>
	       		<p><?php echo $buku->tahun_terbit?></p>
	      </div>
	      <div class="form-group">
	        <label>Kategori</label>
	       		<p><?php echo $buku->nama_kategori?></p>
	      </div>
	      <div class="form-group">
	        <label>No ISBN</label>
	       		<p><?php echo $buku->isbn ?></p>
	      </div>
	      <div class="form-group">
	        <label>Harga Buku</label>
	       		<p>Rp. <?php echo $buku->harga ?></p>
	      </div>
	      <div class="form-group">
	        <label>Ringkasan</label>
	       		<p><?php echo $buku->ringkasan ?></p>
	      </div>
	    </div>
	  </div>
	 </div>
	        
	<div class="modal-footer" style="text-align: center">
	  <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal --> 
</div>
<!-- ENd Modal Profile -->