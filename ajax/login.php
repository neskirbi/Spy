<?php 
date_default_timezone_set('America/Mexico_City');
include"../config/conect.php";
include"../funciones/validador.php";


$user=get_param('user');
$pass=get_param('pass');

if ($con) {

   
   $sql="SELECT  user,id from usuarios where (user='$user' and pass='$pass') or (mail='$user' and pass='$pass') ";

   if($cons=mysqli_query($con,$sql)){

      $cont=mysqli_num_rows($cons);
      if($cont>0){
         $res=mysqli_fetch_array($cons);
         
         $_SESSION['user']=base64_encode($res['user']);
         $_SESSION['ref']=base64_encode($res['id']);
         echo $salida = json_encode($res);

      }else{
      echo'{"status":"2","desc":"Usuario no encontrado. Verificar datos "}';
      }

   }else{
      echo'{"status":"2","desc":"Error de Conexion"}';
   }

   

   

}else{

   echo'{"status":"2","desc":"Error de Conexion"}';

   exit;

}

?>

