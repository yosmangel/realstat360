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

function objectifyForm(formArray) {//serialize data function
          var returnArray = {};
          for (var i = 0; i < formArray.length; i++){
            returnArray[formArray[i]['name']] = formArray[i]['value'];
          }
          return returnArray;
        };