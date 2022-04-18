
<div class="row">
   <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h1 class="box-title text-primary"><b><?php echo $title?></b></h1>
        </div>
        <div class="box-body">
           <form action="<?php echo base_url();?>operator/buku/cetak" method="POST" target="_blank">
            <div class="col-md-7">
              <div class="form-group">
                <div class="row">
                  <label class="col-md-2">Status Buku</label>
                  <div class="col-md-4">
                     <select name="status_buku" id="status_buku" class="form-control">
                        <option value="">---Pilih Status Buku---</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                        <option value="Hilang">Hilang</option>
                        <option value="Semua">Semua Status</option>
                      </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="form-group">
                <label>Tanggal Awal</label>
                <input type="date" name="tanggal_awal" class="form-control" placeholder="Tanggal Awal" value="<?php echo set_value('tanggal_awal')?>" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir" value="<?php echo set_value('tanggal_akhir')?>" required>
              </div>
            </div>
           
        </div>
        <div class="box-footer" style="text-align: center">
          <input type="submit" name="submit" class="btn btn-success btn-success" value="Cetak">
          <input type="reset" name="reset" class="btn btn-danger btn-danger" value="Reset">
        </div>
      </div>
 </form>
   </div>

</div>
