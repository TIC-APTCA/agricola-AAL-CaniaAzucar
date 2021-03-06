@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class="active">Estimados Zafras</li>
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
			<label class="col-sm-3 control-label text-center">Cant. Registros: {{ $estimados->count() }}
			
			</label>
			
			<div class="float-right">
				<!-- Cantidad de Registros --> 
				<a href="{{ asset('estimados/zafras/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>

		<div class="panel-footer"></div>
			

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
				    <div class="col-sm-1">ID</div>
					<div class="col-sm-2">C&Oacute;DIGO ZAFRA</div>
					<div class="col-sm-3">RENDIMIENTO</div>
					<div class="col-sm-3">AZ&Uacute;CAR</div>
					<div class="col-sm-3">CA&Ntilde;A</div>
				</div>
			</a>
			
	   @foreach($estimados as $zafra)
			<a href="{{ asset("estimados/zafras/actualizar/$zafra->id") }}" class="list-group-item">
			  <div class="row">
					<div class="col-sm-1 text-center">{{ $zafra->id }}</div>
					<div class="col-sm-2 text-center">{{ $zafra->codigo }}</div>
					<div class="col-sm-3 text-center">{{ $zafra->rendimiento }}</div>
					<div class="col-sm-3 text-center">{{ $zafra->azucar }}</div>
					<div class="col-sm-3 text-center">{{ $zafra->cana }}</div>
				</div>
			</a>
		@endforeach
		</div>


@endsection