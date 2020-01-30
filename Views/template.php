<!DOCTYPE html>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SICA -WEB| <?php echo $_SESSION['StockPower']['name']; ?></title>
  <!-- Icone -->
  <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/template.css">
  <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/adminlte/dist/css/skins/skin-blue.min.css">
  <!-- JQuery -->
  <script src="<?php echo BASE_URL ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
  <script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/jquery.mask.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap-notify.min.js"></script>

  <!-- Datatable -->
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/plugins/data.css">	
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">	
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/plugins/data_bootstrap4.css">
  <script type="text/javascript" src="<?php echo BASE_URL ?>assets/plugins/data.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL ?>assets/plugins/data_bootstrap4.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	
  <!-- Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo BASE_URL; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>RJ</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SICA</b> WEB</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo BASE_URL; ?>login/logout">
              <i class="fa fa-sign-out-alt"></i><span class="hidden-xs" style="font-weight: bold;"> Sair</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="info">
          <p><?php echo $_SESSION['StockPower']['name']; ?></p>
          <!-- Status -->
		  <?php 
		   switch ($_SESSION['StockPower']['tipo_usuario']) {
			case 1:
				echo ' <i class="fa fa-circle text-success"></i> &nbspAdministrador';  
				break;
			case 2:
				echo ' <i class="fa fa-circle text-success"></i> &nbspOperador' ; 
				break;
			case 3:
				echo ' <i class="fa fa-circle text-success"></i> &nbspUsuário' ; 
				break;
			}
		  ?>
           
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
		<?php if($_SESSION['StockPower']['tipo_usuario'] == 1):?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Administrador</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo ($viewData['menuActive']=='sarquear')?'active':''; ?>" <a href="<?php echo BASE_URL ?>sarquear/add"><i class="fa fa-pencil-square-o"></i> <span>Solicitar</span></a></li>
             <li><a class="<?php echo ($viewData['menuActive']=='consulta')?'active':''; ?>" <a href="<?php echo BASE_URL ?>consulta"><i class="fa fa-book"></i> <span>Consulta</span></a></li> 

          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="ion ion-person-add"></i>
            <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo ($viewData['menuActive']=='usuario')?'active':''; ?>" <a href="<?php echo BASE_URL ?>usuario"><i class="fa fa-users"></i> <span>Usuário</span></a></li>
            <li><a class="<?php echo ($viewData['menuActive']=='base')?'active':''; ?>" <a href="<?php echo BASE_URL ?>base"><i class="fa fa-book"></i> <span>Base</span></a></li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-paste"></i>
            <span>Relatórios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo ($viewData['menuActive']=='relatorio')?'active':''; ?>" <a href="<?php echo BASE_URL ?>relatorio"><i class="fa fa-users"></i> <span>Consultas</span></a></li>
          </ul>
        </li>
	 </ul>
		<?php endif; ?>
		<?php if($_SESSION['StockPower']['tipo_usuario'] == 2):?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Atendimento</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

             <li><a class="<?php echo ($viewData['menuActive']=='consulta')?'active':''; ?>" <a href="<?php echo BASE_URL ?>consulta"><i class="fa fa-users"></i> <span>Consulta</span></a></li>
			  <li><a class="<?php echo ($viewData['menuActive']=='sarquear')?'active':''; ?>" <a href="<?php echo BASE_URL ?>sarquear"><i class="fa fa-laptop"></i> <span>Monitorar</span></a></li>
          </ul>
        </li>

		<?php endif;?>		
		<?php if($_SESSION['StockPower']['tipo_usuario'] == 3):?>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Abordagem</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="<?php echo ($viewData['menuActive']=='sarquear')?'active':''; ?>" <a href="<?php echo BASE_URL ?>sarquear/add"><i class="fa fa-pencil-square-o"></i> <span>Solicitar</span></a></li>
             <li><a class="<?php echo ($viewData['menuActive']=='sarquear')?'active':''; ?>" <a href="<?php echo BASE_URL ?>sarquear"><i class="fa fa-book"></i> <span>Monitorar</span></a></li> 
		      <li><a class="<?php echo ($viewData['menuActive']=='consulta')?'active':''; ?>" <a href="<?php echo BASE_URL ?>consulta"><i class="fa fa-book"></i> <span>Consultados</span></a></li> 	 
          </ul>

        </li>
		<?php endif;?>

        
	  
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php $this->loadViewInTemplate($viewName, $viewData); ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <strong style="text-transform: uppercase;">SICA WEB</strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright <?php echo date('Y'); ?> <a href="" target="_blank">NUINTE</a>.</strong> Todos os Direitos Reservados.
  </footer>

<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL ?>assets/adminlte/dist/js/adminlte.min.js"></script>
</body>
</html>