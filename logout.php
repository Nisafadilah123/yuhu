<?php

session_start();
$_SESSION ['login'] = false;

unset($_SESSION['login']);

session_unset();
session_destroy();

header("Location: login/index.php");
?>
