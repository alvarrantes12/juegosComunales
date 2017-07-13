<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Juegos Comunales | Grecia</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <link rel="shortcut icon" type="image/x-icon" href="/dist/img/LogoComite.ico">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/fonts/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  
  <script type="text/javascript" src="/dist/js/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<link rel="stylesheet" src="/bootstrap/css/bootstrap.css"></link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>       
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/es.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/masterPageSlider" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>J</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Juegos<b>Comunales</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
             
              <span class="glyphicon glyphicon-user"></span><span class="hidden-xs">{{session()->get('role')}}</span>
            </a>
            
            <ul class="dropdown-menu">
              
              <!-- User image -->
              <li class="user-header">
                <div class="glyphicon glyphicon-ok-sign"></div>
                <p>
                  {{session()->get('userP')}}
                  
                </p>
                <p>
                  Teléfono:
                  {{session()->get('telephone')}}
                 
                </p>
                <p>
                  Email:
                  {{session()->get('email')}}
                </p>
              </li>
             
          <!-- Control Sidebar Toggle Button -->
            <li class="user-footer">
                <div class="pull-left">
                  <a href="{{URL::to('editPerfil/')}}" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Cerrar Sesión</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                     </form>
                </div>
              </li>
        </ul>
      </div>
      <img src="/dist/img/fondo.jpg"  alt="Bandera Grecia" width="100%" height="10">
    </nav>
  </header>

  <!-- =============================================== -->

 <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
   
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-paste"></i> <span>Inscripciones Individuales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('insertNewPart/')}}"><i class="fa fa-circle-o"></i>Inscribir Participantes</a></li>
          
            <li><a href="{{URL::to('showAthletes/')}}"><i class="fa fa-circle-o"></i>Atletas Inscritos</a></li>
            
            <li><a href="{{URL::to('showExtraDel/')}}"><i class="fa fa-circle-o"></i>Personal de Apoyo Inscrito</a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-link"></i> <span>Inscripciones en Conjunto</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{URL::to('excelUpload/')}}"><i class="fa fa-circle-o"></i>Subir Archivo de Excel</a></li>
            <li><a href="{{URL::to('download/')}}"><i class="fa fa-circle-o"></i>Descargar Plantilla de Excel</a></li>
          </ul>
          </li>
        
        <li class="treeview">
          <a href="{{URL::to('reportDel/')}}">
            <i class="glyphicon glyphicon-file"></i> <span>Reporte</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          </li>
  
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


  <!-- =============================================== -->

  


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content">
      @yield('content')
    </section>
  </div>
  <footer class="main-footer">
    
    <div class="pull-right hidden-xs">
      <b>v 1.0</b> 
   </div>
   <div class="pull-center">
     <img src="/dist/img/LogoComite.png" class="img" alt="CCDRG" width="60" height="50">  <strong> <a href="https://es-la.facebook.com/comitecantonaldeportesGrecia/"> Comité Cantonal de Deportes y Recreación Grecia, 2017</a></strong>
    </div>
     <img src="/dist/img/fondo.jpg"  alt="Bandera Grecia" width="100%" height="10">
  </footer>

 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
</body>
</html>
