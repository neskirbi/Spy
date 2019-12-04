<?php
$imei=$_REQUEST['imei'];

$dir="../upload/".$imei."/screen/";
$cdir = scandir($dir); 
$contenido='';
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
      	if(!strpos($value, ".")===false)
      	{
        	$contenido.='<div  class="mini_screen"><center><div><img class="ver_screen" src="../upload/'.$imei."/screen/".$value.'" width="60px"></div><div class="text_mini">'.$value.'</div></center></div>';
    	}
            
         
      } 
   } 
   echo $contenido;


   ?>

