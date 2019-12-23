<?php
session_start();

function get_session($nombre){
	if (isset($_SESSION[$nombre])) {
		return base64_decode($_SESSION[$nombre]);
	}else{
		return "";
	}
}
$ver=0;

echo <<<Libs
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css?$ver" accesskey="" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js?$ver" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Android Spy | Consola</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css?$ver">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css?$ver">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css?$ver">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css?$ver">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css?$ver">
  <!-- Morris chart -->
  <!--<link rel="stylesheet" href="bower_components/morris.js?$ver/morris.css?$ver">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css?$ver">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css?$ver">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css?$ver">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css?$ver">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css?$ver">
  <link rel="stylesheet" href="/resources/demos/style.css?$ver">
  

  <!-- HTML5 Shim and Respond.js?$ver IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js?$ver doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js?$ver"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js?$ver"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <!--Sand box
  <script src="https://www.paypal.com/sdk/js?client-id=AXKp-hkvyLKt4JHQnN6iAj81Nu3b43f1MwwiLOCaaKVSPXR59OiSLT6QDWyZAdgt57Sx7CIdz6ZyVa4-"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>

    -->

     <!--Real pay-->
  <script src="https://www.paypal.com/sdk/js?client-id=ASQFhXpFCem8WF6DMBJElwForYi_487oXnbkvaQp1grNgNcN7QU_AERbUK_U2JyLgELuZvuKEslp0SWa"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  	</script>

Libs;

?>