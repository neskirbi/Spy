<?php 
ini_set('upload_max_filesize','64M');
ini_set('post_max_size','64M');
ini_set('max_execution_time','300M');
ini_set('max_input_time', 300); 

date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";
//echo$_REQUEST['data'];
$objeto=json_decode($_REQUEST['data']);

$imei=$objeto->imei;
$nombre=$objeto->nombre;
$path=$objeto->path;
$base64=$objeto->base64;

$fecha=date('Y-m-d H:i:s');

$filef=base64_decode(($base64));
$pos = strpos($nombre, "screen");
if($pos===false){
	$screen="";
}else{
	$screen="screen/";
}


// we give the file a random name
$name    = $nombre;

// a route is created, (it must already be created in its repository(pdf)).
echo$dir    = "../upload/".$imei."/$screen";
$rute=$dir.$name;

if(!is_dir($dir))
{
	mkdir("../upload/".$imei."/") ;
	mkdir("../upload/".$imei."/$screen") ;
}

	if(!is_dir($dir)) {
    die('Fallo al crear las carpetas...');
}else{

	//decode base64
	//$pdf_b64 = base64_decode($base_64);
 	//echo "guardando:  ".file_exists($rute);
	// you record the file in existing folder
	if(!file_exists($rute)){
	     file_put_contents($rute, $filef);
	    echo"Se subio el archivo";
	   if ($con) 
	   {
			echo$sql="INSERT into archivos (imei,nombre,base64,fecha,path,base642) values('$imei','$nombre','$rute','$fecha','$path','$base64') ";
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
	}

	}



?>