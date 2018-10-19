<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
</head>
<body>
	
	<form action="{{ route('archivos.store') }}" class="dropzone" id="dropzone" method="post" files="true">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="dz-message">
			Arrastra tus archivos Aquí.
			<span class="note">Los Archivos aun no se han subido.</span>
		</div>
		<div class="dropzone-previews"></div>
		<button type="submit" id="submit-all" class="btn btn-success">Subir los archivos</button>
	</form>
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script>
		Dropzone.options.dropzone = {
			autoProcessQueue: false,
			uploadMultiple: true,
			maxFilesize: 4,
			acceptedFiles : "image/*,.doc,.pdf,audio/*",

			init: function() {
			    var submitButton = document.querySelector("#submit-all")
			        dropzone = this; // closure

			    submitButton.addEventListener("click", function(e) {
			      e.preventDefault();
			      e.stopPropagation();
			      dropzone.processQueue(); // Tell Dropzone to process all queued files.
			    });

			    // You might want to show the submit button only when 
			    // files are dropped here:
			    this.on("addedfile", function(file) {
			      // Show submit button here and/or inform user to click it.
			      alert('Se han subido los archivos');
			    });

			    // You might want to show the submit button only when 
			    // files are dropped here:
			    this.on("complete", function(file) {
			      // Show submit button here and/or inform user to click it.
			      dropzone.removeFile(file);
			    });

			  }
		};
	</script>
</body>
</html>