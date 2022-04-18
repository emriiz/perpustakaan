<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Library SMA Negeri 1 Talun</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>assets/cari/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url()?>assets/cari/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/cari/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url()?>assets/cari/css/landing-page.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">E-Library SMANTA</a>
      <a class="btn btn-success" href="<?php echo base_url()?>anggota/login">Login</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Silahkan masukkan judul buku untuk mencari informasi buku !!!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <?php echo form_open('anggota/find/cari')?>
                   <input type="text" name="keyword" class="form-control form-control-lg" placeholder="Masukkan Judul Buku. . ." required>
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-warning">Cari Buku</button>
              </div>
              <?php echo form_close()?>
            </div>
          </form>
          <hr>
          
        </div>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="footer bg-light">
   <div class="text-center">
    <strong>Copyright &copy; <?php echo date('Y')?> Aplikasi Pengelolaan Perpustakaan SMA Negeri 1 Talun</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url()?>assets/cari/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/cari/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>