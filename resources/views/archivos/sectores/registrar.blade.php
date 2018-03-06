@extends('layout_home')

@section('contenido')



<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class=""><a href="{{ asset('/sectores') }}">Sectores</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>


<div class="tab-content">
	
	
	<div class="tab-pane active " id="horizontal-form">


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		
		<form method="" action="" class="form-horizontal">
		
  		
  		<div class="row" >
			<label class="col-sm-4 control-label text-right">Codigo de hacienda:</label>
			<div class="col-sm-3">
				<input type="text" name="" class="form-control" value="{{$haciendas->codigo}}" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Nombre:</label>
			<div class="col-sm-3">
				<input type="text" name="" class="form-control" value="{{$haciendas->descripcion}}" readonly="readonly" />
			</div>
		</div>
		
		<div class="row" >
			<label class="col-sm-4 control-label text-right">Productor:</label>
			<div class="col-sm-3">
				<input type="text" name="" class="form-control" value="{{$haciendas->nombre.' '.$haciendas->apellido}}" readonly="readonly" />
			</div>
		</div>
		
			<br>
			
		<div class="panel-footer-bottom"></div>
		
		<div class="row text-left" >
		<label style="display:none" class="col-sm-1 control-label text-right valign-middle" >Sector:</label>
			<form method="get" action="" class="form-horizontal"  >
			<div class="col-sm-4" style="display:none">
			   
				<div class="input-group">
				    
					<input type="text" name="multicampo" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">Buscar</button>
					</span>
			    </div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
			</form>
			
						
			<!-- Paginador -->
		
		
			<div class="float-right">
				<a href="" id="nvo-sector" role="Button" data-toggle="modal" class="btn btn-primary btn-md float-right " >Nuevo</a>
			</div>
			
		</div>

</form>	
		
		<br/>
		
			<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">C&Oacute;DIGO</div>
					<div class="col-sm-5">DESCRIPCI&Oacute;N</div>
					<div class="col-sm-5">TABLONES REGISTRADOS</div>
				</div>
			</a>
			
	@foreach($sectores as $sector)
			<a href="#" class="list-group-item" >
			<div class="row">
				<div class="col-sm-1 text-center">{{ $sector->codigo_sector }}</div>
				<div class="col-sm-5 text-left">  {{ $sector->descripcion}}</div>
				<div class="col-sm-5 text-center">tablones registrados</div>
			</div>
	@endforeach	

			
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
			<h4 class="modal-title" id="titulo">Sectores</h4>
		</div>
		
		<form id="form-registrar" method="post" action="" class="form-horizontal">
		<div class="modal-body">
			<div class="form-horizontal">

				<div class="row" >
					<label class="col-sm-4 control-label text-right">C&oacute;digo:</label>
					<div class="col-sm-3">
						<input  type="text" id="codigo_sector" name="codigo_sector" class="form-control" value="" />
						<input type="hidden" id="haciendas_id" name="haciendas_id" value="{{$haciendas->id}}" />
					</div>
				</div>
				<div class="row" >
					<label class="col-sm-4 control-label text-right">(*) Descripci&oacute;n: </label>
					<div class="col-sm-7">
						<input type="text" id="descripcion" name="descripcion" class="form-control" value="" />
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