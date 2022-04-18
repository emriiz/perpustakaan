<?php if(($buku->status_buku) == "Hilang") {?>

<?php }else{ ?>  
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete<?php echo $buku->id_buku?>"><i class="fa fa-trash"></i></button>

<div class="modal fade" id="modal-delete<?php echo $buku->id_buku?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Hapus buku <?php echo $buku->judul_buku?></h4>
              </div>
              <div class="modal-body">
                <div class="box-body">
                Apakah anda yakin ingin menghapus data buku <strong> <?php echo $buku->judul_buku?> </strong>?
              <div class="modal-footer">
               
              </div>
        
<div class="modal-footer">
  <button type="button" class="btn btn-info" data-dismiss="modal">Kembali</button>
  <a class="btn btn-danger" href="<?php echo base_url('operator/buku/hapus/'.$buku->id_buku) ?>">Hapus</a>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
<?php }?>