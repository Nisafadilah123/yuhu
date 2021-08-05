<?php

$koneksi = mysqli_connect("localhost", "root", "", "menu_kamyusi");



?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!-- mycss -->
    <link rel="stylesheet" href="css/style.css">

	<title>Data Pembelian</title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<h1>Menu<small>Admin Kedai Kamyusi</small></h1>
		<ol class="breadcrumb">
			<li><a href="?page=pembelian"><i class="fa fa-coffee"></i>  DATA PEMBELIAN</a></li>
			
		</ol>
			
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		
		<center><h1>
			DATA PEMBELIAN
		</h1></center>


		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="datatables">

					<tr>
						<th>No</th>
						<th>Nama Pelanggan</th>
						<th>Tanggal Pembelian</th>
						<th>Total Pembelian</th>
						<th>Detail</th>
						
					</tr>
				</thead>

	<tbody>

	<?php $no=1; ?>
	<?php 
	
	// relasi antara tb.pembelian dgn pelanggan untuk menghasilkan data pembelian yg melakukan pembelian
	$tampil = $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan"); ?>
	<?php WHILE ($data=$tampil->fetch_assoc()) { ?>
	
	<tr>
		<td align="center"><?= $no."."; ?></td>
		<td><?= $data['nama_pelanggan']; ?></td>
		<td><?= $data['tanggal_pembelian']; ?></td>
		<td>Rp. <?= number_format($data['total_pembelian']); ?></td>
		
		
		<td align="center">
			<a href="admin.php?page=detail&id=<?= $data['id_pembelian'];?>" class="btn btn-info"> Detail</a>
			<a href="admin.php?page=hapus&id=<?= $data['id_pembelian'];?>" class=" btn-danger btn">Hapus</a>
		</td>
	</tr>
	<?php $no++; ?>
	<?php  } ?>
	</tbody>
</table>
</div>

		
</body>
</html>
