<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $bahasa->id_bahasa?>"><i class="fa fa-trash"> Hapus</i></button>

<div class="modal fade" id="modal-delete<?php echo $bahasa->id_bahasa?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus bahasa <?php echo $bahasa->nama_bahasa?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                Apakah anda yakin ingin menghapus data bahasa <strong> <?php echo $bahasa->nama_bahasa?> </strong>?
              <div class="modal-footer">
               
              </div>
        
<div class="modal-footer">
  <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
  <a class="btn btn-danger" href="<?php echo base_url('operator/bahasa/delete/'.$bahasa->id_bahasa) ?>">Hapus</a>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal --> 