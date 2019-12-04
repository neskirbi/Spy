<?php
$imei=$_REQUEST['imei'];
$count=0;
$dir="../upload/".$imei."/";
$cdir = scandir($dir); 
$contenido='';
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
      	if(!strpos($value, ".")===false)
      	{
      		$count++;
      	}
        
            
         
      } 
   } 


$count1=0;
$dir="../upload/".$imei."/screen/";
$cdir = scandir($dir); 
$contenido='';
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
         if(!strpos($value, ".")===false)
         {
         $count1++;
      }
            
         
      } 
   } 

   echo'{"archivos":"'.$count.'","screen":"'.$count1.'"}';


   
?>

