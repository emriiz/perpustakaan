<?php
$id_anggota = $this->session->userdata('id_anggota');
$user_aktif = $this->Anggota_model->detail($id_anggota);
?>

 <!-- Small boxes (Stat box) -->
     
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="col-md-8">
            <div class="box box-primary">
            <div class="box-header with-border">
              <p><marquee behavior="scroll" direction="left" scrollamount="15" bgcolor="#74a8fc"></p>
                <h1 style="color: white;"><strong>Perpustakaan SMA Negeri 1 Talun Siap Melayani</strong></h1>
              <p></marquee></p>
            </div>

            <div class="box-body">
              <div class="form-group" style="text-align: center">
                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"><strong>
                  "Menuntut ilmu adalah Taqwa,<br>
                  "Menyampaikan ilmu adalah Ibadah,<br>
                   "Mengulang-ngulang ilmu adalah Dzikir,<br>
                   "Mencari ilmu adalah Jihad,<br>
                    -IMAM AL GHAZALI-
                </p></strong>
                <br>
              <img src="<?php echo base_url()?>assets/gambar/logo.png" width="200" >
              </div>
              <div class="form-text">
                <h1 style="text-align: center">Selamat Datang <?php echo $user_aktif->nama_anggota?></h1>
                <h1 style="text-align: center">di E-Library SMA Negeri 1 Talun </h1>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.nav-tabs-custom -->
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
            <div class="box-header with-border">
               <p><strong>Informasi Buku Terbaru</strong></p>
            </div>
            <div class="box-body">
            <?php $a=1; foreach($buku as $buku) {?>
              <div class="row">
                <div class="col-md-4">
                  <img class="img-thumbnail img-rounded" src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>">
                </div>
                <div class="col-md-8">
                  <h4 style="font-size: 16px; font-weight: bold; margin: 0; "><a href="#"><?php echo $buku->judul_buku?></a></h4>
                  <br>
                  <p><?php echo $buku->nama ?> | <?php echo date('d F Y',strtotime($buku->tanggal_entri))?></p>
                  <br>
               <?php include('detail.php')?>
                </div>
                <div class="clearfix">
                </div>
                <hr class="blue-line mx-auto">
              </div>
              
              <?php $a++; }?>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          
        </section>
      </div>
      
      <!-- /.row (main row) -->