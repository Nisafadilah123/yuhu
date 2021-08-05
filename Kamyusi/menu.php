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
    <!-- mycss -->
    <link rel="stylesheet" href="css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <link href="icon.jpg" type="image/x-icon" rel="icon"/>
    <link href="icon.jpg" type="image/x-icon" rel="shortcut icon"/>
    <title>Kamyusi Kafetaria - Menu</title>
  </head>

  <body id="home" class="scrollspy">


    <!-- NAVBAR -->
    <div class="navbar-fixed">
      <nav class="grey darken-2">
        <div class="container">
          <div class="nav-wrapper">

            <a href="index.php" class="brand-logo">Kamyusi</a>
            <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
              
            </ul>
            <a href="index.php"><i class="material-icons medium right">arrow_back</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php#about">About Us</a></li>
              <li><a href="index.php#services">Our Services</a></li>
              <li><a href="menu.php">Menu</a></li>
              <li><a href="index.php#contact">Contact Us</a></li>
              <li><a href="keranjang.php">Keranjang</a></li>
              <?php if(isset($_SESSION["pelanggan"])): ?>
                <li><a href="logout.php">logout</a></li>
              <?php else: ?>
                <li><a href="login_cus/index.php">Login</a></li>
              <?php endif ?>
              <li><a href="#food">Food</a></li>
              <li><a href="#drink">Drink</a></li>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!-- SideNav -->

    <ul class="sidenav" id="mobile-nav">

      <li><a href="index.php#about">About Us</a></li>
      <li><a href="index.php#services">Our Service</a></li>
      <li><a href="index.php#menu">Menu</a></li>
      <li><a href="index.php#contact">Contact Us</a></li>
      <li><a href="keranjang.php">Keranjang</a></li>
      <?php if(isset($_SESSION["pelanggan"])): ?>
          <li><a href="logout.php">logout</a></li>
      <?php else: ?>
          <li><a href="login_cus/index.php">Login</a></li>
      <?php endif ?>
          <li><a href="checkout.php">Checkout</a></li>
    </ul>

    <div class="container1">
      <!-- Menu Food -->
      <section id="food" class="menu scrollspy">
          <div class="row">
            <h3 class="light center grey-text text-darken-3 menu">Food<i class="material-icons small">local_dining</i></h3>

           <?php $tampil = $conn->query("SELECT *FROM list_menu WHERE id_kategori ='Mn-02'"); ?>
          <?php WHILE ($data=$tampil->fetch_assoc()) { ?>
      
                <div class="col m3 s12">
                  <div class="card-panel center">
                    <div>
                      <img height="150px" width="250px" src="../img_menu/<?= $data['gambar']; ?>">
                    </div>
                    <h5><?= $data['nama_menu']; ?></h5>
                    <h7>Stok : <?= $data['jumlah_menu']; ?></h7>
                    <p>Rp. <?= number_format($data['harga'])  ;?></p>
                    <a href="add.php?id_menu=<?= $data['id_menu'];?>">
                      <div class="button">add +</div>
                    </a>
                  </div>
                </div>
            <?php } ?>

           

      </section>

      <section id="drink" class="menu scrollspy">
          <div class="row">
            <h3 class="light center grey-text text-darken-3 menu">Drink<i class="material-icons small">local_drink</i></h3>

            
            <?php $tampil = $conn->query("SELECT *FROM list_menu WHERE id_kategori='Mn-01'"); ?>
            <?php WHILE ($data=$tampil->fetch_assoc()) { ?>
      
                <div class="col m3 s12">
                  <div class="card-panel center">
                    <div >
                      <img height="250px" width="150px" src="../img_menu/<?= $data['gambar']; ?>">
                    </div>
                    <h5><?= $data['nama_menu']; ?></h5>
                    <h7>Stok : <?= $data['jumlah_menu']; ?></h7>
                    <p>Rp. <?= number_format($data['harga']);?></p>
                    <a href="add.php?id_menu=<?= $data['id_menu'];?>">
                      <div class="button">add +</div>
                    </a>
                  </div>
                </div>
            <?php } ?>


            
      </section>
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