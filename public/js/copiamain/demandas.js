$(document).ready(function(){
	$('input[type=radio]').change(function(event){
		var valor = $(event.target).val();
		if(valor =="inmueble"){
           $('#seccion-describir-demanda').collapse('hide');
           $('#seccion-interesado-inmueble').collapse('show');
        } else if (valor == "descripcion") {
           $('#seccion-interesado-inmueble').collapse('hide');
           $('#seccion-describir-demanda').collapse('show');
        };
	});
	$('#venta').change(function(){
		if ($(this).is(':checked')) {
			$('#parte-venta').collapse('show');
		}else{
		    $('#parte-venta').collapse('hide');
		};
	});
	$('#alquiler-residencial').change(function(){
		if ($(this).is(':checked')) {
			$('#parte-alq-res').collapse('show');
		}else{
			$('#parte-alq-res').collapse('hide');
		};
	});
	$('#radioBtn-basica').change(function(){
		if ($(this).is(':checked')) {
			$('#busqbasica').collapse('show');
		}else{
			$('#busqbasica').collapse('hide');
		};
	});
	$('#radioBtn-radio').change(function(){
		if ($(this).is(':checked')) {
			$('#busqradio').collapse('show');
		}else{
			$('#busqradio').collapse('hide');
		};
	});
	$('#radioBtn-mapa').change(function(){
		if ($(this).is(':checked')) {
			$('#busqmapa').collapse('show');
		}else{
			$('#busqmapa').collapse('hide');
		};
	});
	$('.radio').change(function(event){
		var valor = $(event.target).val();
		if(valor =="basica"){
           $('#busqradio').collapse('hide');
           $('#busqmapa').collapse('hide');
           $('#busqbasica').collapse('show');
        } else if (valor == "radio") {
           $('#busqmapa').collapse('hide');
           $('#busqbasica').collapse('hide');
           $('#busqradio').collapse('show');
        }else{
           $('#busqradio').collapse('hide');
           $('#busqbasica').collapse('hide');
           $('#busqmapa').collapse('show');
        };
	});
	// Demanda base inmueble
	$('#btn-db-inmueble').bind('click',function(){
        $('#dbi').collapse('hide');
        $('#dbi').collapse('show');
	});


});