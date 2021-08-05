<?php date_default_timezone_set("Asia/Jakarta");

include '../config/koneksi.php';
//include 'autokode.php';

$nama = $_POST['nama'];
$jumlah = $_POST['jumlah'];
//$id = $_POST['id'];
//$tanggal = $_POST['tanggal'];

	if ((empty($nama))) { 
		$response["error"] = 0;
        $response["error_msg"] = "Tidak Boleh Kosong";
        echo json_encode($response);
	} else if ((empty($jumlah))){
		$response["error"] = 0;
        $response["error_msg"] = "Tidak Boleh Kosong";
        echo json_encode($response);
		
	} else {
		if (!empty($nama) && $jumlah){
			$num_rows = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kas_masuk WHERE nama='".$nama."'"));

	if ($num_rows == 0){
			$insert = mysqli_query($koneksi, "INSERT INTO kas_masuk(nama,jumlah) 
				VALUES('$nama','$jumlah')");  
  
	if($insert){  
		    $response['message'] = 'Tambah Pemasukan Berhasil';
			$response['error'] = FALSE;
			echo json_encode($response);
	} else {
		$response["error"] = TRUE;
		$response["error_msg"] = "Tambah Pemasukan Gagal";
		echo json_encode($response);
		}
	} else {
		$response["error"] = TRUE;
		$response["error_msg"] = "Sudah Ada";
		echo json_encode($response);
		}
	}
	}

mysqli_close($koneksi);

?>