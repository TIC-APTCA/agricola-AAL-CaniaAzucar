<!DOCTYPE html>
<html>
<head>
<title>APTCA - AGRONOMIA</title>
<link href="{{ asset('css/style_login.css') }}" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="APTCA, Aptca, Azucarera Pio Tamayo, Pio Tamayo, Recursos Humanos, rr.hh, rrhh, Azucar"/>

</head>
<body>

@include ('messages.mensaje_especifico', array('flash_messages' => 'flash_messages'))
@include ('errors.mensaje_validacion', array('errors' => $errors))
@include ('errors.mensaje_especifico', array('flash_errors' => 'flash_errors'))

<!--start-login-one-->
<div class="login">	
	<div class="ribbon-wrapper h2 ribbon-red">
		<div class="ribbon-front">
			<h2>APTCA, CA</h2>
		</div>
		<div class="ribbon-edge-topleft2"></div>
		<div class="ribbon-edge-bottomleft"></div>
	</div>
	
	<form method="post" action="auth/login">
	<ul>
		<li>
			<input name="email" type="text" class="text" value="Dirección de correo" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Dirección de correo';}" ><a href="#" class=" icon user"></a>
		</li>
		<li>
			<input name="password" type="password" value="Contraseña" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Contraseña';}"><a href="#" class=" icon lock"></a>
		</li>
	</ul>
	<div class="submit">
		<input type="submit" value="Ingresar">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
	</form>
</div>

<!--start-copyright-->
<div class="copy-right">
	<!--<p>Copyright &copy; 2015  All rights  Reserved | Template by &nbsp;<a href="http://w3layouts.com">W3layouts</a></p>-->
</div>
<!--end-copyright-->
</body>
</html>