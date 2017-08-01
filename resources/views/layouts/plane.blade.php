<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Prueba</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

	<link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

	<link href="/plugins/node-waves/waves.css" rel="stylesheet" />

	<!-- Animation Css -->
	<link href="/plugins/animate-css/animate.css" rel="stylesheet" />

	<!-- Morris Chart Css-->
	<link href="/plugins/morrisjs/morris.css" rel="stylesheet" />

	<!-- Custom Css -->
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/style-2.css" rel="stylesheet">

	<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
	<link href="/css/themes/all-themes.css" rel="stylesheet" />

	<link rel="stylesheet" href="/css/style.css" />
	<link rel="stylesheet" href="/js/admin.js" />
</head>
<body class="theme-red">
	<div class="page-loader-wrapper">
		<div class="loader">
			<div class="preloader">
				<div class="spinner-layer pl-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
			<p>Cargando...</p>
		</div>
	</div>
	<div class="overlay"></div>
	<div class="search-bar">
		<div class="search-icon">
			<i class="material-icons">search</i>
		</div>
		<input type="text" placeholder="START TYPING...">
		<div class="close-search">
			<i class="material-icons">close</i>
		</div>
	</div>
	<nav class="navbar">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
				<a href="javascript:void(0);" class="bars"></a>
				<a class="navbar-brand" href="/">POLEX S.A.</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
							<i class="material-icons">accessibility</i>
						</a>
						<ul class="dropdown-menu pull-right">
							<li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
							<li role="seperator" class="divider"></li>
							<li><a href="/logout"><i class="material-icons">input</i>Salir</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<section>
		<!-- Left Sidebar -->
		<aside id="leftsidebar" class="sidebar">
			<!-- User Info -->
			<div class="user-info">
				<div class="image">
					<img src="/images/icon-2.png" width="48" height="48" alt="User" />
				</div>
				<div class="info-container">
					<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} {{Auth::user()->last_name}}</div>
					<div class="email">{{Auth::user()->perfil->name}}</div>
				</div>
			</div>
			<!-- #User Info -->
			<!-- Menu -->
			<div class="menu">
				<ul class="list">
					<li class="{{ Request::path() == '/' ? 'active' : '' }}">
						<a href="/">
							<i class="material-icons">dashboard</i>
							<span>Inicio</span>
						</a>
					</li>
					<li class="{{ (Request::is('proyecto*')) ? 'active' : '' }}">
						<a href="#" class="menu-toggle">
							<i class="material-icons">domain</i>
							<span>Proyectos</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="{{route('proyecto.index')}}">Ver Proyectos</a>
							</li>
							<li>
								<a href="{{route('proyecto.create')}}">Crear Proyecto</a>
							</li>
						</ul>
					</li>
					<li class="{{ (Request::is('material*')) ? 'active' : '' }}">
						<a href="#" class="menu-toggle">
							<i class="material-icons">layers</i>
							<span>Material</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="{{route('material.index')}}">Ver materiales</a>
							</li>
							<li>
								<a href="{{route('material.create')}}">Crear material</a>
							</li>
						</ul>
					</li>
					<li class="{{ (Request::is('user*')) ? 'active' : '' }}">
						<a href="#" class="menu-toggle">
							<i class="material-icons">people</i>
							<span>Usuarios</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="{{route('user.index')}}">Ver usuarios</a>
							</li>
							<li>
								<a href="{{route('user.create')}}">Crear usuario</a>
							</li>
						</ul>
					</li>
					<li class="{{ (Request::is('perfil*')) ? 'active' : '' }}">
						<a href="#" class="menu-toggle">
							<i class="material-icons">assignment_ind</i>
							<span>Perfil</span>
						</a>
						<ul class="ml-menu">
							<li>
								<a href="{{route('perfil.index')}}">Ver perfiles</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</aside>
		<aside id="rightsidebar" class="right-sidebar">
			<ul class="nav nav-tabs tab-nav-right" role="tablist">
				<li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
				<li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
			</ul>
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active in active" id="skins">
					<ul class="demo-choose-skin">
						<li data-theme="red" class="active">
							<div class="red"></div>
							<span>Red</span>
						</li>
						<li data-theme="pink">
							<div class="pink"></div>
							<span>Pink</span>
						</li>
						<li data-theme="purple">
							<div class="purple"></div>
							<span>Purple</span>
						</li>
						<li data-theme="deep-purple">
							<div class="deep-purple"></div>
							<span>Deep Purple</span>
						</li>
						<li data-theme="indigo">
							<div class="indigo"></div>
							<span>Indigo</span>
						</li>
						<li data-theme="blue">
							<div class="blue"></div>
							<span>Blue</span>
						</li>
						<li data-theme="light-blue">
							<div class="light-blue"></div>
							<span>Light Blue</span>
						</li>
						<li data-theme="cyan">
							<div class="cyan"></div>
							<span>Cyan</span>
						</li>
						<li data-theme="teal">
							<div class="teal"></div>
							<span>Teal</span>
						</li>
						<li data-theme="green">
							<div class="green"></div>
							<span>Green</span>
						</li>
						<li data-theme="light-green">
							<div class="light-green"></div>
							<span>Light Green</span>
						</li>
						<li data-theme="lime">
							<div class="lime"></div>
							<span>Lime</span>
						</li>
						<li data-theme="yellow">
							<div class="yellow"></div>
							<span>Yellow</span>
						</li>
						<li data-theme="amber">
							<div class="amber"></div>
							<span>Amber</span>
						</li>
						<li data-theme="orange">
							<div class="orange"></div>
							<span>Orange</span>
						</li>
						<li data-theme="deep-orange">
							<div class="deep-orange"></div>
							<span>Deep Orange</span>
						</li>
						<li data-theme="brown">
							<div class="brown"></div>
							<span>Brown</span>
						</li>
						<li data-theme="grey">
							<div class="grey"></div>
							<span>Grey</span>
						</li>
						<li data-theme="blue-grey">
							<div class="blue-grey"></div>
							<span>Blue Grey</span>
						</li>
						<li data-theme="black">
							<div class="black"></div>
							<span>Black</span>
						</li>
					</ul>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="settings">
					<div class="demo-settings">
						<p>GENERAL SETTINGS</p>
						<ul class="setting-list">
							<li>
								<span>Report Panel Usage</span>
								<div class="switch">
									<label><input type="checkbox" checked><span class="lever"></span></label>
								</div>
							</li>
							<li>
								<span>Email Redirect</span>
								<div class="switch">
									<label><input type="checkbox"><span class="lever"></span></label>
								</div>
							</li>
						</ul>
						<p>SYSTEM SETTINGS</p>
						<ul class="setting-list">
							<li>
								<span>Notifications</span>
								<div class="switch">
									<label><input type="checkbox" checked><span class="lever"></span></label>
								</div>
							</li>
							<li>
								<span>Auto Updates</span>
								<div class="switch">
									<label><input type="checkbox" checked><span class="lever"></span></label>
								</div>
							</li>
						</ul>
						<p>ACCOUNT SETTINGS</p>
						<ul class="setting-list">
							<li>
								<span>Offline</span>
								<div class="switch">
									<label><input type="checkbox"><span class="lever"></span></label>
								</div>
							</li>
							<li>
								<span>Location Permission</span>
								<div class="switch">
									<label><input type="checkbox" checked><span class="lever"></span></label>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</aside>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="block-header">
				<h2>@yield('page_heading')</h2>
				<h5>@yield("page_small")</h5>
			</div>

			<div class="row clearfix">
				<div class="col-xs-12">
					@yield('section')
				</div>
			</div>

			@if(Session::has('flash_message'))
				<div data-notify="container" class="alerts-message bootstrap-notify-container alert alert-dismissible bg-green p-r-35 animated fadeInDown alert-success" role="alert" data-notify-position="bottom-center">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p data-notify="message">{{ Session::get('flash_message') }}</p>
				</div>
			@endif
			@if (Session::has('errors'))
				<div data-notify="container" class="alerts-message bootstrap-notify-container alert alert-dismissible bg-danger p-r-35 animated fadeInDown alert-danger" role="alert" data-notify-position="bottom-center" >
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>Oops! Problemas  : </strong>
					@foreach ($errors->all() as $error)
						<p data-notify="message">{{ $error }}</p>
					@endforeach
				</div>
			@endif
		</div>
	</section>

	<script src="/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap Core Js -->
	<script src="/plugins/bootstrap/js/bootstrap.js"></script>

	<!-- Select Plugin Js -->
	<script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

	<!-- Slimscroll Plugin Js -->
	<script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

	<!-- Waves Effect Plugin Js -->
	<script src="/plugins/node-waves/waves.js"></script>

	<!-- Jquery CountTo Plugin Js -->
	<script src="/plugins/jquery-countto/jquery.countTo.js"></script>

	<!-- Morris Plugin Js -->
	<script src="/plugins/raphael/raphael.min.js"></script>
	<script src="/plugins/morrisjs/morris.js"></script>

	<!-- ChartJs -->
	<script src="/plugins/chartjs/Chart.bundle.js"></script>

	<!-- Flot Charts Plugin Js -->
	<script src="/plugins/flot-charts/jquery.flot.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.resize.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.pie.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.categories.js"></script>
	<script src="/plugins/flot-charts/jquery.flot.time.js"></script>

	<!-- Sparkline Chart Plugin Js -->
	<script src="/plugins/jquery-sparkline/jquery.sparkline.js"></script>

	<script src="/../plugins/bootstrap-notify/bootstrap-notify.js"></script>
	<!-- Custom Js -->
	<script src="/js/admin.js"></script>
	<script src="/js/function.js"></script>
	<script src="/js/pages/index.js"></script>

	<!-- Demo Js -->
	<script src="/js/demo.js"></script>
</body>
</html>