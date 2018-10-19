$(document).ready(function(){

	// Nuevo Cliente
	$('.btn-submit').bind('click', function(e){
		e.preventDefault();
		var nombre_cliente = $('#w1-nombre').val();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var method = $('#method').val();
		alert(url);
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);
		console.log(url);
		console.log(method);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'post',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-submit").text('Guardando ...');
		   		$(".btn-submit").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-submit").text("Crear Usuario");
		   		$(".btn-submit").attr('disabled',false);
		   },
		   error: function(data){
		        var errors = '';
		        console.log(data);
		        scrollTo("#w1");

	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            $('#response').show().html(errors); //this is my div with messages
	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_ok').fadeIn().delay(3000).fadeOut(350);
		   		timeOutId = setTimeout(function(){
		   			window.location.href = '/clientes';
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
		alert(url);
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
		   		$(".btn-submit").text("Guardar");
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
		   			window.location.href = $(location).attr('href');
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

	$('.delete-row').bind('click', function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var id = row.data('id');
		var form = $('#form-delete');
		var url = form.attr('action').replace(':CLIENTE_ID',id);
		var data = form.serialize();
		console.log(data);
		swal({
			title: "¿Desea eliminar el cliente?",
			text: "Se borraran todos los datos del mismo",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Eliminar',
			closeOnConfirm: false
		},
		function(){ 
			row.fadeOut();
			$.post(url, data, function(result){
				swal("Eliminado", "Se ha eliminado el cliente ", "success");
			});
		});
	});

});