<?php
session_start();
date_default_timezone_set('America/Mexico_City');
ini_set('upload_max_filesize','64M');
ini_set('post_max_size','64M');
ini_set('max_execution_time','300M');
ini_set('max_input_time', 300);
ini_set('display_errors', '1');

//validar rutas para aacceso por tipo de usuario
function validar_rutas(){
	
	
	//Valida si la url esta permitida para el tipo de usuario
	$pos = intval(strpos($_SERVER['PHP_SELF'],'pago.php'));	
	if ($pos > 0) {
		switch (intval(base64_decode($_SESSION['tipo']))) {
			case 1:
				echo('<script>window.location.href = "index.php";</script>');
				break;
			
			case 2:
				break;
		}
	}

	$pos = intval(strpos($_SERVER['PHP_SELF'],'mapa.php'));
	if ($pos > 0) {
		switch (intval(base64_decode($_SESSION['tipo']))) {
			case 1:
				break;
			
			case 2:
				echo('<script>window.location.href = "index.php";</script>');
				break;
		}
	}
}


$pos = strpos($_SERVER['PHP_SELF'],'api');

//Se ejecuta solo si no estamos en el directorio de las apis 
if ($pos === false) {
	validar_rutas();	   
} 

function validar_url(){	

	//Valida si el usuario esta logueado
	$pos = strpos($_SERVER['PHP_SELF'],'api');

	
	if ($pos === false) {
		if(!isset($_SESSION['ref'])){	 	
	 		echo('<script>window.location.href = "../index.php";</script>');
	 	}	   
	} 
}

validar_url();



function uuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return str_replace("-","",vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4)));
}

function param($parametro){
	
	if(isset($_REQUEST['data']) ){
		$param=json_decode($_REQUEST['data'],true);
		if(isset($param[$parametro])){
			return $param[$parametro];
		}else{
			return "";
		}
		
	}else{
		return "";
	}
	
}

function Inyeccion($string,$conexion){
	return $conexion->real_escape_string($string);
}


function Verificar($sql,$mysqli){
	//echo $sql;
	$sql=$mysqli->query($sql);
	
	if($row=$sql->fetch_array(MYSQLI_ASSOC)){
		return false;
	}else{
		return true;
	}
}

function Tipo(){
	return base64_decode($_SESSION['tipo']);
}

function fechahora(){
	return date('Y-m-d H:i:s');
}

function fecha(){
	return date('Y-m-d');
}

function ($sql){
	$result=array();
			
	while($row=$sql->fetch_array(MYSQLI_ASSOC)){
		$result[]=$row;
	}

	echo json_encode($result);
}

?>

