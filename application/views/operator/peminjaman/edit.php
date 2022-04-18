<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="<?php echo base_url()?>opertor/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/peminjaman">Peminjaman</a>			
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/peminjaman/">Edit</a>			
	</li>
	<li class="breadcrumb-item active">
		<?php echo $anggota->nama_anggota?>			
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
		echo form_open(base_url('operator/peminjaman/edit/'.$peminjaman->id_peminjaman));
		?>           
			<div class="col-md-4">
                <div class="form-group">
                        <label>No Peminjaman</label>
                        <input type="text" name="no_peminjaman" class="form-control" placeholder="Masukkan No Peminjaman" value="<?= $peminjaman->no_peminjaman ?>" readonly disabled>
                </div>
				<div class="form-group">
					<label>Nama Peminjam</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $anggota->no_anggota?> - <?php echo $anggota->nama_anggota?>" readonly disabled>
				</div>
                <div class="form-group">
                    <label>Status Buku</label>
                   <select name="status_kembali" class="form-control">
                        <option value="Diperpanjang">Diperpanjang</option>
                        <option value="Hilang">Hilang</option>
                   </select>
                </div>
			</div>
			<div class="col-md-8">
                 <div class="form-group">
                        <label>Judul Buku</label>
                        <select name="id_buku" class="form-control js-example-basic-single">
                            <option value="">--Pilih Buku--</option>
                            <?php foreach($buku as $buku) { ?>
                            <option value="<?php echo $buku->id_buku?>" <?php if($buku->id_buku==$peminjaman->id_buku){ echo "selected"; } ?>>
                                <?php echo $buku->kode_buku?> - <?php echo $buku->judul_buku?>
                            </option>}
                            <?php } ?>  
                        </select>
                    </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo date('d-m-y',strtotime($peminjaman->tanggal_pinjam))?>" readonly disabled>
                        </div>
                    </div>
    				<div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" value="<?php echo $peminjaman->tanggal_kembali?>" >
                        </div>
    				</div>
                </div>
                <div class="form-group">
                    <label>Keterangan Lain</label>
                    <input type="text" name="keterangan" class="form-control" value="<?php echo set_value('keteragan')?>">
                </div>
			</div>
            <div class="col-md-12" style="text-align: center">
                <button type="submit" name="submit" class="btn btn-success" >Simpan</button>
                <a href="<?php echo base_url()?>operator/peminjaman" class="btn btn-danger">Kembali</a>
            </div>
		<?php 
		echo form_close();
		?>
	</div>
</div>