$(document).ready(function(){

    /* ************************************************************************* */
	
	$('.btn-primary').bind('click', function(e){ 
		e.preventDefault();
		$('#response').hide();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var method = $('#method').val();
		var data = form.serializeArray();
		scrollTo("#w1");
		var validacion=validarFormularioUsuario();
		if(validacion.flag){
		    scrollTo("#w1");
		    $('#response').show().html(validacion.error);
		    return false;
		} 
		data = objectifyForm(data);
		
		var timeOutId = 0;
		$.ajax({
			url: url,
			headers: {'X-CSRF-TOKEN': token},
			type: 'post',
			dataType: 'json',
			data : data,
			beforeSend: function(){
			   	$(".btn-primary").text('Guardando ...');
			   	$(".btn-primary").attr('disabled',true);
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
			error:function(datos){
				var errors = '';
				scrollTo("#w1");

	            for(datos in data.responseJSON){
	                errors += data.responseJSON[datos] + '<br>';
	            }
	            $('#response').show().html(errors);
				$(".btn-primary").text('Guardar');
			   	$(".btn-primary").attr('disabled',false);
			},
			complete: function(){
			   	$(".btn-primary").text('Guardar');
			   	$(".btn-primary").attr('disabled',false);
			},
			success: function(result) {
			   	scrollTo("#w1");
			   	$('#msj_form_usuario_editado').fadeIn().delay(3000).fadeOut(350);
			   	$('#password').val("");
			   	$('#password_confirmation').val("");
				
			}
		});
		
	});
	function scrollTo(id,sec){
	    if(id == undefined) id = "";
	    if(sec == undefined){ sec = 2; }
	    $(id).show();
	    $('html,body').animate({scrollTop: $(id).offset().top}, 800, 'swing');
	    return false;
	}
	

	
	function objectifyForm(formArray) {//serialize data function
		  var returnArray = {};
		  for (var i = 0; i < formArray.length; i++){
		    returnArray[formArray[i]['name']] = formArray[i]['value'];
		  }
		  return returnArray;
		};

	

	
});

	function ValidaNumeros(numeros) {
	    return /^[0-9]+$/i.test(numeros);
	}

	function validarFormularioUsuario(){
		var nombre=document.userProfileForm.nombre.value;
		var apellidos=document.userProfileForm.lastname.value;
		var password=document.userProfileForm.password.value;
		var password_confirmation=document.userProfileForm.password_confirmation.value;
		
		var flag=false;
		var errors="";

		if(nombre==null || nombre=="" || nombre==undefined){
			errors += "Debe ingresar el nombre del usuario." + '<br>';
			flag=true;
		}else if(nombre.length<3){
			errors += "El nombre del usuario debe tener al menos 3 carácteres." + '<br>';
			flag=true;
		}

		if(apellidos==null || apellidos=="" || apellidos==undefined){
			errors += "Debe ingresar los apellidos del usuario." + '<br>';
			flag=true;
		}else if(apellidos.length<3){
			errors += "El apellido del usuario debe tener al menos 3 carácteres." + '<br>';
			flag=true;
		}


		if(password==null || password=="" || password==undefined){
			//console.log();
		}else if(password.length<8){
			errors += "La contraseña debe ser mayor a 8 dígitos." + '<br>';
			flag=true;
		}

		if(password==null || password=="" || password==undefined){
			//console.log();
		}else if(password_confirmation==null || password_confirmation=="" || password_confirmation==undefined){
			errors += "La confirmación de la contraseña no puede estar vacía." + '<br>';
			flag=true;
		}else if(password_confirmation.length<8){
			errors += "La confirmación de la contraseña debe ser mayor a 8 dígitos." + '<br>';
			flag=true;
		}else if(password_confirmation != password){
			errors += "La confirmación de la contraseña debe ser igual a la contraseña." + '<br>';
			flag=true;
		}
		
		var resultado={
			'flag':flag,
			'error':errors,
		};

		return resultado;
	}