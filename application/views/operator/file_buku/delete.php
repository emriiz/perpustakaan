<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $file_buku->id_file?>"><i class="fa fa-trash"></i> Hapus</button>

<div class="modal fade" id="modal-delete<?php echo $file_buku->id_file?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus File <?php echo $file_buku->judul_file?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                Apakah anda yakin ingin menghapus data file <strong> <?php echo $file_buku->judul_file?> </strong>?
              <div class="modal-footer">
               
              </div>
        
<div class="modal-footer">
  <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
  <a class="btn btn-danger" href="<?php echo base_url('operator/file_buku/delete/'.$file_buku->id_file.'/'.$file_buku->id_buku) ?>">Hapus</a>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal --> 