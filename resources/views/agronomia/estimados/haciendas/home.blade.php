@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Agronomia</a></li>
		<li class="active">Estimados Hacienda</li>
	</ol>
</div>

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="row form-horizontal">
			<label class="col-sm-2 control-label text-center" >Productor / Hacienda:</label>
			
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
			
			<!-- Paginador -->
			
			<!-- Cantidad de Registros -->
			<label class="col-sm-3 control-label text-center float-right">Cant. Registros: </label>
			
		</div>

		<div class="panel-footer"></div>
			
		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-5">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-2">PRODUCTOR</div>
					<div class="col-sm-3">SECTORES REGISTRADOS</div>
				</div>
			</a>
			
	
			<a href="{{ asset('/estimados/hacienda/sectores') }}" class="list-group-item">
			<div class="row">
				<div class="col-sm-1 text-center">Prueba</div>
				<div class="col-sm-5 text-left">Prueba</div>
				<div class="col-sm-2 text-left">Prueba</div>
				<div class="col-sm-3 text-center">Prueba</div>
			</div>
			</a>
		</div>
		
	</div>
</div>

@endsection