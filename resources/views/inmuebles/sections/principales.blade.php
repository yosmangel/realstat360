<div class="col-xs-12">
	<div class="row">
		<div id="msj_form_nuevo_inmueble" class="alert alert-success" role="alert" style="display:none">
			Se guardó el nuevo <strong>Inmueble.</strong>
		</div>
	</div>
	<div class="row">
		<div id="response" class="alert alert-success" role="alert" style="display:none">
		</div>
		<form class="form-horizontal" novalidate="novalidate" action="{{ route('inmuebles.store') }}" method="post">
			<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
			<input name="certificado_energetico" type="hidden" value = "en tramite">
			<div class="tab-content">
				<div id="w1-principales" class="tab-pane active">
					<div class="col-md-12">
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Detalle del Nuevo Inmueble</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Tipo de Inmueble</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="tipo_id">
											<option value="">::Seleccionar::</option>
											@foreach($tipos as $tipo)
												<option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Categoría</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="categoria_id">
											<option value="">::Seleccionar::</option>
											@foreach($categorias as $categoria)
												<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div> 
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='obranueva'>
											<input type="checkbox" value=1 id="obranueva" name="obranueva">
											<label for="obranueva" aria-expanded="false" aria-controls="obraNueva">Es Obra Nueva</label>
											<br>
										</div><br>
											<div class="collapse" id="obra-nueva">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-promocion">Promoción</label>
														<div class="col-md-6">
															<select data-plugin-selectTwo class="form-control populate" name="promocion_id">
																@if(count($promociones)>0)
																	<option value="0">:: Seleccionar ::</option>
																	@foreach($promociones as $pro)	
																		<option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
																	@endforeach
																@else
																		<option value="0">:: Seleccionar ::</option>
																		<option value="0" disabled="disabled">-- No hay Promociones --</option>
																@endif
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-topologia">Tipología</label>
														<div class="col-md-6">
															<select data-plugin-selectTwo class="form-control populate" name="tipologia_id">
																	<option value="0">::Seleccionar::</option>
																@if(count($tipologias)>0)
																	@foreach($tipologias as $tipologia)	
																		<option value="{{ $tipologia->id }}">{{ $tipologia->nombre }}</option>
																	@endforeach
																@else
																		<option value="0" disabled="disabled">-- No hay tipologias --</option>
																@endif
															</select>
														</div>
													</div>
											</div>
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='adjudicacionbancaria'> 
											<input type="checkbox" value=1 id="adjudicacionbancaria" name="adjbancaria">
											<label for="adjudicacionbancaria"  aria-expanded="false" aria-controls="adjudicacion">Adjudicación Bancaria</label>
										</div>
											<div class="collapse" id="adjudicacion">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-entidad">Entidad</label>
														<div class="col-md-6">
															<select data-plugin-selectTwo class="form-control populate" name="entidad_id">
																<option value="5">::Seleccionar::</option>
																@foreach($entidades as $entidad)
																	<option value="{{ $entidad->id }}">{{ $entidad->nombre }}</option>
																@endforeach
															</select>
														</div>
													</div>
											</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Fecha Alta</label>
									<div class="col-md-7">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input type="date" class="form-control" name="fecha_alta">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Estado</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="estado">
												<option value="">::Selecionar::</option>
												<option value="disponible">Disponible</option>
												<option value="reservado">Reservado</option>
												<option value="captacion">Captación</option>
												<option value="nodisponible">No disponible</option>
												<option value="enconstruccion">En construcción</option>
										</select>
									</div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Dirección del Inmueble</h2>
							</header>
							<div class="panel-body">
								<div class="col-xs-6">
									<div class="form-group">
										<label class="col-sm-4 control-label" id="w1-pais">País</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" id="w1-pais" name="pais_id">
												<option value="1" selected>España</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="codigo_postal" id="w1-codigo-postal" required>
											<p>
												¿Dudas de tu código postal? <a href="http://www.correos.es">www.correos.es</a> 
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Buscar por CP</label>
										<div class="col-sm-2">
											<button class="btn btn-info">Buscar</button>
										</div>
										<div class="col-sm-5">
											
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Provincia</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" name="provincia_id">
												<option value="">::Seleccionar::</option>
												@foreach($provincias as $provincia)
													<option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label">Ciudad</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" name="ciudad_id">
												<option value="">::Seleccionar::</option>
												@foreach($ciudades as $ciudad)
													<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-tipovia">Tipo de Vía</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" name="via_id" id="w1-tipovia">
												<option value=1>::Seleccionar::</option>
												@foreach($vias as $via)
													<option value="{{ $via->id }}">{{ $via->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-calle">Calle</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="calle" id="w1-calle" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-numero">No.</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="numero" id="w1-numero" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-piso">Piso.</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso">
												<option value="">::Seleccionar::</option>
												@foreach($pisos as $key => $piso)
													<option value="{{ $key }}">{{ $piso }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-escalera">Esc.</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-puerta">Pta.</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-11 text-right">
											* Indica cómo mostrar la dirección del inmueble en comunicaciones y publicaciones: 
											<br>
											<label class="radio-inline">
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion1" value="1" checked="checked"> Calle y número
											</label>
											<label class="radio-inline">
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion2" value="2"> Sólo calle
											</label>
											<label class="radio-inline">
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion3" value="3"> Zona
											</label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-zona">
											Zona
										</label>
										<div class="col-sm-7"  data-toggle="tooltip" data-placement="bottom" title="La dirección exacta es más fiable para los usuarios. Mostrar sólo la zona o incluso sólo la calle restan calidad al anuncio.">
											<input type="text" class="form-control input-sm" name="zona" id="w1-zona" required>
										</div>
									</div>
								</div>
								<div class="col-xs-6">
									<h4><i class="el el-map-marker-alt"></i> Comprobar dirección en el mapa</h4>
									<p>Arrastre el Marcador hasta la ubicación del inmueble</p>
									<div id="map"></div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos del Inmueble</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="row">
											<label class="col-sm-4 control-label" for="w1-superficie">Superficie</label>
											<div class="col-sm-7">
												<div class="row">
													<div class="col-xs-12 col-md-4">
														<input type="number" min=0 placeholder="0" class="form-control input-sm" name="superficie" id="w1-superficie" required>
													</div>
													<div class="col-xs-12 col-md-8">
														<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
															<input type='hidden' value=0 name='ocultarsuperficie'>
															<input type="checkbox" value=1 id="ocultarsuperficie" name="ocultarsuperficie">
															<label for="ocultarsuperficie" data-toggle="tooltip" data-placement="bottom" title="La superficie visible en la ficha del inmueble es importante. Tu anuncio será más visto en las búsquedas de nuestros usuarios.">Ocultar en comunicaciones y publicaciones.</label>
														</div>
													</div>
												</div>
											</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 col-md-4 control-label" for="w1-superficie">Modalidad</label>
									<div class="col-md-7">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-3">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													<input type="hidden" value=0 name="venta">
													<input type="checkbox" value=1 id="venta" name="venta" aria-expanded="false" aria-controls="opcionventa">
													<label for="venta">Venta</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse" id="opcionventa">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 col-sm-4 control-label" for="ventaprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="ventaprecio" name="ventaprecio">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 col-sm-4 control-label" for="ventapreciom2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="ventapreciom2" name="ventaprecio2">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div><br>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-3">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													<input type="hidden" value=0 name="traspaso">
													<input type="checkbox" value=1 id="traspaso" name="traspaso" aria-expanded="false" aria-controls="opciontraspaso">
													<label for="traspaso">Traspaso</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse" id="opciontraspaso">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="traspasoprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="traspasoprecio" name="traspasoprecio">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="traspasoprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="traspasoprecio2" name="traspasoprecio2">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-lg-3">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													<input type="hidden" value=0 name="compartir">
													<input type="checkbox" value=1 id="compartir" name="compartir" aria-expanded="false" aria-controls="opcioncompartir">
													<label for="compartir">Compartir</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse" id="opcioncompartir">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="periodicidad">Periodicidad</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<select data-plugin-selectTwo class="form-control populate" id="periodicidad" name="periodicidad">
																		<option value="Indiferente">Indiferente</option>
																		<option value="Diario">Diario</option>
																		<option value="Semana">Semana</option>
																		<option value="Mes">Mes</option>
																	</select>
																</div>
															</div><br>
															<div class="row">
																<label class="col-xs-4 control-label" for="compartirprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="compartirprecio" name="compartirprecio">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="compartirprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="compartirprecio2" name="compartirprecio2">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													<input type="hidden" value=0 name="alquiler_residencial">
													<input type="checkbox" value=1 id="alquilerresidencial" name="alquiler_residencial" aria-expanded="false" aria-controls="opcionalqres">
													<label for="alquilerresidencial">Alquiler Residencial &nbsp;&nbsp;(Mensual)</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9 col-lg-offset-3">
												<div class="collapse" id="opcionalqres">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="alqresprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqresprecio" name="alqresprecio">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="alqresprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqresprecio2" name="alqresprecio2">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
															<input type="checkbox" id="alqres_opcompra" name="alqres_opcompra" aria-expanded="false" aria-controls="alqresopcompra">
															<label for="alqres_opcompra">Opción a Compra</label>
													</div><br><br>
													<div class="collapse" id="alqresopcompra">
														<div class="alert alert-info">
															<div class="form-group">
																<div class="row">
																	<label class="col-sm-4 control-label" for="alqresopcomp">Precio</label>
																	<div class="col-sm-6">
																		<div class="input-group mb-md">
																			<span class="input-group-addon">€</span>
																			<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqresopcomp" name="alqresopcomp">
																			<span class="input-group-addon ">.00</span>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<label class="col-sm-4 control-label" for="alqresopcomp2">Precio m<sup>2</sup></label>
																	<div class="col-sm-6">
																		<div class="input-group mb-md">
																			<span class="input-group-addon">€</span>
																			<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqresopcomp2" name="alqresopcomp2">
																			<span class="input-group-addon ">.00</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div><br>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
													<input type="hidden" value=0 name="alquiler_vacacional">
													<input type="checkbox" value=1 id="alquiler_vacacional" name="alquiler_vacacional" aria-expanded="false" aria-controls="opcionalqvac">
													<label for="alquiler_vacacional">Alquiler Vacacional</label>
												</div>
											</div>
											<div class="col-xs-12 ">
												<div class="collapse" id="opcionalqvac">
														<div class="form-group">
																<blockquote>
															<div class="row">
																	<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																		<input type="hidden" value=0 name="alqvac_dia">
																		<input type="checkbox" value=1 id="alqvac_dia" name="alqvac_dia" aria-expanded="false" aria-controls="op-alqvacdia">
																		<label for="alqvac_dia">Dia</label>
																	</div>
																	<div class="collapse" id="op-alqvacdia">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_dia_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_dia_p" name="alqvac_dia_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_dia_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_dia_pm2" name="alqvac_dia_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
															</div>
															<div class="row">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="hidden" value=0 name="alqvac_semana">
																	<input type="checkbox" value=1 id="alqvac_semana" name="alqvac_semana" aria-expanded="false" aria-controls="op-alqvacsemana">
																	<label for="alqvac_semana">Semana</label>
																</div>
																<div class="collapse" id="op-alqvacsemana">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_semana_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_semana_p" name="alqvac_semana_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_semana_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_semana_pm2" name="alqvac_semana_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															<div class="row">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="hidden" value=0 name="alqvac_quincena">
																	<input type="checkbox" value=1 id="alqvac_quincena" name="alqvac_quincena" aria-expanded="false" aria-controls="op-alqvacquincena">
																	<label for="alqvac_quincena">Quincena</label>
																</div>
																<div class="collapse" id="op-alqvacquincena">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_quincena_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_quincena_p" name="alqvac_quincena_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_quincena_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_quincena_pm2" name="alqvac_quincena_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															<div class="row">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="hidden" value=0 name="alqvac_mes">
																	<input type="checkbox" value=1 id="alqvac_mes" name="alqvac_mes" aria-expanded="false" aria-controls="op-alqvacmes">
																	<label for="alqvac_mes">Mes</label>
																</div>
																<div class="collapse" id="op-alqvacmes">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_mes_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_mes_p" name="alqvac_mes_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_mes_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_mes_pm2" name="alqvac_mes_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															<div class="row">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="hidden" value=0 name="alqvac_temporada">
																	<input type="checkbox" value=1 id="alqvac_temporada" name="alqvac_temporada" aria-expanded="false" aria-controls="op-alqvactemporada">
																	<label for="alqvac_temporada">Temporada (Precio para toda la temporada)</label>
																</div>
																<div class="collapse" id="op-alqvactemporada">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_temporada_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_temporada_p" name="alqvac_temporada_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_temporada_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_temporada_pm2" name="alqvac_temporada_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
															<div class="row">
																<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																	<input type="hidden" value=0 name="alqvac_anno">
																	<input type="checkbox" value=1 id="alqvac_anno" name="alqvac_anno" aria-expanded="false" aria-controls="op-alqvacanno">
																	<label for="alqvac_anno">Año</label>
																</div>
																<div class="collapse" id="op-alqvacanno">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_anno_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_anno_p" name="alqvac_anno_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_anno_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="alqvac_anno_pm2" name="alqvac_anno_pm2">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
																</blockquote>
														</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-sm-4 control-label" for="w1-moneda">Moneda</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="moneda" id="w1-moneda">
											@foreach($monedas as $moneda)
												<option value="{{ $moneda }}">{{ $moneda }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-8 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type="checkbox" checked="" name="ocultarprecio" id="w1-ocultarprecio">
											<label for="w1-ocultarprecio" data-toggle="tooltip" data-placement="bottom" title="El precio visible en los anuncios despierta más interés entre los usuarios.">Ocultar precio en comunicaciones y publicaciones.</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-agua-caliente">Agua caliente sanitaria</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="agua_caliente" id="w1-agua-caliente">
											<option value="">::Selecionar::</option>
											<option value="Gas Natural">Gas Natural</option>
											<option value="Electricidad">Electricidad</option>
											<option value="Gasoleo">Gasóleo</option>
											<option value="Butano">Butano</option>
											<option value="Propano">Propano</option>
											<option value="Solar">Solar</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-anno-construccion">Año Contrucción</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=1800 max=2030 class="form-control" name="anio_contruccion" id="w1-anno-construccion">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-calefaccion">Calefacción</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="calefaccion" id="w1-calefaccion">
											<option value="">::Selecionar::</option>
											<option value="Gas Natural">Gas Natural</option>
											<option value="Electricidad">Electricidad</option>
											<option value="Gasoleo">Gasóleo</option>
											<option value="Butano">Butano</option>
											<option value="Propano">Propano</option>
											<option value="Solar">Solar</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-certificado-energetico">Certificado Energético</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="certificado_energetico" id="w1-calefaccion">
											<option value="">::Selecionar::</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="D">D</option>
											<option value="E">E</option>
											<option value="F">F</option>
											<option value="G">G</option>
											<option value="En tramite">En trámite</option>
											<option value="Exento">Exento</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-conservacion">Conservación</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="conservacion" id="w1-conservacion">
											<option value="">::Selecionar::</option>
											<option value="Buena">Buena</option>
											<option value="Muy Buena">Muy Buena</option>
											<option value="Excelente">Excelente</option>
											<option value="Regular">Regular</option>
											<option value="Necesita Reforma">Necesita Reforma</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-aseos">Número de Aseos</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="num_aseos" id="w1-num-aseos">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-banos">Número de Baños</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="banos" id="w1-num-banos">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-habitaciones">Número de Habitaciones</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="habitaciones" id="w1-num-habitaciones">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-registro-turismo">Número de Registro de Turismo</label>
									<div class="col-xs-12 col-md-7">
										<input type="text" class="form-control" name="num_registro_turismo" id="w1-registro-turismo">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-orientacion">Orientación</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="orientacion" id="w1-orientacion">
											<option value="">::Selecionar::</option>
											<option value="noreste">Noreste</option>
											<option value="oeste">Oeste</option>
											<option value="norte">Norte</option>
											<option value="suroeste">Suroeste</option>
											<option value="este">Este</option>
											<option value="sureste">Sureste</option>
											<option value="noroeste">Noroeste</option>
											<option value="sur">Sur</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="observaciones">Observaciones</label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="observaciones" name="observaciones"></textarea>
									</div>
								</div>
							</div>
						</section>
						
						<!-- *** DATOS INTERIORES *** -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos Interiores</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='aire_acondicionado'>
											<input type="checkbox" value=1 id="aire-acondicionado" name="aire_acondicionado">
											<label for="aire-acondicionado" aria-expanded="false" aria-controls="aire-acondicionado">Aire Acondicionado</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='amueblado'>
											<input type="checkbox" value=1 id="amueblado" name="amueblado">
											<label for="amueblado" aria-expanded="false" aria-controls="amueblado">Amueblado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='armarios'>
											<input type="checkbox" value=1 id="armarios" name="armarios">
											<label for="armarios" aria-expanded="false" aria-controls="armarios">Armarios</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='calefaccion_int'>
											<input type="checkbox" value=1 id="calefaccion_int" name="calefaccion_int">
											<label for="calefaccion_int" aria-expanded="false" aria-controls="calefaccion_int">Calefacción</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='cocina_equipada'>
											<input type="checkbox" value=1 id="cocina-equipada" name="cocina_equipada">
											<label for="cocina-equipada" aria-expanded="false" aria-controls="cocina_equipada">Cocina Equipada</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='cocina_office'>
											<input type="checkbox" value=1 id="cocina-office" name="cocina_office">
											<label for="cocina-office" aria-expanded="false" aria-controls="cocina_office">Cocina Office</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='domotica'>
											<input type="checkbox" value=1 id="domotica" name="domotica">
											<label for="domotica" aria-expanded="false" aria-controls="domotica">Domótica</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='electrodomesticos'>
											<input type="checkbox" value=1 id="electrodomesticos" name="electrodomesticos">
											<label for="electrodomesticos" aria-expanded="false" aria-controls="electrodomesticos">Electrodomésticos</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='gresceramica'>
											<input type="checkbox" value=1 id="gresceramica" name="gresceramica">
											<label for="gresceramica" aria-expanded="false" aria-controls="gresceramica">Gres/Cerámica</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='horno'>
											<input type="checkbox" value=1 id="horno" name="horno">
											<label for="horno" aria-expanded="false" aria-controls="horno">Horno</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='internet'>
											<input type="checkbox" value=1 id="internet" name="internet">
											<label for="internet" aria-expanded="false" aria-controls="internet">Internet</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='wifi'>
											<input type="checkbox" value=1 id="wifi" name="wifi">
											<label for="wifi" aria-expanded="false" aria-controls="wifi">Wifi</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='lavadora'>
											<input type="checkbox" value=1 id="lavadora" name="lavadora">
											<label for="lavadora" aria-expanded="false" aria-controls="lavadora">Lavadora</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='microondas'>
											<input type="checkbox" value=1 id="microondas" name="microondas">
											<label for="microondas" aria-expanded="false" aria-controls="microondas">Microondas</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='nevera'>
											<input type="checkbox" value=1 id="nevera" name="nevera">
											<label for="nevera" aria-expanded="false" aria-controls="nevera">Nevera</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='no_amueblado'>
											<input type="checkbox" value=1 id="no_amueblado" name="no_amueblado">
											<label for="no_amueblado" aria-expanded="false" aria-controls="no_amueblado">No Amueblado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='parquet'>
											<input type="checkbox" value=1 id="parquet" name="parquet">
											<label for="parquet" aria-expanded="false" aria-controls="parquet">Parquet</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='puerta_blindada'>
											<input type="checkbox" value=1 id="puerta_blindada" name="puerta_blindada">
											<label for="puerta_blindada" aria-expanded="false" aria-controls="puerta_blindada">Puerta blindada</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='mascotas'>
											<input type="checkbox" value=1 id="mascotas" name="mascotas">
											<label for="mascotas" aria-expanded="false" aria-controls="mascotas">Se aceptan mascotas</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='suite_con_bano'>
											<input type="checkbox" value=1 id="suite_con_bano" name="suite_con_bano">
											<label for="suite_con_bano" aria-expanded="false" aria-controls="suite_con_bano">Suite con baño</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='lavadero'>
											<input type="checkbox" value=1 id="lavadero" name="lavadero">
											<label for="lavadero" aria-expanded="false" aria-controls="lavadero">Lavadero</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='television'>
											<input type="checkbox" value=1 id="television" name="television">
											<label for="television" aria-expanded="false" aria-controls="television">Televisión</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='sauna'>
											<input type="checkbox" value=1 id="sauna" name="sauna">
											<label for="sauna" aria-expanded="false" aria-controls="sauna">Sauna</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina'>
											<input type="checkbox" value=1 id="piscina" name="piscina">
											<label for="piscina" aria-expanded="false" aria-controls="piscina">Piscina</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='salida_de_humos'>
											<input type="checkbox" value=1 id="salida_de_humos" name="salida_de_humos">
											<label for="salida_de_humos" aria-expanded="false" aria-controls="salida_de_humos">Salida de Humos</label>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- *** FIN DATOS INTERIORES *** -->

						<!-- *** DATOS EXTERIORES *** -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos Exteriores</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='balcones'>
											<input type="checkbox" value=1 id="balcones" name="balcones">
											<label for="balcones" aria-expanded="false" aria-controls="balcones">Balcones</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='vista_al_mar'>
											<input type="checkbox" value=1 id="vista_al_mar" name="vista_al_mar">
											<label for="vista_al_mar" aria-expanded="false" aria-controls="vista_al_mar">Con vistas al mar</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='jardin_privado'>
											<input type="checkbox" value=1 id="jardin_privado" name="jardin_privado">
											<label for="jardin_privado" aria-expanded="false" aria-controls="jardin_privado">Jardín Privado</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='patio'>
											<input type="checkbox" value=1 id="patio" name="patio">
											<label for="patio" aria-expanded="false" aria-controls="patio">Patio</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina_ext'>
											<input type="checkbox" value=1 id="piscina_ext" name="piscina_ext">
											<label for="piscina_ext" aria-expanded="false" aria-controls="piscina_ext">Piscina</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina_comunitaria'>
											<input type="checkbox" value=1 id="piscina_comunitaria" name="piscina_comunitaria">
											<label for="piscina_comunitaria" aria-expanded="false" aria-controls="piscina_comunitaria">Piscina comunitaria</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='primera_linea_mar'>
											<input type="checkbox" value=1 id="primera_linea_mar" name="primera_linea_mar">
											<label for="primera_linea_mar" aria-expanded="false" aria-controls="primera_linea_mar">Primera línea de mar</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='terraza'>
											<input type="checkbox" value=1 id="terraza" name="terraza">
											<label for="terraza" aria-expanded="false" aria-controls="terraza">Terraza</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='vista_montana'>
											<input type="checkbox" value=1 id="vista_montana" name="vista_montana">
											<label for="vista_montana" aria-expanded="false" aria-controls="vista_montana">Vista a la montaña</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_comunitaria'>
											<input type="checkbox" value=1 id="zona_comunitaria" name="zona_comunitaria">
											<label for="zona_comunitaria" aria-expanded="false" aria-controls="zona_comunitaria">Zona comunitaria</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_deportiva'>
											<input type="checkbox" value=1 id="zona_deportiva" name="zona_deportiva">
											<label for="zona_deportiva" aria-expanded="false" aria-controls="zona_deportiva">Zona deportiva</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_infantil'>
											<input type="checkbox" value=1 id="zona_infantil" name="zona_infantil">
											<label for="zona_infantil" aria-expanded="false" aria-controls="zona_infantil">Zona infantil</label>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- *** FIN DATOS EXTERIORES *** -->

						<!-- *** DATOS FINCA *** -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos Finca</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='ascensor'>
											<input type="checkbox" value=1 id="ascensor" name="ascensor">
											<label for="ascensor" aria-expanded="false" aria-controls="ascensor">Ascensor</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='conserje'>
											<input type="checkbox" value=1 id="conserje" name="conserje">
											<label for="conserje" aria-expanded="false" aria-controls="conserje">Conserje</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='energia_solar'>
											<input type="checkbox" value=1 id="energia_solar" name="energia_solar">
											<label for="energia_solar" aria-expanded="false" aria-controls="energia_solar">Energía Solar</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='garage_privado'>
											<input type="checkbox" value=1 id="garage_privado" name="garage_privado">
											<label for="garage_privado" aria-expanded="false" aria-controls="garage_privado">Garaje Privado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='parking_comunitario'>
											<input type="checkbox" value=1 id="parking_comunitario" name="parking_comunitario">
											<label for="parking_comunitario" aria-expanded="false" aria-controls="parking_comunitario">Parking comunitario</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='trastero'>
											<input type="checkbox" value=1 id="trastero" name="trastero">
											<label for="trastero" aria-expanded="false" aria-controls="trastero">Trastero</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='video_portero'>
											<input type="checkbox" value=1 id="video_portero" name="video_portero">
											<label for="video_portero" aria-expanded="false" aria-controls="video_portero">Video portero</label>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- *** FIN DATOS FINCA *** -->

						<!-- *** DATOS ESPECIAL COMPARTIR *** -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Especial Compartir</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='solo_chicas'>
											<input type="checkbox" value=1 id="solo_chicas" name="solo_chicas">
											<label for="solo_chicas" aria-expanded="false" aria-controls="solo_chicas">Sólo chicas</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='solo_chicos'>
											<input type="checkbox" value=1 id="solo_chicos" name="solo_chicos">
											<label for="solo_chicos" aria-expanded="false" aria-controls="solo_chicos">Sólo chicos</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='solo_no_fumadores'>
											<input type="checkbox" value=1 id="solo_no_fumadores" name="solo_no_fumadores">
											<label for="solo_no_fumadores" aria-expanded="false" aria-controls="solo_no_fumadores">Sólo no fumadores</label>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- *** FIN DATOS FINCA *** -->

						<!-- *** DATOS ESPECIAL ALQUILER *** -->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Especial Alquiler</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='gastos_comunidad'>
											<input type="checkbox" value=1 id="gastos_comunidad" name="gastos_comunidad">
											<label for="gastos_comunidad" aria-expanded="false" aria-controls="gastos_comunidad">Gastos comunidad incluidas</label>
											<br>
										</div>
									</div>

									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='menos_2_mese_fianza'>
											<input type="checkbox" value=1 id="menos_2_mese_fianza" name="menos_2_mese_fianza">
											<label for="menos_2_mese_fianza" aria-expanded="false" aria-controls="menos_2_mese_fianza">Se requiere menos de dos meses de fianza</label>
											<br>
										</div>
									</div>
								</div>
							</div>
						</section>
						<!-- *** FIN DATOS ESPECIAL ALQUILER *** -->

						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Descripción</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-idioma">Idioma</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id">
											<option value=1 selected>:: Seleccione el Idioma ::</option>
											@foreach($idiomas as $idioma)
												<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="descripcion_corta">Descripción Abreviada</label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="descripcion_corta" name="descripcion_corta"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="descripcion_extendida">Descripción Extendida <i class="el el-info-circle"></i></label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="descripcion_extendida" name="descripcion_extendida" data-toggle="tooltip" data-placement="bottom" title="La descripción debe ser completa pero no demasiado larga. No incluyas características del inmueble que ya aparecen en el detalle y evita el exceso de mayúsculas."></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<a class="btn btn-warning" role="button" data-toggle="collapse" href="#nuevoIdioma" aria-expanded="false" aria-controls="collapseExample">
												<i class="fa fa-plus" aria-hidden="true"></i>  Añadir nuevo idioma
										</a>
									</div>
								</div>
								<div class="collapse" id="nuevoIdioma">
										<div class="form-group">
											<label class="col-sm-4 control-label" for="w1-superficie">Idioma</label>
											<div class="col-md-8">
												<select data-plugin-selectTwo class="form-control populate" name="idioma_id2">
													<option value="1">::Seleccionar::</option>
													@foreach($idiomas as $idioma)
														<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_corta2">Descripción Abreviada</label>
											<div class="col-md-8">
												<textarea class="form-control" rows="3" id="descripcion_corta2" name="descripcion_corta2"></textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_extendida2">Descripción Extendida <i class="el el-info-circle"></i></label>
											<div class="col-md-8">
												<textarea class="form-control" rows="3" id="descripcion_extendida2" name="descripcion_extendida2"></textarea>
											</div>
										</div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos de Contacto en Publicaciones</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-persona">Persona de contacto</label>
									<div class="col-md-7">
										<input type="text" class="form-control input-sm" name="persona" id="w1-persona" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-moneda">Mostrar</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate">
												<option value="1">Datos de mi Agencia</option>
												<option value="2">Agente del Inmueble</option>
										</select>
										<br>
										<section class="hidden-md panel panel-featured-left panel-featured-primary">
											<div class="panel-body">
												<div class="widget-summary widget-summary-md">
													<div class="widget-summary-col widget-summary-col-icon">
														<div class="summary-icon bg-primary">
															<i class="fa fa-life-ring"></i>
														</div>
													</div>
													<div class="widget-summary-col">
														<div class="summary">
															<h4 class="title">Datos de mi Agencia</h4>
															<div class="info">
																<strong>Email</strong>
																<span class="text-primary">{{ $agencia[0]->email }}</span>
																<br>
																<strong>Teléfono</strong>
																<span class="text-primary">{{ $agencia[0]->telefono }}</span>
															</div>
														</div>
														<div class="summary-footer">
															<a class="text-muted text-uppercase">(ver mas ...)</a>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
						</section>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="hidden-xs col-md-4"></div>
							<div class="col-md-8">
							<!--button type="submit" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button-->
							<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success btn-nuevo-inmueble"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar y Continuar</button>
							<!--button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar y Continuar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button-->
							</div> 
						</div>
						<br><br>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>