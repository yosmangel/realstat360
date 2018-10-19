$(document).ready(function(){

	$('#btn-nueva-demanda').bind('click', function(e){
		e.preventDefault();
		//var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);
		console.log(data); 
		$.ajax({ 
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$("#btn-nueva-demanda").text('Guardando ...');
		   		$("#btn-nueva-demanda").attr('disabled',true);
		   },
		   complete: function(){
		   		$("#btn-nueva-demanda").text("Guardar y Continuar");
		   		$("#btn-nueva-demanda").attr('disabled',false);
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
		   		scrollTo("#w1");
		   		$('#msj_form_principales').fadeIn().delay(3000).fadeOut(350);

		   		// PARA CARGAR EL TAB DE LOS EXTRAS DEL INMUEBLE
		   		var iddemanda = result.demandaid;

		   		 // Se almacena el id de la promocion actual en un input hidden
		   		 // y se le adiciona el action el tercer formulario
		   		 $('input#iddemanda').val(iddemanda);
		   		 //$('form#form-internos').attr('action','{{ route(\"internos.update\",'+idinmueble+') }}'); 
		   		timeOutId = setTimeout(function(){
			   		$('#w1-principales').removeClass('active');
			   		$('#tab-principales').removeClass('active');
	          		//get_archivos(idinmueble, '/inmuebles/extras/'+idinmueble,'w1-extras');
	          		$('.extras').attr('action','/extrasdemandas/'+iddemanda);
	          		$('.extras-dem-id').val(iddemanda);
			   		$('#w1-extras').addClass('active');
			   		$('#tab-extras').addClass('active');
		   		}, 4000);
				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});

$('.btn-edit-extras').bind('click', function(e){ 
			e.preventDefault();
			var id_msj = $(this).data('id');
			var next = $(this).data('next');
			var acordion_parent = $(this).parents('.accordion-body').attr("id");
			var form = $(this).parents('form');
			var url = form.attr('action');
			var data = form.serializeArray();
			data = objectifyForm(data);
			console.log(data);
			var timeOutId = 0;
			$.ajax({
			   url: url,
			   headers: {'X-CSRF-TOKEN': token},
			   type: 'PUT',
			   dataType: 'json',
			   data : data,
			   beforeSend: function(){
			   		$(".btn-edit").text('Guardando ...');
			   		$(".btn-edit").attr('disabled',true);
			   },
			   complete: function(){
			   		$(".btn-edit").text('Guardar');
			   		$(".btn-edit").attr('disabled',false);
			   },
			   success: function(result) { 
			   		scrollTo('#'+acordion_parent);
			   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);
					console.log(result);
					timeOutId = setTimeout(function(){
				   		$('#'+acordion_parent).collapse('hide');
			   		}, 3000);
			   		timeOutId = setTimeout(function(){
				   		$('#'+next).collapse('show');
			   		}, 3000);
			   		
			    }
			});
			clearTimeout(timeOutId);
		});
	
	// Al entrar los datos extras del inmueble para la demanda (Demanda: Interesado en un Inmueble),
	// se verifica que los mismos coincidan o no con los del inmueble realmente,
	// si cumple con los criterios se muestra en el Tab panel de Inmuebles coincidentes 
	$('.btn-cont-coincidentes').bind('click', function(e){
		e.preventDefault();
		var iddemanda =  $('input#iddemanda').val();
		var url = '/demandas/coincidentes/'+iddemanda;
		var timeOutId = 0;
		$.ajax({
		   url: url,
		   type: 'GET',
		   beforeSend: function(){
		   		$(".btn-cont-coincidentes").text('Procesando ...');
		   		$(".btn-cont-coincidentes").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-cont-coincidentes").text("Continuar");
		   		$(".btn-cont-coincidentes").attr('disabled',false);
		   },
		   error: function(data){
	        var errors = '';
	        console.log(errors);
	        scrollTo("#w1");
            for(datos in data.responseJSON){
                errors += data.responseJSON[datos] + '<br>';
            }
            timeOutId = setTimeout(function(){
			   		$('#w1-extras').removeClass('active');
			   		$('#tab-extras').removeClass('active');
			   		$('#tab-inmuebles').addClass('active');
			   		$('#w1-inmuebles').addClass('active');
		   		}, 4000);
            $('#response').show().html(errors); //this is my div with messages

	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		/*$('#'+div).html(data).slideDown("slow");*/
		   		timeOutId = setTimeout(function(){
			   		$('#w1-extras').removeClass('active');
			   		$('#tab-extras').removeClass('active');
			   		$('#tab-inmuebles').addClass('active');
			   		$('#w1-inmuebles').addClass('active');
		   			$('#response').html(result);
		   		}, 4000);
		    }
		});
		clearTimeout(timeOutId);
	});

	$('input[type=radio]').change(function(event){
		var valor = $(event.target).val();
		if(valor =="inmueble"){
           $('#seccion-describir-demanda').collapse('hide');
           $('#seccion-interesado-inmueble').collapse('show');
        } else if (valor == "describir_demanda") {
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
	/*$('#btn-db-inmueble').bind('click',function(){
        $('#dbi').collapse('hide');
        $('#dbi').collapse('show');
	});*/

	$('.delete-row').bind('click', function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var id = row.data('id');
		var form = $('#form-delete');
		var url = form.attr('action').replace(':DEMANDA_ID',id);
		var data = form.serialize();
		console.log(data);
		swal({
			title: "¿Desea eliminar la demanda?",
			text: "Se borraran todos los datos de la misma",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Eliminar',
			closeOnConfirm: false
		},
		function(){ 
			row.fadeOut();
			$.post(url, data, function(result){
				swal("Eliminada", "Se ha eliminado la demanda ", "success");
			});
		});
	});

	$('.tipo_cliente').change(function(event){
		var valor = $(event.target).val();
		if(valor == "persona"){
			$('#tratamiento').attr('disabled',false);
          	$('#nombre').attr('placeholder','Nombre del Cliente');
        } else {
           $('#tratamiento').attr('disabled',true);
           $('#apellidos').attr('disabled',true);
           $('#nombre').attr('placeholder','Nombre de la Empresa');
        };
	});

	$('.alta-rapida').bind('click', function(e){
		e.preventDefault();
		$.magnificPopup.close();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var nombrecliente = '';
		var idcliente = '';
		var datos = form.serializeArray();
		datos = objectifyForm(datos);
		console.log(datos);
		$.ajax({
			url: url,
			headers: {'X-CSRF-TOKEN': token},
		   	type: 'POST',
		   	dataType: 'json', 
			data: datos,
			success: function(result){
				nombrecliente = result.nombrecliente;
				idcliente = result.idcliente;
				
				new PNotify({
					title: 'Proceso exitoso!',
					text: result.mensaje,
					type: 'success'
				});
				location.reload();
				//<option value="{{ $cliente->id}}">{{ $cliente->nombre }}</option>
			}
		});

	});
	

});