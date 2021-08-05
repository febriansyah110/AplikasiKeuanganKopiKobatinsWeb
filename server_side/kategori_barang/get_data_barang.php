<?php 
require_once '../../koneksi/conn.php';
$id_barang=$_GET['id_barang'];
$query = $conn->query("SELECT * FROM kategori_barang WHERE id_barang = '$id_barang'");
$result = array();
$fetchData = $query->fetch_assoc();
$result = $fetchData;
echo json_encode($result);
?>