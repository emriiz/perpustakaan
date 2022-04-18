<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Perpustakaan SMA Negeri 1 Talun</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url();?>assets/view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url();?>assets/view/css/coming-soon.min.css" rel="stylesheet">

</head>

<body>

  <div class="overlay" style="background-color: black">
    <div class="form-group" style="text-align: right; padding-top: 125px; padding-right:200px">
        <img src="<?php echo base_url()?>assets/gambar/logo1.png" width="300" ><br><br>
         
    </div>
    <h2 class="mb-3" style="color: white; text-align: center; padding-left: 650px">Perpustakaan SMA Negeri 1 Talun</h2>
  </div>
 <!--  <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="<?php echo base_url();?>assets/view/mp4/bg.mp4" type="video/mp4">
  </video> -->


  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <h1 class="mb-3">Selamat Datang!</h1>
            <p class="mb-5">Silahkan isi Buku Tamu<br> 
              <strong>Perpustakaan SMA Negeri 1 Talun</strong> <br>
              terlebih dahulu</p>
              
              <?php 
              //Notifikasi
              if ($this->session->flashdata('sukses')) {
                echo ' <div class="alert alert-default" role="alert"><i class="fa fa-check"></i> ' ;
                echo $this->session->flashdata('sukses');
                echo '</div>';
              }
              ?>
              <?php echo form_open_multipart(base_url('pengunjung/dashboard/tambah')); ?>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama_pengunjung" class="form-control" placeholder="Masukkan Nama Anda" value="<?php echo set_value('nama_pengunjung') ?>" required>
              </div>
              <div class="form-group">
                <label>Kelas / Instansi</label>
                <input type="text" name="kelas" class="form-control" placeholder="Masukkan Kelas / Instansi Anda" value="<?php echo set_value('kelas') ?>">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="textarea" name="keterangan" class="form-control" placeholder="Keterangan Mengunjungi Perpustakaan" value="<?php echo set_value('keterangan') ?>" required>
              </div>
            </div>
            <div class="col-md-12" style="margin-left: 365px">
                <input type="submit" name="submit" class="btn btn-secondary " value="Simpan">
            </div>

             <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url();?>assets/view/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/view/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="<?php echo base_url();?>assets/view/js/coming-soon.min.js"></script>
  <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove(); 
    });
  }, 3000);
</script>
</body>

</html>
