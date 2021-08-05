<?php
session_start();
$id_menu = $_GET['id_menu'];
unset($_SESSION['keranjang'][$id_menu]);

echo"<script>
alert('Menu di hapus dari keranjang');
</script>";
echo "<script>
location='keranjang.php';
</script>";
?>