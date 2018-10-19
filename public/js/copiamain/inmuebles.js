$(document).ready(function(){

	$('.btn-nuevo-inmueble').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		var timeOutId = 0;
		data = objectifyForm(data);
		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'POST',
		   dataType: 'json', 
		   data : data,
		   beforeSend: function(){
		   		$(".btn-nuevo-inmueble").text('Guardando ...');
		   		$(".btn-nuevo-inmueble").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-nuevo-inmueble").text("Guardar y Continuar");
		   		$(".btn-nuevo-inmueble").attr('disabled',false);
		   },
		   error: function(data){
	        var errors = '';
	        //var errors = data.responseJSON;
	        console.log(errors);
	        scrollTo("#w1");
            for(datos in data.responseJSON){
                errors += data.responseJSON[datos] + '<br>';
            }
            $('#response').show().html(errors); //this is my div with messages

	      	},
		   success: function(result) {
		   		scrollTo("#w1");
		   		$('#msj_form_nuevo_inmueble').fadeIn().delay(3000).fadeOut(350);

		   		// PARA CARGAR EL TAB DE LOS EXTRAS DEL INMUEBLE
		   		var idinmueble = result.inmuebleid;

		   		 // Se almacena el id de la promocion actual en un input hidden
		   		 // y se le adiciona el action el tercer formulario
		   		 $('input#idu').val(idinmueble);
		   		 //$('form#form-internos').attr('action','{{ route(\"internos.update\",'+idinmueble+') }}'); 
				
		   		 // Aqui se le ponen los id a los formularios en las secciones de imagenes y documentos
				 $('#elinmueble').val(idinmueble);
				 $('#imainmueble_id').val(idinmueble);
				 $('#docinmueble_id').val(idinmueble);
				 $('#docinmueble_id').val(idinmueble);
				 //$('#radio-op').data('id',idinmueble);
		   		timeOutId = setTimeout(function(){
			   		$('#w1-principales').removeClass('active');
			   		$('#tab-principales').removeClass('active');
	          		//get_archivos(idinmueble, '/inmuebles/extras/'+idinmueble,'w1-extras');
	          		$('.extras').attr('action','/extras/'+idinmueble);
	          		$('.extras-inmu-id').val(idinmueble);
			   		$('#tab-extras').addClass('active');
			   		$('#w1-extras').addClass('active');
		   		}, 4000);
				console.log(result);
		    }
		});
		clearTimeout(timeOutId);
	});
	
	$('.btn-continuar').bind('click', function(e){
		e.preventDefault();
		var getout_tab = $(this).data('getouttab');
		var getout_content = $(this).data('getoutcontent');
		var getin_tab = $(this).data('getintab');
		var getin_content = $(this).data('getincontent');
		$('#'+getout_tab).removeClass('active');
		$('#'+getout_content).removeClass('active');
		$('#'+getin_tab).addClass('active');
		$('#'+getin_content).addClass('active');
		scrollTo("#w1");
	});


	/*function get_archivos(id, url, div){
		$.ajax({
		   url: url,
		   type: 'GET',
		   success: function(data) {
		   		$('#'+div).html(data).slideDown("slow");
		   		$('#contenido-tablas').attr('class','in');
		   		mostrar_div('#'+div);
		    }
		});
	}*/
	// Funcion de Scroll a un tag determinado
	function scrollTo(id,sec){
	    if(id == undefined) id = "";
	    if(sec == undefined){ sec = 2; }
	    $(id).show();
	    $('html,body').animate({scrollTop: $(id).offset().top}, 800, 'swing');
	    return false;
	}

	// Funcion para cargar div
	function get_archivos(id, url, div){
		$.ajax({
		   url: url,
		   type: 'GET',
		   success: function(data) {
		   		$('#'+div).html(data).slideDown("slow");
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

	$('.delete-row').bind('click', function(e){
		e.preventDefault();
		var row = $(this).parents('tr');
		var id = row.data('id');
		var referencia = row.data('ref');
		var form = $('#form-delete');
		var url = form.attr('action').replace(':INMUEBLE_ID',id);
		var data = form.serialize();
		var urlextras = form.attr('action2').replace(':INMUEBLE_ID',id);
		swal({
			title: "¿Desea eliminar el inmueble con REF: "+referencia+"?",
			text: "Se borraran todos los datos del mismo",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Eliminar',
			closeOnConfirm: false
		},
		function(){ 
			row.fadeOut();
			$.post(urlextras, data);
			$.post(url, data, function(result){
				swal("Eliminado", "Se ha eliminado el registro del inmueble REF: " + referencia, "success");
			});
		});
	});

	$('.delete-ima').on('click', function(e){
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

	$('.delete-file').bind('click', function(e){
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

	$('#obranueva').change(function(){
		if ($(this).is(':checked')) {
			$('#obra-nueva').collapse('show');
		}else{
		    $('#obra-nueva').collapse('hide');
		};
	});
	
	// Al editar las propiedades principales de un usuario, si el inmueble no estaba marcado como nuevo
	// los selects de promocion y tipologia se encuentran desabilitados por default, aqui se pueden habilitar
	if ($('#obranueva_edt').is(":checked")) {
			$('.esnueva').removeAttr('disabled');
		}else{
			$('.esnueva').attr('disabled','disabled');
		};
	$('#obranueva_edt').change(function(){
		if ($(this).is(":checked")) {
			$('.esnueva').removeAttr('disabled');
			$('#obra-nueva').collapse('show');
		}else{
			$('.esnueva').attr('disabled','disabled');
			$('#obra-nueva').collapse('hide');
		};
	});

	if ($('#adjudicacionbancaria').is(":checked")) {
			$('#entidad_id').removeAttr('disabled');
		}else{
			$('#entidad_id').attr('disabled','disabled');
		};
	$('#adjudicacionbancaria').change(function(){
		if ($(this).is(":checked")) {
			$('#adjudicacion').collapse('show');
			$('#entidad_id').removeAttr('disabled');
		}else{
			$('#adjudicacion').collapse('hide');
			$('#entidad_id').attr('disabled','disabled');
		};
	});

	$('.btn-send-url').bind('click', function(e){
		e.preventDefault();
		var id_msj = $(this).data('id');
		var form = $(this).parents('form');
		url = '/extras/'+$('#inmueble_id').val();
		//var url = form.attr('action');
		var data = form.serializeArray();
		data = objectifyForm(data);
		console.log(data);
		$.ajax({
		   url: url,
		   headers: {'X-CSRF-TOKEN': token},
		   type: 'PUT',
		   dataType: 'json',
		   data : data,
		   beforeSend: function(){
		   		$(".btn-send-url").text('Guardando ...');
		   		$(".btn-send-url").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-send-url").text("Guardar URL Video");
		   		$(".btn-send-url").attr('disabled',false);
		   },
		   success: function(result) {
		   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);
				console.log(result);
		    }
		});

	});

	$('#btn-lista-ima').bind('click', function(){
		$("#btn-lista-ima").text('Guardando ...');
		$("#btn-lista-ima").attr('disabled',true);
		var data = $(this).data('inmu');
		$.ajax({
		   url: 'inmuima/'+data,
		   type: 'GET',
		   data: data,
		   success: function(inmuima) {
		   		$('#tabla-ima-content').html(inmuima);
		   		$("#btn-lista-ima").html("<i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> Actualizar");
		   		$("#btn-lista-ima").attr('disabled',false);
		    }
		});
	});

	$('#btn-lista-file').bind('click', function(){
		$("#btn-lista-file").text('Guardando ...');
		$("#btn-lista-file").attr('disabled',true);
		var data = $(this).data('inmu');
		$.ajax({
		   url: '/inmufile/'+data,
		   type: 'GET',
		   data: data,
		   success: function(inmufile) {
		   		$('#tabla-file-content').html(inmufile);
		   		$("#btn-lista-file").html("<i class=\"fa fa-refresh\" aria-hidden=\"true\"></i> Actualizar");
		   		$("#btn-lista-file").attr('disabled',false);
		    }
		});
	});
	
	$('.btn-edit').bind('click', function(e){ 
			e.preventDefault();
			var id_msj = $(this).data('id');
			var form = $(this).parents('form');
			var url = form.attr('action');
			var data = form.serializeArray();

			data = objectifyForm(data);
			console.log(data);
			var timeOutId = 0;
			$.ajax({
			   url: url,
			   headers: {'X-CSRF-TOKEN': token},
			   type: 'PUT',
			   dataType: 'json',
			   data : data,
			   beforeSend: function(){
			   		$(".btn-edit").text('Guardando ...');
			   		$(".btn-edit").attr('disabled',true);
			   },
			   complete: function(){
			   		$(".btn-edit").text('Guardar');
			   		$(".btn-edit").attr('disabled',false);
			   },
			   success: function(result) {
			   		scrollTo("#w1");
			   		$('#msj_edit').fadeIn().delay(3000).fadeOut(350);
					console.log(result);
					timeOutId = setTimeout(function(){
				   		$('#w1-principales').removeClass('active');
				   		$('#tab-principales').removeClass('active');
		          		//get_archivos(idinmueble, '/inmuebles/extras/'+idinmueble,'w1-extras');
		          		//$('.extras').attr('action','/extras/'+idinmueble);
		          		//$('.extras-inmu-id').val(idinmueble);
				   		$('#tab-extras').addClass('active');
				   		$('#w1-extras').addClass('active');
			   		}, 4000);
			    }
			});
			clearTimeout(timeOutId);
		});

	$('.btn-edit-extras').bind('click', function(e){ 
			e.preventDefault();
			var id_msj = $(this).data('id');
			var next = $(this).data('next');
			var acordion_parent = $(this).parents('.accordion-body').attr("id");
			var form = $(this).parents('form');
			var url = form.attr('action');
			var data = form.serializeArray();

			data = objectifyForm(data);
			console.log(data);
			var timeOutId = 0;
			$.ajax({
			   url: url,
			   headers: {'X-CSRF-TOKEN': token},
			   type: 'PUT',
			   dataType: 'json',
			   data : data,
			   beforeSend: function(){
			   		$(".btn-edit").text('Guardando ...');
			   		$(".btn-edit").attr('disabled',true);
			   },
			   complete: function(){
			   		$(".btn-edit").text('Guardar');
			   		$(".btn-edit").attr('disabled',false);
			   },
			   success: function(result) { 
			   		scrollTo('#'+acordion_parent);
			   		$('#msj_'+id_msj).fadeIn().delay(3000).fadeOut(350);
					console.log(result);
					timeOutId = setTimeout(function(){
				   		$('#'+acordion_parent).collapse('hide');
			   		}, 3000);
			   		timeOutId = setTimeout(function(){
				   		$('#'+next).collapse('show');
			   		}, 3000);
			   		
			    }
			});
			clearTimeout(timeOutId);
		});

	$('.btn-guardar').bind('click', function(e){ 
			e.preventDefault();
			var id_msj = $(this).data('id');
			var form = $(this).parents('form');
			var url = form.attr('action');
			var data = form.serializeArray();
			data = objectifyForm(data);
			console.log(data);
			var timeOutId = 0;
			$.ajax({
			   url: url,
			   headers: {'X-CSRF-TOKEN': token},
			   type: 'POST',
			   dataType: 'json',
			   data : data,
			   beforeSend: function(){
			   		$(".btn-edit").text('Guardando ...');
			   		$(".btn-edit").attr('disabled',true);
			   },
			   complete: function(){
			   		$(".btn-edit").text('Guardar');
			   		$(".btn-edit").attr('disabled',false);
			   },
			   success: function(result) {
			   		scrollTo("#w1");
			   		$('#msj_edit').fadeIn().delay(3000).fadeOut(350);
					console.log(result);
					timeOutId = setTimeout(function(){
				   			var getout_tab = $(this).data('getouttab');
							var getout_content = $(this).data('getoutcontent');
							var getin_tab = $(this).data('getintab');
							var getin_content = $(this).data('getincontent');
							$('#'+getout_tab).removeClass('active');
							$('#'+getout_content).removeClass('active');
							$('#'+getin_tab).addClass('active');
							$('#'+getin_content).addClass('active');
							scrollTo("#w1");
			   		}, 4000);
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

	// Selector de la Foto de Portada del Inmueble
	$('input[type=radio]').change(function(event){
		var idimagen = $(event.target).val();
		//var idinmueble = $(event.target).data('id');
		var idinmueble = $('#inmueble_id').val();
		var form = $("#form-imagenes");
		url = '/inmuebles/'+idinmueble+'/portada/'+idimagen;
		form.attr('action', url);
		var data = form.serializeArray();
		data = objectifyForm(data);
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
});