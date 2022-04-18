<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="<?php echo base_url()?>operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/pengembalian">Pengembalian</a>			
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/pengembalian/tambah">Tambah</a>			
	</li>
	<li class="breadcrumb-item active">
		<?php echo $peminjaman->no_peminjaman?>			
	</li>
</ol>
<!-- End Breadcumb -->
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
		<?php
		// Form Open
        // Error
        echo validation_errors('<div class="alert alert-warning">','</div>');
		echo form_open(base_url('operator/pengembalian/add/'.$peminjaman->id_peminjaman));
		?> 
			<div class="col-md-4">
                <div class="form-group">
                        <label>No Pengembalian</label>
                          <input type="text" name="no_pengembalian" class="form-control" placeholder="Masukkan No Pengembalian" value="<?= $no_pengembalian ?>" readonly disabled>
                </div>  
				<div class="form-group">
					<label>No Peminjaman</label>
					<input type="text" name="id_peminjaman" class="form-control" value="<?php echo $peminjaman->no_peminjaman?>" readonly disabled>
				</div>
               
                <div class="form-group">
                    <label>Nama Peminjam</label>
                    <?php foreach($anggota as $agt) { ?>
                        <?php if($agt->id_anggota == $peminjaman->id_anggota) { ?>
                    <input type="text" name="id_anggota" class="form-control" value="<?php echo $agt->nama_anggota?>" readonly disabled>
                <?php } ?>
                <?php } ?>
                </div>
			</div>
			<div class="col-md-8">
                 <div class="form-group">
                    <label>Judul Buku </label>
                    <?php foreach($buku as $buku ){ ?>
                        <?php if($buku->id_buku == $peminjaman->id_buku) { ?>
                    <input type="text" name="id_buku" class="form-control" value="<?php echo $buku->judul_buku?>" readonly disabled>
                    </div>
                <?php } ?>
                <?php } ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?>" readonly disabled>
                        </div>
                    </div>
    				<div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Harus Kembali</label>
                            <input type="text" name="tanggal_kembali" class="form-control" value="<?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?>" readonly disabled>
                        </div>
    				</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Dikembalikan</label>
                            <input type="text" name="tgl_dikembalikan" class="form-control" value="<?php if(isset($_POST['tgl_dikembalikan'])) { echo set_value('tgl_dikembalikan'); }else{ echo date('d-m-Y');}?>" readonly disabled>
                        </div>
                    </div>
                    <?php 
                        $booking = new datetime($peminjaman->tanggal_kembali);
                        $today   = new datetime(set_value('tgl_dikembalikan'));
                        $diff    = date_diff($booking,$today);
                        $kembali = $booking->getTimestamp();
                        $sekarang = $today->getTimestamp();

                        if($kembali<=$sekarang){
                            $telat = $diff->d;
                            $denda = 100;
                            $total = floatval($denda)*floatval($telat);
                        }else{
                            $telat="0";
                            $denda ="0";
                            $total="0";
                        }
                    ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Lama Keterlambatan (Hari)</label>
                            <input type="text" class="form-control" value="<?php echo $telat?>" name="telat" id="telat" onkeyup="sum();" readonly disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Denda per Hari</label>
                             <input required onkeypress="return isNumberKey(event)" type="text"
                                  class="form-control round-form" name="denda" id="denda" onkeyup="sum();" value="<?php echo $denda?>">
                        </div>
                    </div>
                </div>
			</div>
            <div class="col-md-12" style="text-align: center">
                <button type="submit" name="submit" class="btn btn-success" >Simpan</button>
                <a href="<?php echo base_url()?>operator/pengembalian/tambah" class="btn btn-danger">Kembali</a>
            </div>
		<?php 
		echo form_close();
		?>
	</div>
</div>
<!-- End Form Tambah -->