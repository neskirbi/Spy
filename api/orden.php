<?php 
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";

$fecha=date('Y-m-d H:i:s');
$imei=str_replace("\n", "", $_REQUEST['imei']);

if($imei != ""){
	$sql="SELECT  imei from ordenes where imei='$imei'  ";
	if($cons=mysqli_query($con,$sql)){
		$cont=mysqli_num_rows($cons);
			if($cont==0){
				$sql="INSERT into  ordenes   (imei,orden,status,extra,fecha) values('$imei',0,1,'','$fecha') ";
					if($cons=mysqli_query($con,$sql))
					{
						//echo"Correcto";
					}else{
						echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
					}
			}

	}


	$sql="UPDATE servidores  set ult_conexion='$fecha' where imei='$imei'  ";
	if($cons=mysqli_query($con,$sql))
	{
		//echo"Correcto";
	}else{
		echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
	}
	

	if ($con) {

		
			$sql="SELECT id,orden,extra from ordenes where imei='$imei' and status=0 order by fecha desc limit 0,1   ";

		if($cons=mysqli_query($con,$sql)){

			$cont=mysqli_num_rows($cons);
			if($cont>0){
				echo$salida = json_encode($arre=mysqli_fetch_array($cons));
				
				//echo '{"status":"1","orden":"'.$salida.'"}';

				$sql="UPDATE  ordenes  set status=1 where imei='$imei' and id='$arre[id]' ";
				if($cons=mysqli_query($con,$sql))
				{
				}else{
					echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
				}

			}else{
			echo'{"status":"1","orden":"0"}';
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