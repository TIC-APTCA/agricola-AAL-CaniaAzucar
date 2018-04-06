@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/liquidacion/anticipos') }}">Anticipos Semanales</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>

<div class="tab-content">
	
	<div class="tab-pane active" id="horizontal-form">

<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("liquidacion/anticipos/actualizar/$anticipos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
							
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Codigo:</label>
					<div class="col-sm-2">
						<input readonly="readonly" type="text" id="codigo" name="codigo" class="form-control" value="{{ $anticipos->codigo}}"/>
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Factor:</label>
					<div class="col-sm-2">
						<input type="text" id="factor" name="factor" class="form-control" value="{{ $anticipos->factor}}" />
					</div>
				</div>
				
				<input type="hidden" name="porcentaje" id="porcentaje" value="60"/>

				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Porcentaje:</label>
					<div class="col-sm-2">
						<select id="porcentaje_lista" name="porcentaje_lista" class="form-control" onchange="cambiar_porcentaje();">
							<option value="{{ $anticipos->porcentaje}}" >{{ $anticipos->porcentaje}} %</option>
							<option value="60" >60.00 %</option>
							<option value="0" >Otro</option>
						</select>
					</div>
					
					
					<label class="col-sm-1 control-label text-right">Otro:</label>
					<div class="col-sm-2">
						<input onkeyup="copy();" disabled="disabled" type="text" id="porcentaje_otro" name="porcentaje_otro" class="form-control" value="" />
					</div>
					
				</div>
				
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Descripci&oacute;n:</label>
					<div class="col-sm-5">
						<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $anticipos->descripcion}}" />
					</div>
				</div>
				  		
		
			<div class="panel-footer-bottom"></div>
			
			<div class="row">
				<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
			</div>
	</form>
	
	<form id="form_eliminar_as" name="form_eliminar_as" method="get" action="{{ asset("liquidacion/anticipos/eliminar/$anticipos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-as" name="btn-eliminar-as" value="Eliminar" class="btn-success btn">
		</div>
			
	</div>
	<div class="clearfix"></div>
</div>



	</div>
</div>

@endsection