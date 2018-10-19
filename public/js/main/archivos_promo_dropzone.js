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
			 	var idpromocion = $('#promocion').val();
		 	setTimeout(function(){
	           get_archivos(idpromocion, '/promoima/'+idpromocion,'tabla-ima-content');
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
				var idinmueble = $('#inmueble').val();
			        get_archivos(idinmueble,'/promofile/','tabla-file-content');
			      },2000);  
		     }); 
	}
};

function get_archivos(id, url, div){

	$.ajax({
	   url: url,
	   type: 'GET',
	   success: function(data) {
	   		//console.log(data);
	   		$('#'+div).html(data).slideDown("slow");
	   		$('#contenido-tablas').attr('class','in');
	   		mostrar_div('#'+div);
	    }
	});
}

function mostrar_div(id,sec){
    if(id == undefined) id = "";
    if(sec == undefined){ sec = 3; }
    $(id).show();
    $('html,body').animate({scrollTop: $(id).offset().top}, 800, 'swing');

    return false;
}

$('#vaciar-lista').click(function(){
	dropzone.removeAllFiles(true);
});
$('#vaciar-lista2').click(function(){
	dropzone.removeAllFiles(true);
});
