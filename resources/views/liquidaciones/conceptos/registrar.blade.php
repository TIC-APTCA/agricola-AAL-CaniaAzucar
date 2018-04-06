@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/liquidacion/conceptos') }}">Conceptos</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form method="post" action="" class="form-horizontal">
		
		<input type="hidden" name="asignacion_test" id="asignacion_test" placeholder="ASIGNACION_test" value="{{$correlativo->asignacion}}"/>
		<input type="hidden" name="deduccion_test"  id="deduccion_test"  placeholder="DEDUCCION_test"  value="{{$correlativo->deduccion}}"/>
		
		
		<input type="hidden" name="asignacion" id="asignacion" placeholder="ASIGNACION" value="{{$correlativo->asignacion}}"/>
		<input type="hidden" name="deduccion"  id="deduccion"  placeholder="DEDUCCION"  value="{{$correlativo->deduccion}}"/>
		

		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Tipo:</label>
			<div class="col-sm-2">
				<select class="form-control" name="tipos_id" id="tipos_id" onchange="codigo_creador();">
			     <option value="0">Seleccione</option>
     			     <option value="1">Asignaci&oacute;n</option>
     			     <option value="2">Deducci&oacute;n</option>
				</select>
			</div>
		</div>
			
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Codigo:</label>
			<div class="col-sm-2">
				<input readonly="readonly" type="text" id="codigo" name="codigo" class="form-control" value=""  />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Frecuencia:</label>
			<div class="col-sm-2">
				<select class="form-control" name="frecuencias_id" id="frecuencias_id">
			     <option value="0">Seleccione</option>
     			     <option value="1">Fijo</option>
     			     <option value="2">Variable</option>
				</select>
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*) Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value=""  />
			</div>
		</div>
		
		
	
	
			
	
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		
		<div class="float-right">
			<input type="submit" name="registrar" value="Registrar" class="btn-success btn">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>
			
		</form>
	</div>
	<div class="clearfix"></div>
</div>

@endsection