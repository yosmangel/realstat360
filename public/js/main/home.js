$(document).ready(function(){
	$('.btn-efectividad').click(function(event){
		event.preventDefault();
		$('.item-efectividad').removeClass('active');
		var nuevo = $(this).parents('.item-efectividad'); 
		nuevo.addClass('active');
	});
});