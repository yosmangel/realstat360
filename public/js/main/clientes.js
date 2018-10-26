$(document).ready(function(){

	// Nuevo Cliente
	$('.btn-submit').bind('click', function(e){
		e.preventDefault();
		$('#response').hide();
		var nombre_cliente = $('#w1-nombre').val();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var urlSuccess = form.attr('action2');
		var method = $('#method').val();
		var validacion=validarFormularioCliente();
		if(validacion.flag){
		    scrollTo("#w1");
		    $('#response').show().html(validacion.error);
		    return false;
		}
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);

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
		   		
		   },
		   error: function(data){
		        var errors = '';
		        $(".btn-submit").attr('disabled',false);
		        scrollTo("#w1");

	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            $('#response').show().html(errors); //this is my div with messages
	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		$(".btn-submit").attr('disabled',true);
		   		$('#msj_ok').fadeIn().delay(3000).fadeOut(350);
		   		timeOutId = setTimeout(function(){
		   			window.location.href = urlSuccess;
				}, 2000);
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
	$( "input[type='text']" ).change(function() {
  // Check input( $( this ).val() ) for validity here
});
	$( "#w1-email" ).change(function(e) {
		e.preventDefault();
		var form = $(this).parents('form');
		var id=form.attr('cliente');
		var correo=document.frmCliente.email.value;

		if(correo==null || correo=="" || correo==undefined){
			return false;
		}else if(validaEmail(correo) == false){
			return false;
		}

		var formData = new FormData();
	    var data={  
            'id': id=="" || id==null?0:id,
            'email':correo
        }

		var url = form.attr('action3');
		
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		   type: 'post',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   },
		   complete: function(){
		   },
		   error: function(data){
		       $("#okEmail").css('visibility', 'hidden');
		       $("#removeEmail").css('visibility', 'visible'); 
		        
		        
	      	},
		   success: function(result) {

		   		if(result.find==0){
		   			$("#okEmail").css('visibility', 'visible');
			        $("#removeEmail").css('visibility', 'hidden');
		   		}else{
		   			$("#okEmail").css('visibility', 'hidden');
			        $("#removeEmail").css('visibility', 'visible');
			   		swal({
						title: "Correo existente",
						text: "El correo escrito pertenece al usuario "+ result.cliente[0].nombre+" "+result.cliente[0].apellidos+". Por favor escriba otro.",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK',
						closeOnConfirm: true
					},
					function(){ 
					});
		   		}
		    }
		});
	});

	$( "#w1-telefono" ).change(function(e) {
		e.preventDefault();
		var form = $(this).parents('form');
		var id=form.attr('cliente');
		var telefono=$("#w1-telefono").val();

		if(telefono==null || telefono=="" || telefono==undefined){
			return false;
		}else if(validaNumeros(telefono) == false){
			return false;
		}

		var formData = new FormData();
	    var data={  
            'id': id=="" || id==null?0:id,
            'telefono':telefono
        }

		var url = form.attr('action4');
		
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		   type: 'post',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   },
		   complete: function(){
		   },
		   error: function(data){
		       $("#okTel").css('visibility', 'hidden');
		       $("#removeTel").css('visibility', 'visible'); 
		        
		        
	      	},
		   success: function(result) {

		   		if(result.find==0){
		   			$("#okTel").css('visibility', 'visible');
			        $("#removeTel").css('visibility', 'hidden');
		   		}else{
		   			$("#okTel").css('visibility', 'hidden');
			        $("#removeTel").css('visibility', 'visible');
			   		swal({
						title: "Teléfono existente",
						text: "El teléfono escrito pertenece al usuario "+ result.cliente[0].nombre+" "+result.cliente[0].apellidos+". Por favor escriba otro.",
						type: "warning",
						showCancelButton: false,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'OK',
						closeOnConfirm: true
					},
					function(){ 
					});
		   		}
		    }
		});
	});
});

function validarFormularioCliente(){
	var correo=document.frmCliente.email.value;
	var telefono=document.frmCliente.telefono.value;
	var nombre=document.frmCliente.nombre.value;
	var apellido=document.frmCliente.apellidos.value;
	var fechaNacimiento=document.frmCliente.fecha_nacimiento.value;
	var tipoIdentificacion=document.frmCliente.tipo_doc.value;
	var identificacion=document.frmCliente.tipo_doc_num.value;
	var idioma=document.frmCliente.idioma_id.value;
	var tipoCliente=document.frmCliente.tipo_cliente.value;
	var visitas=document.frmCliente.visitas.value;
	var presupuesto=document.frmCliente.presupuesto.value;
	var flag=false;
	var errors="";

	if(correo==null || correo=="" || correo==undefined){
		errors += "Debe ingresar el correo del cliente." + '<br>';
		flag=true;
	}else if(validaEmail(correo) == false){
		errors += "Debe ingresar un formato correcto para el correo del cliente." + '<br>';
		flag=true;
	}

	if(telefono==null || telefono=="" || telefono==undefined){
		errors += "Debe ingresar el teléfono del cliente." + '<br>';
		flag=true;
	}else if(validaNumeros(telefono) == false){
		errors += "Debe ingresar solo números para el télefono del cliente." + '<br>';
		flag=true;
	}

	if(nombre==null || nombre=="" || nombre==undefined){
		errors += "Debe ingresar el nombre del cliente." + '<br>';
		flag=true;
	}else if(nombre.length<3){
		errors += "El nombre del cliente debe tener al menos 3 carácteres." + '<br>';
		flag=true;
	}

	if(apellido==null || apellido=="" || apellido==undefined){
		errors += "El apellido del cliente es obligatorio." + '<br>';
		flag=true;
	}else if(apellido.length<3){
		errors += "El apellido del cliente debe tener al menos 3 carácteres." + '<br>';
		flag=true;
	}

	if(fechaNacimiento==null || fechaNacimiento=="" || fechaNacimiento==undefined){
		errors += "La fecha de nacimiento del cliente es obligatoria." + '<br>';
		flag=true;
	}

	if(tipoIdentificacion==null || tipoIdentificacion=="" || tipoIdentificacion==undefined){
		errors += "El tipo de documento es obligatorio." + '<br>';
		flag=true;
	}

	if(identificacion==null || identificacion=="" || identificacion==undefined){
		errors += "El número de documento del cliente es obligatorio." + '<br>';
		flag=true;
	}else if(identificacion.length<5){
		errors += "El número de documento del cliente debe tener al menos 5 carácteres." + '<br>';
		flag=true;
	}

	if(idioma==null || idioma=="" || idioma==undefined){
		errors += "El idioma del cliente es obligatorio." + '<br>';
		flag=true;
	}

	if(tipoCliente==null || tipoCliente=="" || tipoCliente==undefined){
		errors += "El tipo de cliente es obligatorio." + '<br>';
		flag=true;
	}

	if(visitas==null || visitas=="" || visitas==undefined){
		errors += "Las visitas del cliente es obligatorio" + '<br>';
		flag=true;
	}

	if(presupuesto==null || presupuesto=="" || presupuesto==undefined){
		errors += "El presupuesto del cliente es obligatorio." + '<br>';
		flag=true;
	}else if(validaNumeros(presupuesto)==false){
		errors += "Debe ingresar un valor neto sin decimales ni puntos para el presupuesto." + '<br>';
		flag=true;
	}

	var resultado={
		'flag':flag,
		'error':errors,
	};

	return resultado; 
}

function validaEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function validaCaracteres(texto) {
    return /^[a-zA-Z," ",áéíóúñÑ]+$/i.test(texto);
}

function validaNumeros(numeros) {
    return /^[0-9]+$/i.test(numeros);
}