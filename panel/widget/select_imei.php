<?php 
$user=get_session('user');
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";



if ($con) {

	
	$sql="SELECT imei,nombre from servidores where id_user=(SELECT id from usuarios where user='$user') ";

	if($cons=mysqli_query($con,$sql)){
		$Wselect='<select id ="select_imei" class="form-control"><option value="0">---Seleccionar---</option>';
		while($select=mysqli_fetch_array($cons)){
			$Wselect.='<option value="'.$select['imei'].'">'.$select['nombre'].'</option>';

		}
		$Wselect.='</select>';
		echo$Wselect;

	}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
	}

	

	

}else{



}

?>