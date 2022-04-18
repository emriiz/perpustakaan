<?php if(($anggota->status_anggota)=="Non Active") { ?>

<?php }else{?>
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $anggota->id_anggota?>"><i class="fa fa-trash"></i> Hapus</button>

<div class="modal fade" id="modal-delete<?php echo $anggota->id_anggota?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align: left">Hapus Data <?php echo $anggota->nama_anggota?></h4>
      </div>
      <div class="modal-body">
        <div class="box-body" style="text-align: left">
        Apakah anda yakin ingin menghapus data <strong> <?php echo $anggota->nama_anggota?> </strong>?
        </div>
      </div>
      <div class="modal-footer" style="border: 1px">
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
        <a class="btn btn-danger" href="<?php echo base_url('operator/anggota/hapus/'.$anggota->id_anggota) ?>">Hapus</a>
      </div>
<!-- /.modal --> 
    </div>
  </div>
</div>

<?php }?>