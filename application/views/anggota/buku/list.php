<ol class="breadcrumb">
  <li class="breadcrumb-item ">
    <a href="<?php echo base_url()?>anggota/home">Anggota</a>
  </li>
  <li class="breadcrumb-item">
     <a href="<?php echo base_url()?>anggota/buku">Daftar Buku</a>    
  </li>
</ol>

<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-body">
				<table class="table table-bordered table-hover table-striped" id="dataTables-example">
					<thead >
						<tr>
							<th>No</th>
							<th>Cover</th>
							<th>Judul Buku</th>
							<th>Pengarang</th>
							<th>Status Buku</th>
							<th>E-book</th>
							<th>Aksi</th>
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
								<?php if(($buku->stok_buku) >= 1) {?>
									<?php (($buku->status_buku)=="Tersedia")  ?>
									<span class="label label-success label-success-lg"><?php echo $buku->status_buku?></span>
								<?php }else if(($buku->stok_buku) == 0){ ?>
									<?php (($buku->status_buku)=="Tidak Tersedia") ?>
									<span class="label label-danger label-danger-lg"><?php echo $buku->status_buku?></span>
								<?php }?>	
							</td>
							<td style="text-align: center"> <?php if(count($file_buku) >= 1 ){?>
								<span class="label label-success label-success-lg"><?php echo 'Ada' ?></span>
							<?php }else{ ?>
								<span class="label label-danger label-danger-lg"><?php echo 'Tidak Ada' ?></span>
							<?php }?>
							</td>
							<td> 
								<?php include('detail.php')?>
							</td>
						
						</tr>
						<?php $i++;} ?>
					</tbody>
		</table>
			</div>
			<!-- End Box Body -->
		</div>
		<!-- End Box -->
	</div>
</div>


		