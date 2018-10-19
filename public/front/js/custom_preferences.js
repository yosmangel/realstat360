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
 
});