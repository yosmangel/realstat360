$(document).ready(function(){

	$('.btn-create').bind('click', function(e){
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
		   		$(".btn-create").text('Guardando ...');
		   		$(".btn-create").attr('disabled',true);
		   },
		   complete: function(){
		   		$(".btn-create").text('Guardar');
		   		$(".btn-create").attr('disabled',false);
		   },
		   success: function(result) {
		   		$('#msj_'+id_msj).fadeIn().delay(2000).fadeOut(350);
		   		timeOutId = setTimeout(function(){
			   		$('#w1-principales').removeClass('active');
			   		$('#w1-facturacion').addClass('active');
			   		$('#tab-principales').removeClass('active');
			   		$('#tab-facturacion').addClass('active');
					console.log(result);
		   		}, 3000);
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

});
