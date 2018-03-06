@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/liquidacion/conceptos') }}">Conceptos</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("liquidacion/conceptos/actualizar/$conceptos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Tipo:</label>
			<div class="col-sm-2">
				<select readonly="readonly" class="form-control" name="tipos_id" id="tipos_id" >
     			     <option value="1">{{$conceptos->tipo}}</option>
				</select>
			</div>
		</div>
			
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Codigo:</label>
			<div class="col-sm-2">
				<input readonly="readonly" type="text" id="codigo" name="codigo" class="form-control" value="{{$conceptos->codigo}}"  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Frecuencia:</label>
			<div class="col-sm-2">
				<select class="form-control" name="frecuencias_id" id="frecuencias_id" >
			     	 <option value="{{$conceptos->frecuencias_id}}">{{$conceptos->frecuencia}}</option>
     			     <option value="1">Fijo</option>
     			     <option value="2">Variable</option>
				</select>
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{$conceptos->descripcion}}"  />
			</div>
		</div>
		
		
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		
		</form>
		
		
		<form id="form_eliminar_cl" name="form_eliminar_cl" method="get" action="{{ asset("liquidacion/conceptos/eliminar/$conceptos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	   </form>
		
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-cl" name="btn-eliminar-cl" value="Eliminar" class="btn-success btn">
		</div>
	
		
		

		
	</div>
	<div class="clearfix"></div>
</div>

@endsection