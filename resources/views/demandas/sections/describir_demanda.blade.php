<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Descripción del tipo de demanda</h2>
	</header>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-md-4 control-label" for="w1-estado-civil">Tipo de Inmueble</label>
			<div class="col-md-7">
				<select data-plugin-selectTwo class="form-control populate select2-ajax" name="tipo_inmueble_id" id="w1-tipo-inmueble" style="width: 100%">
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
				<select name="categoria_id" id="w1-categoria" data-plugin-selectTwo class="form-control populate" style="width: 100%">
					@foreach($categorias as $categoria)
						@if($categoria->nombre == 'Indiferente')
							<option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>
						@else
							<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
						@endif
					@endforeach
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
							<select name="obranueva" id="w1-obranueva" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="Indiferente" selected>Indiferente</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="well">
					<div class="row">
						<label class="col-md-4 control-label" for="ventaprecio">Adjudicación</label>
						<div class="col-md-6">
							<select name="adjudicacion" id="w1-adjudicacion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="Indiferente" selected>Indiferente</option>
								<option value="Si">Si</option>
								<option value="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="w1-superficie">Superficie</label>
			<div class="col-md-7">
				<div class="row">
					<label class="col-md-2 control-label" for="w1-superficie">Desde</label>
					<div class="col-md-4">
						<input type="number" class="form-control input-sm" min=0 placeholder=0 id="sup_desde" name="sup_desde">
					</div>
					<label class="col-md-2 control-label" for="w1-superficie">Hasta</label>
					<div class="col-md-4">
						<input type="number" class="form-control input-sm"  id="sup_hasta" name="sup_hasta" min=0 placeholder=0>
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
								<label class="col-md-2 control-label" for="w1-venta">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio_desde" name="ventaprecio_desde" min=0 placeholder=0>
								</div>
								<label class="col-md-2 control-label" for="w1-venta">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio_hasta" name="ventaprecio_hasta" min=0 placeholder=0>
								</div>
							</div>
						</section>
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Precio m<sup>2</sup></h6>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="w1-precioventam2">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio_desde_m2" name="ventaprecio_desde_m2" min=0 placeholder=0>
								</div>
								<label class="col-md-2 control-label" for="w1-precioventam2">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="ventaprecio_hasta_m2" name="ventaprecio_hasta_m2" min=0 placeholder=0>
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
								<label class="col-md-2 control-label" for="alqres_precio_desde">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="alqres_precio_desde" name="alqres_precio_desde" min=0 placeholder=0>
								</div>
								<label class="col-md-2 control-label" for="alqres_precio_hasta">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="alqres_precio_hasta" name="alqres_precio_hasta" min=0 placeholder=0>
								</div>
							</div>
						</section>
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Precio m<sup>2</sup></h6>
							</header>
							<div class="panel-body">
								<label class="col-md-2 control-label" for="alqres_preciom2_desde">Desde</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="alqres_preciom2_desde" name="alqres_preciom2_desde" min=0 placeholder=0>
								</div>
								<label class="col-md-2 control-label" for="alqres_preciom2_hasta">Hasta</label>
								<div class="col-md-4">
									<input type="number" class="form-control input-sm"  id="alqres_preciom2_hasta" name="alqres_preciom2_hasta" min=0 placeholder=0>
								</div>
							</div>
						</section>	
						<section class="panel panel-info">
							<header class="panel-heading">
								<h6 class="panel-title">Opción a Compra</h6>
							</header>
							<div class="panel-body">
								<select name="opcioncompra" id="opcioncompra" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									<option value="Indiferente" selected>Indiferente</option>
									<option value="Si">Si</option>
									<option value="No">No</option>
								</select>
							</div>
						</section>	
				</div>
			</div>	
		</div>
		<div class="form-group">
			<label class="col-md-4 control-label" for="moneda">Moneda (<i class="fa fa-eur" aria-hidden="true"></i>, <i class="fa fa-usd" aria-hidden="true"></i>)</label>
			<div class="col-md-7">
				<select name="moneda" id="moneda" data-plugin-selectTwo class="form-control populate" style="width: 100%">
					<option value="">::Seleccionar::</option>
					<option value="EUR - Euro"> Euro</option>
					<option value="USD - Dólar estadounidense"> Dólar</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-md-4 control-label" for="w1-num-banos">Número de Baños</label>
			<div class="col-xs-12 col-md-7">
				<input type="number" min=0 class="form-control" name="banos" id="w1-num-banos" value="0">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-md-4 control-label" for="w1-num-habitaciones">Número de Habitaciones</label>
			<div class="col-xs-12 col-md-7">
				<input type="number" min=0 class="form-control" name="habitaciones" id="w1-num-habitaciones" value="0">
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
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-pais">País</label>
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
				<label class="col-sm-4 control-label" for="w1-provincia">Provincia</label>
				<div class="col-sm-7">
					<select name="provincia" id="w1-provincia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
						<option value='' >::Seleccionar::</option>
						@foreach($provincias as $provincia)
							<option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-zona">Zona</label>
				<div class="col-md-7">
					<select name="zona" id="w1-zona" data-plugin-selectTwo class="form-control populate" style="width: 100%">
						<option value='' >::Seleccionar::</option>
						<option value="zona1">zona1</option>
						<option value="zona2">zona2</option>
						<option value="zona3">zona3</option>
					</select>
				</div>
			</div>
			<div id="busqradio" class="collapse">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-via">Tipo de Vía</label>
					<div class="col-sm-7">
						<select name="via_ra" id="w1-via" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($vias as $via)
								<option value="{{ $via->id }}">{{ $via->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-calle">Calle</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="calle_ra" id="w1-calle">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-numero">Número</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="numero_ra" id="w1-numero">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-radio">En un radio de</label>
					<div class="col-sm-7">
						<select name="radio" id="w1-radio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<option value=5>Hasta 5 Km</option>
							<option value=10>Hasta 10 Km</option>
							<option value=15>Hasta 15 Km</option>
							<option value=20>Hasta 20 Km</option>
							<option value=25>Hasta 25 Km</option>
							<option value=30>Hasta 30 Km</option>
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
					<label class="col-sm-4 control-label" for="w2-via">Tipo de Vía</label>
					<div class="col-sm-7">
						<select name="via_bm" id="w2-via" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($vias as $via)
								<option value="{{ $via->id }}">{{ $via->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w2-calle">Calle</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="calle_bm" id="w2-calle">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w2-numero">Número</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="numero_bm" id="w2-numero">
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