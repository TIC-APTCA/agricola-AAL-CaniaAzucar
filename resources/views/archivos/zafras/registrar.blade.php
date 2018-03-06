@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/zafras') }}">Zafras</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>

	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form method="post" action="" class="form-horizontal">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" id="codigo" name="codigo" class="form-control" value="" />
			</div>
		</div>
		
        <div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" id="descripcion" name="descripcion" class="form-control" value=""  />
			</div>
		</div>
		
	   <input type="hidden" id="status" name="status" class="form-control" value="1"  />
	
  		
 		<div class="row" >
  		    <label class="col-sm-2 control-label text-right">(*)Fecha Inicio:</label>
			<div class="col-sm-3">
				<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
							<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" />
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
							<input readonly="readonly" type="text"  name="fecha_final" class="form-control" />
							<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
		                	</span>
				</div>
			</div>
		</div>
		
			
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Observaciones:</label>
			<div class="col-sm-3">
				<textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
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