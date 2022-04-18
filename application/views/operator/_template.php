<?php 
//Proteksi Halaman
if ($this->session->userdata('username') =="" && $this->session->userdata('hak_akses')=="1") 
{
  $this->session->set_flashdata('gagal', 'silahkan login terlebih dahulu');
  redirect(base_url('login'),'refresh');
}
?>
<?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aplikasi Pengelolaan Perpustakaan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- J QUERY SCRIPTS -->
  <script src="<?php echo base_url()?>assets/js/jquery-1.10.2.js"></script>
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.css" rel="stylesheet"></script>
  <!-- Select2 -->
  <link href="<?php echo base_url()?>assets/select2/dist/css/select2.min.css" rel="stylesheet" />
  <script src="<?php echo base_url()?>assets/select2/dist/js/select2.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('operator/home')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>PP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Apel-P</b>&nbsp Operator</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li><a href="#"><strong><?php 
            date_default_timezone_set('Asia/Jakarta');
            echo date("d F Y", strtotime('now'));?></strong></a></li>
          <li class="dropdown user user-menu">
            <a href="<?php echo site_url('operator/home/profile')?>">
              <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $user_aktif->foto; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $user_aktif->nama?></span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $user_aktif->foto; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_aktif->nama?></p>
          <span class="label label-success label-success-xl">Petugas</span>
        </div>
      </div>
      <br>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HALAMAN UTAMA</li>
        <li class="treeview">
          <li><a href="<?php echo site_url('operator/home')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        </li>

         <li class="treeview">
          <li><a href="<?php echo site_url('pengunjung/home_op')?>"><i class="fa fa-child"></i> <span>Daftar Pengunjung</span></a></li>
          
         </li>

         <li class="header">PENGELOLAAN</li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Kelola Buku</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('operator/buku')?>"><i class="fa fa-bookmark-o"></i>Daftar Buku</a></li>
             <li><a href="<?php echo site_url('operator/kategori')?>"><i class="fa fa-list-alt"></i>Kategori</a></li>
              <li><a href="<?php echo site_url('operator/penerbit')?>"><i class="fa fa-address-book" aria-hidden="true"></i>Penerbit</a></li>
              <li><a href="<?php echo site_url('operator/bahasa')?>"><i class="fa fa-list-ul" aria-hidden="true"></i>Bahasa</a></li>
              <li><a href="<?php echo site_url('operator/file_buku')?>"><i class="fa fa-book" aria-hidden="true"></i>File Buku</a></li>
            </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Kelola Anggota</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
           <ul class="treeview-menu">
             <li><a href="<?php echo site_url('operator/siswa')?>"><i class="fa fa-circle"></i> <span> Daftar Siswa</span></a></li>
             <li><a href="<?php echo site_url('operator/anggota')?>"><i class="fa fa-circle"></i> <span> Daftar Anggota</span></a></li>
           </ul>
        </li>

        <li class="header">TRANSAKSI</li>
         <li class="treeview">
          <li><a href="<?php echo site_url('operator/stok_buku')?>"><i class="fa fa-bookmark"></i> <span>Stok Buku</span></a></li>
        </li>
        <li class="treeview">
          <li><a href="<?php echo site_url('operator/peminjaman')?>"><i class="fa fa-share"></i> <span>Peminjaman Buku</span></a></li>
        </li>
       <li class="treeview">
          <li><a href="<?php echo site_url('operator/pengembalian')?>"><i class="fa fa-reply"></i> <span>Pengembalian Buku</span></a></li>
        </li>

         <li class="header">LAPORAN</li>
        <li class="treeview">
          <li><a href="<?php echo site_url('operator/buku/laporan')?>"><i class="fa fa-bookmark"></i> <span>Laporan Data Buku</span></a></li>
        </li>
         <li class="treeview">
          <li><a href="<?php echo site_url('operator/peminjaman/laporan')?>"><i class="fa fa-user"></i> <span>Laporan Data Peminjaman</span></a></li>
        </li>
       <li class="treeview">
          <li><a href="<?php echo site_url('operator/pengembalian/laporan')?>"><i class="fa fa-print"></i> <span>Laporan Data Pengembalian</span></a></li>
        </li>

         <li class="header">AKUN</li>
         <li class="treeview">
          <li><a href="<?php echo site_url('operator/home/profile')?>"><i class="fa fa-user-md"></i> <span>Profil</span></a></li>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-trash"></i>
            <span>Restore Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('operator/buku/backup')?>"><i class="fa fa-circle-o"></i> Data Buku</a></li>
            <li><a href="<?php echo site_url('operator/anggota/backup')?>"><i class="fa fa-circle-o"></i> Data Anggota</a></li>
            <li><a href="<?php echo site_url('operator/peminjaman/backup')?>"><i class="fa fa-circle-o"></i> Data Peminjaman</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <li><a href="" data-toggle="modal" data-target="#modal-delete"><i class="fa  fa-power-off"></i> <span> Keluar</span></a></li>
         </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
     <?php $this->load->view($halaman); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <div class="text-center">
    <strong>Copyright &copy; <?php echo date('Y')?> Aplikasi Pengelolaan Perpustakaan SMA Negeri 1 Talun</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <!-- MODAL LOGOUT -->
  <div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Keluar Dashboard Operator</h4>
          </div>
          <div class="modal-body">
            <div class="box-body">
            Apakah anda yakin ingin keluar dari aplikasi ini ?
            </div>
      <!-- /.modal-dialog -->
          </div>
          <div class="modal-footer">
            <a class="btn btn-danger" href="<?php echo site_url('Login/logout')?>">Keluar</a>
            <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>
  <!-- END MODAL -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assets/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
  $(document).ready( function() {
  $( '#dataTables-example' ).dataTable( {
   "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
     // Bold the grade for all 'A' grade browsers
     if ( aData[4] == "A" )
     {
       $('td:eq(4)', nRow).html( '<b>A</b>' );
     }
   }
 } );
 } );
</script>
<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  </script>
  <script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

 <script>
    window.setTimeout(function() {
      $(".alert1").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
      });
    }, 3000);


    $('#id_siswa').change(function(){

      var nis = $(this).val();

      var base = '<?php echo base_url();?>';
      $.ajax({
        url : "<?php echo base_url('operator/anggota/anggota_ajax') ?>",
        method :'POST',
        dataType : 'json',
        data : {nis:nis},
        success:function(data){
          $('#nama_anggota').val(data.siswa.nama);
          $('#kelas').val(data.siswa.kelas);
          $('#tempat_lahir').val(data.siswa.tempat_lahir);
          $('#alamat').val(data.siswa.alamat);
          $('#telepon').val(data.siswa.no_telepon);
          $('#tanggal_lahir').val(data.siswa.tanggal_lahir);
          $('#keterangan').val('siswa '+data.siswa.status_siswa);
          $('#status_anggota').val(data.siswa.status_siswa);
          $('#jekel').val(data.siswa.jekel);
          $('#foto').val(data.siswa.foto);
          $('#tampil_foto').innerHTML = `<img class="profile-user-img img-responsive img-circle" src="`+base+`/assets/upload/image/thumbs/`+data.siswa.foto+`" alt="User profile picture">`;
        }
      })
    })
  </script>
</body>
</html>
