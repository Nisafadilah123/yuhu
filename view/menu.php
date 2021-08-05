<?php
error_reporting(0);

include "model/m_menu.php";

$mn = new Menu($connection);

if(@$_GET['act'] == '') {


?>
<div class="row">
	<div class="col-lg-12">
		<h1>Menu<small>Admin Kedai Kamyusi</small></h1>
		<ol class="breadcrumb">
			<li><a href="?page=menu"><i class="fa fa-coffee"></i>List Menu</a></li>
			
		</ol>
			
	</div>
</div>

<div class="row">
	<div class="col-lg-12">

		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>  Tambah Data</button>
		
		<div id="tambah" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Data Menu</h4>
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="id_kategori">Id Kategori</label>
								<input type="text" name="id_kategori" class="form-control" id="id_kategori" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="kode_menu">Kode Menu</label>
								<input type="text" name="kode_menu" class="form-control" id="kode_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="nama_menu">Nama Menu</label>
								<input type="text" name="nama_menu" class="form-control" id="nama_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="harga">Harga</label>
								<input type="text" name="harga" class="form-control" id="harga" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="jumlah_menu">Jumlah Menu</label>
								<input type="number" name="jumlah_menu" class="form-control" id="jumlah_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="gambar">Gambar Menu</label>
								<input type="file" name="gambar" class="form-control" id="gambar" required>
							</div>
							<div  class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambah" value="simpan">
							</div>
						</div>
					</form>
					<?php
					// tambah
					if (@$_POST['tambah']) {
						$id_kategori = $connection->conn->real_escape_string($_POST['id_kategori']);
						$kode_menu = $connection->conn->real_escape_string($_POST['kode_menu']);
						$nama_menu = $connection->conn->real_escape_string($_POST['nama_menu']);
						$harga = $connection->conn->real_escape_string($_POST['harga']);
						$jumlah_menu = $connection->conn->real_escape_string($_POST['jumlah_menu']);

						$gambar = $_FILES['gambar']['name'];
						$sumber = $_FILES['gambar']['tmp_name'];
						$upload = move_uploaded_file($sumber, " ".$gambar);

					if ($upload) {
					$mn->tambah($id_kategori,$kode_menu, $nama_menu, $harga, $jumlah_menu, $gambar);
					header("Location: ?page=menu");
					echo "<script>
						alert('Upload gambar Berhasil !')
						</script";
					}else{
						echo "<script>
						alert('Upload gambar gagal !')
						</script";
						}
					}

					?>
				</div>
			</div>
		</div>
		<br><br>

		<div id="edit" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Data Menu</h4>
					</div>
					<form id="form" enctype="multipart/form-data">
						<div class="modal-body" id="modal-edit">
							<div class="form-group">
								
								<input type="hidden" name="id_menu" id="id_menu">

							<div class="form-group">
								<label class="control-label" for="id_kategori">Id Kategori</label>
								<input type="text" name="id_kategori" class="form-control" id="id_kategori" required>
							</div>

							<div class="form-group">
								<label class="control-label" for="kode_menu">Kode Menu</label>
								<input type="text" name="kode_menu" class="form-control" id="kode_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="nama_menu">Nama Menu</label>
								<input type="text" name="nama_menu" class="form-control" id="nama_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="harga">Harga</label>
								<input type="text" name="harga" class="form-control" id="harga" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="jumlah_menu">Jumlah Menu</label>
								<input type="number" name="jumlah_menu" class="form-control" id="jumlah_menu" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="gambar">Gambar Menu</label>
								<div style="padding-bottom: 5px">
									<img src="" width="80px" id="pict">
								</div>
								<input type="file" name="gambar" class="form-control" id="gambar">
							</div>
							<div  class="modal-footer">
								
								<input type="submit" class="btn btn-success" name="edit" value="simpan">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<script src="assets/js/jquery-1.10.2.js"></script>
		<script type="text/javascript">
			$(document).on("click", "#edit_menu", function() {
				var id = $(this).data('id_menu');
				var ktgr = $(this).data('kategori');
				var kode = $(this).data('kode');
				var nama_menu = $(this).data('nama');
				var harga = $(this).data('harga');
				var jumlah_menu = $(this).data('jumlah');
				var gambar = $(this).data('gambar');
				$("#modal-edit #id_menu").val(id);
				$("#modal-edit #id_kategori").val(ktgr);
				$("#modal-edit #kode_menu").val(kode);
				$("#modal-edit #nama_menu").val(nama_menu);
				$("#modal-edit #harga").val(harga);
				$("#modal-edit #jumlah_menu").val(jumlah_menu);
				$("#modal-edit #pict").attr("src", "../img_menu/"+gambar);

			})

			$(document).ready(function(e) {
				$("#form").on("submit", function(e) {
					e.preventDefault();
					$.ajax({
						url : 'model/proses_edit.php',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(msg) {
							window.location.reload() //untuk mereload
						}
					})
				})
			})
			
		</script>
	</div>
</div>
<?php
} elseif (@$_GET['act'] == 'del') {
	$gbr_awal = $mn->tampil($_GET['id_menu'])->fetch_object()->gambar;
	unlink("../img_menu/".$gbr_awal);

	$mn->hapus($_GET['id_menu']);
	header("Location: ?page=menu");
}
?>

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="datatables">
				<thead>
					<tr>
						<th colspan="7"><center><h3>Minuman & Makanan</h3></center></th>
					
					</tr>
					<tr>
						<th>No</th>
						<th>Id Kategori</th>
						<th>Kode Menu</th>
						<th>Nama Menu</th>
						<th>Harga</th>
						<th>Jumlah Menu</th>
						<th>Gambar Menu</th>
						<th>Opsi</th>
					</tr>
				</thead>

	<tbody>
	<?php
	$no =1;
	$tampil = $mn->tampil();
	WHILE ($data = $tampil->fetch_object()){

	?>	
	<tr>
		<td align="center"><?= $no++."."; ?></td>
		<td><?= $data->id_kategori; ?></td>
		<td><?= $data->kode_menu; ?></td>
		<td><?= $data->nama_menu; ?></td>
		<td>Rp. <?= number_format($data->harga); ?></td>
		<td><?= $data->jumlah_menu; ?></td>
		<td>
			<center>
				<img src="img_menu/<?= $data->gambar; ?>" width="80px">
			</center>

		</td>
		<td align="center">
			<a id="edit_menu" data-toggle="modal" data-target="#edit" data-id="<?= $data->id_menu; ?>" data-kategori="<?= $data->id_kategori; ?>" data-kode="<?= $data->kode_menu; ?>" data-nama="<?= $data->nama_menu; ?>" data-harga="<?= $data->harga; ?>" data-jumlah="<?= $data->jumlah_menu; ?>" data-gambar="<?= $data->gambar; ?>">
			<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</button>
		</a>

		<a href="?page=menu&act=del&id_menu=<?php echo $data->id_menu; ?>" onclick="return confirm('Yakin akan menghapus data ini?')">
			<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
		</a>
		</td>
	</tr>
	<?php
	} ?>
	</tbody>
</table>
</div>

		