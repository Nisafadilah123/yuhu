<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "menu_kamyusi");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Customer</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/materialize.css">
<!--===============================================================================================-->

</head>
<body>
	


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-70">
						Welcome To Kamyusi Kafetaria 
					</span>
					<span class="login100-form-avatar">
						<img src="1.jpeg" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "username is required">
						<input class="input100" type="text" name="nama_pelanggan">
						<span class="focus-input100" data-placeholder="Masukkan Nama Anda"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Password is required">
						<input class="input100" type="text" name="no_hp">
						<span class="focus-input100" data-placeholder="Masukkan no_hp Anda"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" value="login" type="submit">
							Login
						</button>
					</div>

					<ul class="login-more p-t-190">

						<li>
							<span class="txt1">
								Don’t have an account?
							</span>

							<a href="../registrasi/registrasi.php" class="txt2">
								Sign up
							</a>
						</li>
					</ul>
				</form>

				<?php

				
				if (isset($_POST["login"])) {
				$nama = $_POST["nama_pelanggan"];
				$no_hp = $_POST["no_hp"];

				$ambil = $conn->query("SELECT *FROM pelanggan WHERE nama_pelanggan = '$nama' AND no_hp = '$no_hp'");
				
				$akunyangcocok = $ambil->num_rows;
				// cek username
				if ($akunyangcocok == 1 ) {

					$akun = $ambil->fetch_assoc();
					$_SESSION["pelanggan"] = $akun;
					echo "<script>
					alert('anda berhasil login');
					</script>";
					echo "<script>
					location='../checkout.php';
					</script>";

				}
				else{
					echo "<script>
					alert('anda gagal login, periksa akun anda');
					</script>";
					echo "<script>
					location='index.php';
					</script>";
				}
				
				}
				?>

			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>