/*
 * Archivo .js con algunas funciones y/o
 * metodos aejecutar en el modulo de archivos
 */


$(document).ready(function(){
	


/****************************************/
/***********Submodulo Vehiculos*********/
/***************************************/

	
	$("#btn-remolque").click(function(){
		
		var placa_remolque=document.getElementById('placa_remolque');
		var descripcion_remolque=document.getElementById('descripcion_remolque');
		var remolque=document.getElementById('remolque');
		
		
		if(placa_remolque.disabled == false)
			{
				placa_remolque.disabled = true;
				descripcion_remolque.disabled = true;
				placa_remolque.value = "";
				descripcion_remolque.value = "";
				remolque.value=0;

		
				
			}
		else 
			{
				placa_remolque.disabled = false;
				descripcion_remolque.disabled = false;
				remolque.value=1;
			
				
			}
		
	});
	
	
$("#btn-eliminar-v").click(function(event){
		
		var respuesta = confirm("¿Desea eliminar el vehiculo?");
		if (respuesta == true) {
			$('#form_eliminar_v').submit();
		}		
	});


/************************************************/
/**********Fin Submodulo Vehiculos***************/
/************************************************/

	/*
	 * Cargar ventana modal para registrar nuevo sector
	 */
	$("#nvo-sector").click(function(event){
		
		event.preventDefault();
		$("#NuevoSectorModal").modal('show');
		
	});
	
	
	/*
	 * Cargar ventana modal para registrar nuevo tablon
	 */
	$("#nvo-tablon").click(function(event){
		
		event.preventDefault();
		$("#NuevoTablonModal").modal('show');
		
	});
	

	

/************************************************/
/************Submodulo Conductores***************/
/************************************************/	
	
	/*
	 * mensaje de confirmacion para eliminar conductor
	 */
	$("#btn-eliminar").click(function(event){
		
		var respuesta = confirm("¿Desea eliminar al conductor?");
		if (respuesta == true) {
			$('#form_eliminar').submit();
		}		
	});
	
/************************************************/
/************Submodulo Zafras***************/
/************************************************/	
		
		/*
		 * mensaje de confirmacion para eliminar conductor
		 */
		$("#btn-eliminar-z").click(function(event){
			
			var respuesta = confirm("¿Desea eliminar la zafra?");
			if (respuesta == true) {
				$('#form_eliminar_z').submit();
			}		
		});
	

/************************************************/
/************Submodulo Productores***************/
/************************************************/	
		
		/*
		 * mensaje de confirmacion para eliminar conductor
		 */
		$("#btn-eliminar-pr").click(function(event){
			
			var respuesta = confirm("¿Desea eliminar al productor?");
			if (respuesta == true) {
				$('#form_eliminar_pr').submit();
			}		
		});
	
		
/*****************************************************************/
/************Submodulo Estimados por Rango de Fecha***************/
/*****************************************************************/	
				
		/*

		 */
			$("#btn-eliminar-ef").click(function(event){
				
				var respuesta = confirm("¿Desea eliminar el estimado?");
				if (respuesta == true) {
					$('#form_eliminar').submit();
				}		
			});
			
/*****************************************************************/
/************Submodulo Estimados por Rango de Fecha***************/
/*****************************************************************/	
				
		/*
		 * mensaje de confirmacion para eliminar
		 */
			$("#btn-eliminar-ez").click(function(event){
				
				var respuesta = confirm("¿Desea eliminar el estimado?");
				if (respuesta == true) {
					$('#form_eliminar_ez').submit();
				}		
			});
		
	


/*****************************************************************/
/************Submodulo zaonas geograficas***************/
/*****************************************************************/	
				
		/*
		 * mensaje de confirmacion para eliminar
		 */
			$("#btn-eliminar-zg").click(function(event){
				
				var respuesta = confirm("¿Desea eliminar la zona?");
				if (respuesta == true) {
					$('#form_eliminar_zg').submit();
				}		
			});
		
	
});