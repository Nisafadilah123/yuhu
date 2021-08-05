<?php

error_reporting(0);
ob_start();
include "model/m_plg.php";

$plg = new Plg($connection);

if(@$_GET['act'] == '') {


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
	<div class="col-lg-12">
		<h1>Menu<small>Admin Kedai Kamyusi</small></h1>
		<ol class="breadcrumb">
			<li><a href="?page=pelanggan"><i class="fa fa-coffee"></i>  DATA PELANGGAN</a></li>
			
		</ol>
			
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		

<?php
} elseif (@$_GET['act'] == 'del') {

	$plg->hapus($_GET['id_pelanggan']);
	header("Location: ?page=pelanggan");
}
?>
		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="datatables">
				<thead>
					<th colspan="7"><center><h3>Data Pelanggan</h3></center></th>
					
						<tr>
							<th>No</th>
							<th>Nama Pelanggan</th>
							<th>No. Handphone</th>
							<th>Alamat</th>
							<th>Aksi</th>
						
						</tr>
				</thead>
	<tbody>

	<?php
	$no =1;
	$tampil = $plg->tampil();
	WHILE ($data = $tampil->fetch_object()){

	?>	
	<tr>
		<td align="center"><?= $no++."."; ?></td>
		<td><?= $data->nama_pelanggan; ?></td>
		<td><?= $data->no_hp; ?></td>
		<td><?= $data->alamat; ?></td>
		
		<td align="center">

			<a href="?page=pelanggan&act=del&id_pelanggan=<?php echo $data->id_pelanggan; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
		</td>
	</tr>
	
	<?php  
	} ?>
	</tbody>
</table>
</div>

		
</body>
</html>
