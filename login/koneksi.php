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

	$username = strtolower(stripcslashes($data["username"]));

	$password = mysqli_real_escape_string($con, $data["password"]);
	$passwordconfirm = mysqli_real_escape_string($con,$data["re_pass"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($con, "SELECT *FROM admin WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)){
		echo "<script>
				alert('Username sudah terdaftar')
			</script>";
		return false;
	}

	// cek konfigurasi password
	if ($password !== $passwordconfirm) {
		echo "<script>
				alert('Konfirmasi password tidak sesuai ') 
				</script>";
	return false;
	}

	

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);
	
	// tambahkan user baru ke database

	mysqli_query($con, "INSERT INTO admin VALUES('', '$username', '$password','$passwordconfirm')");

	return mysqli_affected_rows($con);

	
}

function updatePassword($data){
	global $con; 

	$username = strtolower(stripcslashes($data["username"]));

	$password = mysqli_real_escape_string($con, $data["password"]);
	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($con, "UPDATE admin SET password='$password' WHERE username='$username'");

	return true;
}
?>
