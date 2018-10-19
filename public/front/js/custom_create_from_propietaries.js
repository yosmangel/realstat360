$(document).ready(function() {

    /* Initializing Variables for TOASTr */
    var msg = ''; 
    var title_msn = '';
    var $toast;
    var errors = '';

    /* Activate the file input of the Property Image Post with the file-input script format */

    $("#image").fileinput({
        theme: "gly",
        showCaption: true
     });

    $('.operation-active').change(function(){ 
    	var operation = $(this).data('id');
    	var status = $(this).is(':checked');
    	var id = '#operation_'+operation;
    	var new_status = changeStatus(status, id);
    	$('#operation_'+operation).attr('disabled',new_status);
    	if (operation == 2) {
    		$('#periodicidad').attr('disabled',new_status);
    	};
    });

    function changeStatus(status, id){
    	if (status) {
    		return false;
    	}
    	return true;
    }

    $("#image").change(function(){
        $('#img_facade').fadeOut();
     });


     /* Button Actions */
    $('.btn-create').bind('click', function(e){
        e.preventDefault();
        var btn = $(this);
        var form = btn.parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        var text_btn = btn.text();
        console.log(data); 
        var timeOutId = 0;
        $.ajax({
               url: url,
               headers: {'X-CSRF-TOKEN': token},
               type: 'POST',
               dataType: 'json', 
               data : data,
               beforeSend: function(){
                    btn.text('Enviando ');
                    btn.attr('disabled',true);
               },
               complete: function(){
                    btn.text(text_btn);
                    btn.attr('disabled',false);
               },
               error: function(errores){
                    var errors = '<div class=\"alert alert-warning text-left\">';
                    for(datos in errores.responseJSON){
                        errors += errores.responseJSON[datos] + '<br>';
                    }
                    errors += '</div>';
                    $('#mensaje').show().html(errors); //this is my div with messages
                    $('#mensaje').delay(4000).fadeOut(2000);
                    errors = '';
                },
               success: function(result){
                    console.log(result.mensaje);
                    /*$('#formModal').modal('hide');*/
                    var mensaje_alerta = '<div class=\"alert alert-warning text-center\"><h5><strong>!Enhorabuena¡</strong> Su solicitud de búsqueda de imueble se ha enviado correctamente. Le envíaremos vía email los resultados coincidentes con sus intereses.</h5></div><hr><div class="alert alert-info fade in nomargin text-left"><h4>¡Aviso Importante!</h4><h5>¿Deseas continuar y completar tu perfil en RealState360?</h5><p>Con tu cuenta de usuario podrás personalizar la búsqueda de inmuebles y contactar a Propietarios de Inmuebles que están afiliados a nuestra plaraforma.</p><a class="btn btn-primary btn-lg" href="/registro/demanda" type="button"><strong>¡Continuar, Sí, esta es la mejor opción!</strong></a><button class="btn btn-default btn-lg" data-dismiss="modal" type="button">Cerrar</button></div>';
                    $('.modal-body').fadeOut();
                    $('#btn_enviar_solicitud').fadeOut();
                    $('#mensaje').fadeIn().html(mensaje_alerta);
               } 
            });
    });

$('#btn-submit-preferences').bind('click', function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    var url = form.attr('action');
    var data = form.serializeArray();
    var btn = $(this);
    var text_btn = btn.text();
    console.log(data);
    data = objectifyForm(data);
    console.log(data);
    $.ajax({
      url: url,
      headers: {'X-CSRF-TOKEN': token},
      type: 'PUT',
      dataType: 'json',
      data: data,
      beforeSend: function(){ 
        console.log('Iniciando...');
        btn.text('Guardando ...');
        btn.attr('disabled',true);
      },
      complete: function(){
        btn.text(text_btn);
        btn.attr('disabled',false);
        console.log('completado');
      },
      error: function(errores){
        btn.text('Guardar Preferencias');
        btn.attr('disabled',false);
        /*
          Sending the errors messages
        */
        console.log('errores');
        errors = '';
        for(k in errores.responseJSON){
            errors += errores.responseJSON[k] + '<br>';
        }
        title_msn = 'Atención.';
        $toast = toastr['error'](errors, title_msn); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        errors = '';
      },
      success: function(result){
        console.log(result.message);
        btn.text('Guardar Preferencias');
        btn.attr('disabled',false);
        /*
          Sending the success message
        */
        msg = result.message;
        title_msn = 'Felicitaciones.';
        $toast = toastr['info'](msg, title_msn); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
      }
    });
    
  });

  /*
    Create Properties from the Propietary User
  */
  $('#formAltaInmuebles').on('submit', function(e){
        e.preventDefault();
        
        var url = $(this).attr('action');
        var data = $(this).serializeArray();
        var objDatos = new FormData($(this)[0]);
        $.each(data, function(key, input){
          objDatos.append(input.name, input.value);
        });
        var btn = $('.btn-create-property');
        var text_btn = btn.text();
        var timeOutId = 0;
        $.ajax({
               url: url,
               headers: {'X-CSRF-TOKEN': token},
               type: 'POST',
               data : objDatos,
               contentType: false,
               processData: false,
               beforeSend: function(){
                    console.log('antes');
                    btn.text('Enviando ');
                    btn.attr('disabled',true);
               },
               complete: function(){
                    console.log('complete');
                    btn.text(text_btn);
                    btn.attr('disabled',false);
               },
               error: function(errores){
                    btn.text('Crear Inmueble');
                    btn.attr('disabled',false);
                    console.log('error');
                    var errors = '';
                    console.log(errores.responseJSON);
                    for(k in errores.responseJSON){
                        errors += errores.responseJSON[k] + '<br>';
                    }
                    console.log(errors);
                    title_msn = 'Atención.';
                    $toast = toastr['error'](errors, title_msn); // Wire up an event handler to a button in the toast, if it exists
                    $toastlast = $toast;
                    errors = '';
                },
               success: function(result){
                    msg = result.message;
                    title_msn = 'Felicitaciones.';
                    $toast = toastr['info'](msg, title_msn); // Wire up an event handler to a button in the toast, if it exists
                    $toastlast = $toast;
                    btn.text('Crear Inmueble');
                    btn.attr('disabled',false);
                    timeOutId = setTimeout(function(){
                      window.location.href = '/panel-propietario'}, 
                    4000);
                   // setTimeOut(, 4000);
               } 
            });
            clearTimeout(timeOutId);
    });

  function objectifyForm(formArray) {//serialize data function
      var returnArray = {};
      for (var i = 0; i < formArray.length; i++){
        returnArray[formArray[i]['name']] = formArray[i]['value'];
      }
      return returnArray;
    };


});
