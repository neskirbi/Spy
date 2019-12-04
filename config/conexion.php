<?php
/**
 * 
 */
class Conexion
{
	private $servername = "localhost";
	private $username = "id9067304_espiando";
	private $password = "ramira1983";
	private $nombreBD = "id9067304_espiando";
	private $enlace=null;//Almacena el enlace con la Base de Datos una vez establecido
    

	
	public function __construct()
	{
		$this->servername = "localhost";
		$this->username = "id9067304_espiando";
		$this->password = "ramira1983";

		$this->enlace = new mysqli($this->servername, $this->username, $this->password, $this->nombreBD);


		// Check connection
		if ($this->enlace->connect_error) {
			echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		    die("Connection failed: " . $this->enlace->connect_error);
		}else{
			
		}
	}

	public function Select($consulta=''){

		$resultado=array();
		if($query=$this->enlace->query($consulta))
		{
			while($res=$query->fetch_assoc()) {
				$resultado[]=$res;
			}
				return json_encode($resultado);
		}else{
			// ¡Oh, no! La consulta falló. 
		    echo '{"status":"2"}';
		    exit;
		}
		

	}


	private function Insert_Update($consulta=''){

		$resultado=array();
		return($query=$this->enlace->query($consulta));
		
	}
}






?>