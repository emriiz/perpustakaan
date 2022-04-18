<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="http://localhost/perpustakaan/operator/home">Operator</a>
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>

<div class="box">
	<!-- Header -->
	<div class="box-header">
		<p class="box-title"><a href="<?php echo base_url('operator/buku/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Data</a></p>
	</div>
	<!-- End Header -->
	<!-- Body -->
	<div class="box-body">
		<?php 
		//Notifikasi
		if ($this->session->flashdata('sukses')) {
			echo '<div class="alert alert-success bg-transparent" role="alert"><i class="fa fa-check"></i> ' ;
			echo $this->session->flashdata('sukses');
			echo '</div>';
		}
		?>
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>Cover</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Status Buku</th>
					<th>File E-Book</th>
					<th width="18%">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($buku as $buku ) { 
					$id_buku = $buku->id_buku;
					$file_buku = $this->File_buku_model->buku($id_buku);
				 ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="60">
					</td>
					<td><?php echo $buku->judul_buku?></td>
					<td><?php echo $buku->pengarang ?></td>
					<td>
						<?php if(($buku->status_buku)=="Tersedia") { ?>
							<span class="label label-success label-success-lg"><?php echo $buku->status_buku?></span>
						<?php }else if(($buku->status_buku)=="Tidak Tersedia") { ?>
							<span class="label label-warning label-warning-lg"><?php echo $buku->status_buku?></span>
						<?php }else{?>
							<span class="label label-danger label-danger-lg"><?php echo $buku->status_buku?></span>
						<?php }?>	
					</td>
					<td>
						<?php if((count($file_buku)) == 1 ) { ?>
							<span class="label label-success label-success-lg">Ada</span>
						<?php }else{?>
							<span class="label label-danger label-danger-lg">Tidak Ada</span>
						<?php }?>
					<td>

						<a href="<?php echo base_url('operator/file_buku/kelola/'. $buku->id_buku)?>" class="btn btn-warning btn-warning-xs" title="Kelola Buku"><i class="fa fa-book"></i></a>

						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default<?php echo $buku->id_buku?>" title="Detail Buku"><i class="fa fa-eye"></i></button>

						<a href="<?php echo base_url('operator/buku/edit/'.$buku->id_buku) ?>" class="btn btn-primary btn-outline-primary-xs" title="Edit"><i class="fa fa-pencil-square-o"></i></a>	
					
					<?php include('delete.php');?>
				</td>
				</tr>
				<!-- Modal Profile -->
				<div class="modal fade" id="modal-default<?php echo $buku->id_buku?>">
				          <div class="modal-dialog">
				            <div class="modal-content">
				              <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                  <span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title" style="text-align: center"><strong> Detail Buku : <?php echo $buku->judul_buku?> </strong></h4>
				              </div>
				              <div class="modal-body">
				                <div class="box-body" style="background-color: silver">
    
							  <div class="col-md-6">
							      <div class="form-group">
							       <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $buku->cover_buku; ?>" width="200" style="align-content: center">
							      </div>
							       <div class="form-group">
							        <label>Jumlah Buku</label>
							          <p><?php echo $buku->stok_buku ?>
							      </div>
							       <div class="form-group">
							        <label>Status Buku</label>
							         <p>
							         	<?php if(($buku->status_buku)=="Tersedia") { ?>
										<span class="label label-success label-success-lg"><?php echo $buku->status_buku?></span>
										<?php }else if(($buku->status_buku)=="Tidak Tersedia") { ?>
											<span class="label label-warning label-warning-lg"><?php echo $buku->status_buku?></span>
										<?php }else{?>
											<span class="label label-danger label-danger-lg"><?php echo $buku->status_buku?></span>
										<?php }?>		
									</p>
							      </div>
							      <div class="form-group">
							        <label>Keterangan</label>
							       		<p><?php echo $buku->keterangan ?></p>
							      </div>
							       <div class="form-group">
							        <label>Letak Buku</label>
							          <p><?php echo $buku->letak_buku ?>
							      </div>
							       <div class="form-group">
							        <label>Ringkasan</label>
							       		<p><?php echo $buku->ringkasan ?></p>
							      </div>
							    </div>
							    <div class="col-md-6">
							      <div class="form-group">
							        <label>Judul Buku</label>
							       		<p><?php echo $buku->judul_buku ?>
							      </div>
							      <div class="form-group">
							        <label>Pengarang</label>
							       		<p><?php echo $buku->pengarang ?>
							      </div>
							      <div class="form-group">
							        <label>Penerbit</label>
							       		<p><?php echo $buku->nama_penerbit ?>
							      </div>
							      <div class="form-group">
							        <label>Tahun Terbit</label>
							       		<p><?php echo $buku->tahun_terbit?>
							      </div>
							      <div class="form-group">
							        <label>Kategori</label>
							       		<p><?php echo $buku->nama_kategori?></p>
							      </div>
							      <div class="form-group">
							        <label>No ISBN</label>
							       		<p><?php echo $buku->isbn ?></p>
							      </div>
							      <div class="form-group">
							        <label>Harga Buku</label>
							       		<p>Rp. <?php echo $buku->harga ?></p>
							      </div>
							      
							    </div>
							  </div>
							 </div>
							        
							<div class="modal-footer" style="text-align: center">
							  <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
							</div>
							<!-- /.modal-content -->
							</div>
							<!-- /.modal-dialog -->
							</div>
						</div>
							<!-- /.modal --> 
				<!-- ENd Modal Profile -->
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>

 
 




