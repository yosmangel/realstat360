$(document).ready(function(){
	$('#btn-submit-preferences').bind('click', function(e){
		e.preventDefault();
		var form = $(this).parents('form');
		var url = form.attr('action');
		var data = form.serializeArray();
		console.log(data);
		//data = objectifyForm(data);
		console.log(data);
		$.ajax({
			url: url,
			headers: {'X-CSRF-TOKEN': token},
			type: 'POST',
			dataType: 'json',
			data: data,
			beforeSend: function(){ 
				console.log('mientras');
				$(this).text('Guardando ...');
			},
			complete: function(){
				console.log('completado');
				$(this).text('Guardar Preferencias');
			},
			error: function(resut){
				console.log('error');
				console.log(result.responseJSON);
			},
			success: function(result){
				console.log('exito');
				console.log(result.message);
			}
		});
		
	});

	function objectifyForm(formArray) {//serialize data function
		  var returnArray = {};
		  for (var i = 0; i < formArray.length; i++){
		    returnArray[formArray[i]['name']] = formArray[i]['value'];
		  }
		  return returnArray;
		};
});