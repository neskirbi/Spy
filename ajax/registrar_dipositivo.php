<?php 
include"../funciones/validador.php";
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";

$user=base64_decode($_SESSION['user']);
$nombre=(Sanitiza(get_param('nombre')));
$imei=(Sanitiza(get_param('imei')));
$numero=(Sanitiza(get_param('numero')));
$descrip=base64_encode(Sanitiza(get_param('descrip')));
$fecha=date('Y-m-d H:i:s');
if(strlen($imei)==15 || strlen($imei)==16){
	
}else{
	echo'{"status":"2","desc":"El tamaño del imei no es correcto"}';

	exit;
}
if ($con ) {


	
	$sql="SELECT * from servidores where imei='$imei' ";
	if($cons=mysqli_query($con,$sql))
	{
		$cont=mysqli_num_rows($cons);
		if($cont==0){
			$sql="INSERT into  servidores   (id_user,imei,nombre,descrip,fecha,numero) values((SELECT id from usuarios where user='$user' ),'$imei','$nombre','$descrip','$fecha','$numero') ";
			if($cons=mysqli_query($con,$sql))
			{
				echo'{"status":"1","desc":"Se registro correctamente."}';
			}else{
				echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
			}

		}else{
			echo'{"status":"2","desc":"Imei ya fue resgistrado antes."}';
		}
	}else{
		echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
	}

	
	



	

}else{

	echo'{"status":"2","desc":"Error de Conexion"}';

	exit;

}

?>