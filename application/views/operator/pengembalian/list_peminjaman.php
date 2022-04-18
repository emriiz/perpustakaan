<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/pengembalian" >Pengembalian Buku</a>			
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/pengembalian" ><?php echo $title?></a>			
	</li>
	<li class="breadcrumb-item" active>
		Tambah			
	</li>
</ol>


<div class="alert alert-success alert-dismissible">
	<i class="fa fa-check"> Cari Nama Peminjam di kolom <strong> Search</strong>, kemudian klik tombol <strong>Pilih</strong></i>
</div>
<div class="box">
	<div class="box-header with-border">
      <div class="box-title">
      	<?php echo $title?>
      </div>
    </div>
	<div class="box-body">
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>No Peminjaman</th>
					<th>Nama Anggota</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Status</th>
					<th width="15%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($peminjaman as $peminjaman ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td><?php echo $peminjaman->no_peminjaman?></td>
					<td><?php echo $peminjaman->nama_anggota?></td>
					<td><?php echo $peminjaman->judul_buku ?></td>
					<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
					<td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
					<td>
						<?php if(($peminjaman->status_kembali)=="Dipinjam") { ?>
							<span class="label label-warning label-warning-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Dikembalikan") { ?>
							<span class="label label-success label-success-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Diperpanjang") { ?>
							<span class="label label-primary label-primary-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }else if(($peminjaman->status_kembali)=="Hilang") { ?>
							<span class="label label-danger label-danger-lg"><?php echo $peminjaman->status_kembali?></span>
						<?php }?>	
					</td>
					<td style="text-align: center">
						<?php if(($peminjaman->status_kembali)=="Dikembalikan") { ?>
						<?php }else{ ?>
							<a href="<?php echo base_url('operator/pengembalian/add/'.$peminjaman->id_peminjaman) ?>" class="btn btn-primary btn-primary-lg">Pilih</a>	
						<?php }?>
					
					<!-- <?php include('delete1.php');?> -->
				</td>
				</tr>
				<!-- ENd Modal Profile -->
				<?php $i++;} ?>
			</tbody>
</table>
	</div>
	
</div>

