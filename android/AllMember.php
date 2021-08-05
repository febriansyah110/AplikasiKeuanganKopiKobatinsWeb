<?php

	$HostName ="localhost";
	$HostUser = "root";
	$HostPass = "";
	$DatabaseName = "keuangan_kopi_kobatins";
	$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
	$respon=array();
	$result=mysqli_query($con,"SELECT * FROM kas_masuk") or die (mysqli_error());
	
	if(mysqli_num_rows($result)>0)
	{
		$respon["tempmember"] = array();
			while ($row = mysqli_fetch_array($result))
			{
				$tempmember = array();
				//$tempmember["id"] = $row["id"];
				$tempmember["jumlah"] = $row["jumlah"];
				$tempmember["tanggal"] = $row["tanggal"];
				array_push($respon["tempmember"],$tempmember);
			}
			$respon["sukses"]=1;
			echo json_encode($respon);
	}
	else
	{
		$respon["sukses"]=0;
		$respon["pesan"]="Tidak Ada Pemasukan";
		echo json_encode($respon);
	}
	mysqli_close($con);
	?>