<?php

session_start();
$conn = mysqli_connect("localhost", "root", "", "menu_kamyusi");

if (!isset($_SESSION["pelanggan"])) {
   echo "<script>
          alert('Silahkan login terlebih dahulu');
      </script> ";
 echo "<script>
location='login_cus/index.php';
</script>";
}

// jika kosong masuk kesini
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
  echo "<script>
          alert('Keranjang kosong, silahkan belanja dulu');
      </script> ";
 echo "<script>
location='menu.php';
</script>";
}

?>

 <!DOCTYPE html>
<html>
    <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/dataTables/datatables.min.css" rel="stylesheet">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <link href="icon.jpg" type="image/x-icon" rel="icon"/>
    <link href="icon.jpg" type="image/x-icon" rel="shortcut icon"/>
    <title>Kamyusi Kafetaria - Cart</title>
  </head>

  <body id="home" class="scrollspy">


    <!-- NAVBAR -->
    <div class="navbar-fixed">
      <nav class="grey darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="index.php" class="brand-logo" style ="text-decoration: none; color: white;">Kamyusi</a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            
            <ul class="right hide-on-med-and-down">

              <li><a href="index.php#about" style="font-size: 18px; text-decoration: none; color: white;">About Us</a></li>
              <li><a href="index.php#services" style="font-size: 18px; text-decoration: none; color: white">Our Services</a></li>
              <li><a href="menu.php" style="font-size: 18px; text-decoration: none; color: white">Menu</a></li>
              <li><a href="index.php#contact" style="font-size: 18px; text-decoration: none; color: white">Contact Us</a></li>
              
              <?php if(isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php" style="font-size: 18px; text-decoration: none; color: white">logout</a></li>
              <?php else: ?>
                <li><a href="login_cus/index.php" style="font-size: 18px; text-decoration: none; color: white">Login</a></li>
              <?php endif ?>
              <li><a href="keranjang.php" style="font-size: 18px; text-decoration: none; color: white"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- SideNav -->

    <ul class="sidenav" id="mobile-nav">
     <li><a href="#about">About Us</a></li>
      <li><a href="#services">Our Service</a></li>
      <li><a href="#menu">Menu</a></li>
      <li><a href="#contact">Contact Us</a></li>
      <li><a href="keranjang.php">Keranjang</a></li>
      <?php if(isset($_SESSION["pelanggan"])): ?>
          <li><a href="logout.php">logout</a></li>
      <?php else: ?>
          <li><a href="login_cus/index.php">Login</a></li>
      <?php endif ?>
          <li><a href="checkout.php">Checkout</a></li>
    </ul>
    <br>
    <div><h3>Keranjang Belanja</h3>
      <br>
   <table class="table table-bordered table-hover table-striped" id="datatables">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subharga</th>
            
        </tr>
      </thead>

      <tbody>
        <?php
        $no =1;
        ?>
        <?php $totalbelanja = 0; ?>
        <?php foreach ($_SESSION["keranjang"] as $id_menu => $jumlah) :?>
          <?php 
          $tampil = $conn->query("SELECT *FROM list_menu WHERE id_menu ='$id_menu'");
          $data=$tampil->fetch_assoc() ;
          $subharga = $data['harga'] * $jumlah;
          ?>

          <tr>
            <tr>
            <td><?= $no++."."; ?></td>
            <td><?= $data['nama_menu'];?></td>
            <td>Rp. <?= number_format($data['harga']);?></td>
            <td><?= $jumlah;?></td>
            <td>Rp. <?= number_format($subharga);?></td>
            
          </tr>
          </tr>
        <?php $totalbelanja+=$subharga;?>
        <?php endforeach ?>
           
      </tbody>
      <tfoot>
        <tr>
          <th colspan="4">Total Belanja</th>
          <th>Rp. <?= number_format($totalbelanja);?> </th>
        </tr>
      </tfoot>
    </table>
    <br><br>
    <form  method="POST">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly value="<?= $_SESSION["pelanggan"] ['nama_pelanggan']?>" class="form-control">
          </div>
        </div>
      
        <div class="col-md-4">
          <div class="form-group">
            <input type="text" readonly value="<?= $_SESSION["pelanggan"] ['no_hp']?>" class="form-control">
          </div>
        </div>

       

      </div>
      <button class="btn btn-primary" style="margin-left: 20px;" name="checkout" >Checkout</button>
    </form >

    <?php
    if (isset($_POST["checkout"])) {
      $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
      $id_ongkir = $_POST["id_ongkir"];
      $tanggal_pembelian = date("Y-m-d");

      $tampil = $conn->query("SELECT *FROM tarif_ongkir WHERE id_ongkir = '$id_ongkir'");
      $arrayongkir = $tampil->fetch_assoc();
      $tarif = $arrayongkir['tarif'];

      $totalpembelian = $totalbelanja + $tarif;

      // 1. Menyimpan data ke tabel pembelian
       $conn->query("INSERT INTO pembelian (id_pelanggan,id_ongkir, tanggal_pembelian, total_pembelian) VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$totalpembelian')");

       // mendapatkan id_pembelian barusan
       $id_pembelian_barusan = $conn->insert_id;

       foreach ($_SESSION["keranjang"] as $id_menu => $jumlah) {

       

         $conn->query("INSERT INTO pembelian_menu(id_pembelian, id_menu, jumlah_dibeli) VALUES('$id_pembelian_barusan', '$id_menu', '$jumlah')");


       }



       //mengkosongkan keranjang belanja
       unset($_SESSION["keranjang"]);

       // tampilan dialihkan ke halaman notice.
       echo "<script>
       alert('Pemesanan Sukses');
       </script>";
       echo "<script>
       location ='nota.php?id=$id_pembelian_barusan';
       </script>";

    }


    ?>
    
    </div>
    
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8j"></script>
    <script>
      const sideNav = document.querySelectorAll('.sidenav');
      M.Sidenav.init(sideNav);

      const scroll = document.querySelectorAll('.scrollspy');
      M.ScrollSpy.init(scroll, {
        scrollOffset:50
      });
    </script>
  </body>
</html>