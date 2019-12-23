<?php
require_once"funciones/funciones.php";
include "Conexion.php";

class GetPagos{

	
	private $mysqli=null;
	
	public function __construct(){
		//$this->mysqli=new Conexion::Conectar();
		$mysql=new Conexion();
		$this->mysqli=$mysql->Conectar();
		$this->Get();
	}

	public function Get(){
		$id_usuario=base64_decode($_SESSION['ref']);
		
		
		$sql="SELECT usu.user,pag.id_pago,pag.monto,pag.status,pag.fecha,pag.fecha_pago from pagos as pag join usuarios as usu on usu.id=pag.id_usuario where pag.id_usuario='$id_usuario' order by fecha desc ";
	

		$sql=$this->mysqli->query($sql);

		$result=array();
		
		while($row=$sql->fetch_array(MYSQLI_ASSOC)){
			$row['fecha'] = date("Y-m",strtotime($row['fecha'])); 
			$row['fecha_pago'] = date("Y-m-d",strtotime($row['fecha_pago'])); 
			$result[]=$row;
		}

		echo json_encode($result);
		
		

			


	}





}
$Guardar=new GetPagos();

?>