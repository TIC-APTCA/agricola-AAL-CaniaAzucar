function codigo_creador() {

    	
		var tipo=$('#tipos_id').val();
    	var asignacion=parseInt($('#asignacion').val());
    	var deduccion=parseInt($('#deduccion').val());
    	var codigo='';
    	
   

    	if(tipo=="1")
	    	{
    		   $('#columna').val('asignacion');
    		   
    		   $('#asignacion').val(asignacion-1);
    	    		
		    	if(asignacion<=9)
		    	{
		    		codigo='01-0'+(asignacion+1);
		    	}
		    	else if(asignacion>9)
		    	{
	    		codigo='01-'+(asignacion+1);
		    	} 	    	
	    	}
    	
    	if(tipo=='2')
    		{
    		$('#columna').val('deduccion');
    		
    			if(deduccion<=9)
    			{
    			codigo='02-0'+(deduccion+1);
    			}
    			else if(deduccion>9)
    			{
    			codigo='02-'+(deduccion+1);
    			} 
    		}
    	
    	
    	$('#codigo').val(codigo);
    	
 
  }


$(document).ready(function(){
	
/*****************************************************************/
/************Submodulo Conceptos de liquidacion***************/
/*****************************************************************/	
				
		/*
		 * mensaje de confirmacion para eliminar
		 */
$("#btn-eliminar-cl").click(function(event){
				
				var respuesta = confirm("¿Desea eliminar el concepto?");
				if (respuesta == true) {
					$('#form_eliminar_cl').submit();
				}		
			});




/*****************************************************************/
/************Submodulo Conceptos de liquidacion***************/
/*****************************************************************/	
				
		/*
		 * mensaje de confirmacion para eliminar
		 */
$("#btn-eliminar-as").click(function(event){
				
				var respuesta = confirm("¿Desea eliminar el anticipo?");
				if (respuesta == true) {
					$('#form_eliminar_as').submit();
				}		
			});


});

function codigo(sem) {
	
	
	var fecha = new Date();
	var ano = fecha.getFullYear();	
	var fecha_inicio_fin= $('#oculto').val(); 
		
	var quitar_semana=fecha_inicio_fin.split("."); 
	var separar_inicio_fin=quitar_semana[1].split("/");
	var inicio=separar_inicio_fin[0];
	var fin=separar_inicio_fin[1];
	
	
	
	

	var cod;

	if(sem<=9){
		cod='AS0'+sem+'-'+ano;
	}
	else if(sem>9){
		cod='AS'+sem+'-'+ano;
	}
	
	$('#codigo').val(cod);
	$('#descripcion').focus();
    
  /*  var fecha1=inicio.split("-");
   	var fecha2=fin.split("-");

	var fecha_inicio=fecha1[2]+'-'+fecha1[1]+'-'+fecha1[0];
	var fecha_fin=fecha2[2]+'-'+fecha2[1]+'-'+fecha2[0];
	


	
   document.form2.fecha_inicial.value=fecha_inicio;
   document.form2.fecha_final.value=fecha_fin;*/
    

}

function semana_tipo(tipo) {
	
	if(tipo=="2"){
		alert('Seleccione la semana, Por Favor');
		
		$('#codigo').val("");
		$('#semana').val(0)
		$('#fecha_inicial').val("");
		$('#fecha_final').val("");
		$('#semana').focus();
		
	}
	else if(tipo=="1"){
		var semana=$('#semana_actual').val();
		$('#semana').val(semana);	
		elegida();
		codigo(semana);
	
}
	
}
	

function elegida(){
	
		var numero= $('#semana').val();

		var combo = document.getElementById("semana");
		var semana = combo.options[combo.selectedIndex].text;
		$('#oculto').val(semana);
		codigo(numero)
		
}

function cambiar_porcentaje() {
	
	var porcentaje= $('#porcentaje_lista').val();
	
    if (porcentaje == "60") {
        $("#porcentaje_lista").prop('disabled','');
        $("#porcentaje_otro").prop('disabled','disabled'); 
        $("#porcentaje_otro").prop('value','');
        $("#porcentaje").val('');
        $("#porcentaje").val('60');
        
    }

    if (porcentaje == "0") {
    	$("#porcentaje").val('');
    	$("#porcentaje_otro").prop('disabled','');
        $("#porcentaje_lista").prop('value','0'); 
    }

}

function copy(){
	
	var otro= $("#porcentaje_otro").val();
	$("#porcentaje").val('');
	$("#porcentaje").val(otro);
}