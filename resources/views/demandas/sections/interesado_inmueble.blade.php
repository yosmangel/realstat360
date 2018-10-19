<div class="form-group">
	<label class="col-sm-4 control-label" for="w1-inmueble">Inmueble</label>
	<div class="col-sm-7">
		<select data-plugin-selectTwo class="form-control populate" id="w1-inmueble" name="inmueble">
			<option value="">::Seleccionar::</option>
			@foreach($inmu as $i) 
				<option value="{{ $i[0]->id }}">REF-{{ $i[0]->id}},   
												Calle/Ave {{ $i[0]->calle }} #{{ $i[0]->numero }},
												{{ $i[0]->municipio->nombre }},
												{{ $i[0]->zona }},
												{{ $i[0]->tipo->nombre }}, <em>{{ $i[1] }}</em></option>
			@endforeach
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label" for="w1-origen-demanda">Origen Demanda</label>
	<div class="col-sm-7">
		<select data-plugin-selectTwo class="form-control populate" id="w1-origen-demanda" name="origen_demanda">
			<option value="">::Seleccionar::</option>
			<option value="Acciones de Buzoneo">Acciones de Buzoneo</option>
			<option value="Anuncio neon">Anuncio neon</option>
			<option value="anuncit.com">anuncit.com</option>
			<option value="Buscador Web 2">Buscador Web 2</option>
			<option value="cartel 2">cartel 2</option>
			<option value="Cliente recomendado">Cliente recomendado</option>
			<option value="Colaborador">Colaborador</option>
			<option value="dividendo.es">dividendo.es</option>
			<option value="EL CORREO">EL CORREO</option>
			<option value="granmanzana.es">granmanzana.es</option>
			<option value="Idealista">Idealista</option>
			<option value="Inmoportalix">Inmoportalix</option>
			<option value="Jornada Puertas Abiertas">Jornada Puertas Abiertas</option>
			<option value="Llamada Telefonica">Llamada Telefonica</option>
			<option value="micasa.es">micasa.es</option>
			<option value="mitula.com">mitula.com</option>
			<option value="Oficina/Escaparate">Oficina/Escaparate</option>
			<option value="otro">otro</option>
			<option value="pisocasas.com">pisocasas.com</option>
			<option value="plandeprotecciondealquiler.com">plandeprotecciondealquiler.com</option>
			<option value="Redes Sociales">Redes Sociales</option>
			<option value="trovimap.com">trovimap.com</option>
			<option value="una web">una web</option>
			<option value="wordinmo.com">wordinmo.com</option>
		</select>
	</div>
</div>
<div class="form-group">
	<label class="col-sm-4 control-label" for="w1-origen-demanda">Canal de Comunicación</label>
	<div class="col-sm-7">
		<select name="comunicacion" id="w1-origen-demanda" data-plugin-selectTwo class="form-control populate" style="width: 100%">
			<option value='' >::Seleccionar::</option>
			<option value="Email">Email</option>
			<option value="Llamada">Llamada</option>
			<option value="Oficina">Oficina</option>
		</select>
	</div>
</div>
<div id="dbi" class="collapse">
</div>
