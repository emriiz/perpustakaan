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
		<p class="box-title"><a href="<?php echo base_url('operator/siswa/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Data</a></p>
		<p class="box-title"><a href="<?php echo base_url('operator/siswa/import') ?>" class="btn btn-primary">
		<i class="fa fa-plus"></i> Import Data</a></p>
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
					<th>Foto</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Status</th>
					<th width="27%" style="text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($siswa as $siswa ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td>
						<img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $siswa->foto; ?>" width="60">
					</td>
					<td><?php echo $siswa->nis?></td>
					<td><?php echo $siswa->nama ?></td>
					<td><?php echo $siswa->kelas ?></td>
					<td>
						<?php if(($siswa->status_siswa)=="Aktif") { ?>
							<span class="label label-success label-success-lg"><?php echo $siswa->status_siswa?></span>
						<?php }else if(($siswa->status_siswa)=="Tidak aktif") { ?>
							<span class="label label-danger label-danger-lg"><?php echo $siswa->status_siswa?></span>
						<?php }?>	
					</td>
					<td style="text-align: center">
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default<?php echo $siswa->id_siswa?>"><i class="fa fa-eye"></i> Detail</button>

					<a href="<?php echo base_url('operator/siswa/edit/'.$siswa->id_siswa) ?>" class="btn btn-primary btn-outline-primary-xs"><i class="fa fa-pencil-square-o"></i> Edit</a>	
					
					<?php include('delete.php');?>
				</td>
				</tr>
				<!-- Modal Profile -->
						<div class="modal fade" id="modal-default<?php echo $siswa->id_siswa?>">
				          <div class="modal-dialog">
				            <div class="modal-content">
				              <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                  <span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><strong><i class="fa fa-user"> Detail <?php echo $siswa->nama?> </i></strong></h4>
				              </div>
				              <div class="modal-body">
				                <div class="box-body">
    
							  <div class="col-md-6">
							      <div class="form-group">
							       <img src="<?php echo base_url();?>assets/upload/image/thumbs/<?php echo $siswa->foto; ?>" width="200" style="align-content: center">
							      </div>
							       <div class="form-group">
							        <label>NIS</label>
							       		<p><?php echo $siswa->nis ?></p>
							      </div>
							       <div class="form-group">
							        <label>Status Siswa</label>
							          <p> <?php if(($siswa->status_siswa)=="Aktif") { ?>
											<span class="label label-success label-success-lg"><?php echo $siswa->status_siswa?></span>
										  <?php }else if(($siswa->status_siswa)=="Tidak Aktif") { ?>
											<span class="label label-danger label-danger-lg"><?php echo $siswa->status_siswa?></span>
										  <?php }?>	</p>
							      </div>
							    </div>
							    <div class="col-md-6">
							      <div class="form-group">
							        <label>No Anggota</label>
							       		<p><?php echo $siswa->nis ?>
							      </div>
							      <div class="form-group">
							        <label>Nama</label>
							       		<p><?php echo $siswa->nama ?></p>
							      </div>
							       <div class="form-group">
							        <label>Kelas</label>
							       		<p><?php echo $siswa->kelas ?></p>
							      </div>
							      <div class="form-group">
							        <label>Tempat, Tanggal Lahir</label>
							       		<p><?php echo $siswa->tempat_lahir ?>, <?php echo date_format(new DateTime($siswa->tanggal_lahir), 'd F Y') ?></p>
							      </div>
							      <div class="form-group">
							        <label>Jenis Kelamin</label>
							       		<p><?php echo $siswa->jekel ?></p>
							      </div>
							      <div class="form-group">
							        <label>No Telepon</label>
							       		<p><?php echo $siswa->no_telepon ?></p>
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
							<!-- /.modal --> 
						</div>
				<!-- ENd Modal Profile -->
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>



 
 




