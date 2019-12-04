<?php
session_start();

function get_session($nombre){
	if (isset($_SESSION[$nombre])) {
		return base64_decode($_SESSION[$nombre]);
	}else{
		return "";
	}
}

?>