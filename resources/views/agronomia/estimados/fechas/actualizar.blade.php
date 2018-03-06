@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Agronomia</a></li>
		<li class=""><a href="{{ asset('/estimados/fecha') }}">Estimados por Fechas</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form form name="form_actualizar" method="post" action="{{ asset("estimados/fechas/actualizar/$estimados->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
						<label class="col-sm-2 control-label text-right">Fecha Inicial:</label>
							<div class="col-sm-2">
								<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
									<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" value="{{ $estimados->fecha_inicial }}" />
									<span class="input-group-addon add-on">
										<span class="glyphicon glyphicon-calendar"></span>
				                	</span>
							    </div>
						    </div>
						    
						<label class="col-sm-1 control-label text-right">Fecha Final:</label>
						    <div class="col-sm-2">
								<div id="fecha_final" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
									<input readonly="readonly" type="text"  name="fecha_final" class="form-control" value="{{ $estimados->fecha_final }}" />
									<span class="input-group-addon add-on">
										<span class="glyphicon glyphicon-calendar"></span>
				                	</span>
							    </div>
						    </div>
		   </div>
	  		
	  		<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Rendimiento:</label>
					<div class="col-sm-3">
						<input type="text" id="rendimiento" name="rendimiento" class="form-control" value="{{ $estimados->rendimiento }}" />
					</div>
				</div>
				
				<div class="row">
					<label class="col-sm-2 control-label text-right">(*) Ca&ntilde;a:</label>
						<div class="col-sm-3">
						<div class="input-group">
							<input  type="text"  id="cana" name="cana" class="form-control" value="{{ $estimados->cana }}" />
							<span class="input-group-addon add-on">
								<span >Ton.</span>
		                	</span>
					   </div>
					</div>
				</div>
				
				<div class="row">
					<label class="col-sm-2 control-label text-right">(*) Az&uacute;car:</label>
						<div class="col-sm-3">
						<div class="input-group">
							<input type="text"  id="azucar" name="azucar" class="form-control" value="{{ $estimados->azucar}}"/>
							<span class="input-group-addon add-on">
								<span >Ton.</span>
		                	</span>
					   </div>
					</div>
				</div>
			
			
		
			<div class="panel-footer-bottom"></div>
			
			<div class="row">
				<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
			</div>
			</form>
	
	<form id="form_eliminar" name="form_eliminar_ef" method="get" action="{{ asset("estimados/fechas/eliminar/$estimados->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-ef" name="btn-eliminar-ef" value="Eliminar" class="btn-success btn">
		</div>
	</div>
	<div class="clearfix"></div>
</div>


@endsection