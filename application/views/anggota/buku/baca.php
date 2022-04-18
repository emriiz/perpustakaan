<ol class="breadcrumb">
  <li class="breadcrumb-item ">
    <a href="<?php echo base_url()?>anggota/home">Anggota</a>
  </li>
  <li class="breadcrumb-item">
     <a href="<?php echo base_url()?>anggota/buku">E-book</a>    
  </li>
  <li class="breadcrumb-item active">
     <?php echo $title?>  
  </li>
</ol>

<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <div class="right" style="text-align: right">
           <a href="<?php echo base_url('anggota/read') ?>" class="btn btn-success btn-outline-primary-lg"><i class="fa fa-backward"></i> Kembali</a>
        </div>
      </div>
      <div class="box-body">
        <iframe src="<?php echo base_url('assets/upload/file/'.$file_buku->nama_file)?>" width="100%" height="800" allowfullscreen webkitallowfullscreen></iframe>
      </div>
    </div>
    
  </div>

</div>