@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Liquidaci&oacute;n</a></li>
		<li class="active">Conceptos</li>
	</ol>
</div>

	
		<div class="row form-horizontal">
			<label class="col-sm-2 control-label text-center" >Codigo:</label>
			
			<form method="get" action="" class="form-horizontal">
			<div class="col-sm-5">
				<div class="input-group">
					<input type="text" name="multicampo" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">Buscar</button>
					</span>
			    </div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
			</form>
			
			 
			 <!-- Cantidad de Registros -->
			<label class="col-sm-3 control-label text-center">Cant. Registros: 
			{{ $conceptos->count() }}
			</label>
			
			<div class="float-right">
				<!-- Cantidad de Registros --> 
				<a href="{{ asset('liquidacion/conceptos/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>

		<div class="panel-footer"></div>
			

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-3">C&Oacute;DIGO</div>
					<div class="col-sm-3">DESCRIPCION</div>
					<div class="col-sm-3">TIPO</div>
					<div class="col-sm-3">FRECUENCIA</div>
				</div>
			</a>
			
	 @foreach($conceptos as $concepto)
			<a href="{{ asset("liquidacion/conceptos/actualizar/$concepto->id") }}" class="list-group-item">
			  <div class="row">
					<div class="col-sm-3 text-center">{{ $concepto->codigo }}</div>
					<div class="col-sm-3 text-center">{{ $concepto->descripcion }}</div>
					<div class="col-sm-3 text-center">{{ $concepto->tipo }}</div>
					<div class="col-sm-3 text-center">{{ $concepto->frecuencia }}</div>
				</div>
			</a>
	@endforeach
		</div>
		

@endsection