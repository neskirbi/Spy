<?php 
include"../ajax/validador.php";
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";
$objeto=json_decode((get_param('data')));
$imei=$objeto->imei;
$lat=$objeto->lat;
$lon=$objeto->lon;

$fecha=date('Y-m-d H:i:s');

if ($con) {
	$sql="INSERT into locations (imei,lat,lon,fecha) values('$imei','$lat','$lon','$fecha') ";
	if($cons=mysqli_query($con,$sql))
	{
		echo'{"status":"1","desc":"Correcto"}';
	}else{
		echo'{"status":"2","desc":"'.mysqli_error($con).'"}';;
	}
}else{
	echo'{"status":"2","desc":"Error de Conexion"}';
	exit;

}

?>