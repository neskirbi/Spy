<?php 
include"../funciones/validador.php";
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";

$orden=intval(Sanitiza(get_param('orden')));
$extra=Sanitiza(get_param('extra'));
$imei=Sanitiza(get_param('imei'));

$fecha=date('Y-m-d H:i:s');
if ($con) {

	
	$sql="INSERT into  ordenes   (imei,orden,status,extra,fecha) values('$imei',$orden,0,'$extra','$fecha') ";
	if($cons=mysqli_query($con,$sql))
	{
		echo"Correcto";
	}else{
		echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
	}




	

}else{

	echo'{"status":"2","desc":"Error de Conexion"}';

	exit;

}

?>