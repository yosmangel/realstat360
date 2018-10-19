$(document).ready(function() {

  /* Initializing Variables for TOASTr */
  var msg = '';
  var title_msn = '';
  var $toast;
  var errors = '';
  
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
    
  /*
    Create Properties from the Propietary User
  */

  $('#formEditarInmueble').on('submit', function(e){
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

});
