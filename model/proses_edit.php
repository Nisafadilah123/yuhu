<?php
error_reporting(0);

require_once('../config/+koneksi.php');
require_once('../model/database.php');
include "../model/m_menu.php";


$connection = new Database($host, $user, $pass, $database);
$mn = new Menu($connection); 

$id_menu = $_POST['id_menu'];
$id_kategori = $connection->conn->real_escape_string($_POST['id_kategori']);
$kode_menu = $connection->conn->real_escape_string($_POST['kode_menu']);
$nama_menu = $connection->conn->real_escape_string($_POST['nama_menu']);
$harga = $connection->conn->real_escape_string($_POST['harga']);
$jumlah_menu = $connection->conn->real_escape_string($_POST['jumlah_menu']);

$gambar = $_FILES['gambar']['name'];

$sumber = $_FILES['gambar']['tmp_name'];

if($gambar == '') {
	$mn->edit(" UPDATE list_menu SET
				id_kategori = '$id_kategori', 
				kode_menu = '$kode_menu',
				nama_menu= '$nama_menu',
				harga = '$harga',
				jumlah_menu ='$jumlah_menu',
				gambar = '$gambar'
				WHERE id_menu = '$id_menu' ");
	
	return true;
	

}else{
	$gbr_awal = $mn->tampil($id)->fetch_object()->gambar;
	unlink("../img_menu/".$gbr_awal);

	$upload = move_uploaded_file($sumber, "../img_menu/".$gambar);

	if ($upload) {
	$mn->edit(" UPDATE list_menu SET
				id_kategori = '$id_kategori', 
				kode_menu = '$kode_menu',
				nama_menu= '$nama_menu',
				harga = '$harga',
				jumlah_menu ='$jumlah_menu',
				gambar = '$gambar'
				WHERE id_menu = '$id_menu' ");
	return true;
	
	}else{
		return false;
		
		}
	}
?>