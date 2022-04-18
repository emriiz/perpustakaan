<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item">
		<a href="<?php echo base_url()?>operator/peminjaman" ><?php echo $title?></a>			
	</li>
	<li class="breadcrumb-item" active>
		Tambah			
	</li>
</ol>


<div class="alert alert-success alert-dismissible">
	<i class="fa fa-check"> Cari Nama Anggota di kolom <strong> Search</strong>, kemudian klik tombol <strong>Pilih</strong></i>
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
					<th>Foto</th>
					<th>No Anggota</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Status</th>
					<th width="15%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($anggota as $anggota ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $anggota->foto; ?>" width="60">
					</td>
					<td><?php echo $anggota->no_anggota?></td>
					<td><?php echo $anggota->nama_anggota ?></td>
					<td><?php echo $anggota->kelas ?></td>
					<td>
						<?php if(($anggota->status_anggota)=="Active") { ?>
							<span class="label label-success label-success-lg"><?php echo $anggota->status_anggota?></span>
						<?php }else if(($anggota->status_anggota)=="Non Active") { ?>
							<span class="label label-danger label-danger-lg"><?php echo $anggota->status_anggota?></span>
						<?php }?>	
					</td>
					<td style="text-align: center">
						<?php if(($anggota->status_anggota)=="Active") { ?>
							<a href="<?php echo base_url('operator/peminjaman/add/'.$anggota->id_anggota) ?>" class="btn btn-primary btn-primary-lg">Pilih</a>
						<?php }else{ ?>
						<?php }?>
				</td>
				</tr>
				<!-- ENd Modal Profile -->
				<?php $i++;} ?>
			</tbody>
</table>
	</div>
	
</div>

