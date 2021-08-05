<?php
$koneksi = mysqli_connect("localhost", "root", "", "menu_kamyusi");

$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");

echo "<script>
alert('Data pembeli terhapus');
</script>";
echo "<script>
location ='admin.php?page=pembelian';
</script>";

?>