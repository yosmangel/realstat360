$(document).ready(function(){
	
	$('[data-toggle="tooltip"]').tooltip();

	$('.mostrar_direccion').change(function(event){
	var valor = $(event.target).val();
	if(valor == "3"){
		        $('#inputzona').collapse('show');
		     }else{
		      $('#inputzona').collapse('hide');
		     };

	});

	$('.tipo_promocion').change(function(event){
		var valor = $(event.target).val(); 
		if(valor == 2){
			    $('#extras-residencial').collapse('hide');
			    $('#extras-industrial').collapse('hide');
			    $('#extras-oflocal').collapse('show');
		}else if(valor == 3){
			    $('#extras-residencial').collapse('hide');
			    $('#extras-oflocal').collapse('hide');
			    $('#extras-industrial').collapse('show');
		}else{
				$('#extras-industrial').collapse('hide');
			    $('#extras-oflocal').collapse('hide');
			    $('#extras-residencial').collapse('show');
		};
	});

	$('select[name=mostrar_contacto]').change(function(){
		var valor = $(this).val();
		if (valor==3) {
			$('#otros-datos').collapse('show');
		}else{
			$('#otros-datos').collapse('hide');
		};
	});

	/* Crear una nueva promocion */
	$('.btn-create-ajax').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		data = objectifyForm(data);
		var timeOutId = 0; // Se inicializa la variable de tiempo para la espera antes de desplegar el segundo acordion
		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json',
		   data : data,
		   beforeSend: function(){
		   		$(".btn-create-ajax").text('Guardando ...');
		   		$(".btn-create-ajax").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-create-ajax").text('Guardar');
		   		$(".btn-create-ajax").attr('disabled',false);
		   },
		   error: function(data){
	        var errors = '';
	        //var errors = data.responseJSON;
	        console.log(errors);
	        scrollTo("#w1");
            for(datos in data.responseJSON){
                errors += data.responseJSON[datos] + '<br>';
            }
            $('#response').show().html(errors); //this is my div with messages

	      	},
		   success: function(result) {
		   		 $(form)[0].reset();
		   		 $('#collapse2One').collapse('hide');

		   		 // Se almacena el id de la promocion actual en un input hidden
		   		 // y se le adiciona el action el tercer formulario
				 var idprom = result.idu;
		   		 $('input#idu').val(idprom);
		   		 $('form#form-internos').attr('action','{{ route(\"promociones.update\",'+idprom+') }}'); 
				
		   		 // Aqui se le ponen los id a los formularios en las secciones de imagenes y documentos
				 $('#promocion').val(idprom);
				 $('#imapromo_id').val(idprom);
				 $('#docpromo_id').val(idprom); 
				 $('#nuevoinm_prom_id').val(idprom);
 
				 console.log(result.idu);

		   		 $('html,body').animate({
				        scrollTop: $("#msj_"+id_msj).offset().top
				    }, 2000);
		   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);

				timeOutId = setTimeout(function(){
		   		 	$('#collapse2Two').collapse('show');
		   		 	//$('#idu').val(idprom);
		   		}, 3000);
		    }
		});
		clearTimeout(timeOutId);
	});

/* Crear una nueva promocion */
	$('.btn-submit-internos').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		if(id_msj == "form_internos"){
			var numform = 1;
		};
		
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		data = objectifyForm(data);

		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'PUT',
		   dataType: 'json',
		   data : data,
		   beforeSend: function(){
		   		$(".btn-submit-internos").text('Guardando ...');
		   		$(".btn-submit-internos").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-submit-internos").text('Guardar');
		   		$(".btn-submit-internos").attr('disabled',false);
		   },
		   success: function(result) {
		   		 $(form)[0].reset();
		   		 $('#collapse2Three').collapse('hide');
		   		 $('html,body').animate({
				        scrollTop: $("#msj_"+id_msj).offset().top
				    }, 2000);
		   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);
				
		    }
		});
	});

	// Funcion para cambiar el formato antes de enviar por ajax
	function objectifyForm(formArray) {//serialize data function
	  var returnArray = {};
	  for (var i = 0; i < formArray.length; i++){
	    returnArray[formArray[i]['name']] = formArray[i]['value'];
	  }
	  return returnArray;
	};

	$('#contrato').change(function(){
		if ($(this).is(":checked")) {
			$('.inputs-contratos').removeAttr('disabled');
		}else{
			$('.inputs-contratos').attr('disabled','disabled');
		};
	});

	$('.btn-nuevo-inmueble').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		data = objectifyForm(data);
		var timeOutId = 0;
		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-nuevo-inmueble").text('Guardando ...');
		   		$(".btn-nuevo-inmueble").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-nuevo-inmueble").text("Guardar");
		   		$(".btn-nuevo-inmueble").attr('disabled',false);
		   },
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_form_nuevo_inmueble').fadeIn().delay(4000).fadeOut(350);
				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});
	
	$('.btn-nuevo-inmueble-continuar').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		data = objectifyForm(data);
		var timeOutId = 0;
		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-nuevo-inmueble-continuar").text('Guardando ...');
		   		$(".btn-nuevo-inmueble-continuar").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-nuevo-inmueble-continuar").text("Guardar");
		   		$(".btn-nuevo-inmueble-continuar").attr('disabled',false);
		   },
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_form_nuevo_inmueble_continuar').fadeIn().delay(3000).fadeOut(350);
		   		
		   		timeOutId = setTimeout(function(){
			   		$('#tab-select-nuevo').removeClass('active');
			   		$('#w1-nuevo-inmueble').removeClass('active');
			   		$('#tab-select-lista').addClass('active');
			   		$('#w1-lista-inmuebles').addClass('active');
		   		}, 3000);

				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});

});
