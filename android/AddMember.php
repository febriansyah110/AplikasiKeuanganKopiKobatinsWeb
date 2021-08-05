<?php

	include 'DatabaseConfig.php';
	$HostName = "localhost";
	$HostUser = "root";
	$HostPass = "";
	$DatabaseName = "keuangan_kopi_kobatins";
	$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

	$respon=array();

	if(isset($_POST['nama']) && isset($_POST['jumlah'])){
		$nama = $_POST['nama'];
		$jumlah = $_POST['jumlah'];

		$result=mysqli_query($con,"INSERT INTO kas_masuk (nama,jumlah) VALUES ('$nama','$jumlah')");

		if($result){
			$respon["sukses"] = 1;
			$respon["pesan"] = "Berhasil menambah data member";

			echo json_encode($respon);
		}else{
			$respon["sukses"] = 0;
			$respon["pesan"] = "Gagal menambah data member";
			echo json_encode($respon);
		}
	}else{
		$respon["sukses"] = 0;
		$respon["pesan"] = "Data belum terisi";
		echo json_encode($respon);
 }
?>