<?php
include "panel/header.php";
if(get_session('user')!=""){
	?>
	<script>
	  location.href =window.location.origin+"/panel/index.php";
	</script>
	<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Registro</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form id="formu" >
					<span class="login100-form-title p-b-55">
						Registro
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" id="mail" type="text" name="email" placeholder="Correo">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" id="user" type="text" name="usuario" placeholder="Usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="fa fa-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" id="pass" type="password" name="pass" placeholder="Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" id="pass_conf" type="password" name="pass_conf" placeholder="Confirmar Contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<!--<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>-->
					
					<div class="container-login100-form-btn p-t-25">
						<button id="login" class="login100-form-btn">
							Enviar
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							¿Estas registrado?
						</span>

						<a class="txt1 bo1 hov1" href="index.php">
							Ingresar							
						</a>
					</div>

					

					
				</form>
			</div>
		</div>
	</div>
	
	

<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script>
	$(document).ready(function(){
		$( "#formu" ).submit(function( event ) {
			event.preventDefault();
			if($('#user').val() != "" && $('#usuario').val() != "" && $('#pass').val() != "" && $('#pass_conf').val() != ""){
			
				if($('#pass').val() != $('#pass_conf').val()){
					alert("Las contraseñas no coinciden");
				}else{
					
				
					var obj=new Object(),objt=new Object();
					objt.mail=$('#mail').val();
					objt.user=$('#user').val();
					objt.pass=$('#pass').val();
					objt.fecha="fecha";
					//objt.pass_conf=$('#pass_conf').val();
					
					obj.action="Registrar";
					obj.tabla="usuarios";
					obj.data=objt;
					$.post("api/reciver.php", { data:obj },function(result){
						//console.log(result);
						try{
							var obj=JSON.parse(result);
							if(obj.status=="2")
							{
								alert(obj.desc);
							}else{
								alert("¡Registro exitoso!");
								$('#formu').trigger("reset");

							}
						}catch(error){
							alert("¡Algo salio mal!");
							console.log(result);
						}
						
					});	
				}		
			}else{
				alert("Debe llenar el formulario");
			}
		});
		
	});
	</script>

</body>
</html>