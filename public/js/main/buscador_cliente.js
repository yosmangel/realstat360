$(document).ready(function(){
	$('.datatable').dataTable();
	$('.datatable').each(function(){
	    var datatable = $(this);
	    var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
	    search_input.attr('placeholder', 'Search');
	    search_input.addClass('form-control input-sm');
	    var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
	    length_sel.addClass('form-control input-sm');
	});


});
