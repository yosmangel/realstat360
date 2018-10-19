$(document).ready(function(){

	$('.delete-row').bind('click', function(e){

		e.preventDefault();
		var row = $(this).parents('tr');
		var id = row.data('id');
		var referencia = row.data('ref');
		var form = $('#form-delete');
		var url = form.attr('action').replace(':AGENTE_ID',id);
		var data = form.serialize();
		swal({
			title: "¿Desea eliminar el agente?",
			text: "Se borraran todos los datos del mismo",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: '#DD6B55',
			confirmButtonText: 'Eliminar',
			closeOnConfirm: false
		},
		function(){ 
			row.fadeOut();
			$.post(url, data, function(result){
				swal("Eliminado", "Se ha eliminado el registro del agente", "success");
				if (result == 0) { location.reload(); };
			});
		});
	});

	$('.actualizar').bind('click', function(e){
		e.preventDefault();
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
			   		$(".actualizar").text('Guardando ...');
			   		$(".actualizar").attr('disabled',true);
			   },
			complete: function(){
			   		$(".actualizar").text('Actualizar');
			   		$(".actualizar").attr('disabled',false);
			   },
			success: function(result) {
			   		scrollTo("#w1");
			   		$('#msj_edit').fadeIn().delay(3000).fadeOut(350);
					console.log(result);
					timeOutId = setTimeout(function(){
						window.location.replace('/agentes');
			   		}, 3000);
			    }
		});
		clearTimeout(timeOutId);
	});


});