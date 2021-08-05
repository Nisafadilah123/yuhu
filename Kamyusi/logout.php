<?php
session_start();

// menghancurkan $_SESSION["pelanggan"]
$_SESSION ['login'] = false;

unset($_SESSION['login']);

session_unset();
session_destroy();

header("Location: index.php");
session_destroy();

echo "<script>
alert('anda telah logout');
</script>";
echo "<script>
location : 'index.php';
</script>";
?>