<?php 
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";


$imei=str_replace(" ", "", $_REQUEST['imei']);

if ($con) {

	
	$sql="SELECT  s.nombre nombre,l.imei imei,l.lat lat,l.lon lon,l.fecha fecha from locations l join servidores s on s.imei=l.imei  where l.imei='$imei' order by l.fecha desc LIMIT 0,1  ";

	if($cons=mysqli_query($con,$sql)){

		$cont=mysqli_num_rows($cons);
		if($cont>0){
			echo$salida = json_encode(mysqli_fetch_array($cons));
		}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
		}

	}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
	}

	

	

}else{

	echo'{"status":"2","desc":"Error de Conexion"}';

	exit;

}

?>