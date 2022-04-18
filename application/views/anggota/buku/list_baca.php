<ol class="breadcrumb">
  <li class="breadcrumb-item ">
    <a href="<?php echo base_url()?>anggota/home">Anggota</a>
  </li>
  <li class="breadcrumb-item">
     <a href="<?php echo base_url()?>anggota/buku">E-book </a>    
  </li>
</ol>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<!-- <div class="box-header">
				
			</div> -->
			<div class="box-body">
				

				<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>Cover Buku</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th>Tahun Terbit</th>
					<th width="10%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($file_buku as $file_buku ) { 
					$id_buku = $file_buku->id_buku;
					$buku = $this->Buku_model->detail($id_buku);
				 ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60">
					</td>
					<td><?php echo $file_buku->judul_buku?></td>
					<td><?php echo $buku->pengarang?></td>
					<td>
						<?php echo $buku->nama ?></td>
					<td><?php echo $buku->tahun_terbit ?></td>
					<td style="text-align: center">
						<a href="<?php echo base_url('anggota/read/baca/'.$file_buku->id_file) ?>" class="btn btn-warning btn-outline-warning-xs"><i class="fa fa-eye"></i> Baca</a>
					</td>
				</tr>
				<?php $i++;} ?>
			</tbody>
		</table>
			</div>
		</div>
	</div>
</div>
