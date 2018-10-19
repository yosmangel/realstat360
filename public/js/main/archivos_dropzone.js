Dropzone.options.dropzone = {
	autoProcessQueue: true,
	uploadMultiple: true,
	maxFilesize: 5,
	maxFiles: 20,
	dictDefaultMessage: "Arrastre los Archivos Aquí",
    dictFallbackMessage: "Tu navegador no admite el arrastre de archivos.",
    dictFallbackText: "Por favor utilice los botones de subir archivos como en los viejos tiempos.",
    dictFileTooBig: "El Archivo supera el máximo permitido  ({{filesize}}MiB). Tamaño máximo permidito: {{maxFilesize}}MiB.",
    dictInvalidFileType: "No se admite este tipo de archivos.",
    dictResponseError: "Respuesta del Servidor {{statusCode}} code.",
    dictCancelUpload: "Subida de Archivos Cancelada",
    dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar la subida de ficheros?",
    dictRemoveFile: "Eliminar archivos",
    dictRemoveFileConfirmation: null,
    dictMaxFilesExceeded: "No puedes subir mas archivos.",
	acceptedFiles : "image/*",
	init: function() {
		 this.on("complete", function (file) {
		 	setTimeout(function(){
			 	var idinmueble = $('#inmueble_id').val();
	           	get_archivos(idinmueble, '/inmuebles/'+idinmueble+'/inmuima','tabla-ima-content');
			 	$('input[type=radio]').attr('value2',idinmueble);

			 	// Añadimos el evento de eliminar imagen al boton de eliminar
				// se debe agregar nuevamente el evento al DOM despues de insertar la tabla actualizada
			 	$('#tabla-ima-content').on('click','.delete-ima', function(e){
					e.preventDefault();
					var row = $(this).parents('tr');
					var id = row.data('id');
					var form = $('#form-delete');
					var url = form.attr('action').replace(':INMUEBLE_ID',id);
					var data = form.serialize();
					swal({
						title: "¿Desea eliminar la imagen? ",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Eliminar',
						closeOnConfirm: false
					},
					function(){ 
						row.fadeOut();
						$.post(url, data, function(result){
							swal("Eliminado", "Se ha eliminado la imagen", "success");
						});
					});
				});

				// Selector de la Foto de Portada del Inmueble, 
				// se debe agregar nuevamente el evento al DOM despues de insertar la tabla actualizada
				$('#tabla-ima-content').on('change','.radio-op',function(event){
					var idimagen = $(event.target).val();
					//var idinmueble = $(event.target).data('id');
					var idinmueble = $('#inmueble_id').val();
					var form = $("#form-imagenes");
					url = '/inmuebles/'+idinmueble+'/portada/'+idimagen;
					form.attr('action', url);
					$('.i_id').val(idinmueble);
					var data = form.serializeArray();
					data = objectifyForm(data);
					console.log(data);
					$.ajax({
					   url: url,
					   headers: {'X-CSRF-TOKEN': token},
					   type: 'PUT',
					   dataType: 'json',
					   data : data,
					   success: function(result) {
					   		scrollTo("#msj_portada");
					   		$('#msj_portada').fadeIn().delay(3000).fadeOut(350);
							console.log(result);
					    }
					});

				});

	         },2000);  
        });
	}
};

Dropzone.options.dropzone2 = {
	autoProcessQueue: true,
	uploadMultiple: true,
	maxFilesize: 5,
	maxFiles: 20,
	dictDefaultMessage: "Arrastre los Archivos Aquí",
    dictFallbackMessage: "Tu navegador no admite el arrastre de archivos.",
    dictFallbackText: "Por favor utilice los botones de subir archivos como en los viejos tiempos.",
    dictFileTooBig: "El Archivo supera el máximo permitido  ({{filesize}}MiB). Tamaño máximo permidito: {{maxFilesize}}MiB.",
    dictInvalidFileType: "No se admite este tipo de archivos.",
    dictResponseError: "Respuesta del Servidor {{statusCode}} code.",
    dictCancelUpload: "Subida de Archivos Cancelada",
    dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar la subida de ficheros?",
    dictRemoveFile: "Eliminar archivos",
    dictRemoveFileConfirmation: null,
    dictMaxFilesExceeded: "No puedes subir mas archivos.",

	acceptedFiles : "image/*,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt,.pdf,audio/*,video/*",
	init: function() {
		// Formulario de Documentos
		this.on("complete", function (file) {
			setTimeout(function(){
				var idinmueble = $('#inmueble_id').val();
			    get_archivos(idinmueble,'/inmuebles/'+idinmueble+'/inmufile/','tabla-file-content');
			      },2000);  

				// Se adiciona el evento para borrar el documento
				$('#tabla-file-content').on('click','.delete-file', function(e){
					e.preventDefault();
					var row = $(this).parents('tr');
					var id = row.data('id');
					var form = $('#form-delete-file');
					var url = form.attr('action').replace(':INMUEBLE_ID',id);
					var data = form.serialize();
					swal({
						title: "¿Desea eliminar el fichero seleccionado? ",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: '#DD6B55',
						confirmButtonText: 'Eliminar',
						closeOnConfirm: false
					},
					function(){ 
						row.fadeOut();
						$.post(url, data, function(result){
							swal("Eliminado", "Se ha eliminado el fichero", "success");
						});
					});
				});
		     });
	}
};

$('#vaciar-lista').click(function(){
	dropzone.removeAllFiles(true);
});
$('#vaciar-lista2').click(function(){
	dropzone.removeAllFiles(true);
});

function objectifyForm(formArray) {//serialize data function
		  var returnArray = {};
		  for (var i = 0; i < formArray.length; i++){
		    returnArray[formArray[i]['name']] = formArray[i]['value'];
		  }
		  return returnArray;
		};