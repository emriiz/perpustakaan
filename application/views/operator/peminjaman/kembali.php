<?php if(($peminjaman->status_kembali) == "Dikembalikan") { ?>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-kembali<?php echo $peminjaman->id_peminjaman?>" disabled readonly><i class="fa fa-reply"></i> Kembali</button>
<?php }else{ ?>  

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-kembali<?php echo $peminjaman->id_peminjaman?>"><i class="fa fa-reply"></i> Kembali</button>

<div class="modal fade" id="modal-kembali<?php echo $peminjaman->id_peminjaman?>">
    <div class="modal-dialog">
      <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
              <div class="box-body" style="background-color: #6bcf91">
              <p><i class="fa fa-check"><strong>Yakin buku ini dikembalikan?</strong></p></i>
           
          </div>
        </div>
              <div class="modal-footer" style="text-align: center">
                <a href="<?php echo base_url('operator/peminjaman/kembali/'.$peminjaman->id_peminjaman) ?>" class="btn btn-success">
                <i class="fa fa-reply"></i> Kembalikan Buku</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
              </div>
            
      <!-- End Modal Content -->
      </div>
      <!-- End Modal Dialog -->
    </div>
    <!-- End Modal -->
</div>
<?php } ?>

