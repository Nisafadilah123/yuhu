<?php

$con = mysqli_connect("localhost", "root", "", "menu_kamyusi");

function query($query){
	global $con;
	$result = mysqli_query($con, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function registrasi($data){
	global $con;

	$nama = strtolower(stripcslashes($data["nama_pelanggan"]));

	$no_hp = mysqli_real_escape_string($con, $data["no_hp"]);
	$alamat = mysqli_real_escape_string($con,$data["alamat"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($con, "SELECT *FROM pelanggan WHERE nama_pelanggan = '$nama'");

	if (mysqli_fetch_assoc($result)){
		echo "<script>
				alert('Username sudah terpakai, masukkan nama lengkap')
			</script>";
		return false;
	}

	
	// tambahkan user baru ke database

	mysqli_query($con, "INSERT INTO pelanggan VALUES('', '$nama', '$no_hp','$alamat')");

	return mysqli_affected_rows($con);

	//jika tombol register di tekan tapi tidak ada datanya
}

?>
