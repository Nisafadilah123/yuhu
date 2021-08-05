<?php
session_start();

/*echo"<pre>";
print_r($_SESSION['keranjang']);
echo "</pre>";
*/

$conn = mysqli_connect("localhost", "root", "", "menu_kamyusi");
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
            <a href="index.php" class="brand-logo" style="text-decoration: none; color: white;">Kamyusi</a>
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

    <ul class="sidenav" id="mobile-nav" style="text-decoration: none; ">
      <li><a href="#about" style="text-decoration: none">About Us</a></li>
      <li><a href="#services" style="text-decoration: none">Our Service</a></li>
      <li><a href="#menu" style="text-decoration: none">Menu</a></li>
      <li><a href="#contact" style="text-decoration: none">Contact Us</a></li>
      <li><a href="keranjang.php" style="text-decoration: none">Keranjang</a></li>
      <?php if(isset($_SESSION["pelanggan"])): ?>
          <li><a href="logout.php" style="text-decoration: none">logout</a></li>
      <?php else: ?>
          <li><a href="login_cus/index.php" style="text-decoration: none">Login</a></li>
      <?php endif ?>
          <li><a href="checkout.php" style="text-decoration: none">Checkout</a></li>
    </ul>
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
            <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php
        $no =1;
        ?>
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
            <td>
              <a href="hapus.php?id_menu=<?= $id_menu;?>" class="btn btn-danger btn-xs">Hapus</a>
            </td>
          </tr>
          </tr>
        
        <?php endforeach ?>
           
      </tbody>

    </table>
    <br>
    <div>
      <a href="menu.php" class="btn btn-default" style="margin-left: 20px">Kembali ke Menu</a>
      <a href="checkout.php" class="btn btn-primary" style="margin-left: 20px;" >Checkout</a>
    </div>
  </div>
    
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
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