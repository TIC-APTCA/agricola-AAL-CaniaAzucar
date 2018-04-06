@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Liquidaci&oacute;n</a></li>
		<li class="active">Preliminar</li>
	</ol>
</div>

	
	<div class="row">
		<label class="col-sm-1 control-label text-right">Fecha:</label>
			<div class="col-sm-3">
				<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
					<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" />
					<span class="input-group-addon add-on">
						<span class="glyphicon glyphicon-calendar"></span>
                	</span>
                	<div class="col-lg-3">
							<button  type="submit" class="btn btn-info">Generar</button>
				</div>
			    </div>
			    
  			 </div>
   </div>
		
	<br>
	
	<div class="panel-footer"></div>
			
	
	<div style="display:none">

		<div class="list-group">
			<a class="list-group-head">
				<div class="row text-center">
					<div class="col-sm-1">BOLETOS</div>
					<div class="col-sm-2">PESO NETO</div>
					<div class="col-sm-2">PESO BRUTO</div>
					<div class="col-sm-2">PESO TARA</div>
					<div class="col-sm-2">CA&Ntilde;A</div>
					<div class="col-sm-1">RENDIMIENTO</div>
					<div class="col-sm-2">AZ&Uacute;CAR</div>
				</div>
			</a>
			

			<a href="" class="list-group-item">
			 <div class="row text-center">
					<div class="col-sm-1"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-2"></div>
					<div class="col-sm-1"></div>
					<div class="col-sm-2"></div>
				</div>
			</a>

		</div>
		<br>
		<div class="col-lg-1 pull-right">
			<button  type="submit" class="btn btn-info">Imprimir</button>
		</div>
	</div>	
		

@endsection