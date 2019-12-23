<?php
if($_SERVER['HTTP_HOST']==='localhost'){
			
	$datos['host']="localhost";
	$datos['user']="root";
	$datos['pass']="986532";
	$datos['db']="spy";
	
	
}else {
	
	$datos['host']="localhost";
	$datos['user']="id9067304_espiando";
	$datos['pass']="ramira1983";
	$datos['db']="id9067304_espiando";
}
$con = mysqli_connect($datos['host'],$datos['user'],$datos['pass'],$datos['db']);

if (!$con) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



?>