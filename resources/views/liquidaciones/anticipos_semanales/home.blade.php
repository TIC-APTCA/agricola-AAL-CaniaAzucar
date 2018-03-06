@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Liquidaci&oacute;n</a></li>
		<li class="active">Anticipos Semanales</li>
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
			<label class="col-sm-3 control-label text-center">Cant. Registros: {{ $anticipos->count() }}
			</label>
			
			<div class="float-right">
				<!-- Cantidad de Registros --> 
				<a href="{{ asset('liquidacion/anticipos/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>

		<div class="panel-footer"></div>
			

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-2">C&Oacute;DIGO</div>
					<div class="col-sm-1">FACTOR</div>
					<div class="col-sm-2">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-2">PORCENTAJE</div>
					<div class="col-sm-2">FECHA INICIAL</div>
					<div class="col-sm-2">FECHA FINAL</div>
				</div>
			</a>
			
		@foreach($anticipos as $anticipo)
			<a href="{{ asset("liquidacion/anticipos/actualizar/$anticipo->id") }}" class="list-group-item">
			  <div class="row text-center">
					<div class="col-sm-2">{{ $anticipo->codigo }}</div>
					<div class="col-sm-1">{{ $anticipo->factor }}</div>
					<div class="col-sm-2">{{ $anticipo->descripcion }}</div>
					<div class="col-sm-2">{{ $anticipo->porcentaje }}</div>
					<div class="col-sm-2">{{ $anticipo->fecha_inicial }}</div>
					<div class="col-sm-2">{{ $anticipo->fecha_final }}</div>
				</div>
			</a>
		@endforeach
		</div>
		

@endsection