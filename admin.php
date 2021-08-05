<?php

//session login, jika tidak login langsung di arahkan ke halaman login
    session_start();
    if($_SESSION["login"] != true){
    header("Location: login/index.php?");
    }

require_once('config/+koneksi.php');
require_once('model/database.php');

$connection = new Database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
   
    <title>Halaman Admin</title>
    <link rel="icon" type="image/png" href="favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
  </head>

  <body>
    
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Admin Kedai Kamyusi</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <ul class="slider-bar" data-widget="tree"></ul>
              <li class="header"> MASTER MENU </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-coffee"></i> Data Menu<b class="caret"></b></a>

              
              <ul class="dropdown-menu">
                <li><a href="?page=menu">Menu</a></li>
                
              </ul>
            </li>
            
             <ul class="slider-bar" data-widget="tree"></ul>
              <li class="header"> MASTER PELANGGAN </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Data Pelanggan<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=pelanggan">Pelanggan</a></li>
                <li><a href="?page=pembelian">Data Pembelian</a></li>
              </ul>

            <ul class="slider-bar" data-widget="tree"></ul>
              <li class="header"> MASTER ADMIN </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i> Data Admin<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=admin_kafe">Admin</a></li>
                
                
              </ul>

              <ul class="slider-bar" data-widget="tree"></ul>
              <li class="header"> LOG OUT </li>
            <li class="dropdown">
              <li><a href="logout.php" class="btn btn-info" onclick="return confirm('Yakin ?');"><i class="fa fa-power-off"></i> Log Out</a></li>
            </li>
          </ul>

         
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

       <?php

       // halaman 
       
       if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == '') {
         include "view/dashboard.php";
       }elseif (@$_GET['page'] == 'menu' || @$_GET['page'] == '') {
         include "view/menu.php";
       }elseif (@$_GET['page'] == 'admin_kafe' || @$_GET['page'] == '') {
         include "view/admin_kafe.php";
       }elseif (@$_GET['page'] == 'pelanggan' || @$_GET['page'] == '') {
         include "view/pelanggan.php";
      }elseif (@$_GET['page'] == 'pembelian' || @$_GET['page'] == '') {
         include "view/pembelian.php";
      }elseif (@$_GET['page'] == 'detail' || @$_GET['page'] == '') {
         include "view/detail.php";
      }elseif (@$_GET['page'] == 'hapus' || @$_GET['page'] == '') {
         include "view/hapuspembelian.php";
      }
      ?>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/dataTables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#datatables').DataTable();
      });
    </script>
  </body>
</html>