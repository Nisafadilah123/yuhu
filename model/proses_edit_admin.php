<?php
error_reporting(0);
ob_start();
require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_admin.php";


$connection = new Database($host, $user, $pass, $database);
$adm = new Admin($connection); 

$id = $_POST['id'];
$username = $connection->conn->real_escape_string($_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST["password"]);

$password = password_hash($password, PASSWORD_DEFAULT);

$gambar = $_FILES['gambar']['name'];

$sumber = $_FILES['gambar']['tmp_name'];

if($pict == '') {
	$adm->edit(" UPDATE admin SET 
				username = '$username',
				password= '$password',
				gambar = '$dataUser'
				WHERE id = '$id' ");
	echo "<script>
			window.location'?page=admin';
		</script>";

}else{
	$gbr_awal = $adm->tampil($id)->fetch_object()->gambar;
	unlink("../img_menu/admin/".$gbr_awal);

	$upload = move_uploaded_file($sumber, "../img_menu/admin/".$gambar);

	if ($upload) {
	$adm->edit(" UPDATE admin SET 
				username = '$username',
				password= '$password',
				gambar = '$gambar'
				WHERE id = '$id' ");
	
	echo "<script>
			window.location'?page=admin';
		</script>";

	}else{
		echo "<script>
		alert('Upload gambar gagal !')
		</script";
		}
	}
?>