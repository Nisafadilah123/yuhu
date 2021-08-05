<?php
class Menu{

	private $mysqli;

	function __construct($conn){
		$this->mysqli = $conn;
	}

	public function tampil($id_menu = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM list_menu";
		if($id != null){
			$sql .= " WHERE id_menu = '$id_menu'";
		}
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}

	public function tambah($id_kategori, $kode_menu, $nama_menu, $harga, $jumlah_menu, $gambar, $ket){
		$db = $this->mysqli->conn;
		$db->query("INSERT INTO list_menu VALUES('', '$id_kategori', '$kode_menu', '$nama_menu', '$harga', '$jumlah_menu', '$gambar')") or die ($db->error);
}

	public function edit($sql){
		$db = $this->mysqli->conn;
		$db->query($sql) or die ($db->error);
	}

	public function hapus($id_menu) {
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM list_menu WHERE id_menu= '$id_menu' ") or die ($db->error);
	}

	function __destruct() {
		$db = $this->mysqli->conn;
		$db->close();
	}
}
?>