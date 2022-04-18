<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $kategori->id_kategori?>"><i class="fa fa-trash"> Hapus</i></button>

<div class="modal fade" id="modal-delete<?php echo $kategori->id_kategori?>">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus kategori <?php echo $kategori->nama_kategori?></h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            Apakah anda yakin ingin menghapus data kategori <strong> <?php echo $kategori->nama_kategori?> </strong>?        
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
              <a class="btn btn-danger" href="<?php echo base_url('operator/kategori/delete/'.$kategori->id_kategori) ?>">Hapus</a>
            </div>
          </div>
      </div>
      </div>
  </div>
</div>

