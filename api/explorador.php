<?php 
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";
echo$_REQUEST['data'];
$objeto=json_decode($_REQUEST['data']);

$imei=str_replace("\n", "", $objeto->imei);
$path=str_replace("\n", "", $objeto->path);

$fecha=date('Y-m-d H:i:s');
if($imei != ""){
	if ($con) {

		$sql="DELETE from explorador where imei='$imei' ";
		if(mysqli_query($con,$sql))
		{
			
		}else{
			echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
		}

		$sql="INSERT into explorador (imei,path,fecha) values('$imei','$path','$fecha') ";
		if($cons=mysqli_query($con,$sql))
		{
			echo'{"status":"1","desc":"Correcto"}';
		}else{
			echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
		}

	}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
		exit;

	}
}


?>