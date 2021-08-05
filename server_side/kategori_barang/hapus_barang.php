<?php 
require_once '../../koneksi/conn.php';
$id_barang = $conn->real_escape_string($_GET['id_barang']);

$sql=$conn->query("DELETE FROM kategori_barang WHERE id_barang='$id_barang' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>