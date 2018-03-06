@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/zonas') }}">Zonas Geogr&aacute;ficas</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>

<div class="tab-content">
	
	
	<div class="tab-pane active" id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form method="post" action="" class="form-horizontal">
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)C&oacute;digo:</label>
			<div class="col-sm-2">
				<input type="text" name="codigo" id="codigo" class="form-control" value="" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-2 control-label text-right">(*)Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" name="descripcion" class="form-control" value=""  />
			</div>
		</div>

		<div class="row" >
	  		<label class="col-sm-2 control-label text-right">(*)Estado:</label>
				<div class="col-sm-3">
				<select class="form-control" id="estados_id" name="estados_id" required="required">
				<option value="0">Seleccione</option>
					@foreach($estados as $estado)
					<option value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
					@endforeach
				</select>
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



	</div>
</div>

@endsection