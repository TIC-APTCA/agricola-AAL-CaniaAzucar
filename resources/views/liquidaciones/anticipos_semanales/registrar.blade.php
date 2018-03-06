@extends('layout_home')

@section('contenido')

<div class="widget_head">
	<ol class="breadcrumb">
		<li class=""><a href="{{ asset('home') }}">Liquidaci&oacute;n</a></li>
		<li class=""><a href="{{ asset('/liquidacion/anticipo') }}">Anticipos Semanales</a></li>
		<li class="active">Registrar</li>
	</ol>
</div>


	<div class="tab-content">
	<div class="tab-pane active" id="horizontal-form">
	
		<div class="panel-footer-top"></div>
		
		<form id="form-registrar" name="form-registrar" method="post" action="" class="form-horizontal">
		
		<input readonly="readonly" type="hidden" id="oculto" name="oculto" class="form-control" value="" />
		
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Semana de Anticipo:</label>
					<div class="col-sm-3">
						<select class="form-control" id="semana_ant" name="semana_ant" onchange="semana_tipo(this.value);">
							<option value="0">Seleccione</option>
							<option value="1">Semana Actual</option>
							<option value="2">Otra</option>
						</select>
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Codigo:</label>
					<div class="col-sm-2">
						<input readonly="readonly" type="text" id="codigo" name="codigo" class="form-control" value="" />
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Factor:</label>
					<div class="col-sm-2">
						<input type="text" id="factor" name="factor" class="form-control" value="" />
					</div>
				</div>
				
				<input type="hidden" name="porcentaje" id="porcentaje" value="60"/>

				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Porcentaje:</label>
					<div class="col-sm-2">
						<select id="porcentaje_lista" name="porcentaje_lista" class="form-control" onchange="cambiar_porcentaje();">
							<option value="60" >60%</option>
							<option value="0" >Otro</option>
						</select>
					</div>
					
					<label class="col-sm-1 control-label text-right">Otro:</label>
					<div class="col-sm-2">
						<input onkeyup="copy();" disabled="disabled" type="text" id="porcentaje_otro" name="porcentaje_otro" class="form-control" value="" />
					</div>
				</div>
				
				<div class="row" >
					<label class="col-sm-2 control-label text-right">(*) Descripci&oacute;n:</label>
					<div class="col-sm-5">
						<input type="text" id="descripcion" name="descripcion" class="form-control" value="" />
					</div>
				</div>
				
		<div class="row">
			<input type="hidden" id="semana_actual" name="semana_actual" value="<?php echo date("W");?>"/>
			<?php 
				$anio_actual = date("Y");
				$semana_actual = date("W");
				$ultimo_dia_anio = mktime(0,0,0,12,31,$anio_actual);
				$nro_dia_semana = date("w", $ultimo_dia_anio);
				
				if ($nro_dia_semana != 4){
					$total_semanas_anio = 52;
				}else{
					$total_semanas_anio = 53;
				}
				?>
			
						<label class="col-sm-2 control-label text-right">(*) N&deg; de Semana:</label>
					<div class="col-sm-2">
						<select class="form-control" id="semana" name="semana" onchange="elegida();">
							<option value="0">Seleccione</option>
							<?php
					$fecha_inicio = strtotime("01-01-".$anio_actual." ");
					$fecha_fin = strtotime("31-12-".$anio_actual." ");
					$i = 1;
					$semana_actual = date("W");
					while ($i <= $total_semanas_anio){
					for($j = $fecha_inicio; $j <= $fecha_fin; $j+=86400){
						$fecha_diaria = date('d-m-Y', $j );
						$tiempo_unix = strtotime( date('d-m-Y', strtotime($fecha_diaria)) ); 
						$cadena = explode('-', $fecha_diaria);
						$dia_semana = date('w', mktime(0,0,0, $cadena[1], $cadena[0], $cadena[2]));
						
						if ($dia_semana == 4){
					    	$inicio_semana = date('d-m-Y', strtotime('this week last monday', $tiempo_unix));
					    	$fin_semana = date('d-m-Y', strtotime('this week next sunday', $tiempo_unix));
					    	
					    	if ($i == $semana_actual){
					    		echo "<option value='".$i."' class='negro-sinefuente12'>".$i. ". ".$inicio_semana. " / ". $fin_semana."</option>";
					    	}else{
					    		echo "<option value='".$i."'>".$i. ". ".$inicio_semana. " / ". $fin_semana."</option>";
					    	}
					    $i++;	
						}
						
					} // Fin del for
					} // Fin del while
					?>
						</select>
					</div>
						
						<label class="col-sm-1 control-label text-right">Fecha Inicial:</label>
							<div class="col-sm-2">
								<div id="fecha_inicial" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
									<input readonly="readonly" type="text"  name="fecha_inicial" class="form-control" />
									<span class="input-group-addon add-on">
										<span class="glyphicon glyphicon-calendar"></span>
				                	</span>
							    </div>
						    </div>
						    
						<label class="col-sm-1 control-label text-right">Fecha Final:</label>
						    <div class="col-sm-2">
								<div id="fecha_final" class="input-group date" data-date="" data-date-format="yyyy-mm-dd">
									<input readonly="readonly" type="text"  name="fecha_final" class="form-control" />
									<span class="input-group-addon add-on">
										<span class="glyphicon glyphicon-calendar"></span>
				                	</span>
							    </div>
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