<?php 
require_once '../../koneksi/conn.php';
$id_barang = $conn->real_escape_string($_POST['id_barang']);
$nama_barang = $conn->real_escape_string($_POST['nama_barang']);

$data = array();
$data['error_string'] = array();
$data['inputerror'] = array();
$data['status'] = TRUE;

if($nama_barang == ''){
	$data['inputerror'][] = 'nama_barang';
	$data['error_string'][] = 'Nama barang wajib di isi';
	$data['status'] = FALSE;
}


if($data['status'] === FALSE){
	echo json_encode($data);
	exit();
}

$sql=$conn->query("UPDATE kategori_barang SET nama_barang='$nama_barang' WHERE id_barang='$id_barang' ");
if ($sql) {
    echo json_encode(array("status" => TRUE));
}
?>