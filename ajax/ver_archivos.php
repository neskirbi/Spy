<?php
$imei=$_REQUEST['imei'];

$dir="../upload/".$imei."/";
$cdir = scandir($dir); 
$contenido='';
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
      	if(!strpos($value, ".")===false)
      	{
      		$contenido.='<div  class="mini_explo"><center><div><img data-toggle="modal" data-target="#myModal" class="ver_archivo" src="../upload/'.$imei."/".$value.'" width="60px"></div><div class="text_mini">'.$value.'</div></center></div>';
      	}
        
            
         
      } 
   } 
   echo $contenido;


   ?>

