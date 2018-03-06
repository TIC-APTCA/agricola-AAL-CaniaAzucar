@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class="active">Haciendas</li>
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
			<label class="col-sm-3 control-label text-center">Cant. Registros: {{ $haciendas->count() }}
			
			</label>
			
			<div class="float-right">
				<!-- Cantidad de Registros --> 
				<a href="{{ asset('/haciendas/productores') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		
		</div>

		<div class="panel-footer"></div>
			

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-2">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-3">PRODUCTOR</div>
					<div class="col-sm-2">DIRECCI&Oacute;N</div>
					<div class="col-sm-2">ZONA</div>
					<div class="col-sm-2">TELEFONO</div>
				</div>
			</a>
	
		@foreach($haciendas as $hacienda)
			<a href="{{ asset("/haciendas/actualizar/$hacienda->id") }}" class="list-group-item">
			  <div class="row">
					<div class="col-sm-1 text-center">	{{$hacienda->codigo}}</div>
					<div class="col-sm-2 text-left">	{{$hacienda->descripcion}}</div>
					<div class="col-sm-3 text-left">	{{$hacienda->nombre.' '.$hacienda->apellido}}</div>
					<div class="col-sm-2 text-center">	{{$hacienda->direccion}}</div>
					<div class="col-sm-2 text-center">	{{$hacienda->zona}}</div>
					<div class="col-sm-2 text-center">	{{$hacienda->telefono}}</div>
				</div>
			</a>
		@endforeach
		</div>


@endsection