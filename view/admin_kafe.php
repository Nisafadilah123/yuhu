<?php
error_reporting(0);
ob_start();
include "model/m_admin.php";

$adm = new Admin($connection);

if(@$_GET['act'] == '') {


?>
<div class="row">
	<div class="col-lg-12">
		<h1>Menu<small>Admin Kedai Kamyusi</small></h1>
		<ol class="breadcrumb">
			<li><a href="?page=admin_kafe"><i class="fa fa-users"></i>  Admin</a></li>
			
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
						<h4 class="modal-title">Tambah Data Admin</h4>
					</div>
					<form action="" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" required>
							</div>
							<div  class="modal-footer">
								<button type="reset" class="btn btn-danger">Reset</button>
								<input type="submit" class="btn btn-success" name="tambah" value="simpan">
							</div>
						</div>
					</form>
					<?php
					if (@$_POST['tambah']) {
					$username = $connection->conn->real_escape_string($_POST['username']);
					$password = mysqli_real_escape_string($connection->conn,$_POST["password"]);
					$password = password_hash($password, PASSWORD_DEFAULT);

					if ($upload) {
					$adm->tambah($username, $password);
					header("Location: ?page=admin");
					}else{
						echo "<script>
						alert('Tambah admin gagal !')
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
						<h4 class="modal-title">Edit Data Admin</h4>
					</div>
					<form id="form" enctype="multipart/form-data">
						<div class="modal-body" id="modal-edit">
							<div class="form-group">
								
								<input type="hidden" name="id" id="id">

							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" name="username" class="form-control" id="username" required>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" name="password" class="form-control" id="password" required>
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
			$(document).on("click", "#edit_admin", function() {
				var id = $(this).data('id');
				var user = $(this).data('user');
				var pass = $(this).data('pass');
				var gambar = $(this).data('gambar');
				$("#modal-edit #id").val(id);
				$("#modal-edit #username").val(user);
				$("#modal-edit #password").val(pass);

			})

			$(document).ready(function(e) { // ajax
				$("#form").on("submit", function(e) {
					e.preventDefault();
					$.ajax({
						url : 'model/proses_edit_admin.php',
						type : 'POST',
						data : new FormData(this),
						contentType : false,
						cache : false,
						processData : false,
						success : function(msg) {
							window.location.reload()
						}
					})
				})
			})
			
		</script>
	</div>
</div>
<?php
} elseif (@$_GET['act'] == 'del') {

	$adm->hapus($_GET['id']);
	header("Location: ?page=admin_kafe");
}
?>

		<div class="table-responsive">
			<table class="table table-bordered table-hover table-striped" id="datatables">
				<thead>
					<tr>
						<th colspan="7"><center><h3>Data Admin</h3></center></th>
					
					</tr>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Password</th>
						<th>Opsi</th>
					</tr>
				</thead>

	<tbody>
	<?php
	$no =1;
	$tampil = $adm->tampil();
	WHILE ($data = $tampil->fetch_object()){

	?>	
	<tr>
		<td align="center"><?= $no++."."; ?></td>
		<td><?= $data->username; ?></td>
		<td><?= $data->password; ?></td>
		<td align="center">
			<a id="edit_admin" data-toggle="modal" data-target="#edit" data-id="<?= $data->id; ?>" data-user="<?= $data->username; ?>" data-pass="<?= $data->password; ?>" data-gambar="<?= $data->gambar; ?>">
			<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Edit</button>
		</a>

		<a href="?page=admin_kafe&act=del&id=<?php echo $data->id; ?>" onclick="return confirm('Yakin akan menghapus data ini?')">
			<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i>Hapus</button>
		</a>
		</td>
	</tr>
	<?php
	} ?>
	</tbody>
</table>
</div>

		