/* Acciones */
$(document).ready(function(){
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
});