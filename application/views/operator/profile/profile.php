 <?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>
<ol class="breadcrumb">
  <li class="breadcrumb-item ">
    <a href="<?php echo base_url()?>operator/home">Operator</a>
  </li>
  <li class="breadcrumb-item">
     <a href="<?php echo base_url()?>operator/home/profile" >Profile </a>    
  </li>
  <li class="breadcrumb-item">
   <?php echo $title?>   
  </li>
  
</ol>

<div class="col-md-12">
  <div class="col-md-3">
   <div class="box box-primary" >
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $user_aktif->foto; ?>" alt="User profile picture">

        <h3 class="profile-username text-center"><?php echo $user_aktif->nama?></h3>

        <p class="text-muted text-center">Petugas Perpustakaan</p>

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
       echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
        if ($this->session->flashdata('sukses')) {
          echo '<div class="alert alert-success bg-transparent"><i class="fa fa-check"></i> ' ;
          echo $this->session->flashdata('sukses');
          echo '</div>';
        } else if($this->session->flashdata('error')){
           echo '<div class="alert alert-danger bg-transparent"><i class="fa fa-close"></i> ' ;
          echo $this->session->flashdata('error');
          echo '</div>';
        }
        ?>
      <div class="box-body box-profile">
  
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>NIP</b> <a class="pull-right"><strong><?php echo $user_aktif->nip?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Nama</b> <a class="pull-right"><strong><?php echo $user_aktif->nama?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Username</b> <a class="pull-right"><strong><?php echo $user_aktif->username?></strong></a>
          </li>
           <li class="list-group-item">
            <b>Tanggal buat</b> <a class="pull-right"><strong><?php echo date('d F Y',strtotime($user_aktif->tanggal))?></strong></a>
          </li>
        </ul>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
   </div>
 </div>

  <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center">Edit Profile <?php echo $user_aktif->nama?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                <!-- Notifikasi kalau ada input error -->
                <?php 
                echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i>', '</div>');
                echo form_open_multipart(base_url('operator/home/profile'));
                ?>
                <!-- End Notofikasi -->
              <div class="col-md-6">
                  <div class="form-group">
                    <label>NIP</label>
                    <input type="text" name="nip" class="form-control" placeholder="NIP" value="<?php echo $user->nip ?>" required>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $user->nama ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" readonly disabled>
                  </div>
                   <div class="form-group">
                    <label>Upload Foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="" value="<?php echo set_value('foto') ?>" >
                  </div>
                </div>
              </div>
             </div>
                    
            <div class="modal-footer" style="text-align: center">
              <input type="submit" name="submit" class="btn btn-primary btn-primary" value="Simpan">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
            </div>
            <!-- /.modal --> 
            <?php echo form_close(); ?>     
