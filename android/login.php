<?php
	include '../config/koneksi.php';
		
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if ((empty($username)) || (empty($password))) { 
		$response["error"] = 0;
        $response["error_msg"] = "Username Atau Password Kosong";
        echo json_encode($response);
	}
	
	$query = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
	
	$row = mysqli_fetch_array($query);
	
	if ($row != false) {
        // user ditemukan
        $response["error"] = FALSE;
		//$response["error_msg"] = "Berhasil Login.";
        $response["username"] = $row["username"];
		$response["tbl_user"]["id_user"] = $row["id_user"];
		$response["tbl_user"]["name"] = $row["name"];
        $response["tbl_user"]["username"] = $row["username"];
        $response["tbl_user"]["password"] = $row["password"];
		$response["tbl_user"]["handphone"] = $row["handphone"];
        echo json_encode($response);
		
	} else { 
		$response["error"] = TRUE;
        $response["error_msg"] = "Username Atau Password Salah";
        echo json_encode($response);
	}
	
	mysqli_close($koneksi);

?>