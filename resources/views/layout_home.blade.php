<!DOCTYPE HTML>
<html>
<head>
<title>APTCA - AGRONOMIA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="{{ asset('css/style_gral.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

<!-- Graph CSS -->
<link href="{{ asset('css/lines.css') }}" rel='stylesheet' type='text/css' />
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" type='text/css' /> 

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- datetimepicker CSS -->
<link href="{{ asset('css/datepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />

<!-- Datetimepicker JS -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>

<!-- Bootstrap Select CSS -->
<link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/bootstrap-toggle.min.css') }}" rel='stylesheet' type='text/css' />

<!-- Bootstrap Select JS -->
<script src="{{ asset('js/bootstrap-select.js') }}"></script>
<script src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>

<!-- fileStyle JS -->
<script src="{{ asset('js/bootstrap-filestyle.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('js/metisMenu.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Graph JavaScript -->
<script src="{{ asset('js/d3.v3.js') }}"></script>
<script src="{{ asset('js/rickshaw.js') }}"></script>

<!-- JS de utilidades para el sistema -->
<script src="{{ asset('js/utilidades/archivos.js') }}"></script>
<script src="{{ asset('js/utilidades/liquidacion.js') }}"></script>
<script src="{{ asset('js/fechas_horas.js') }}"></script>
<script src="{{ asset('js/utilidades/select_dinamicos.js') }}"></script>

</head>
<body>

<div id="wrapper">
     <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ asset('home') }}">Azucarera P&iacute;o Tamayo, C.A.</a>
            </div>
            
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
            	<label class="navbar-user">{{ $usuario->nombres }}, {{ $usuario->apellidos }}</label>
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="{{ asset("imagenes/trabajadores/") }}"><span class="badge"></span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Mis Datos</strong>
						</li>
						<li class="m_2"><a href="#"><i class="fa fa-user"></i>Mis Datos</a></li>
						<li class="m_2"><a href="{{ asset('#') }}"><i class="fa fa-wrench"></i>Cambiar Contrase&ntilde;a</a></li>
						<li class="m_2"><a href="{{ asset('auth/logout') }}"><i class="fa fa-lock"></i>Salir</a></li>	
	        		</ul>
	      		</li>
			</ul>
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ asset('home') }}"><i class="fa fa-home fa-fw nav_icon"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw nav_icon"></i>Archivos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ asset('/zafras') }}">Zafras</a></li>
                                <li><a href="#">Refinos</a></li>
                                <li><a href="{{ asset('/zonas') }}">Zonas Geogr&aacute;ficas</a></li>
                                <li><a href="{{ asset('/productores') }}">Productores</a></li>
                                <li><a href="{{ asset('/haciendas') }}">Haciendas</a></li>
                                <li><a href="{{ asset('/sectores') }}">Sectores/HDA</a></li>
                                <li><a href="{{ asset('/tablones') }}">Tabl&oacute;n/HDA</a></li>
                                <li><a href="{{ asset('/vehiculos') }}">Veh&iacute;culos</a></li>
                                <li><a href="{{ asset('/conductores') }}">Conductores</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pagelines nav_icon"></i>Agronom&iacute;a<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#">Orden de Corte/Quema</a></li>
                                <li><a href="#">Estimados</a>
                                	<ul class="nav nav-third-level">
                                		<li><a href="{{ asset('/estimados/hacienda') }}">Haciendas</a></li>
                                		<li><a href="{{ asset('/estimados/fecha') }}">Rango de Fechas</a></li>
                                		<li><a href="{{ asset('/estimados/zafra')}}">Zafras</a></li>
                                	</ul>
                                </li>
                            </ul>
                        </li>
         
                        <li>
                            <a href="#"><i class="fa fa-truck nav_icon"></i>Romana<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#">Boletos de Pesadas</a></li>
                                <li><a href="#">Talones</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-flask nav_icon"></i>Laboratorio<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="#">An&aacute;lisis de Talones</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear nav_icon"></i>Liquidaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ asset('/liquidacion/conceptos')}}">Conceptos de Liq.</a></li>
                                <li><a href="{{ asset('/liquidacion/preliminar')}}">Preliminar de Ca&ntilde;a</a></li>
                                <li><a href="#">Anticipos Semanales</a>
                                	<ul class="nav nav-third-level">
                                		<li><a href="{{ asset('/liquidacion/anticipos')}}">Definiciones</a></li>
                                		<li><a href="#">Productor/Concepto</a></li>
                                		<li><a href="#">Calculo</a></li>
                                		<li><a href="#">Verificar</a></li>
                                		<li><a href="#">Reportes</a></li>
                                	</ul>
                                </li>
                                <li><a href="#">Liquidaci&oacute;n Trimestral</a></li>
                                <li><a href="#">Liquidaci&oacute;n Final</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ asset('home') }}"><i class="fa fa-wrench nav_icon"></i>Configuraci&oacute;n<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ asset('usuarios/home') }}">Usuarios</a></li>
                                <li><a href="{{ asset('usuarios/niveles_acceso') }}">Niveles de Acceso</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ asset('home') }}"><i class="fa fa-question-circle nav_icon"></i>Ayuda<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ asset('#') }}">Manual de Usuario</a></li>
                                <li><a href="{{ asset('#') }}">Infor. de Licencia</a></li>
                                <li><a href="{{ asset('#') }}">Acerca de...</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
        <div id="page-wrapper">
	        <div class="graphs">
	     		
	     		@include ('messages.mensaje_especifico', array('flash_messages' => 'flash_messages'))
				@include ('errors.mensaje_especifico', array('flash_errors' => 'flash_errors'))
				@include ('errors.mensaje_validacion', array('errors' => $errors))
				
				@yield('contenido')
			</div>
			
			<div class="copy">
	            <p>Desarrollado por la Coordinación de Tecnologia, Información y Comunicacion (T.I.C.) </p>
	            <p><a href="#" target="_blank">sistemasytic.piotamayo@cvaazucar.gob.ve</a> </p>
	            <p>Azucarera Pio Tamayo, C.A. </p>
		    </div>
		</div> 
</div>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>