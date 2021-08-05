<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "keuangan_kopi_kobatins";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_error()){
	echo 'Gagal Melakukan Koneksi Ke Database : '.mysqli_connect_error();
}
?>