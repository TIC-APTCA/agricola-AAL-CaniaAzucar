@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/vehiculos') }}">Veh&iacute;culos</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>

<div class="tab-content">
	
	
	<div class="tab-pane active" id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("vehiculos/actualizar/$vehiculos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Placa:</label>
			<div class="col-sm-2">
				<input type="text" id="placa" name="placa" class="form-control" value="{{ $vehiculos->placa}}"  required="required"/>
			</div>
		</div>
		

  		
  		<div class="row" >
	  		<label class="col-sm-2 control-label text-right">(*)Tipo de Veh&iacute;culo</label>
				<div class="col-sm-2">
				<select class="form-control" id="vehiculos_tipos_id" name="vehiculos_tipos_id" required="required">
				<option value="{{ $vehiculos->vehiculos_tipos_id}}">{{ $vehiculos->tipo}}</option>
				<option value="0">Seleccione</option>
				<option value="1">Cami&oacute;n 2 ejes</option>
				<option value="2">Cami&oacute;n 3 ejes</option>
				<option value="3">Cami&oacute;n 4 ejes</option>
				</select>
			</div>
		</div>
		
		<div class="row" >
	  				
			<label class="col-sm-2 control-label text-right">(*)Marca:</label>
				
				<div class="col-sm-2">
					<select class="form-control" id="vehiculos_marcas_id" name="vehiculos_marcas_id" required="required">
					    <option value="{{ $vehiculos->vehiculos_marcas_id}}">{{ $vehiculos->marca}}</option>
						<option value="0">Seleccione</option>
						<option value="1">Chevrolet</option>
						<option value="2">Daihausat</option>
						<option value="3">Dodge</option>
						<option value="4">Fiat</option>
						<option value="5">Ford</option>
						<option value="6">Kia</option>
						<option value="7">Nissan</option>
						<option value="8">Freightliner</option>
					</select>  
				</div>
				
			<label class="col-sm-2 control-label text-right">(*)Modelo:</label>
				<div class="col-sm-3">
					<select class="form-control" id="vehiculos_modelos_id" name="vehiculos_modelos_id" required="required">
							<option value="{{ $vehiculos->vehiculos_modelos_id}}">{{ $vehiculos->modelo}}</option>
						<option value="0">Seleccione</option>
						<option value="1">modelo 1</option>
					</select>
			    </div>
		 </div>
		  
		  <hr>
		  
		  
		 <div class="row"> 
		  	<label class="col-sm-2 control-label text-right">Remolque:</label>
				<div class="col-sm-3" id="btn-remolque"  >
				    
					<input data-on="Si" data-off="No"  data-toggle="toggle" type="checkbox" {{ $vehiculos->remolque === "1" ? "Checked" : "" }}>
			    </div>
		</div>


		<div class="row">	 
			    
			  <label class="col-sm-2 control-label text-right">Placa:</label>
				<div class="col-sm-2" >
					<input type="text" id="placa_remolque" name="placa_remolque" class="form-control" value="{{ $vehiculos->placa_remolque}}" disabled="disabled" />
			    </div>
			    
			     <label class="col-sm-2 control-label text-right">Descripci&oacute;n:</label>
				<div class="col-sm-3"  >
					<input type="text" id="descripcion_remolque" name="descripcion_remolque" class="form-control" value="{{ $vehiculos->descripcion_remolque}}" disabled="disabled" />
			    </div>
		  
		  <input type="hidden" id="remolque" name="remolque" class="form-control" value="{{ $vehiculos->remolque}}" />
		  
		</div>
		

	</form>
		
		<div  class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		
		<form id="form_eliminar_v" name="form_eliminar_v" method="get" action="{{ asset("vehiculos/eliminar/$vehiculos->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	   </form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-v" name="btn-eliminar-v" value="Eliminar" class="btn-success btn">
		</div>
	</div>
	<div class="clearfix"></div>
</div>


	</div>
</div>

@endsection