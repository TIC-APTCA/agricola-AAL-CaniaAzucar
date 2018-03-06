@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/tablones') }}">Tablones</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>


<div class="tab-content">
	
	
	<div class="tab-pane active " id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		
		<form method="post" action="" class="form-horizontal">
		
  		
  		<div class="row" >
			<label class="col-sm-4 control-label text-right">Codigo de Sector:</label>
			<div class="col-sm-3">
				<input type="text" name="codigo_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Descripci&oacute;n:</label>
			<div class="col-sm-3">
				<input type="text" name="nombre_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Hacienda:</label>
			<div class="col-sm-3">
				<input type="text" name="productor_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
			<br>
			
		<div class="panel-footer-bottom"></div>
		
		<div class="row text-left" >
		<label class="col-sm-1 control-label text-right valign-middle" >Tabl&oacute;n:</label>
			<form method="get" action="" class="form-horizontal">
			<div class="col-sm-4">
			   
				<div class="input-group">
				    
					<input type="text" name="multicampo" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">Buscar</button>
					</span>
			    </div>
				<input type="hidden" name="_token" value="">
			</div>
			</form>
						
			<!-- Paginador -->
		
			
			<!-- Cantidad de Registros -->
			<label class="col-sm-5 control-label text-center ">Cant. Registros:</label>
			<div class="float-right">
				<a href="" id="nvo-tablon" role="Button" data-toggle="modal" class="btn btn-primary btn-md float-right " >Nuevo</a>
			</div>
			
		</div>

</form>	
		
		<br/>
		
			<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-4">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-2">FECHA C/S</div>
					<div class="col-sm-3">SUPERFICIE</div>
					<div class="col-sm-2">ACCI&Oacute;N</div>
				</div>
			</a>
			
	
			<a href="javascript:void(0)" class="list-group-item">
			<div class="row">
				<div class="col-sm-1 text-center">Prueba</div>
				<div class="col-sm-4 text-left">Prueba</div>
				<div class="col-sm-2 text-left">Prueba</div>
				<div class="col-sm-3 text-center">Prueba</div>
				<div class="col-sm-2 text-center"></div>
			</div>
			</a>
		
			
		</div>
					
	</div>
	<div class="clearfix"></div>
</div>
	</div>
</div>


<div  class="modal fade" id="NuevoTablonModal"  role="dialog" aria-labelledby="Nuevo tablon">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="titulo">Tablones</h4>
		</div>
		
		<form id="form-registrar" method="post" action="" class="form-horizontal">
		<div class="modal-body">
			<div class="form-horizontal">
			
				<div class="row" >
					<label class="col-sm-3 control-label text-right">C&oacute;digo:</label>
					<div class="col-sm-4">
						<input  readonly="readonly" type="text" id="codigo_nuevo" name="codigo_nuevo" class="form-control" value="" />
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-3 control-label text-right">(*) Descripci&oacute;n:</label>
					<div class="col-sm-7">
						<input type="text" id="descripcion_nuevo" name="descripcion_nuevo" class="form-control" value="" />
					</div>
				</div>
				
				<div class="row">
					<label class="col-sm-3 control-label text-right">(*) Fecha C/S:</label>
						<div class="col-sm-7">
						<div id="fecha_nuevo" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
							<input readonly="readonly" type="text"  name="fecha_nuevo" class="form-control" />
							<span class="input-group-addon add-on">
								<span class="glyphicon glyphicon-calendar"></span>
		                	</span>
					   </div>
					</div>
				</div>
				
				
							
				<div class="row" >
				 <label class="col-sm-3 control-label text-right">(*) Superficie:</label>
					<div class="col-sm-7">
					  <div class="input-group">
						  <input type="text" class="form-control" aria-describedby="basic-addon2">
						  <span class="input-group-addon" id="basic-addon2">m&sup2; </span>
					  </div>
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-3 control-label text-right">(*) Variedad:</label>
					<div class="col-sm-7">
						<select class="form-control" id="variedad_nuevo" name="variedad_nuevo">
							<option>Seleccione</option>						
						</select>
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-3 control-label text-right">(*) Clase:</label>
					<div class="col-sm-7">
						<select class="form-control" id="clase_nuevo" name="clase_nuevo">
							<option>Seleccione</option>						
						</select>
					</div>
				</div>
				
			</div>
		</div>
      
		<div class="modal-footer">
			
			<div class="row">
				<label class="col-sm-12 text-left">Los campos con asterisco (*) son obligatorios.</label>
			</div>
			
			<input type="submit" name="procesar" value="Procesar" class="btn-success btn" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>
      
      </form>
      
    </div>
  </div>
</div>


@endsection