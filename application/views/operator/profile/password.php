<div class="form-group" >
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-password" style="width: 100%">
                Ubah Password
              </button>
              </div>
<div class="modal fade" id="modal-password">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" style="text-align: center">Ubah Password</h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                <!-- Notifikasi kalau ada input error -->
                <?php 
               
                echo form_open(base_url('operator/home/password'));
                ?>
                <!-- End Notofikasi -->
              
                  <div class="form-group">
                    <label>Password Lama</label>
                    <input type="text" name="pass_lama" id="pass_lama" class="form-control" placeholder="Masukkan Password Lama" value="<?php echo set_value('pass_lama')?>" required>
                  </div>
               
                  <div class="form-group">
                    <label>Password Baru</label>
                    <input type="text" name="new_password" id="new_password" class="form-control" placeholder="Masukkan Password Baru" value="<?php echo set_value('new_password') ?>" >
                  </div>

                   <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="text" name="conf_pass" id="conf_pass" class="form-control" placeholder="Ketik Ulang Password Baru" value="<?php echo set_value('conf_pass') ?>" >
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