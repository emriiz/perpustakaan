<ol class="breadcrumb">
	<li class="breadcrumb-item ">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">
		<?php echo $title ?>			
	</li>
</ol>

<div class="box">
	<!-- End Header -->
	<!-- Body -->
	<div class="box-body">
		<table class="table table-bordered table-hover table-striped" id="dataTables-example">
			<thead >
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<!--  -->
				<?php $i=1; foreach($pengunjung as $pengunjung ) { ?> 
				<!--  -->
				<tr class="odd gradex">
					<td><?php echo $i?></td>
					<td><?php echo $pengunjung->tanggal?></td>
					<td><?php echo $pengunjung->nama_pengunjung ?></td>
					<td><?php echo $pengunjung->kelas ?></td>
					<td><?php echo $pengunjung->keterangan?></td>
				<?php $i++;} ?>
			</tbody>
		</table>
	</div>
	<!-- End Body -->
</div>