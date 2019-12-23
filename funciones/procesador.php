<?php
date_default_timezone_set('America/Mexico_City');
include"../config/conexion.php";
class Procesar{

	private $conexion;
	public function __construct(){
		$this->conexion = new Conexion();
	}

	function Registrar($table="",$data=""){
		$mail=$data['mail'];
		$user=$data['user'];
		$pass=$data['pass'];
 		$fecha=date('Y-m-d H:i:s'); 
		$codigo=rand(1000,10000);
		if($this->Existe($data['user']) || $this->Existe($data['mail'])){	
			echo'{"status":"2","desc":"El Usuario o el Correo ya existen."}';				
		}else{
			$query="INSERT into usuarios (user,pass,mail,codigo,fecha) values('$user','$pass','$mail','$codigo','$fecha') ";

			echo $this->Query_I_U($query);
			
		}
		
	}


	function Insertar($table="",$data=""){
		$campos=array();
		$values=array();
		foreach ($data as $key => $value) {
			$campos[]=sanitiza($key);
			if($key=="fecha"){
				$values[]="'".date('Y-m-d H:i:s')."'"; 
			}else{
				$values[]="'".sanitiza($value)."'"; 
			}
			
		}
		$camposr="(".implode(",",$campos).") ";

		$valuesr="(".implode(",",$values).") ";
		
		$query="INSERT into $table $camposr values$valuesr ";

		echo $this->Query_I_U($query);
	}


	function Update($table="",$data=""){
		//print_r($data);
		$values=array();
		foreach ($data as $key => $value) {
			if($key=="fecha"){
				$values[]=sanitiza($key)."='".date('Y-m-d H:i:s')."'"; 
			}else{
				$values[]=sanitiza($key)."='".sanitiza($value)."'"; 
			}
			
		}


		$valuesr=" ".implode(",",$values)." ";
		
		$query="UPDATE $table set  $valuesr where ".$values[count($values)-1]." ";

		echo $this->Query_I_U($query);
	}

	function Delete($table="",$data=""){
		//print_r($data);
		$values=array();
		foreach ($data as $key => $value) {
			if($key=="fecha"){
				$values[]=sanitiza($key)."='".date('Y-m-d H:i:s')."'"; 
			}else{
				$values[]=sanitiza($key)."='".sanitiza($value)."'"; 
			}
			
		}


		$valuesr=" ".implode(",",$values)." ";
		
		$query="DELETE from $table where ".$valuesr." ";

		echo $this->Query_I_U($query);
	}


	private function Query_I_U($query){
		include"../config/conect.php";
		//$res=mysqli_query($con, $query);

		if($cons=mysqli_query($con,$query))
		{
			return '{"status":"1","desc":"Correcto"}';
		}else{
			return'{"status":"2","desc":"'.mysqli_error($con).'"}';
		}
	}

	private function Query_S($query){
		include"../config/conect.php";
		//$res=mysqli_query($con, $query);

		if($cons=mysqli_query($con,$query))
		{
			$temporal=array();
			while ( $temporal[]=mysqli_fetch_array($cons)) {
				
			}			
			return '{"data":"'.json_encode($temporal).'"}';
		}else{
			return'{"status":"2","desc":"'.mysqli_error($con).'"}';
		}
	}

	private function Existe($dato){
		include"../config/conect.php";
		//$res=mysqli_query($con, $query);
		$query="SELECT user from usuarios where user='$dato' ";
		if($cons=mysqli_query($con,$query))
		{
			if(mysqli_num_rows($cons)>0) {
				return true;
			}else {
				false;
			}		
			
		}else{
			echo'{"status":"2","desc":"'.mysqli_error($con).'"}';
		}
	}


//verifica pagos 
	function Verificar($tabla,$data){
		include"../config/conect.php";
		$mes=date('m');
		$anio=date('Y');
		$id=base64_decode($_SESSION['ref']);
		$fecha=date('Y-m-d H:i:s');
		$id_pago=$this->uuid();
		//$res=mysqli_query($con, $query);

		$query="SELECT fecha from pagos where id_usuario='$id' order by fecha desc ";
		
		if($cons=mysqli_query($con,$query))
		{
			if(mysqli_num_rows($cons)==0) {
				$query="INSERT into pagos (id_pago,id_usuario,id_payer,concepto,monto,status,fecha,fecha_pago) values('$id_pago','$id','gratis','gratis','0','gratis','$fecha','$fecha') ";

				$cons=mysqli_query($con,$query);
			}
		}

		$query="SELECT id_pago from pagos where MONTH(fecha)='$mes' and YEAR(fecha)='$anio' and id_usuario='$id' ";
		if($cons=mysqli_query($con,$query))
		{
			if(mysqli_num_rows($cons)>0) {
				echo true;
			}else {
				echo false;
			}		
			
		}else{
			echo false;
		}
		
	}

	function Tiene_acceso(){
		include"../config/conect.php";
		$mes=date('m');
		$anio=date('Y');
		$id=base64_decode($_SESSION['ref']);
		//$res=mysqli_query($con, $query);
		$query="SELECT id_pago from pagos where MONTH(fecha)='$mes' and YEAR(fecha)='$anio' and id_user='$id' ";
		if($cons=mysqli_query($con,$query))
		{
			if(mysqli_num_rows($cons)>0) {
				echo true;
			}else {
				echo false;
			}		
			
		}else{
			echo false;
		}
	}

	function Prueba($data){
		//$conexion=new Conexion();
		echo$this->conexion->Select('SELECT * from servidores');
		/*if($this->conexion->Insert_Update('SELECT * from servidores'))
		{
			echo '{"status":"1"}';
		}else{
			echo '{"status":"2"}';
		}*/
	}


	public function Get_Usuarios($id=""){
		$where="";
		if($id!=""){
			$where="where id='".$id."' ";
		}

		echo$sql="SELECT id,user,mail from usuarios $where ";
		echo $this->conexion->Select($sql);
	}

	public function uuid(){
	    $data = random_bytes(16);
	    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
	    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
	    return str_replace("-","",vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4)));
	}

}


/**
 * 
 */



?>