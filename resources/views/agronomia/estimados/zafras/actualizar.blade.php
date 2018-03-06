@extends('layout_home')

@section('contenido')


<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/estimados/zafra') }}">Estimados por Zafra</a></li>
		<li class="active">Actualizar</li>
	</ol>
</div>


<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form name="form_actualizar" method="post" action="{{ asset("estimados/zafras/actualizar/$estimados->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input readonly="readonly" type="text" id="codigo" name="codigo" class="form-control" value="{{ $estimados->codigo}}" readonly="readonly"/>
			</div>
		</div>
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input  readonly="readonly" type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $estimados->descripcion}}"  />
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
		
	   <input type="hidden" id="status" name="status" class="form-control" value="1"  />
	
  	
			
	
		<div class="panel-footer-bottom"></div>
		
		<div class="row">
			<label class="col-sm-4 text-left">Los campos con asterisco (*) son obligatorios.</label>
		</div>
		</form>
	
	<form id="form_eliminar_ez" name="form_eliminar_ez" method="get" action="{{ asset("estimados/zafras/eliminar/$estimados->id") }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</form>
	
		<div class="float-right">
			<input  name="actualizar" value="Actualizar" class="btn-success btn" onclick="form_actualizar.submit();">
			<input id="btn-eliminar-ez" name="btn-eliminar-ez" value="Eliminar" class="btn-success btn">
		</div>
	</div>
	<div class="clearfix"></div>
</div>


@endsection