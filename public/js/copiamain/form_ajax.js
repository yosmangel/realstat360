/* Envio de un formulario usando AJAX */
/* Creado por Rafael Gamez Diaz */


/*	El formulario sera serializado en javascript, para esto en el codigo HTML debemos realizar ciertas
	configuraciones:

	1) Antes del formulario colocamos un mensaje que sera utilizado para enviar la 
	notificacion del envio del formulario, el mismo originalmente esta oculto y 
	se muestra solamente cuando el formulario se envia de forma correcta:

		<div id="msj_form_principales" class="alert alert-success" role="alert" style="display:none">
			Se guardaron los datos de correctamente
		</div>

 	2) El boton de envio del formulario debe ser:

 		<button type="button" data-id="form_principales" class="mb-xs mt-xs mr-xs btn btn-success btn-ajax"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
 	
 	Note que el id form_principales debe coincidir con la parte final del id del mensaje, ademas
	el boton debe tener la clase btn-ajax, que se utiliza en el codigo de abajo para llamar la accion ajax.
	
	3) El formulario debera tener los siguientes campos ocultos:

		<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
		<input name="form_seccion" type="hidden" value="form_principal">
		<input name="id_item" id="id_item" type="hidden" value="">

		El primero de ellos es necesario desde Laravel para el envio del token de verificacion,

*/

$(document).ready(function(){

	$('.btn-create-ajax').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		var timeOutId = 0; // Se inicializa la variable de tiempo para la espera antes de desplegar el segundo acordion
		data = objectifyForm(data);
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
		   success: function(result) {
		   		 $(form)[0].reset();
		   		 $('#collapse2One').collapse('hide');
		   		 $('html,body').animate({
				        scrollTop: $("#msj_"+id_msj).offset().top
				    }, 2000);
		   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);
				console.log(result);

				timeOutId = setTimeout(function(){
		   		 	$('#collapse2Two').collapse('show');
		   		}, 3000);
		    }
		});
		clearTimeout(timeOutId);
	});

	// Funcion para cambiar el formato antes de enviar por ajax
	function objectifyForm(formArray) {//serialize data function
	  var returnArray = {};
	  for (var i = 0; i < formArray.length; i++){
	    returnArray[formArray[i]['name']] = formArray[i]['value'];
	  }
	  return returnArray;
	};

});