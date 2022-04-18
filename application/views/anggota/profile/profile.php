 <?php
$id_anggota = $this->session->userdata('id_anggota');
$user_aktif = $this->Anggota_model->detail($id_anggota);

?>
<ol class="breadcrumb">
  <li class="breadcrumb-item ">
    <a href="<?php echo base_url()?>anggota/home">Anggota</a>
  </li>
  <li class="breadcrumb-item">
     <a href="<?php echo base_url()?>anggota/home/profile" >Profile </a>    
  </li>
  <li class="breadcrumb-item">
   <?php echo $title?>   
  </li>
  
</ol>
<div class="row">
  <div class="col-md-12">
  <div class="col-md-3">
   <div class="box box-primary" >
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $user_aktif->foto; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $user_aktif->nama_anggota?></h3>

        <p class="text-muted text-center"><?php echo $user_aktif->no_anggota?></p>

        <div class="col-md-12">
        
        <div class="form-group">
           <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default" style="width: 100%">
          Edit Profile
        </button>
        </div>
        <div class="form-group">
          <?php include('password.php')?>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
</div>
</div>

 <div class="col-md-9">
   <div class="box box-primary">
     <?php 
        //Notifikasi
        if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-success bg-transparent"><i class="fa fa-check"></i> ' ;
          echo $this->session->flashdata('sukses');
          echo '</div>';
        }
        ?>
      <div class="box-body box-profile">
  
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>No Anggota</b><b style="margin-left: 100px">:</b>  <a class="pull-center" style="margin-left: 100px"><strong><?php echo $user_aktif->no_anggota?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Nama</b> <b style="margin-left: 131px">:</b> <a class="pull-center" style="margin-left: 101px"><strong><?php echo $user_aktif->nama_anggota?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Kelas</b> <b style="margin-left: 133px">:</b> <a class="pull-center" style="margin-left: 102px"><strong><?php echo $user_aktif->kelas?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Tempat, Tanggal Lahir</b> <b style="margin-left: 30px">:</b> <a class="pull-center" style="margin-left: 100px"><strong><?php echo $user_aktif->tempat_lahir?>, <?php echo date_format(new DateTime($user_aktif->tanggal_lahir), 'd F Y') ?></strong></a>
          </li> 
          <li class="list-group-item">
            <b>Alamat</b> <b style="margin-left: 123px">:</b> <a class="pull-center" style="margin-left: 99px"><strong><?php echo $user_aktif->alamat?></strong></a>
          </li>
          <li class="list-group-item">
            <b>No Telepon</b> <b style="margin-left: 98px">:</b> <a class="pull-center" style="margin-left: 100px"><strong><?php echo $user_aktif->telepon?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Status Anggota</b> <b style="margin-left: 75px">:</b> <a class="pull-center" style="margin-left: 100px"><strong><?php echo $user_aktif->status_anggota?></strong></a>
          </li>
        </ul>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
   </div>
 </div>
</div>


  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center">Edit Profile <?php echo $user_aktif->nama_anggota?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                <!-- Notifikasi kalau ada input error -->
                <?php 
                echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
                echo form_open_multipart(base_url('anggota/home/profile'));
                ?>
                <!-- End Notofikasi -->
              <div class="col-md-6">
                  <div class="form-group">
                    <label>No Anggota</label>
                    <input type="text" name="no_anggota" class="form-control" value="<?php echo $anggota->no_anggota ?>" readonly disabled>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_anggota" class="form-control" value="<?php echo $anggota->nama_anggota ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?php echo $anggota->kelas ?>">
                  </div>
                  <div class="form-group">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" value="<?php echo $anggota->nis ?>" readonly disabled>
                  </div>
                   <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control" value="<?php echo $anggota->foto ?>">
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $anggota->tempat_lahir ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $anggota->tanggal_lahir ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat Rumah</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $anggota->alamat ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <input type="text" name="jekel" class="form-control" value="<?php echo $anggota->jekel ?>" readonly disabled>
                  </div>
                  <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="telepon" class="form-control" value="<?php echo $anggota->telepon ?>" required>
                  </div>
                </div>
                  
                 <div class="modal-footer" style="text-align: center">
                    <input type="submit" name="submit" class="btn btn-primary btn-primary" value="Simpan">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                  </div>
                
           <?php echo form_close(); ?> 
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.modal --> 
                
