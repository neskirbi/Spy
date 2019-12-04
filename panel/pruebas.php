<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>
<body>

<button id="probar">Try</button>

</body>


<script>
$(document).ready(function(){
  $("#probar").click(function(){
  	var obj=new Object();
    obj.action="Usuarios";
    obj.data="";
    
    $.post("../api/reciver2.php",{data:obj},function(result){
    console.log(result);

    
  });
  });
});
</script>

</html>
