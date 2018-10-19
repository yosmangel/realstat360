/* Agenda (perteneciente a las Acciones) */
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
		})
	});
	$('#calendar').fullCalendar({
	header: {
		left: 'prev,next today',
		center: 'title',
		right: 'month,basicWeek,basicDay'
	},
	defaultDate: '2017-05-12',
	navLinks: true, // can click day/week names to navigate views
	editable: true,
	eventLimit: true, // allow "more" link when too many events
	events: [
		{
			title: 'All Day Event',
			start: '2017-05-01'
		},
		{
			title: 'Long Event',
			start: '2017-05-07',
			end: '2017-05-10'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2017-05-09T16:00:00'
		},
		{
			id: 999,
			title: 'Repeating Event',
			start: '2017-05-16T16:00:00'
		},
		{
			title: 'Conference',
			start: '2017-05-11',
			end: '2017-05-13'
		},
		{
			title: 'Meeting',
			start: '2017-05-12T10:30:00',
			end: '2017-05-12T12:30:00'
		},
		{
			title: 'Lunch',
			start: '2017-05-12T12:00:00'
		},
		{
			title: 'Meeting',
			start: '2017-05-12T14:30:00'
		},
		{
			title: 'Happy Hour',
			start: '2017-05-12T17:30:00'
		},
		{
			title: 'Dinner',
			start: '2017-05-12T20:00:00'
		},
		{
			title: 'Birthday Party',
			start: '2017-05-13T07:00:00'
		},
		{
			title: 'Click for Google',
			url: 'http://google.com/',
			start: '2017-05-28'
		}
	]
});
});