@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/tablones') }}">Tablones</a></li>
	</ol>
</div>



<div class="tab-content">
	
	
	<div class="tab-pane active " id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		
		<form method="post" action="" class="form-horizontal">
		
  		
  		<div class="row" >
			<label class="col-sm-4 control-label text-right">Codigo de hacienda:</label>
			<div class="col-sm-3">
				<input type="text" name="codigo_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Nombre:</label>
			<div class="col-sm-3">
				<input type="text" name="nombre_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Productor:</label>
			<div class="col-sm-3">
				<input type="text" name="productor_hacienda" class="form-control" value="" readonly="readonly" />
			</div>
		</div>
		
			<br>
			
		<div class="panel-footer-bottom"></div>
		
		<div class="row text-left" >
		<label class="col-sm-1 control-label text-right valign-middle" >Sector:</label>
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
			
		</div>

</form>	
		
		<br/>
		
			<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-5">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-1">ZONA</div>
					<div class="col-sm-5">TABLONES REGISTRADOS</div>
				</div>
			</a>
			
	
			<a href="{{ asset('/tablones/registrar') }}" class="list-group-item">
			<div class="row">
				<div class="col-sm-1 text-center">Prueba</div>
				<div class="col-sm-5 text-left">Prueba</div>
				<div class="col-sm-1 text-left">Prueba</div>
				<div class="col-sm-5 text-center">Prueba</div>
			</div>
			</a>
		
			
		</div>
					
	</div>
	<div class="clearfix"></div>
</div>


	</div>
</div>



<div  class="modal fade" id="NuevoSectorModal" tabindex="-1" role="dialog" aria-labelledby="Nuevo Sector">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="titulo">Conceptos de N&oacute;minas</h4>
		</div>
		
		<form id="form-registrar" method="post" action="" class="form-horizontal">
		<div class="modal-body">
			<div class="form-horizontal">
				<div class="row" >
					<label class="col-sm-4 control-label text-right">Concepto de N&oacute;mina:</label>
					<div class="col-sm-8">
						<select id="conceptos_id" name="conceptos_id" class="form-control">
							
						</select>
					</div>
				</div>
				<div class="row" >
					<label class="col-sm-4 control-label text-right">Horas:</label>
					<div class="col-sm-3"><input type="text" id="horas" name="horas" class="form-control" value="0.00" /></div>
				</div>
				<div class="row" >
					<label class="col-sm-4 control-label text-right">D&iacute;as:</label>
					<div class="col-sm-3"><input type="text" id="dias" name="dias" class="form-control" value="0.00" /></div>
				</div>
				<div class="row" >
					<label class="col-sm-4 control-label text-right">Monto:</label>
					<div class="col-sm-3"><input type="text" id="monto" name="monto" class="form-control" value="0.00" /></div>
				</div>
			</div>
		</div>
      
		<div class="modal-footer">
			<input type="submit" name="procesar" value="Procesar" class="btn-success btn" />
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</div>
      
      </form>
      
    </div>
  </div>
</div>


@endsection