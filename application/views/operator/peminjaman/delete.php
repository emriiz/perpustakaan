<?php if(($peminjaman->status_kembali) == "Dipinjam") {?>
<?php }else{?>
     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $peminjaman->id_peminjaman?>"><i class="fa fa-trash"></i> Hapus</button>
  <?php }?>

<div class="modal fade" id="modal-delete<?php echo $peminjaman->id_peminjaman?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Hapus Data Buku Peminjaman</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
          Apakah anda yakin ingin menghapus data peminjaman buku <strong> <?php echo $peminjaman->judul_buku?></strong> yang dipinjam oleh <strong><?php echo $peminjaman->nama_anggota?></strong> ?
          <!-- End Box Body -->
          </div>
        <!-- End Modal Body -->
       </div>
       <div class="modal-footer">
        <a class="btn btn-danger" href="<?php echo base_url('operator/peminjaman/delete/'.$peminjaman->id_peminjaman) ?>">Hapus</a>
        <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
       </div>
        
            
      <!-- End Modal Content -->
      </div>
      <!-- End Modal Dialog -->
    </div>
    <!-- End Modal -->
</div>

