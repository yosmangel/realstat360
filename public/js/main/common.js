$('[data-toggle="tooltip"]').tooltip();
		 	
	$('#venta').change(function(){
	if ($(this).is(':checked')) {
		$('#opcionventa').collapse('show');
	}else{
		$('#opcionventa').collapse('hide');
	};
	});
	$('#traspaso').change(function(){
		if ($(this).is(':checked')) {
			$('#opciontraspaso').collapse('show');
		}else{
		    $('#opciontraspaso').collapse('hide');
		};
	});
	$('#compartir').change(function(){
		if ($(this).is(':checked')) {
			$('#opcioncompartir').collapse('show');
		}else{
		    $('#opcioncompartir').collapse('hide');
		};
	});
	$('#alquilerresidencial').change(function(){
		if ($(this).is(':checked')) {
			$('#opcionalqres').collapse('show');
		}else{
			$('#opcionalqres').collapse('hide');
		};
	});
	$('#alquiler_vacacional').change(function(){
		if ($(this).is(':checked')) {
			$('#opcionalqvac').collapse('show');
		}else{
			$('#opcionalqvac').collapse('hide');
		};
	});
	$('#alqvac_dia').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvacdia').collapse('show');
		}else{
			$('#op-alqvacdia').collapse('hide');
		};
	});
	$('#alqvac_semana').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvacsemana').collapse('show');
		}else{
			$('#op-alqvacsemana').collapse('hide');
		};
	});
	$('#alqvac_quincena').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvacquincena').collapse('show');
		}else{
			$('#op-alqvacquincena').collapse('hide');
		};
	});
	$('#alqvac_mes').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvacmes').collapse('show');
		}else{
			$('#op-alqvacmes').collapse('hide');
		};
	});
	$('#alqvac_temporada').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvactemporada').collapse('show');
		}else{
			$('#op-alqvactemporada').collapse('hide');
		};
	});
	$('#alqvac_anno').change(function(){
		if ($(this).is(':checked')) {
			$('#op-alqvacanno').collapse('show');
		}else{
			$('#op-alqvacanno').collapse('hide');
		};
	});
	$('#alqres_opcompra').change(function(){
		if ($(this).is(':checked')) {
			$('#alqresopcompra').collapse('show');
		}else{
			$('#alqresopcompra').collapse('hide');
		};
	});
