<?php 

require '../login_cus/koneksi.php';
if(isset($_POST["signup"])){
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('User baru di tambahkan');
                </script>";
        header("Location: ../login_cus/index.php");

    }else{
        echo mysqli_error($con);
    }
    
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form Admin</title>
    <link rel="icon" type="image/png" href="favicon.ico"/>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="nama_pelanggan"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nama_pelanggan" id="nama_pelanggan" placeholder="Your Name" required />
                            </div>
                            
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-local-phone"></i></label>
                                <input type="text" name="no_hp" id="no_hp" placeholder="no_hp" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-home"></i></label>
                                <input type="text" name="alamat" id="alamat" placeholder="Your Address" required />
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/1.jpeg" alt="sing up image"></figure>
                        <a href="../../Login_v6/index.php" class="signup-image-link"></a>
                    </div>
                </div>
            </div>
        </section>

        
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>