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
    /* UPDATE USER PROFILE */
    $('#profileForm').on('submit', function(e){
      e.preventDefault();
      var url = $(this).attr('action');
      var data = $(this).serializeArray();
      var objDatos = new FormData($(this)[0]);
      $.each(data, function (key, input) {
        objDatos.append(input.name, input.value);
      });
      console.log(data);
      $('.i-shown').hide();
      $('.i-spinner').show(); 
      $('#btn-txt').html('Actualizando...');
      var timeOutId = 0;
      var promise = promiseAjaxV2(url, 'json', 'POST', token, objDatos);
      promise.done(function (result) {
        $('.i-spinner').hide();
        $('.i-shown').show();
        $('#btn-txt').html('Actualizar');
        /* Sending the success message */
        showMessage(result.message, 'Enhorabuena', 'info');
      }).catch(function (fail) {
        var errors = errorResponse(fail);
        $('.i-spinner').hide();
        $('.i-shown').show();
        $('#btn-txt').html('Enviar Mensaje');
        /* Sending the error message */
        showMessage(errors, 'Lo sentimos', 'error');
      });
      clearTimeout(timeOutId);
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
        var promise = promiseAjax(url, 'json', 'POST', token, data);
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
    $('.btn-search-properties').on('click', function(e){
        e.preventDefault();
        var btn = $(this);
        var form = btn.parents('form');
        var url = form.attr('action');
        var data = form.serializeArray();
        var text_btn = btn.text();
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
                    $('i-spinner').fadeOut();
                    inmuebles = result.resultadoInmuebles;
                    if (result.resultadoInmuebles.length > 0) {
                      mensaje_alerta = '<div class=\"alert alert-info text-center\"><h5><strong>!Enhorabuena¡</strong> Se han encontrado ('+inmuebles.length+') inmuebles que coinciden con sus parámetros de búsqueda.</h5></div><hr>';
                      mensaje_alerta += '<div class="list-group">';
                      for (var i = inmuebles.length - 1; i >= 0; i--) {
                        
                        /* Determinando la operacion que se realiza con el inmuble */
                        operacion = '';
                        if (inmuebles[i][0].venta) {
                          operacion += 'Venta';
                          if (inmuebles[i][0].ventaprecio > 0) {operacion += ': '+inmuebles[i][0].ventaprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        if (inmuebles[i][0].alquiler_residencial) {
                          if (operacion.length > 0) { operacion += ', '; };
                          operacion += 'Alquiler';
                          if (inmuebles[i][0].alqresprecio > 0) {operacion += ': '+inmuebles[i][0].alqresprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        if (inmuebles[i][0].compartir) {
                          if (operacion.length > 0) { operacion += ', '; };
                          operacion += 'Compartir';
                          if (inmuebles[i][0].compartirprecio > 0) {operacion += ': '+inmuebles[i][0].compartirprecio+' <i class="fa fa-eur" aria-hidden="true"></i>'};
                        };
                        var mensaje_al = '';
                        mensaje_alerta += '<div class="list-group-item">';
                        mensaje_alerta +=   '<span class="thumb-info thumb-info-side-image thumb-info-no-zoom">';
                        mensaje_alerta +=     '<span class="thumb-info-side-image-wrapper">';
                        mensaje_alerta +=       '<img src="files_img/'+inmuebles[i][0].id_portada+'" alt="Portada del Inmueble" height="140px" style="width: 200px">';
                        mensaje_alerta +=     '</span>'; 
                        mensaje_alerta +=     '<span class="thumb-info-caption">';
                        mensaje_alerta +=       '<span class="thumb-info-caption-text">';
                        mensaje_alerta +=         '<h4 class="text-uppercase mb-xs">'+inmuebles[i][0].nombre+'</h4>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">'+inmuebles[i][0].ciudad.nombre+'</h5>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">Código Postal: '+inmuebles[i][0].codigo_postal+'</h5>';
                        mensaje_alerta +=         '<h5 class="text-uppercase mb-xs">'+operacion+'</h5>';
                        mensaje_alerta +=         '<a class="btn btn-primary btn-sm" role="button" data-toggle="collapse" href="#collapseContacto' + inmuebles[i][0].inmueble_id + '" aria-expanded="false" aria-controls="collapseContacto' + inmuebles[i][0].inmueble_id +'"><i class="fa fa-comment-o" aria-hidden="true"></i>&nbsp;Contactar Propietario</a>';
                        mensaje_alerta +=         '<div class="collapse" id="collapseContacto' + inmuebles[i][0].inmueble_id+'">';
                        mensaje_alerta +=           '<div class="well" id="well' + inmuebles[i][0].inmueble_id +'">';
                        mensaje_alerta +=              '<form id="form'+inmuebles[i][0].inmueble_id+'" action="contactar-propietario/" method="post">';
                        mensaje_alerta +=                '<input type="hidden" name="_method" id="method" value="POST">';
                        mensaje_alerta +=                '<input name="propietario_id" type="hidden" value = "'+inmuebles[i][0].usuario_id+'">';
                        mensaje_alerta +=                '<input name="inmueble_id" type="hidden" value = "'+inmuebles[i][0].inmueble_id+'">';
                        mensaje_alerta +=                '<div class="form-group">';
                        mensaje_alerta +=                   '<textarea name="mensaje" type="text" id = "mensaje' + inmuebles[i][0].inmueble_id + '" class="form-control" rows=2 placeholder="Escribale su solicitud de contacto al propietario de este inmueble."></textarea>';
                        mensaje_alerta +=                '</div>';
                        mensaje_alerta +=               '<button class="btn btn-warning btn-sm btn-contact" data-inmuebleid = "' + inmuebles[i][0].inmueble_id +'" data-token="'+inmuebles[i][1]+'">';
                        mensaje_alerta +=                  '<i class="fa fa-refresh fa-spin" id="i-spinner-'+inmuebles[i][0].inmueble_id+'" style="display: none"></i>';
                        mensaje_alerta +=                  '<i class="fa fa-handshake-o" id="i-shown-'+inmuebles[i][0].inmueble_id+'" aria-hidden="true"></i>';
                        mensaje_alerta +=                  '<span id="txt-contacto-' + inmuebles[i][0].inmueble_id + '">&nbsp;Enviar</span>';
                        mensaje_alerta +=                '</button>';
                        mensaje_alerta +=              '</form>';
                        mensaje_alerta +=            '</div>';
                        mensaje_alerta +=           '</div>';
                        mensaje_alerta +=     '</span>';
                        mensaje_alerta +=   '</span>';
                        mensaje_alerta += '</div>';
                      };
                      mensaje_alerta += '</div>';
                    }else{
                      mensaje_alerta = '<div class=\"alert alert-danger text-center\"><h5>No se han encontrado inmuebles que coinciden con sus parámetros de búsqueda.</h5></div><hr>';
                    };
                    $('.i-shown').fadeIn();
                    $('#mensaje').fadeIn().html(mensaje_alerta);
                    $('.modal-body').fadeOut();
                    $('.btn-search-properties').fadeOut();
                    $('#btn_enviar_solicitud').fadeOut();
               } 
            });
    }); 
    /* Close the Modal of Fast Demand */
    
  $('.btn-close').bind('click', function (e) {
    $('#mensaje').fadeOut().html('');
    $('.modal-body').fadeIn();
    $('.btn-search-properties').fadeIn();
    $('#descripcion').val('');
    $('#formDemandModal').modal('hide');
  });
    /************************************************/

    /************************************************/
    /* CONTACT PROPIETARY */
    $(document).on('click', '.btn-contact',function (e) {
      e.preventDefault();
      var form = $(this).parents('form');
      var url = form.attr('action');
      var inmueble_id = $(this).data('inmuebleid');
      var token = $(this).data('token');
      var data = form.serializeArray();
      console.log(url);
      console.log(data);
      console.log(token);
      $('#i-shown-' + inmueble_id).hide();
      $('#i-spinner-' + inmueble_id).show();
      var timeOutId = 0;
      var promise = promiseAjax(url, 'json', 'POST', token, data);
      promise.done(function (result) {
        $('#i-spinner-' + inmueble_id).hide();
        $('#i-shown-' + inmueble_id).show();
        $("#well"+inmueble_id).html('<div class="alert alert-info">Solicitus de contacto enviada</div>');
        showMessage(result.message, 'Enhorabuena', 'info');
      }).catch(function (fail) {
        var errors = errorResponse(fail);
        $('#i-spinner-').hide();
        $('#i-shown-').show();
       
        showMessage(errors, 'Lo sentimos', 'error');
      });
      clearTimeout(timeOutId);
    });

    /************************************************/
    /* Contact-Us Form */
  $('#contactForm').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var data = $(this).serializeArray();
        $('.i-shown').hide();
        $('.i-spinner').show();
        $('#btn-txt').html('Enviando...');
        var timeOutId = 0;
        var promise = promiseAjax(url, 'json', 'POST', token, data);
        promise.done(function (result) {
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('#btn-txt').html('Enviar Mensaje');
          /* Sending the success message */
          $('#name').val('');
          $('#email').val('');
          $('#subject').val('');
          $('#description').val('');
          showMessage(result.message, 'Enhorabuena', 'info');
          timeOutId = setTimeout(function () {
            window.location.href = '/'
          }, 4000);
        }).catch(function (fail) {
          var errors = errorResponse(fail);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('#btn-txt').html('Enviar Mensaje');
          /* Sending the error message */
          showMessage(errors, 'Lo sentimos', 'error');
        });
        clearTimeout(timeOutId);
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
          var promise = promiseAjaxV2(url, 'json', 'POST', token, objDatos);
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
  $('.eliminar-inmueble').bind('click', function (e) {
    e.preventDefault();
    var id = $(this).data('valor');
    var form = $(this).parents('form');
    var url = form.attr('action');
    $('.i-shown').hide();
    $('.i-spinner').show();
    $('#btn-txt').html('Eliminando...');
    var timeOutId = 0;
    var data = form.serializeArray();
    var promise = promiseAjax(url, 'json', 'POST', token, data);
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
      $('#btn-txt').html('Eliminar Inmueble');
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
          var promise = promiseAjaxV2(url, 'json', 'POST', token, objDatos);
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
    });
    /************************************************/


    /************************************************/
    /* CREATE AN EVENT TO THE PROPERTY BLOGNOTES    */ 
    $('.btn-create-event').bind('click', function (e) { 
      e.preventDefault();
      var id = $(this).data('valor');
      var form = $("#formInmueble"+id);
      var url = form.attr('action');
      var data = form.serializeArray();
      $('.i-shown').hide();
      $('.i-spinner').show();
      $('.btn-txt').html('Guardando...');
      var promise = promiseAjax(url,'json','POST',token,data, true, true);
      promise.done(function(result){
          console.log(result.message);
          $('.i-spinner').hide();
          $('.i-shown').show();
          $('.btn-txt').html('Guardar');
          /* Sending the success message */
          // $('#tbody').append('<tr id="row-' + result.evento.id + '"><td width="20%">' + result.evento.date + '</td><td width="20%"><strong>REF-' + result.evento.inmueble_id + '</strong>: ' + result.evento.title + '</td><td>' + result.evento.description + '</td><td><form action="propietario-evento-eliminar/' + result.evento.id + '" method="post"><input name="_token" type="hidden" value="<?php echo csrf_token() ?>" id="token"><input type="hidden" name="_method" id="method" value="POST"><a type="submit" class="btn btn-danger btn-sm btn-remove-event" data-valor="' + result.evento.id + '"><i class="fa fa-refresh fa-spin" id="i-spinner-' + result.evento.id + '" style="display: none"></i><i class="fa fa-times" id="i-shown-' + result.evento.id + '"></i>&nbsp; <span id="txt-eliminar-' + result.evento.id + '">Eliminar</span></a></form></td></tr>');
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
      var promise = promiseAjax(url, 'json', 'POST', token, data, true, true);
      promise.done(function (result) {
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
  function promiseAjax(url, dataType, type, token, data){
      return $.ajax({
        url: url,
        dataType: dataType,
        type: type,
        headers: { 'X-CSRF-TOKEN': token },
        data: data
      });
    }
  function promiseAjaxV2(url, dataType, type, token, data) {
    return $.ajax({
      url: url,
      dataType: dataType,
      type: type,
      contentType: false,
      processData: false,
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
  