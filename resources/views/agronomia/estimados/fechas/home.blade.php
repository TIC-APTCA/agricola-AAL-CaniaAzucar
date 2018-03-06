@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Agronomia</a></li>
		<li class="active">Estimados por Fechas</li>
	</ol>
</div>

	
<div class="row form-horizontal">
		
	<form method="get" action="" class="form-horizontal">
			<div class="row">
					<label class="col-sm-1 control-label text-right">Fecha Inicial:</label>
						<div class="col-sm-2">
							<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
								<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" />
								<span class="input-group-addon add-on">
									<span class="glyphicon glyphicon-calendar"></span>
			                	</span>
						    </div>
					    </div>
					    
					<label class="col-sm-1 control-label text-right">Fecha Final:</label>
					    <div class="col-sm-2">
							<div id="fecha_final" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
								<input readonly="readonly" type="text"  name="fecha_final" class="form-control" />
								<span class="input-group-addon add-on">
									<span class="glyphicon glyphicon-calendar"></span>
			                	</span>
						    </div>
					    </div>
						<div class="col-lg-1">
							<button  type="submit" class="btn btn-info">Buscar</button>
						</div>
			     
			     
			     <div class="row">
			         	<label class="control-label col-sm-3 ">Cant. Registros: {{ $estimados->count() }}</label>
					 <div class="text-right">
					 	<a href="{{ asset('estimados/fechas/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
				     </div>
			    </div>
	
		</div>
	</form>
				
</div>

		<div class="panel-footer"></div>
			

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-2">RENDIMIENTO</div>
					<div class="col-sm-2">CA&Ntilde;A (TON.)</div>
					<div class="col-sm-2">AZ&Uacute;CAR (TON.)</div>
					<div class="col-sm-2">FECHA INICIAL</div>
					<div class="col-sm-2">FECHA FINAL</div>
				</div>
			</a>
			
	@foreach($estimados as $estimado)
			<a href="{{ asset("estimados/fechas/actualizar/$estimado->id") }}" class="list-group-item">
			  <div class="row">
					<div class="col-sm-1 text-center">{{ $estimado->id }}</div>
					<div class="col-sm-2 text-center">{{ $estimado->rendimiento }}</div>
					<div class="col-sm-2 text-center">{{ $estimado->cana }}</div>
					<div class="col-sm-2 text-center">{{ $estimado->azucar }}</div>
					<div class="col-sm-2 text-center">{{ $estimado->fecha_inicial }}</div>
					<div class="col-sm-2 text-center">{{ $estimado->fecha_final }}</div>
				</div>
			</a>
	@endforeach
		</div>


@endsection