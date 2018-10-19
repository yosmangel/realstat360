<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Inmuebles Coincidentes</h2>
	</header>
	<div class="panel-body">
		<div class="form-group text-center">
			<h5>Ejemplo del mapa a ubicar aquí.</h5>
			<img src="{{ asset('images/mapa_ejemplo.jpg') }}" alt="">
		</div>
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Descripción del tipo de demanda</h2>
	</header>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-md-4 control-label" for="w1-estado-civil">Tipo de Inmueble</label>
			<div class="col-md-7">
				<select data-plugin-selectTwo class="form-control populate select2-ajax" name="estado_civil" id="w1-estado-civil" style="width: 100%">
					<option value="">::Seleccionar::</option>
					@foreach($tipos as $tipo)
						<option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
					@endforeach
				</select>
			</div>
			<div class="col-md-1">
				<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el tipo de inmueble para poder realizar búsquedas específicas agrupadas por tipo de inmueble.">
					<i class="el el-info-circle"></i>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="w1-tipo">Categoría</label>
			<div class="col-md-7">
				<select name="tipo" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
					<option value="">::Seleccionar::</option>
					<option value="">Indiferente</option>
				</select>
			</div>
			<div class="col-md-1">
				<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica la categoría del inmueble para poder realizar búsquedas específicas agrupadas por categorías.">
					<i class="el el-info-circle"></i>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-4"></div>
			<div class="col-md-7">
				<div class="well">
					<div class="row">
						<label class="col-md-4 control-label" for="ventaprecio">Obra Nueva</label>
						<div class="col-md-6">
							<select name="tipo" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="">::Seleccionar::</option>
								<option value="">Indiferente</option>
								<option value="">Si</option>
								<option value="">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="well">
					<div class="row">
						<label class="col-md-4 control-label" for="ventaprecio">Adjudicación</label>
						<div class="col-md-6">
							<select name="tipo" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="">::Seleccionar::</option>
								<option value="">Indiferente</option>
								<option value="">Si</option>
								<option value="">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="w1-tipo">Superficie</label>
			<div class="col-md-7">
				<div class="row">
					<label class="col-md-2 control-label" for="w1-tipo">Desde</label>
					<div class="col-md-4">
						<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
					</div>
					<label class="col-md-2 control-label" for="w1-tipo">Hasta</label>
					<div class="col-md-4">
						<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
					</div>
				</div>
			</div>
			<div class="col-md-1">
				<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica la categoría del inmueble para poder realizar búsquedas específicas agrupadas por categorías.">
					<i class="el el-info-circle"></i>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-7 col-md-offset-4 text-left">
				<div class="checkbox-custom checkbox-default checkbox-inline">
					<input type='hidden' value=0 name='venta'>
					<input type="checkbox" value=1 id="venta" name="venta">
					<label for="venta"  aria-expanded="false" aria-controls="parte-venta">Venta</label>
				</div>
			</div>
			<div class="col-md-7 col-md-offset-4">
				<div class="collapse" id="parte-venta">
						<section class="panel panel-info">
							<header class="panel-heading">
								<h5 class="panel-title">Precio</h5>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="w1-tipo">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
								<label class="col-md-2 control-label" for="w1-tipo">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
							</div>
						</section>
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Precio m<sup>2</sup></h6>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="w1-tipo">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
								<label class="col-md-2 control-label" for="w1-tipo">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
							</div>
						</section>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-7 col-md-offset-4 text-left">
				<div class="checkbox-custom checkbox-default checkbox-inline">
					<input type='hidden' value=0 name='alquiler_residencial'>
					<input type="checkbox" value=1 id="alquiler-residencial" name="alquiler_residencial">
					<label for="alquiler-residencial"  aria-expanded="false" aria-controls="adjudicacion">Alquiler Residencial (Mensual)</label>
				</div>
			</div>
			<div class="col-md-7 col-md-offset-4">
				<div class="collapse" id="parte-alq-res">
					<section class="panel panel-info">
							<header class="panel-heading">
								<h5 class="panel-title">Precio</h5>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="w1-tipo">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
								<label class="col-md-2 control-label" for="w1-tipo">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
							</div>
						</section>
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Precio m<sup>2</sup></h6>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="w1-tipo">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
								<label class="col-md-2 control-label" for="w1-tipo">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
								</div>
							</div>
						</section>	
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Opción a Compra</h6>
							</header>
							<div class="panel-body">
								<select name="tipo" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									<option value="">::Seleccionar::</option>
									<option value="">Indiferente</option>
									<option value="">Si</option>
									<option value="">No</option>
								</select>
							</div>
						</section>	
				</div>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="ventaprecio">Moneda (<i class="fa fa-eur" aria-hidden="true"></i>, <i class="fa fa-usd" aria-hidden="true"></i>)</label>
			<div class="col-md-7">
				<select name="tipo" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
					<option value="">::Seleccionar::</option>
					<option value=""> Euro</option>
					<option value=""> Dólar</option>
					<option value=""> Pesos</option>
				</select>
			</div>
		</div>
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Zona dónde buscar el inmueble</h2>
	</header>
	<div class="panel-body">
		<h5>¿Cómo quieres realizar la selección de la zona de búsqueda?</h5>
			<div class="radio">
				<label>
					<input type="radio" name="opcion_busqueda" id="radioBtn-basica" value="basica" checked="">
					Búsqueda básica
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="opcion_busqueda" id="radioBtn-radio" value="radio">
					Búsqueda por un radio definido
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="opcion_busqueda" id="radioBtn-mapa" value="mapa">
					Búsqueda dibujando sobre mapa
				</label>
			</div>
			<div id="busqbasica" class="collapse in">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="w1-pais-bb">País</label>
						<div class="col-sm-7">
							<select name="pais_bb" id="w1-pais-bb" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value='' >::Seleccionar::</option>
								@foreach($paises as $pais)
									<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="w1-provincia-bb">Provincia</label>
						<div class="col-sm-7">
							<select name="provincia_bb" id="w1-provincia-bb" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value='' >::Seleccionar::</option>
								<option value="provincia1">provincia1</option>
								<option value="provincia2">provincia2</option>
								<option value="provincia3">provincia3</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="w1-zona-bb">Zona</label>
						<div class="col-md-7">
							<select name="zona_bb" id="w1-zona-bb" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value='' >::Seleccionar::</option>
								<option value="zona1">zona1</option>
								<option value="zona2">zona2</option>
								<option value="zona3">zona3</option>
							</select>
						</div>
					</div>
			</div>
			<div id="busqradio" class="collapse">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen-demanda">País</label>
					<div class="col-sm-7">
						<select name="pais" id="w1-pais" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($paises as $pais)
								<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen-demanda">Provincia</label>
					<div class="col-sm-7">
						<select name="provincia" id="w1-provincia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value="provincia1">provincia1</option>
							<option value="provincia2">provincia2</option>
							<option value="provincia3">provincia3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen-demanda">Zona</label>
					<div class="col-sm-7">
						<select name="zona" id="w1-provincia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value="zona1">zona1</option>
							<option value="zona2">zona2</option>
							<option value="zona3">zona3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen-demanda">Tipo de Vía</label>
					<div class="col-sm-7">
						<select name="via" id="w1-via" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($vias as $via)
								<option value="{{ $via->id }}">{{ $via->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="calle">Calle</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="calle" id="calle" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="numero">Número</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="numero" id="numero" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen-demanda">En un radio de</label>
					<div class="col-sm-7">
						<select name="zona" id="w1-provincia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value="zona1">Hasta 5 Km</option>
							<option value="zona1">Hasta 10 Km</option>
							<option value="zona1">Hasta 15 Km</option>
							<option value="zona1">Hasta 20 Km</option>
							<option value="zona1">Hasta 25 Km</option>
							<option value="zona1">Hasta 30 Km</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-4">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-map-marker" aria-hidden="true"></i> Ver radio en el mapa</button>
					</div> 
				</div>
			</div>
			<div id="busqmapa" class="collapse">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-busq-map-pais">País</label>
					<div class="col-sm-7">
						<select name="pais_bm" id="w1-busq-map-pais" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($paises as $pais)
								<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-provincia-bm">Provincia</label>
					<div class="col-sm-7">
						<select name="provincia_bm" id="w1-provincia-bm" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value="provincia1">provincia1</option>
							<option value="provincia2">provincia2</option>
							<option value="provincia3">provincia3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-zona-bm">Zona</label>
					<div class="col-sm-7">
						<select name="zona_bm" id="w1-zona-bm" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value="zona1">zona1</option>
							<option value="zona2">zona2</option>
							<option value="zona3">zona3</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-via-bm">Tipo de Vía</label>
					<div class="col-sm-7">
						<select name="via_bm" id="w1-via-bm" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($vias as $via)
								<option value="{{ $via->id }}">{{ $via->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="calle-bm">Calle</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="calle_bm" id="calle-bm" value="">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="numero-bm">Número</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="numero_bm" id="numero-bm" value="">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-4">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-map-marker" aria-hidden="true"></i> Dibujar sobre el mapa</button>
					</div> 
				</div>
			</div>
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Datos del Inmueble</h2>
	</header>
	<div class="panel-body">
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Extras básicos del inmueble</h2>
	</header>
	<div class="panel-body">
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Notas</h2>
	</header>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-sm-4 control-label" for="w1-notas">Notas</label>
			<div class="col-sm-8">
				<textarea class="form-control" name="notas" rows="3" id="w1-notas"></textarea>
			</div>
		</div>
	</div>
</section>