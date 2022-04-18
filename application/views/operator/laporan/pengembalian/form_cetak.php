
<div class="row">
   <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h1 class="box-title text-primary"><b><?php echo $title?></b></h1>
        </div>
        <div class="box-body">
           <form action="<?php echo base_url();?>operator/pengembalian/cetak" method="POST" target="_blank">
            <div class="col-md-6"> 
              <div class="form-group">
                <label>Tanggal Awal</label>
                <input type="date" name="tanggal_awal" class="form-control" placeholder="Tanggal Awal"  required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" placeholder="Tanggal Akhir"  required>
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
