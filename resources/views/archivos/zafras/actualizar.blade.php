@extends('layout_home')

@section('contenido')


<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/zafras') }}">Zafras</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>


<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("zafras/actualizar/$zafras->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" id="codigo" name="codigo" class="form-control" value="{{ $zafras->codigo}}" readonly="readonly"/>
			</div>
		</div>
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $zafras->descripcion}}"  />
			</div>
		</div>
		
	   <input type="hidden" id="status" name="status" class="form-control" value="1"  />
	
  		
 		<div class="row" >
  		    <label class="col-sm-2 control-label text-right">(*)Fecha Inicio:</label>
			<div class="col-sm-3">
				<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
							<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" value="{{ $zafras->fecha_inicial}}"/>
							<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
		                	</span>
				</div>
			</div>
		</div>
		
		
		<div class="row" >
  		    <label class="col-sm-2 control-label text-right">(*)Fecha Inicio:</label>
			<div class="col-sm-3">
				<div id="fecha_final" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
							<input readonly="readonly" type="text"  name="fecha_final" class="form-control" value="{{ $zafras->fecha_final}}" />
							<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
		                	</span>
				</div>
			</div>
		</div>
		
	
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Observaciones:</label>
			<div class="col-sm-3">
				<textarea class="form-control" name="observaciones" id="observaciones" rows="3" >{{$zafras->observaciones}}</textarea>
			</div>
		</div>
			
	
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		</form>
	
	<form id="form_eliminar_z" name="form_eliminar_z" method="get" action="{{ asset("zafras/eliminar/$zafras->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-z" name="btn-eliminar-z" value="Eliminar" class="btn-success btn">
		</div>
	</div>
	<div class="clearfix"></div>
</div>


@endsection