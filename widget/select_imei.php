<?php 

date_default_timezone_set('America/Mexico_City');
include"config/conect.php";



if ($con) {

	
	$sql="SELECT distinct imei from ordenes  ";

	if($cons=mysqli_query($con,$sql)){
		$Wselect='<select id ="select_imei">';
		while($select=mysqli_fetch_array($cons)){
			$Wselect.='<option value="'.$select['imei'].'">'.$select['imei'].'</option>';

		}
		$Wselect.='</select>';
		echo$Wselect;

	}else{
		echo'{"status":"2","desc":"Error de Conexion"}';
	}

	

	

}else{



}

?>