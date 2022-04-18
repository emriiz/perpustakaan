<ol class="breadcrumb">
        <li class="breadcrumb-item ">
            <a href="<?php echo base_url()?>opertor/home">Operator</a>
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo base_url()?>operator/peminjaman">Peminjaman</a>         
        </li>
        <li class="breadcrumb-item">
            <a href="<?php echo base_url()?>operator/peminjaman/tambah">Tambah</a>          
        </li>
        <li class="breadcrumb-item active">
            <?php echo $anggota->nama_anggota?>         
        </li>
    </ol>

<div class="box">
    <div class="box-header with-border">
      <div class="box-title">
        <?php echo $title?>
      </div>
      
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
    <!-- Start Form Tambah -->
    <?php if(count($limit) >= 3) { ?>

    <div class="alert alert-warning text-center">
        <i class="fa fa-warning fa-3x"></i>
        <hr>
        <h4>Limit Peminjaman Tercapai</h4>
        <p>Mohon maaf, Limit peminjaman buku atas nama <strong><?php echo $anggota->nama_anggota?></strong> telah tercapai, Buku yang dipinjam harus dikembalikan terlebih dahulu jika ingin meminjam buku kembali.</p>
    </div>

    <?php }else{ ?>
        <?php
        // Error
        echo validation_errors('<div class="alert alert-warning">','</div>');
        echo form_open(base_url('operator/peminjaman/add/'.$anggota->id_anggota));
        ?>
                      
            <div class="col-md-4">
                <div class="form-group">
                        <label>No Peminjaman</label>
                        <input type="text" name="no_peminjaman" class="form-control" placeholder="Masukkan No Peminjaman" value="<?= $no_peminjaman ?>" readonly disabled>
                </div>  
                <div class="form-group">
                    <label>Nama Peminjam</label>
                    <input type="text" name="nama_anggota" class="form-control" value="<?php echo $anggota->nama_anggota?>" readonly disabled>
                </div>
                <div class="form-group">
                    <label>Status Buku</label>
                   <select name="status_kembali" class="form-control">
                       <option value="Dipinjam">Dipinjam</option>
                       option
                   </select>
                </div>
            </div>
            <div class="col-md-8">
                 <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="id_buku" id="id_buku" class="form-control js-example-basic-single">
                        <option value="">--Pilih Buku--</option>
                        <?php foreach($buku as $buku) { ?>
                        <option value="<?php echo $buku->id_buku?>">
                            <?php echo $buku->kode_buku?> - <?php echo $buku->judul_buku?> (<?php echo $buku->stok_buku?>)
                        </option>
                        <?php } ?>  
                    </select>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="text" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="<?php if(isset($_POST['tanggal_pinjam'])) { echo set_value('tanggal_pinjam'); }else{ echo date('d-m-Y');}?>" readonly disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="text" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="<?php if(isset($_POST['tanggal_kembali'])) { echo set_value('tanggal_kembali'); }else{ echo date('d-m-Y', strtotime('+7 days'));}?>" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan Lain</label>
                    <input type="text" name="keterangan" class="form-control" value="<?php echo set_value('keterangan')?>">
                </div>
            </div>
            <div class="col-md-12" style="text-align: center">
                <button type="submit" name="submit" class="btn btn-success" >Simpan</button>
                <a href="<?php echo base_url()?>operator/peminjaman" class="btn btn-primary">Kembali</a>
            </div>
        <?php 
        echo form_close();
        ?>
    </div>
</div>
    <?php } ?>
<!-- End Breadcumb -->
<!-- End Form Tambah -->
<!-- Box -->
<?php include('list.php')?>
<!-- End Box -->

<script>
    $('#id_buku').change(function(){
        var id = $(this).val();
        // alert(id);
         console.log(id);
       $.ajax({
            url : '<?= base_url()?>operator/peminjaman/jumlah_buku',
            data : {id:id},
            method : 'post',
            dataType : 'json',
            success:function(hasil){
                var stok = JSON.stringify(hasil).stok_buku;
                console.log(hasil);
                var stok1 = stok.split(",").join('');
                if (stok1 <= 0){
                    return stok1;
                    alert('Maaf, Stok Buku Ini Sedang Kosong / Dipinjam');
                    location.reload(); 
                }
            }
       });
    });
</script>

