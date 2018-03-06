@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/haciendas/productores') }}">Haciendas</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form id="form_actualizar" name="form_actualizar" method="post" action="" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" id="codigo" name="codigo" class="form-control" value="{{$haciendas->codigo}}" />
			</div>
		</div>
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Zona:</label>
			<div class="col-sm-3">
				<select class="form-control" id="zonas_id" name="zonas_id">
					<option value="{{$haciendas->zonas_id}}">{{$haciendas->zona}}</option>
					@foreach($zonas as $zona)
						<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Telefono:</label>
			<div class="col-sm-3">
				<input type="text" id="telefono" name="telefono" class="form-control" value="{{$haciendas->telefono}}" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{$haciendas->descripcion}}" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Direcci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="direccion" name="direccion" class="form-control" value="{{$haciendas->direccion}}" />
			</div>
		</div>
		
	
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>			
		</form>
		
		<form id="form_eliminar" name="form_eliminar_pr" method="get" action="{{ asset("haciendas/eliminar/$haciendas->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar" name="btn-eliminar-pr" value="Eliminar" class="btn-success btn">
		</div>
		
	</div>
	<div class="clearfix"></div>
</div>

@endsection