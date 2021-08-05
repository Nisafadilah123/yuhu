
<!DOCTYPE html>
<html>
    <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="css/style.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <link href="icon.jpg" type="image/x-icon" rel="icon"/>
    <link href="icon.jpg" type="image/x-icon" rel="shortcut icon"/>
    <title>Kamyusi Kafetaria</title>
  </head>

  <body id="home" class="scrollspy">


    <!-- NAVBAR -->
    <div class="navbar-fixed">
      <nav class="grey darken-2">
        <div class="container">
          <div class="nav-wrapper">
            <a href="#index.php" class="brand-logo">Kamyusi</a>
            <a href="3" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="#about">About Us</a></li>
              <li><a href="#services">Our Services</a></li>
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

    <!-- Slider -->
    <div class="slider">
      <ul class="slides">
        <li>
          <img src="img/slider/1.png"> <!-- random image -->
          <div class="caption center-align">
            <h3>HOI HE??</h3>
            <h5 class="light grey-text text-lighten-3">Your treasure place for shared and keep humble for all of you
            </h5>
          </div>
        </li>
        <li>
          <img src="img/slider/2.png"> <!-- random image -->
          <div class="caption left-align">
            <h3>HOI HE??</h3>
            <h5 class="light grey-text text-lighten-3">Your treasure place for shared and keep humble for all of you
            </h5>
          </div>
        </li>
        <li>
          <img src="img/slider/3.png"> <!-- random image -->
          <div class="caption right-align">
            <h3>HOI HE??</h3>
            <h5 class="light grey-text text-lighten-3">Your treasure place for shared and keep humble for all of you
            </h5>
          </div>
        </li>
        <li>
          <img src="img/slider/4.png"> <!-- random image -->
          <div class="caption center-align">
            <h3>HOI HE!</h3>
            <h5 class="light grey-text text-lighten-3">Your treasure place for shared and keep humble for all of you
            </h5>
          </div>
        </li>
      </ul>
    </div>

    <!-- About US -->
    <Section id="about" class="about scrollspy">
      <div class="container">
        <div class="row">
          <h3 class="center light grey-text text-darken-3">About Us</h3>
          <div class="col m6 light">
            <h5>Serve</h5>
            <p>Manual Brew Variety Latte Mocktail Light Meal & Our Signature Coffe and Milk. and also <strong><italic>a space for you to share with friends</italic></strong></p>
          </div>
          <div class="col m6 light">
            <h5>Motto</h5>
            <p>Your treasure place for Shared and keep Humble for all of you</p>
          </div>

          
        </div>
        <div class="col-md-6">
            <div class="desc">
              <h4><left>Kamyusi History<left></h4>
              <p>Kamyusi adalah salah satu UMKM ( Usaha Mikro Kecil Menengah ) yang berada di Indramayu, yang berdiri pada tahun 2018. Kedai ini berada di Jl. MT Haryono No.46/A, Depan, Sindang, Kabupaten Indramayu, Jawa Barat 45222.</p>
              <p>
                Kamyusi mempunyai slogan yaitu "Hoi He ?? " yang berarti "apa kabar ??", dan mempunyai motto yaitu "We (dare to) Starts", "We Struggle (to Change)", "We Shared (with others)".
              </p>
            </div>
      </div>  
    </Section>

    <!-- Parallax -->
    <div id="services" class="parallax-container scrollspy">
      <div class="parallax"><img src="img/parallax/2.png"></div>
      <div class="container clients">
        <h3 class="center light grey-text text-lighten-2">Kamyusi Kafetaria</h3>
        <div class="row">
          <div class="col m4 s12 center grey-text text-lighten-1">
            <h5>We (dare to) Starts</h2>
          </div>

          <div class="col m4 s12 center grey-text text-lighten-1">
            <h5>We Struggle (to Change)</h2>
          </div>

          <div class="col m4 s12 center grey-text text-lighten-1">
            <h5>We Shared (with others)</h2>
          </div>

        </div>
      </div>
    </div>

    <!-- Menu -->
    <section id="menu" class="menu grey lighten-3 scrollspy">
    	<div class="container">
    		<div class="row">
    			<h3 class="light center grey-text text-darken-3">Menu</h3>
    			<div class="col m6 s12">
    				<div class="card-panel center">
    					<a href="menu.php#food">
	    					<i class="material-icons medium">local_dining</i>
	    					<h5>Food</h5>
    					</a>
    					<p>Kenikmatan sebuah makanan bukan dinilai dari enak, sedap, mewah nya sebuah makanan yang disajikan, namun ketika sudah merasa kerinduan terhadap makanan.</p>
    				</div>
    			</div>

    			<div class="col m6 s12">
    				<div class="card-panel center">
    					<a href="menu.php#drink">
	    					<i class="material-icons medium ">local_drink</i>
	    					<h5>Drink</h5>
    					</a>
    					<p>Secangkir minuman bukan hanya dilihat dari rasa lezat nya saja, kalau kalian perhatikan terdapat filosofi didalamnya. Terdapat campuran aroma yang khas, cita rasa yang khas, dan komposisi yang seimbang di dalam minuman tersebut, seperti hidup ini.</p>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- Contact Us -->
    <section id="contact" class="contact white scrollspy">
    	<div class="container">
    		<h3 class="Light grey-text text-darken-3 center">Contact Us</h3>
    		<div class="row">
    			<div class="col m5 s12">
    				<div class="card-panel grey darken-2 center white-text">
    					<i class="material-icons">email</i>
    					<h5>Contact</h5>
    					<p>Kritik dan Saran anda menjadi motivasi kami untuk menjadi yang lebih baik.
              Terima Kasih</p>
             
    				</div>
    				
    			</div>

    			<div class="col m7 s12">
    				<ul class="collection with-header">
              <li class="collection-header center"><h4>Our Cafe</h4></li>
              <li class="collection-item">Kamyusi Kafetaria</li>
              <li class="collection-item">Jl. MT Haryono No.46/A, Depan, Sindang, Kabupaten Indramayu, Jawa Barat 45222</li>
              <li class="collection-item">West Java, Indonesia</li>
            </ul>
    			</div>
          
    		</div>
    	</div>	
    </section>

    <!-- Footer -->
    <footer class="grey darken-2 white-text center">
    	<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
          <ul class="fh5co-footer-links">
            <li><a href="https://www.instagram.com/kaf_kamyusi/"><i class="fa fa-instagram"></i>     Instagram</a></li>
            <li><a href="https://wa.wizard.id/ff3ef3"><i class="fa fa-whatsapp"></i>      WhatsApp</a></li>
          </ul>
        </div>

      <div class="row copyright">
        <div class="col-md-12 text-center">
          <p>
            <small class="block">&copy; 2020 Kamyusi</small> 
            
          </p>
        </div>
      </div>


    </footer>








    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
      const sideNav = document.querySelectorAll('.sidenav');
      M.Sidenav.init(sideNav);

      const slider = document.querySelectorAll('.slider');
      M.Slider.init(slider, {
        indicators: false,
        height: 500,
        transition: 600,
        interval: 3000
      });

      const parallax = document.querySelectorAll('.parallax');
      M.Parallax.init(parallax);

      const scroll = document.querySelectorAll('.scrollspy');
      M.ScrollSpy.init(scroll, {
      	scrollOffset:50
      });
    </script>
  </body>
</html>