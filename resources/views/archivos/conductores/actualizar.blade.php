@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/conductores') }}">Conductores</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>

<div class="tab-content">
	
	<div class="tab-pane active" id="horizontal-form">

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("conductores/actualizar/$conductores->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-1">
				<input type="text" name="codigo" class="form-control" value="{{ $conductores->id}}" readonly="readonly" />
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
					<input type="text" name="cedula" class="form-control" value="{{ $conductores->cedula}}"  />
			</div>	
  		</div>
  		
  		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Nombres:</label>
			<div class="col-sm-3">
				<input type="text" name="nombres" class="form-control" value="{{ $conductores->nombres}}"  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Apellidos:</label>
			<div class="col-sm-3">
				<input type="text" name="apellidos" class="form-control" value="{{ $conductores->apellidos}}"  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Tel&eacute;fono:</label>
			<div class="col-sm-3">
				<input type="text" name="telefono" class="form-control" value="{{ $conductores->telefono}}"  />
			</div>
		</div>
		
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
	</form>
	
	<form id="form_eliminar" name="form_eliminar" method="get" action="{{ asset("conductores/eliminar/$conductores->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar" name="btn-eliminar" value="Eliminar" class="btn-success btn">
		</div>
			
	</div>
	<div class="clearfix"></div>
</div>



	</div>
</div>

@endsection