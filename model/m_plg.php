<?php
class Plg{

	private $mysqli;

	function __construct($conn){
		$this->mysqli = $conn;
	}

	public function tampil($id = null){
		$db = $this->mysqli->conn;
		$sql = "SELECT * FROM pelanggan";
		if($id != null){
			$sql .= " WHERE id_pelanggan = '$id'";
		}
		$query = $db->query($sql) or die ($db->error);
		return $query;
	}


	public function hapus($id) {
		$db = $this->mysqli->conn;
		$db->query("DELETE FROM pelanggan WHERE id_pelanggan= '$id' ") or die ($db->error);
	}

	function __destruct() {
		$db = $this->mysqli->conn;
		$db->close();
	}

	
}
?>