 <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_pengunjung; ?></h3>

              <p>Jumlah Pengunjung</p>
            </div>
            <div class="icon">
              <i class="fa fa-child"></i>
            </div>
            <a href="<?php echo base_url() ?>pengunjung/home" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $total_buku; ?></sup></h3>

              <p>Jumlah Buku</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_anggota ?></h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $total_peminjaman?></h3>

              <p>Jumlah Buku yang di pinjam</p>
            </div>
            <div class="icon">
              <i class="fa fa-bookmark-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->          
       <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="box box-primary">
            <div class="box-header with-border">
             

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="form-group" style="text-align: center">
               <img src="<?php echo base_url()?>assets/gambar/logo.png" width="200" >
              </div>
              <div class="form-text">
                <h1 style="text-align: center">Selamat Datang Admin</h1>
                <h1 style="text-align: center">di Aplikas Pengelolaan Perpustakaan</h1>
                <h1 style="text-align: center">SMA Negeri 1 Talun </h1>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </section>
        <!-- /.Left col -->
      </div>
      <!--   <section class="col-lg-12">
        
      
   