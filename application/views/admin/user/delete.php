<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $user->id_user?>"><i class="fa fa-trash"></i> Hapus</button>

<div class="modal fade" id="modal-delete<?php echo $user->id_user?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus <?php echo $user->nama?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                Apakah anda yakin ingin menghapus data <strong> <?php echo $user->nama?> </strong>?
              <div class="modal-footer">
               
              </div>
        
<div class="modal-footer">
  <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
  <a class="btn btn-danger" href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>">Hapus</a>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal --> 