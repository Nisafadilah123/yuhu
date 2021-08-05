<?php

session_start();


// mendapatkan kode_menu dari url
//cari data berdasrkan id yg dkirimkan ntar ambil , nama, harga
//untuk ambil data nama, hargaa dari db disimpkan ke array session

$id_menu = $_GET['id_menu'];

// mengambil data keranjang menu dessert

if(isset($_SESSION["keranjang"][$id_menu])){
	$_SESSION["keranjang"][$id_menu]+=1;
}
else{
	$_SESSION["keranjang"][$id_menu]=1;
}


echo "<script>
alert('menu telah masuk ke keranjang belanja');
</script>";
echo "<script>location='keranjang.php';</script>";
?>