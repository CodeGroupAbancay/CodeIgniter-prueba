
$(document).ready(function(){
	// $("#Cambio_tarjeta").on("click", function(event){
	// 	event.preventDefault();
	// });
	// $( "#Cambio_tarjeta" ).click(function( event ) {

	//   event.preventDefault();
	//   event.stopPropagation();
	//   alert( event.isDefaultPrevented() ); // true
	// });

	$("#cancelar").on("click", function(){
		Cancelar();
	});

	$(".editar_benificio").on("click", function(){
		CargarBenificios($(this).data('id'));
	});

	$("#select_periodo").on("change", function(){
		CargarSemestre($(this).val());
	});

	$("#codigo_tarjeta").keyup( function(){
		var id = $(this).val();
		console.log(id);
      	if(id.length == 6){
        	CargarDatosTarjeta(id);
      	} else if(id.length > 6){
      		Cancelar();
      	}
	});

	$("#code_alumno").keyup(function(){
		var code_alumno = $(this).val();
		console.log(code_alumno);
		if (code_alumno.length == 6) {
			CargarDatosAlumno(code_alumno);
		} 
	});
});

function CargarDatosAlumno(code_alumno)
{
	$.ajax({
	    url: root+"/tarjeta/getByAlumno",
	    data: {codigo : code_alumno },
	    type: "POST",
	    dataType : "json",
	}).done(function( json ) {
	    if (json.exito) {
	    	$("#sumit").val(json.id);
	    	$("#estado").val(json.estado);
	    	$("#code_alumno").val(json.alumno);
	    	$("#codigo_tarjeta").val(json.codigo);
	    	$("#sumit").text("Modificar Tarjeta");
	    	$("#url_tarjeta").attr('action', root+'/tarjeta/modificar');
	    } else {
	      console.log("Ocurrio un Error en el Controlador");
	    }
	}).fail(function( xhr, status, errorThrown ){
	    alert( "Ocurrio un Error en el Ajax!" );
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	    console.dir( xhr );
	});
}

function CargarDatosTarjeta(id_tarjeta)
{
	$.ajax({
	    url: root+"/tarjeta/getByTarjeta",
	    data: {id : id_tarjeta },
	    type: "POST",
	    dataType : "json",
	}).done(function( json ) {
	    if (json.exito) {
	    	$("#sumit").val(json.id);
	    	$("#estado").val(json.estado);
	    	$("#code_alumno").val(json.alumno);
	    	$("#codigo_tarjeta").val(json.codigo);
	    	$("#sumit").text("Modificar Tarjeta");
	    	$("#url_tarjeta").attr('action', root+'/tarjeta/modificar');
	    } else {
	      console.log("Ocurrio un Error en el Controlador");
	    }
	}).fail(function( xhr, status, errorThrown ){
	    alert( "Ocurrio un Error en el Ajax!" );
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	    console.dir( xhr );
	});
}

function CargarSemestre(id_semestre)
{
	$.ajax({
	    url: root+"/semestre/getBySemestre",
	    data: {id : id_semestre },
	    type: "POST",
	    dataType : "json",
	}).done(function( json ) {
	    if (json.exito) {
	    	$("#sumit").val(json.id);
	    	$("#periodo").val(json.periodo);
	    	$("#fechafin").val(json.fechafin);
	    	$("#fechainicio").val(json.fechainicio);
	    	$("#sumit").text("Modificar Semestre");
	    	$("#url_semestre").attr('action', root+'/semestre/modificar');
	    } else {
	      console.log("Ocurrio un Error en el Controlador");
	    }
	}).fail(function( xhr, status, errorThrown ){
	    alert( "Ocurrio un Error en el Ajax!" );
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	    console.dir( xhr );
	});
}

function CargarBenificios(id_beneficio)
{
	console.log(root+"/beneficios/getBeneficios");
	$.ajax({
	    url: root+"/beneficios/getBeneficios",
	    data: {id : id_beneficio },
	    type: "POST",
	    dataType : "json",
	}).done(function( json ) {
	    if (json.exito) {
	    	$("#sumit").val(json.id);
	    	$("#nombre").val(json.nombre);
	    	$("#precio").val(json.precio);
	    	$("#estado").val(json.estado);
	    	$("#sumit").text("Modificar Beneficio");
	    	$("#url_benificio").attr('action', root+'/beneficios/modificar');
	    } else {
	      console.log("Ocurrio un Error en el Controlador");
	    }
	}).fail(function( xhr, status, errorThrown ){
	    alert( "Ocurrio un Error en el Ajax!" );
	    console.log( "Error: " + errorThrown );
	    console.log( "Status: " + status );
	    console.dir( xhr );
	});
}

function Cancelar()
{
	$("#nombre").val("");
	$("#precio").val("");
	$("#estado").val('1');
	$("#periodo").val("");
	$("#fechafin").val("");
	$("#code_alumno").val("");
	$("#fechainicio").val("");
	$("#codigo_tarjeta").val("");
	$("#sumit").text("Registrar");
	$("#url_tarjeta").attr('action', root+'/tarjeta/registrar');
	$("#url_semestre").attr('action', root+'/semestre/registrar');
	$("#url_benificio").attr('action', root+'/beneficios/registrar');
}

