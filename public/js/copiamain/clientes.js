$(document).ready(function(){

	// Nuevo Cliente
	$('.btn-submit').bind('click', function(e){
		e.preventDefault();
		var nombre_cliente = $('#w1-nombre').val();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);
		console.log(data);
		console.log(url);
		var getout_tab = $(this).data('getouttab');
		var getout_content = $(this).data('getoutcontent');
		var getin_tab = $(this).data('getintab');
		var getin_content = $(this).data('getincontent');
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-submit").text('Guardando ...');
		   		$(".btn-submit").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-submit").text("Guardar y Continuar");
		   		$(".btn-submit").attr('disabled',false);
		   },
		   error: function(data){
		        var errors = '';
		        console.log(errors);
		        scrollTo("#w1");

	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            $('#response').show().html(errors); //this is my div with messages
	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_ok').fadeIn().delay(3000).fadeOut(350);
		   		$('#laurl').val(result.url_base);

		   		// Se inserta el id del nuevo cliente en el DOM
		   		if (result.idcliente > 0) {
		   		 	$('#btn-id').val(result.idcliente);
		   		 	$('#nombre-cliente').html("Inmuebles del Cliente <strong>"+nombre_cliente+"</strong>");
		   		};
		   		
		   		// Se carga el siguiente TAB
		   		timeOutId = setTimeout(function(){
					$('#'+getout_tab).removeClass('active');
					$('#'+getout_content).removeClass('active');
					$('#'+getin_tab).addClass('active');
					$('#'+getin_content).addClass('active');
				}, 4000);
				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});

	// Nuevo Inmueble del Cliente
	$('.btn-submit-inmueble').bind('click', function(e){
		e.preventDefault();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);
		console.log(data);
		console.log(url);
		
		var getout_tab = $(this).data('getouttab');
		var getout_content = $(this).data('getoutcontent');
		var getin_tab = $(this).data('getintab');
		var getin_content = $(this).data('getincontent');
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-submit").text('Guardando ...');
		   		$(".btn-submit").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-submit").text("Guardar y Continuar");
		   		$(".btn-submit").attr('disabled',false);
		   },
		   error: function(data){
		        var errors = '';
		        console.log(errors);
		        scrollTo("#w1");
	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            $('#response').show().html(errors); //this is my div with messages
	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_ok_nuevo_inmueble').fadeIn().delay(3000).fadeOut(350);
		   		// Se inserta el id del nuevo cliente en el DOM
		   		timeOutId = setTimeout(function(){
					$('#crear-inmueble').collapse('hide');

					
				}, 4000);
				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});

	$('#btn-recarga').bind('click', function(e){
		var url_base = $('#laurl').val();
		var idcliente = $('#btn-id').val();
		get_archivos(idcliente, url_base+'/inmuebles/'+idcliente+'/cliente','tabla-inmuebles-cliente');
	});

	


});