@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class="active"><a href="">Zonas Geogr&aacute;ficas</a></li>
	</ol>
</div>

<div class="tab-content">
 
		<div class="row" >
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
			
				
			<div class="float-right">
				<!-- Cantidad de Registros --> 
				<a href="{{ asset('zonas/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>
		
	<div class="panel-footer"></div>
	<br/>
	
		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-5">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-5">ESTADO</div>
				</div>
			</a>
			
	@foreach($zonas as $zona)
			<a href="{{ asset("zonas/actualizar/$zona->id") }}" class="list-group-item">
			<div class="row">
				<div class="col-sm-1 text-center">{{$zona->codigo}}</div>
				<div class="col-sm-5 text-left">  {{$zona->descripcion}}</div>
				<div class="col-sm-5 text-center">{{$zona->estado}}</div>
			</div>
			</a>
		
	@endforeach		
		</div>
		

</div>


@endsection