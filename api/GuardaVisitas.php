<?php
require_once"funciones/funciones.php";
include "Conexion.php";

class GuardaVisitas{

	
	private $mysqli=null;
	
	public function __construct(){
		//$this->mysqli=new Conexion::Conectar();
		$mysql=new Conexion();
		$this->mysqli=$mysql->Conectar();
		$this->Guardar();
	}

	public function Guardar(){
		

			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ip = $_SERVER['HTTP_CLIENT_IP'];
			} else {
			    $ip = $_SERVER['REMOTE_ADDR'];
			}

			$fecha=date('Y-m-d');
			

			
			if(Verificar("SELECT * from visitas where ip='$ip' and fecha='$fecha' ",$this->mysqli)){
				

				$sql="INSERT into visitas (ip,fecha) values('$ip','$fecha') ";



				if($this->mysqli->query($sql)){			
					
					echo ('{"response":"1"}');
					
				}else{
					echo ('{"response":"0","porque":"'.$this->mysqli->error.'","msn":"No se registro el pago"}');
				}

			}else{
				echo ('{"response":"1","porque":"Ok"}');
			}
			
		


	}



	


}

$Guardar=new GuardaVisitas();


?>