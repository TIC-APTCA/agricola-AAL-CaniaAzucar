@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Agronomia</a></li>
		<li class=""><a href="{{ asset('/estimados/hacienda') }}">Estimados Hacienda</a></li>
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


<div  class="modal fade" id="NuevoTablonModal"  role="dialog" aria-labelledby="">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="titulo">Estimado por Tablon</h4>
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
					<label class="col-sm-3 control-label text-right">(*) Rendimiento:</label>
					<div class="col-sm-7">
						<input type="text" id="rendimiento_estimado" name="rendimiento_estimado" class="form-control" value="" />
					</div>
				</div>
				
				<div class="row">
					<label class="col-sm-3 control-label text-right">(*) Ca&ntilde;a:</label>
						<div class="col-sm-7">
						<div class="input-group">
							<input readonly="readonly" type="text"  id="cana_estimada" name="cana_estimada" class="form-control" />
							<span class="input-group-addon add-on">
								<span >Ton.</span>
		                	</span>
					   </div>
					</div>
				</div>
				
				<div class="row">
					<label class="col-sm-3 control-label text-right">(*) Az&uacute;car:</label>
						<div class="col-sm-7">
						<div class="input-group">
							<input readonly="readonly" type="text"  id="azucar_estimada" name="azucar_estimada" class="form-control" />
							<span class="input-group-addon add-on">
								<span >Ton.</span>
		                	</span>
					   </div>
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