<?php 
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";


$imei=str_replace(" ", "", $_REQUEST['imei']);

if ($con) {

	
	$sql="SELECT  path from explorador where imei='$imei' order by fecha desc LIMIT 0,1  ";

	if($cons=mysqli_query($con,$sql)){

		$cont=mysqli_num_rows($cons);
		if($cont>0){
			$salida = (mysqli_fetch_array($cons));
			echo $salida['path'];
		}else{
		echo'{"status":""}';
		}

	}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
	}

	

	

}else{

	echo'{"status":"2","desc":"Error de Conexion"}';

	exit;

}

?>