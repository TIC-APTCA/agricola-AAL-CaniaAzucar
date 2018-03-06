@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class="active"><a href="">Veh&iacute;culos</a></li>
	</ol>
</div>

<div class="tab-content">
 
		<div class="row" >
			<form method="get" action="{{ asset('/vehiculos') }}" class="form-horizontal">
			<div class="col-sm-5">
				<div class="input-group">
					<input type="text" name="multicampo" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">Buscar</button>
					</span>
			    </div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</div>
			</form>
	

			
			<div class="float-right">
				<a href="{{ asset('vehiculos/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>

		<div class="panel-footer"></div>
	<br/>
	
	@foreach($vehiculos as $vehiculo)
	<div class="col-sm-4">
			<div class="chat-panel panel panel-default">
				<a href="{{ asset("vehiculos/actualizar/$vehiculo->id") }}"  class="btn btn-info chat-heading" role="button">
					<i class="fa fa-truck"></i>
				</a>
				<div class="panel-body">
					<ul class="chat">
						<li class=" clearfix">
							<div class="chat-body clearfix">
								<p>Placa:    {{ $vehiculo->placa    }}</p>
								<p>Tipo V.:  {{ $vehiculo->tipo		}}</p>
								<p>Marca: 	 {{ $vehiculo->marca  	}}</p>
								<p>Modelo:   {{ $vehiculo->modelo	}}</p>
								<p>Remolque: {{ $vehiculo->remolque === "1" ? "Con Remolque" : "Sin Remolque" }}</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		
		
	
	</div>
</div>

@endsection