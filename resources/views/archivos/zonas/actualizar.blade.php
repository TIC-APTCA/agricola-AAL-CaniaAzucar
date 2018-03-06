@extends('layout_home')

@section('contenido')


<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/zonas') }}">Zonas Geogr&aacute;ficas</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>


<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("zonas/actualizar/$zonas->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" id="codigo" name="codigo" class="form-control" value="{{ $zonas->codigo}}" readonly="readonly"/>
			</div>
		</div>
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $zonas->descripcion}}"  />
			</div>
		</div>
		
	   <div class="row" >
	  		<label class="col-sm-2 control-label text-right">(*)Estado:</label>
				<div class="col-sm-3">
				<select class="form-control" id="estados_id" name="estados_id" required="required">
				<option value="{{ $zonas->estados_id}}">{{ $zonas->estado}}</option>
					@foreach($estados as $estado)
					<option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
					@endforeach
				</select>
			</div>
		</div>
	
 		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		</form>
	
	<form id="form_eliminar_zg" name="form_eliminar_zg" method="get" action="{{ asset("zonas/eliminar/$zonas->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-zg" name="btn-eliminar-zg" value="Eliminar" class="btn-success btn">
		</div>
	</div>
	<div class="clearfix"></div>
</div>


@endsection