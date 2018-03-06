@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/haciendas/productores') }}">Haciendas</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form method="post" action="" class="form-horizontal">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" id="codigo" name="codigo" class="form-control" value="" />
			</div>
		</div>
		
		
		<input value="{{$productor->id}}" type="hidden" id="productores_id" name="productores_id" />
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Zona:</label>
			<div class="col-sm-3">
				<select class="form-control" id="zonas_id" name="zonas_id">
					<option value="0">Seleccione</option>
					@foreach($zonas as $zona)
						<option value="{{$zona->id}}">{{$zona->descripcion}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Telefono:</label>
			<div class="col-sm-3">
				<input type="text" id="telefono" name="telefono" class="form-control" value="" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value="" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Direcci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="direccion" name="direccion" class="form-control" value="" />
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

@endsection