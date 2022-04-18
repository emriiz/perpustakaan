<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Library SMA Negeri 1 Talun</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar">bla</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">E-Library SMANTA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url()?>anggota/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  <br>
    
<div class="container-fluid">    
  <div class="row content">
    <div class="box">
      <div class="box-body">
        <div class="col-sm-12"> 
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                   <div class="col-xl-9 mx-auto text-center">
                    <img src="<?php echo base_url()?>assets/gambar/logo.png" style="width: 10%">
                      <h3 class="mb-5">Informasi Koleksi Buku</h3>
                      <h3 class="mb-5">Perpustakaan Sekolah SMA Negeri 1 Talun</h3>
                    </div>
                  <br>
                  <div class="text-center">
                    <?php echo form_open_multipart('anggota/find/cari');?>
                    <select name="cariberdasarkan">
                    <option value="">Cari Berdasarkan</option>
                    <option value="judul_buku">Judul Buku</option>
                    <option value="pengarang">Pengarang</option>
                    <option value="nama_penerbit">Penerbit</option>
                    <option value="letak_buku">Letak Buku</option>
                    <option value="stok_buku">Jumlah Buku</option>
                  </select>
                    <input type="text" name="yangdicari" placeholder="Masukkan Kata Kunci Sesuai Pilihan" style="width: 30%">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"> Cari</i></button>
                    <a href="<?php echo base_url()?>anggota/find" class="btn btn-success">Tampil Semua Data</a>
                    <?php form_close();?>
                  </div>
                  <br>
                    <table class="table table-bordered table-hover" id="example2">
                      <thead >
                          <tr>
                            <th>No</th>
                            <th>Cover</th>
                            <th style="text-align: center">Judul Buku</th>
                            <th style="text-align: center">Pengarang</th>
                            <th style="text-align: center">Penerbit</th>
                            <th style="text-align: center">Status Buku</th>
                            <th style="text-align: center">E-book</th>
                            <th style="text-align: center">Jumlah Buku</th>
                            <th style="text-align: center">Letak Buku</th>
                          </tr>
                      </thead>
                        <tbody>
                          <!--  -->
                          <?php $i=1; foreach($buku as $buku ) { 
                          $id_buku = $buku->id_buku;
                          $file_buku = $this->File_buku_model->buku($id_buku);
                          ?> 
                          <!--  -->
                          <tr class="odd gradex">
                            <td><?php echo $i?></td>
                            <td>
                                <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60">
                            </td>
                            <td><?php echo $buku->judul_buku?></td>
                            <td><?php echo $buku->pengarang ?></td>
                            <td><?php echo $buku->nama_penerbit ?></td>
                            <td style="text-align: center">
                              <?php if(($buku->stok_buku) >= 1) {?>
                              <?php (($buku->status_buku)=="Tersedia")  ?>
                              <span class="label label-success label-success-lg"><?php echo $buku->status_buku?></span>
                              <?php }else if(($buku->stok_buku) == 0){ ?>
                              <?php (($buku->status_buku)=="Tidak Tersedia") ?>
                              <span class="label label-danger label-danger-lg"><?php echo $buku->status_buku?></span>
                              <?php }?> 
                            </td>
                            <td style="text-align: center"> 
                              <?php if(count($file_buku) >= 1 ){?>
                              <span class="label label-success label-success-lg"><?php echo 'Ada' ?></span>
                              <?php }else{ ?>
                               <span class="label label-danger label-danger-lg"><?php echo 'Tidak Ada' ?></span></span>
                              <?php }?>
                            </td>
                            <td style="text-align: center"><?php echo $buku->stok_buku?></td>
                            <td style="text-align: center"><?php echo $buku->letak_buku?> </td>            
                          </tr>
                          <?php $i++;} ?>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>      
<br>
<br>
<br>
<br>
<br>
<footer class="container-fluid text-center responsive">
  <strong>Copyright &copy; <?php echo date('Y')?> Aplikasi Pengelolaan Perpustakaan SMA Negeri 1 Talun</strong> All rights
    reserved.
</footer>

</body>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</html>
