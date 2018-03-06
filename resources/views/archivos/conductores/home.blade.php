@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Archivos</a></li>
		<li class="active"><a href="">Conductores</a></li>
	</ol>
</div>

<div class="tab-content">
 
		<div class="row" >
			<form method="get" action="" class="form-horizontal">
			<div class="col-sm-5">
				<div class="input-group">
					<input type="text" name="multicampo" class="form-control" placeholder="Buscar...">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info">Buscar</button>
					</span>
			    </div>
				<input type="hidden" name="_token" value="">
			</div>
			</form>
	
			
			<div class="float-right">
				<a href="{{ asset('/conductores/registrar') }}" class="btn btn-primary btn-md" >Nuevo</a>
			</div>
		</div>
		
	<div class="panel-footer"></div>
	<br/>
		
		@foreach($conductores as $conductor)
	<div class="col-sm-4">
			<div class="chat-panel panel panel-default">
				<a href="{{ asset("conductores/actualizar/$conductor->id") }}" class="btn btn-info chat-heading" role="button">
					<i class="fa fa-truck"></i>
				</a>
				<div class="panel-body">
					<ul class="chat">
						<li class=" clearfix">
							<div class="chat-body clearfix">
								<p>Codigo:  	  {{ $conductor->id    }}</p>
								<p>Cedula:  	  {{ $conductor->cedula		}}</p>
								<p>Nombres: 	  {{ $conductor->nombres  	}}</p>
								<p>Apellidos:     {{ $conductor->apellidos	}}</p>
								<p>Telefono:      {{ $conductor->telefono	}}</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		</div>


@endsection