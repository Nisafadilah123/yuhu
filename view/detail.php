<u>
	<h2>Detail Pembelian</h2>
</u>

<?php

$koneksi = mysqli_connect("localhost", "root", "", "menu_kamyusi");


$tampil = $koneksi->query("SELECT *FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail=$tampil->fetch_assoc();
?>

<br>
<strong>Nama Pelanggan : <?= $detail['nama_pelanggan'];?></strong>
<p>
	No. hp : <?= $detail['no_hp'];?><br>
	Alamat : <?= $detail['alamat'];?>
</p>
<p>
	Tanggal Pembelian : <?= $detail['tanggal_pembelian'];?><br>
	Total Pembelian : <?= $detail['total_pembelian'];?>
</p>
<div class="table-responsive">
	<table class="table table-bordered table-hover table-striped" id="datatables">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Menu</th>
			<th>harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			
			
		</tr>
	</thead>

	<tbody>
		<?php $no=1; ?>
		<?php 
		// relasi antara tb.pembelian menu dengan tb. list menu untuk mengambil nilai untuk dimasukan ke tabel detail
		$tampil= $koneksi->query("SELECT *FROM pembelian_menu JOIN list_menu ON pembelian_menu.id_menu = list_menu.id_menu WHERE pembelian_menu.id_pembelian='$_GET[id]'");?>
		<?php while ($data = $tampil->fetch_assoc()) { ?>
			<tr>
				<td><?= $no."."; ?></td>
				<td><?= $data['nama_menu'];?></td>
				<td>Rp. <?= number_format($data['harga']);?></td>
				<td><?= $data['jumlah_dibeli'];?></td>
				<td>Rp. <?= number_format($data['harga']*$data['jumlah_dibeli']);?></td>
				

			</tr>
		<?php $no++; ?>
	<?php } ?>
	
	</tbody>
	
</table>
<button class="btn btn-default"><a href="admin.php?page=pembelian">Kembali</a></button>
</div>

