<?php 
include"../funciones/validador.php";
$user=get_session('user');
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";

$fecha=date('Y-m-d H:i:s');
$imei=(get_param('imei'));

if($imei != ""){

	if ($con) {

		
			$sql="SELECT imei,nombre,descrip,imei,bateria,llamadas,contactos,mensajes,ult_conexion,log_llamadas,log_mensajes,log_contactos from servidores where imei='$imei'    ";

		if($cons=mysqli_query($con,$sql)){

			$cont=mysqli_num_rows($cons);
			if($cont>0){
				echo$salida = json_encode($arre=mysqli_fetch_array($cons));
				
				

			}else{
			echo'{"status":"2","desc":"Usuario no existe"}';
			}

		}

		

		

	}else{

		echo'{"status":"2","desc":"Error de Conexion"}';

		exit;

	}
}else{
	echo'{"status":"1","orden":"0"}';
}


?>