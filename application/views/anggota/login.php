
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Library</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="background-color: #1a1a1a">
<div class="login-box">
  <div class="login-logo">
    <div class="center">
      <h1>
        <strong><span class="green" style="color: green">E </span>
        <span class="white" style="color: white">- Library</span></strong>
      </h1>
      <h4 class="orange" style="color: orange">SMA Negeri 1 Talun</h4>
    </div>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
      <h4 class="header green lighter bigger">
          <center>Login Anggota</center>
      </h4>
      <?php
      // Notifikasi kalau ada input error
      echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');

      // Notifikasi kalau berhasil login
      if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-danger bg-transparent"><i class="fa fa-close"> </i> ' ;
          echo $this->session->flashdata('sukses');
          echo '</div>';
        }
      ?>
      <form action="<?php echo base_url('anggota/login')?>" method="post">
        <div class="form-group has-feedback">
          <input type="name" class="form-control" id="no_anggota" name="no_anggota" placeholder="Masukkan No Anggota" value="<?= set_value('no_anggota')?>" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" value="<?= set_value('password')?>" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-md-8">
            <a href="<?php echo base_url('anggota/find')?>" class="btn btn-primary" title="Cari Buku">Cari Buku</a>
          </div>

          <div class="col-md-4">
             <button type="submit" name="submit" value="login" class="btn btn-success btn-user btn-block"> Login</button>
          </div>
          </div>
       
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
      </form>

</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
