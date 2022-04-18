<?php
$id_user = $this->session->userdata('id_user');
$user_aktif = $this->User_model->detail($id_user);
?>

<!DOCTYPE html>
<html><head>
	<title>Cetak Laporan</title>
	<style>
		table, th, td {
 			 border: 1px solid black;
  			border-collapse: collapse;
		}
		table{
			width: 100%;
		}
		th, td {
		  padding: 5px;
		  text-align: center;
		}
		body{
			font-family: Times New Roman;
			font-size: 12px;
		}

		h1, h2 {
			text-align: center;
			line-height:10px;
		}
		
	</style>
</head><body>
	<table border="0">
		<tr style="padding: 1px">
			<th><img src="assets/gambar/kop surat.png" width="100"></th>
			<th style="width: 60%"><h2>PEMERINTAH PROVINSI JAWA TENGAH</h2>
				<h2>DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
				<h1>SMA NEGERI 1 TALUN</h1>
				<p style="text-align: center">Jl. Raya Kalirejo, Talun,  Kabupaten Pekalongan, Kode Pos : 51192</p><br>
				<p style="text-align: center">Surat Elektronik : sma1talun@gmail.com</p>
			</th>
			<th><img src="assets/gambar/logo.png" width="100"></th>
		</tr>
	</table>
		
	<hr style="height:5px;border-width:0;color:black;background-color:black">
	<hr style="height:2px;border-width:0;color:black;background-color:black">
	<h2><?= $title?></h2><br>
	<table border="0">
		<tr>
			<th style="width: 30%; text-align: left "><?php echo $subtitle?></th>
			<th style="width: 40%"></th>
			<th style="width: 30%; text-align: right">Status : <?php echo $status_kembali?></th>
		</tr>
	</table>
	
	<table>
		<tr>
			<th>No</th>
			<th>No Peminjaman</th>
			<th>Judul Buku</th>
			<th>No Anggota</th>
			<th>Nama Anggota</th>
			<th>Tanggal Dipinjam</th>
			<?php if($status_kembali == 'Hilang') { ?>
				<th>Keterangan</th>
			<?php }else{  ?>
				<th>Tanggal Kembali</th>
			<?php }?>
			<?php if($status_kembali == 'Semua') { ?>
				<th>Status</th>
				<th>Keterangan</th>
			<?php }else{  ?>

			<?php }?>
			
		</tr>
		<?php if(is_array($filter)) { ?>
		<?php $i=1; foreach($filter as $row ) { ?> 
		<tr class="odd gradex">
			<td><?php echo $i?></td>
			<th><?php echo $row->no_peminjaman?></th>
			<td><?php echo $row->judul_buku ?></td>
			<td><?php echo $row->no_anggota?></td>
			<td><?php echo $row->nama_anggota ?></td>
			<td><?php echo date('d-m-Y', strtotime($row->tanggal_pinjam)) ?></td>
			<?php if($status_kembali == 'Hilang') { ?>
				<td><?php echo $row->keterangan ?></td>
			<?php }else{  ?>
				<td><?php echo date('d-m-Y', strtotime($row->tanggal_kembali)) ?></td>
			<?php }?>
			<?php if($status_kembali == 'Semua') { ?>
			<td><?php echo $row->status_kembali ?></td>
			<td><?php echo $row->keterangan ?></td>
			<?php }else{  ?>

			<?php }?>
		</tr>
		<?php $i++;} ?>
		<?php } ?>
	</table>
	<br><br><br>
	<p align="right">Talun, <?= date('d F Y')?><br></p>
	<p align="right" style="text-align: center">Petugas Perpustakaan</p>
	<br><br><br><br><br>
	<p align="right" style="padding-right: 30px"><?php echo $user_aktif->nama?></p>
</body></html>