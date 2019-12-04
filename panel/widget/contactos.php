<?php 
include"../../funciones/validador.php";
date_default_timezone_set('America/Mexico_City');
include"../../config/conect.php";
$user=base64_decode($_SESSION['user']);

if ($con) {

	
	$sql="SELECT imei,nombre,numero from servidores where id_user=(SELECT id from usuarios where user='$user') ";

	if($cons=mysqli_query($con,$sql)){
		$obj=array();
		while($res=mysqli_fetch_array($cons)){
			$obj[]=$res;
		}
		echo json_encode($obj);



	}else{
		echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
	}
	

}else{
echo'{"status":"2","desc":"Error de Conexion"}';

exit;


}

?>