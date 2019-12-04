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

	<title>Ingresar</title>
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
						Ingresar
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" id="user" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" id="pass" type="password" name="pass" placeholder="Password">
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

					<!--<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or login with
						</span>
					</div>

					<a href="#" class="btn-face m-b-10">
						<i class="fa fa-facebook-official"></i>
						Facebook
					</a>

					<a href="#" class="btn-google m-b-10">
						<img src="images/icons/icon-google.png" alt="GOOGLE">
						Google
					</a>-->

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							¿Estas registrado?
						</span>

						<a class="txt1 bo1 hov1" href="registro.php">
							Registrase							
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
			if($('#user').val() != "" && $('#pass').val() != "" ){
				$.post("ajax/login.php",
					{
						user:$('#user').val(),
						pass:$('#pass').val()
					},function(result){
						console.log(result);
						var obj=JSON.parse(result);
						if(obj.status=="2")
						{
							alert(obj.desc);
						}else{
							location.href =window.location.origin+"/panel/index.php";
						}
					});
			}else{
				alert("Debe llenar el formulario");
			}
		});
		
	});
	</script>

</body>
</html>