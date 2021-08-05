<?php
$conn = mysqli_connect("localhost", "root", "", "menu_kamyusi");
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
    <title>Kamyusi - Cart</title>
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
      
      <li><a href="checkout.php">Checkout</a></li>
    </ul>

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
    <?php $tampil= $koneksi->query("SELECT *FROM pembelian_menu JOIN list_menu ON pembelian_menu.id_menu = list_menu.id_menu WHERE pembelian_menu.id_pembelian='$_GET[id]'");?>
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

<div class="row">
  <div class="col-md-7">
    <div class="alert alert-info">
      
      <p>
        Silahkan melakukan pembayaran <strong>Rp. <?= number_format($detail['total_pembelian']);?> </strong>
        
      </p>
    </div>
  </div>
</div>
 <a href="index.php" class="btn btn-default" style="margin-right: 20px">Kembali ke Menu</a>
</div>



</body>
</html>
