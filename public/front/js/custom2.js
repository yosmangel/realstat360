$(document).ready(function() {

    /************************************************/
    /* Initializing Variables for TOASTr */
    var msg = '';
    var title_msn = '';
    var $toast;
    var errors = '';
    var mensaje_alerta ='';
    var inmuebles = [];
    /************************************************/

    /************************************************/
    /* Activate the file input of the Property Image Post with the file-input script format */
    $("#image").fileinput({
        theme: "gly",
        showCaption: true
    });
    /************************************************/

    /************************************************/
    /* OPERATIONS CREATING PROPERTIES */
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
    if ($('#venta').prop('checked')) {
      $('#operation_1').attr('disabled',false);
    }
    if ($('#alquiler_residencial').prop('checked')) {
      $('#operation_2').attr('disabled',false);
      $('#periodicidad').attr('disabled',false);
    }
    if ($('#compartir').prop('checked')) {
      $('#operation_3').attr('disabled',false);
    }
    $("#image").change(function(){
      $('#img_facade').fadeOut();
    });
    /************************************************/
    
    /************************************************/
    /* CREATE THE FAST DEMAND */
    $('.btn-create').bind('click', function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        $('.i-shown').hide();
        $('.i-spinner').show();
        $('#btn-txt').html('BUSCANDO...');
        var promise = promiseAjax(url, 'json', 'POST', token, data, true, true);
        promise.done(function (result) {
          console.log(result.message);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('#txt-title').html('¿CONTINUAR AL REGISTRO?');
          $('#btn-txt').html('BUSCAR INMUEBLES');
          $('.form-body').fadeOut();
          $('#continuar-to-register').fadeIn();
          $('.btn-repeat-search').fadeIn();
          $('#btn_enviar_solicitud').fadeOut();
          /* Sending the success message */
          showMessage(result.message, 'Enhorabuena', 'info');
        }).catch(function (fail) {
          var errors = errorResponse(fail);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('.btn-txt').html('Guardar');
          /* Sending the error message */
          showMessage(errors, 'Lo sentimos', 'error');
        });
    });

    /* Repeat Fast Demand */
    $('.btn-repeat-search').bind('click', function(e){
        $('#txt-title').html('¿BUSCAS UN INMUEBLE?');
        $('.btn-repeat-search').fadeIn();
        $('#mensaje').fadeOut().html('');
        $('.form-body').fadeIn();
        $('#continuar-to-register').fadeOut();
        $('#btn_enviar_solicitud').fadeIn();
        $('#descripcion').val('');
        $('#name').val('');
        $('#lastname').val('');
        $('#telephone').val('');
        $('#email').val('');
        $(this).fadeOut();
    });
    /************************************************/

    /************************************************/
    /* CREATE THE DEMAND FROM THE DEMAND USER PANEL */
    $('.btn-search-properties').bind('click', function(e){
        e.preventDefault();
        var btn = $(this);
        var form = btn.parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        var text_btn = btn.text();
        console.log(data); 
        var timeOutId = 0;
        var button_id = $(this).data('id');
        $('.i-shown').fadeOut();
        $('.i-spinner').fadeIn();
        $.ajax({
               url: url,
               headers: {'X-CSRF-TOKEN': token},
               type: 'POST',
               dataType: 'json', 
               data : data,
               beforeSend: function(){
                  $('i-spinner').fadeOut();
                  $('.i-shown').fadeIn();
                    /*btn.text('Enviando ');

                    btn.attr('disabled',true);*/
                    //$(this).toggleClass('active');
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
                    console.log(result.resultadoInmuebles);
                    inmuebles = result.resultadoInmuebles;
                    if (result.resultadoInmuebles.length > 0) {
                      mensaje_alerta = '<div class=\"alert alert-info text-center\"><h5><strong>!Enhorabuena¡</strong> Se han encontrado ('+inmuebles.length+') inmuebles que coinciden con sus parámetros de búsqueda.</h5></div><hr>';
                      mensaje_alerta += '<div class="list-group">';
                      for (var i = inmuebles.length - 1; i >= 0; i--) {
                        
                        /* Determinando la operacion que se realiza con el inmuble */
                        operacion = '';
                        if (inmuebles[i].venta) {
                          operacion += 'Venta';
                          if (inmuebles[i].ventaprecio > 0) {operacion += ': '+inmuebles[i].ventaprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        if (inmuebles[i].alquiler_residencial) {
                          if (operacion.length > 0) { operacion += ', '; };
                          operacion += 'Alquiler';
                          if (inmuebles[i].alqresprecio > 0) {operacion += ': '+inmuebles[i].alqresprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        if (inmuebles[i].compartir) {
                          if (operacion.length > 0) { operacion += ', '; };
                          operacion += 'Compartir';
                          if (inmuebles[i].compartirprecio > 0) {operacion += ': '+inmuebles[i].compartirprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        var mensaje_al = '';
                        console.log(inmuebles[i].id);
                        mensaje_alerta += '<div class="list-group-item">';
                        mensaje_alerta +=   '<span class="thumb-info thumb-info-side-image thumb-info-no-zoom">';
                        mensaje_alerta +=     '<span class="thumb-info-side-image-wrapper">';
                        mensaje_alerta +=       '<img src="files_img/'+inmuebles[i].id_portada+'" alt="Portada del Inmueble" height="140px" style="width: 200px">';
                        mensaje_alerta +=     '</span>';
                        mensaje_alerta +=     '<span class="thumb-info-caption">';
                        mensaje_alerta +=       '<span class="thumb-info-caption-text">';
                        mensaje_alerta +=         '<h4 class="text-uppercase mb-xs">'+inmuebles[i].nombre+'</h4>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">'+inmuebles[i].ciudad.nombre+'</h5>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">Zona: '+inmuebles[i].zona+'</h5>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">'+operacion+'</h5>';
                        mensaje_al +=         '<form action="contactar-propietario/" method="post">';
                        mensaje_al +=           '<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">';
                        mensaje_al +=           '<input type="hidden" name="_method" id="method" value="POST">';
                        mensaje_al +=           '<input name="usuario_id" type="hidden" value = "'+inmuebles[i].usuario_id+'">';
                        mensaje_al +=           '<input name="inmueble_id" type="hidden" value = "'+inmuebles[i].id+'">';
                        mensaje_al +=           '<button class="btn btn-success btn-sm btn-contact">';
                        mensaje_al +=             '<i class="fa fa-handshake-o i-shown" aria-hidden="true"></i><strong>Contactar Propietario</strong>';
                        mensaje_al +=           '</button>';
                        mensaje_al +=         '</form>';
                        mensaje_alerta +=     '</span>';
                        mensaje_alerta +=   '</span>';
                        mensaje_alerta += '</div>';
                      };
                      mensaje_alerta += '</div>';
                    }else{
                      mensaje_alerta = '<div class=\"alert alert-danger text-center\"><h5>No se han encontrado inmuebles que coinciden con sus parámetros de búsqueda.</h5></div><hr>';
                    };
                    $('#mensaje').fadeIn().html(mensaje_alerta);
                    $('.modal-body').fadeOut();
                    $('.btn-search-properties').fadeOut();
                    $('#btn_enviar_solicitud').fadeOut();
                    $('i-spinner').fadeOut();
                    $('.i-shown').fadeIn();
               } 
            });
    }); 
    /* Close the Modal of Fast Demand */
    $('.btn-close').bind('click', function(e){
        $('#mensaje').fadeOut().html('');
        $('.modal-body').fadeIn();
        $('.btn-search-properties').fadeIn();
        $('#descripcion').val('');
        $('#formDemandModal').modal('hide');
    });
    /************************************************/

    /************************************************/
    /* CONTACT ??? */
    $('.btn-contact').bind('click', function(e){
        e.preventDefault();
        var btn = $(this);
        var form = btn.parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        var token = data.token;
        console.log(data); 
        var timeOutId = 0;
        $('.i-shown').fadeOut();
        $('.i-spinner').fadeIn();
        $.ajax({
               url: url,
               headers: {'X-CSRF-TOKEN': token},
               type: 'POST',
               dataType: 'json',
               data : data,
               beforeSend: function(){
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
                    $('#mensaje').fadeIn().html(result.mensaje);
                    $('i-spinner').fadeOut();
                    $('.i-shown').fadeIn();
               } 
            });
    });
    /************************************************/

    /************************************************/
    /* SET PREFERENCES */
    $('.btn-preferences').bind('click', function(e){
        e.preventDefault();
        var form = $(this).parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        var btn = $(this);
        var text_btn = btn.text();
        var redirecciona = '';
        if ( $(this).attr('id') == 'propietaries') { redirecciona = '/panel-propietario' };
        if ( $(this).attr('id') == 'demands') { redirecciona = '/panel-demanda' };
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
            console.log(redirecciona);
            btn.text('Guardar Preferencias');
            btn.attr('disabled',false);
            /*
              Sending the success message
            */
            msg = result.message;
            title_msn = 'Felicitaciones.';
            $toast = toastr['info'](msg, title_msn); // Wire up an event handler to a button in the toast, if it exists
            $toastlast = $toast;

            timeOutId = setTimeout(function(){
                window.location.href = redirecciona },
              4000);
          }
        });
    });
    /************************************************/

    /************************************************/
    /* CREATE PROPERTIES FROM THE PROPIETARY USER   */
    $('#formAltaInmuebles').on('submit', function(e){
          e.preventDefault();
          var url = $(this).attr('action');
          var data = $(this).serializeArray();
          var objDatos = new FormData($(this)[0]);
          $.each(data, function(key, input){
            objDatos.append(input.name, input.value);
          });
          $('.i-shown').hide();
          $('.i-spinner').show();
          $('#btn-txt').html('GUARDANDO...');
          var timeOutId = 0;
          var promise = promiseAjax(url, 'json', 'POST', token, objDatos, false, false);
          promise.done(function (result) {
            console.log(result.message);
            $('.i-spinner').hide();
            $('.i-shown').show();
            /* Sending the success message */
            showMessage(result.message, 'Enhorabuena', 'info');
            timeOutId = setTimeout(function () {
              window.location.href = '/panel-propietario'
            }, 4000);
          }).catch(function (fail) {
            var errors = errorResponse(fail);
            $('.i-spinner').hide();
            $('.i-shown').show();
            $('#btn-txt').html('CREAR INMUEBLE');
            /* Sending the error message */
            showMessage(errors, 'Lo sentimos', 'error');
          });
          clearTimeout(timeOutId);
    });
    /************************************************/
    /*
      EDIT PROPERTIES FROM THE PROPIETARY USER
    */
    $('#formEditarInmueble').on('submit', function(e){
          e.preventDefault();
          var url = $(this).attr('action');
          var data = $(this).serializeArray();
          var objDatos = new FormData($(this)[0]);
          $.each(data, function(key, input){
            objDatos.append(input.name, input.value);
          });
          $('.i-shown').hide();
          $('.i-spinner').show();
          $('#btn-txt').html('GUARDANDO...');
          var timeOutId = 0;
          var promise = promiseAjax(url, 'json', 'POST', token, objDatos, false, false);
          promise.done(function (result) {
            console.log(result.message);
            $('.i-spinner').hide();
            $('.i-shown').show();
            $('#btn-txt').html('EDITAR INMUEBLE');
            /* Sending the success message */
            showMessage(result.message, 'Enhorabuena', 'info');
            timeOutId = setTimeout(function () {
              window.location.href = '/panel-propietario'
            }, 4000);
          }).catch(function (fail) {
            var errors = errorResponse(fail);
            $('.i-spinner').hide();
            $('.i-shown').show();
            $('#btn-txt').html('EDITAR INMUEBLE');
            /* Sending the error message */
            showMessage(errors, 'Lo sentimos', 'error');
          });
          clearTimeout(timeOutId);

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
                      btn.text('Editar Inmueble');
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
                      console.log(result.modalidad);
                      msg = result.message;
                      title_msn = 'Felicitaciones.';
                      $toast = toastr['info'](msg, title_msn); // Wire up an event handler to a button in the toast, if it exists
                      $toastlast = $toast; 

                      btn.text('Editar Inmueble');
                      btn.attr('disabled',false);
                      timeOutId = setTimeout(function(){
                        window.location.href = '/panel-propietario'}, 
                      4000);
                 } 
              });
              clearTimeout(timeOutId);
    });
    /************************************************/


    /************************************************/
    /* CREATE AN EVENT TO THE PROPERTY BLOGNOTES    */ 
    $('#btn-create-event').bind('click', function (e) {
      e.preventDefault();
      var form = $(this).parents('form');
      var url = form.attr('action');
      var data = form.serializeArray();
      $('.i-shown').hide();
      $('.i-spinner').show();
      $('.btn-txt').html('Guardando...');
      var promise = promiseAjax(url,'json','POST',token,data);
      promise.done(function(result){
          console.log(result.message);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('.btn-txt').html('Guardar');
          /* Sending the success message */
          showMessage(result.message,'Enhorabuena','info');
          setTimeout((dosomething) => {
            location.reload();
          }, 4000);
      }).catch(function(fail){
          var errors = errorResponse(fail);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('.btn-txt').html('Guardar');
          /* Sending the error message */
          showMessage(errors, 'Lo sentimos','error');
        });
    });

    $('.btn-remove-event').bind('click', function(e){
      e.preventDefault();
      var id_evento = $(this).data('valor');
      var form = $(this).parents('form');
      var url = form.attr('action');
      var data = form.serializeArray();
      $('#i-shown-'+ id_evento).hide();
      $('#i-spinner-'+ id_evento).show();
      $('#txt-eliminar-' + id_evento).html('Eliminando...');
      var promise = promiseAjax(url, 'json', 'POST', token, data);
      promise.done(function (result) {
        console.log(result.message);
        $('#i-spinner-'+ id_evento).hide();
        $('#i-shown-'+ id_evento).show();
        $('#row-' + id_evento).fadeOut();
        /* Sending the success message */
        showMessage(result.message, 'Enhorabuena', 'info');
        $('#txt-eliminar-' + id_evento).html('Eliminar');
      }).catch(function (fail) {
        var errors = errorResponse(fail);
        $('#i-spinner-'+ id_evento).hide();
        $('#i-shown-'+ id_evento).show();
        /* Sending the error message */
        showMessage(errors, 'Lo sentimos', 'error');
        $('#txt-eliminar-' + id_evento).html('Eliminar');
      });
    });

    /* Function PROMISE-AJAX */ 
  function promiseAjax(url, dataType, type, token, data, content_Type, process_Data){
      return $.ajax({
        url: url,
        dataType: dataType,
        type: type,
        contentType: content_Type,
        processData: process_Data,
        headers: { 'X-CSRF-TOKEN': token },
        data: data
      });
    }
    /* Function to Show the Success and Erros Messages */
    function showMessage(message, title_msn,typeMessage){
      $toast = toastr[typeMessage](message, title_msn); // Wire up an event handler to a button in the toast, if it exists
      $toastlast = $toast;
    }
    /* Function to format the errors responses from the ajax requests */
    function errorResponse(fail){
      var errors = '';
      for (datos in fail.responseJSON) {
        errors += fail.responseJSON[datos] + '<br>';
      }
      console.log(errors);
      return errors;
    }
  });
  