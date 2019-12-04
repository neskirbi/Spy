<?php

include"../funciones/validador.php";
include"../funciones/procesador.php";
$obj=param('data');
//print_r($obj);
$function=$obj['action'];

//print_r($obj);
switch ($obj['action']) {
	case 'Registrar':
		$function='Get_Usuarios';
		break;

	case 'Usuarios':
		$function='Get_Usuarios';
		break;
	
	default:
		$function=$obj['action'];
		
		$procesar=new Procesar();

		
		break;
}
$procesar=new Procesar();
$procesar->$function($obj['data']);


?>