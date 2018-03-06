@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/conductores') }}">Conductores</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>

<div class="tab-content">
	
	
	<div class="tab-pane active" id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form method="post" action="" class="form-horizontal">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-1">
				<input type="text" name="codigo" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Cedula:</label>
			
			<div class="col-lg-1">
				<select class="form-control">
					<option value="v">V</option>
					<option value="e">E</option>				
				</select>			   
  			</div>
  			<div class="col-sm-2">
					<input type="text" name="cedula" class="form-control" value=""  />
			</div>	
  		</div>
  		
  		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Nombres:</label>
			<div class="col-sm-3">
				<input type="text" name="nombres" class="form-control" value=""  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Apellidos:</label>
			<div class="col-sm-3">
				<input type="text" name="apellidos" class="form-control" value=""  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Tel&eacute;fono:</label>
			<div class="col-sm-3">
				<input type="text" name="telefono" class="form-control" value=""  />
			</div>
		</div>
	
	
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		
		<div class="float-right">
			<input type="submit" name="registrar" value="Registrar" class="btn-success btn">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>
			
		</form>
	</div>
	<div class="clearfix"></div>
</div>



	</div>
</div>

@endsection