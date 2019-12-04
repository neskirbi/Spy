<?php
session_start();

function get_session($nombre){
	if (isset($_SESSION[$nombre])) {
		return base64_decode($_SESSION[$nombre]);
	}else{
		return "";
	}
}



function Sanitiza($dato){

	$dato = str_replace( array('<',';','|','&','>',"'",'"',')','('), array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'), $dato );
    $dato = str_ireplace( '%3Cscript', '', $dato );
    return $dato;
	/*$dato= str_replace("SELECT", "", $dato);
	$dato= str_replace("UPDATE", "", $dato);
	$dato= str_replace("DELETE", "", $dato);
	$dato= str_replace("DROP", "", $dato);
	$dato= str_replace("INSERT", "", $dato);
	return $dato;*/
}


function param($param){

	if(isset($_REQUEST[$param])){
		
		if (is_array($_REQUEST[$param])) {
			return json_decode(json_encode($_REQUEST[$param]),true);
		}else{
			
			return json_decode($_REQUEST[$param],true);
			
		}
	}else{
		return "";
	}
}


function get_param($param){

	if(isset($_REQUEST[$param])){
	
		return $_REQUEST[$param];
		
	}else{
		return "";
	}
}

?>