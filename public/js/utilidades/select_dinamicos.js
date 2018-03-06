//estados -> municipios
$(function () {
	$("#estados_id").change(function(event){
		$.get("registrar/"+event.target.value+"",function(response, municipios_id){
		    $("#municipios_id").empty();
			for(i=0; i < response.length; i++){
				$("#municipios_id").append("<option value='"+response[i].id+"'>"+response[i].descripcion+"</option>");
			}
		});
	});
});


/*
//municipios -> parroquias
$(function () {
	$("#municipios_id").change(function(event){
		$.get("registrar/"+event.target.value+"",function(response, parroquias_id){
		    $("#parroquias_id").empty();
			for(i=0; i < response.length; i++){
				$("#parroquias_id").append("<option value='"+response[i].id+"'>"+response[i].descripcion+"</option>");
			}
		});
	});
});
*/



