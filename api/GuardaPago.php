<?php
require_once"funciones/funciones.php";
include "Conexion.php";

class GuardaPago{

	
	private $mysqli=null;
	
	public function __construct(){
		//$this->mysqli=new Conexion::Conectar();
		$mysql=new Conexion();
		$this->mysqli=$mysql->Conectar();
		$this->Guardar();
	}

	public function Guardar(){
		

		if(isset($_SESSION['ref'])){
			$id_pago=Inyeccion(param('id_pago'),$this->mysqli);
			$id_usuario=base64_decode($_SESSION['ref']);
			$id_payer=Inyeccion(param('id_payer'),$this->mysqli);
			$status=Inyeccion(param('status'),$this->mysqli);
			$concepto='Pago por servicio de rastreo';
			$monto=Inyeccion(param('monto'),$this->mysqli);
			$fecha_pago=date('Y-m-d H:i:s');

			
			if(!Verificar("SELECT * from usuarios where id='$id_usuario' ",$this->mysqli)){

				$sql="SELECT fecha from pagos where id_usuario='$id_usuario' order by fecha desc ";
				$query=$this->mysqli->query($sql);
				if($row=$query->fetch_array(MYSQLI_ASSOC)){
					$fecha = $row['fecha'];
					//sumo 1 mes
					$fecha = date("Y-m-d H:i:s",strtotime($fecha."+ 1 month")); 

				}else{
					$fecha=date('Y-m-d H:i:s');
				}

				$sql="INSERT into pagos (id_pago,id_usuario,id_payer,concepto,monto,status,fecha,fecha_pago) values('$id_pago','$id_usuario','$id_payer','$concepto','$monto','$status','$fecha','$fecha_pago') ";



				if($this->mysqli->query($sql)){			
					
					echo ('{"response":"1"}');
					
				}else{
					echo ('{"response":"0","porque":"'.$this->mysqli->error.'","msn":"No se registro el pago"}');
				}

			}else{
				echo ('{"response":"0","porque":"Cliente no valido"}');
			}
			
		}else{
			echo ('{"response":"0","porque":"No has iniciado sesión"}');
		}


	}



	


}

$Guardar=new GuardaPago();


?>