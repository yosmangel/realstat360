<div class="col-xs-12">
	<div class="row">
		<div id="msj_edit" class="alert alert-success" role="alert" style="display:none">
			Se actualizaron los datos del inmueble.</strong>
		</div>
	</div>
	<div class="row">
		<form class="form-horizontal" novalidate="novalidate" action="{{ route('inmuebles.update',$inmueble->id) }}" method="post">
			<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
			<input name="numform" type="hidden" value = 0>
			<div class="tab-content">
				<div class="tab-pane active">
					<div class="col-md-12">
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Detalle del Nuevo Inmueble</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Tipo de Inmueble</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="tipo_id" style="width: 100%">
											<option value="{{ $inmueble->tipo->id }}">{{ $inmueble->tipo->nombre }}</option>
											@foreach($tipos as $tipo)
												<option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Categoría</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="categoria_id" style="width: 100%">
											<option value="{{ $inmueble->categoria->id }}">{{ $inmueble->categoria->nombre }}</option>
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
											@if($inmueble->obranueva == 1)
												<input type="checkbox" value=1 id="obranueva_edt" name="obranueva" checked="checked">
											@else
												<input type="checkbox" value=1 id="obranueva_edt" name="obranueva">
											@endif
											<label for="obranueva" aria-expanded="false" aria-controls="obraNueva">Es Obra Nueva</label>
											<br>
										</div><br>
											<div class="collapse in" id="obra-nueva">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-promocion">Promoción</label>
														<div class="col-md-6"> 
															<select class="esnueva" id="w1-promocion" data-plugin-selectTwo class="form-control populate" style="width: 100%" >
																@if(count($promocion)>0)
																	<option value="{{ $promocion->id }}">{{ $promocion->nombre }}</option>
																@endif
																@if(count($promociones)>0)
																	@foreach($promociones as $promo)	
																		<option value="{{ $promo->id }}">{{ $promo->nombre }}</option>
																	@endforeach
																@else
																	<option value="">::Seleccionar::</option>
																	<option value="" disabled="disabled">-- No hay promociones --</option>
																@endif
															</select>
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-topologia">Tipología</label>
														<div class="col-md-6">
															<select class="esnueva" id="w1-topologia" data-plugin-selectTwo class="form-control populate" style="width: 100%" >
																		<option value="">::Seleccionar::</option>
																@if(count($tipologias)>0)
																	@foreach($tipologias as $tipologia)	
																		<option value="{{ $tipologia->id }}">{{ $tipologia->nombre }}</option>
																	@endforeach
																@else
																		<option value="" disabled="disabled">-- No hay tipologias --</option>
																@endif
															</select>
														</div>
													</div>
											</div>
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='adjudicacionbancaria'>
											@if($inmueble->adjbancaria == 1)
												<input type="checkbox" value=1 id="adjudicacionbancaria" name="adjudicacionbancaria" checked="checked">
											@else
												<input type="checkbox" value=1 id="adjudicacionbancaria" name="adjudicacionbancaria">
											@endif
											<label for="adjudicacionbancaria"  aria-expanded="false" aria-controls="adjudicacion">Adjudicación Bancaria</label>
										</div>
											<div class="collapse in" id="adjudicacion">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-entidad">Entidad</label>
														<div class="col-md-6">
															<select data-plugin-selectTwo class="form-control populate" id="entidad_id" name="entidad_id" style="width: 100%">
																	<option value="{{ $inmueble->entidad_id }}">{{ $inmueble->entidad->nombre }}</option>
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
											<input type="date" class="form-control" name="fechaalta" value="{{ $inmueble->fecha_alta }}">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Estado</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="estado" style="width: 100%">
												<option value="{{ $inmueble->estado }}">{{ $tipos_estados[$inmueble->estado] }}</option>
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
								<div class="form-group">
									<label class="col-sm-4 control-label" id="w1-pais">País</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-pais" name="pais_id" style="width: 100%">
											<option value="{{ $inmueble->pais->id }}">{{ $inmueble->pais->nombre }}</option>
											@foreach($paises as $pais)
												<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="codigopostal" id="w1-codigo-postal" required value="{{ $inmueble->codigo_postal }}">
										<p>
											¿Dudas de tu código postal? <a href="www.correos.es">www.correos.es</a> 
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Municicpio</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="ciudad_id" style="width: 100%">
										<option value="{{ $inmueble->ciudad->id }}">{{ $inmueble->ciudad->nombre }}</option>
											@foreach($ciudades as $ciudad)
												<option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-tipovia">Tipo de Vía</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="tipovia" id="w1-tipovia" style="width: 100%">
											<option value="{{ $inmueble->via->id }}">{{ $inmueble->via->nombre }}</option>
											@foreach($vias as $via)
												<option value="{{ $via->id }}">{{ $via->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-calle">Calle</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="calle" id="w1-calle" required value="{{ $inmueble->calle }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-4 control-label" for="w1-numero">No.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="numero" id="w1-numero" required value="{{ $inmueble->numero }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-piso">Piso.</label>
									<div class="col-sm-7 col-md-3">
										<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso" style="width: 100%">
											<option value="{{ $inmueble->piso }}">{{ $inmueble->piso }}</option>
											@foreach($pisos as $key => $piso)
												<option value="{{ $key }}">{{ $piso }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-escalera">Esc.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera" required value="{{ $inmueble->escalera }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-puerta">Pta.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" required value="{{ $inmueble->puerta }}">
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="el el-map-marker-alt"></i> Comprobar dirección en el mapa</button>
									</div> 
								</div>
								<div class="form-group">
									<div class="col-md-11 text-right">
										* Indica cómo mostrar la dirección del inmueble en comunicaciones y publicaciones: 
										<br>
										<label class="radio-inline">
											@if($inmueble->mostrardireccion == "1")
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion1" value="1" checked="checked"> Calle y número
											@else
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion1" value="1"> Calle y número
											@endif
										</label>
										<label class="radio-inline">
											@if($inmueble->mostrardireccion == "2")
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion2" value="2" checked="checked"> Sólo calle
											@else
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion2" value="2"> Sólo calle
											@endif
										</label>
										<label class="radio-inline">
											@if($inmueble->mostrardireccion == "3")
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion3" value="3" checked="checked"> Zona
											@else
												<input type="radio" name="mostrardireccion" id="opcionmostrardireccion3" value="3"> Zona
											@endif
											
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-zona">
										Zona
									</label>
									<div class="col-sm-7"  data-toggle="tooltip" data-placement="bottom" title="La dirección exacta es más fiable para los usuarios. Mostrar sólo la zona o incluso sólo la calle restan calidad al anuncio.">
										<input type="text" class="form-control input-sm" name="zona" id="w1-zona" required value="{{ $inmueble->zona }}">
									</div>
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
														<input type="number" class="form-control input-sm" name="superficie" id="w1-superficie" required value="{{ $inmueble->superficie }}">
													</div>
													<div class="col-xs-12 col-md-8">
														<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
															@if($inmueble->ocultarsuperficie == 1)
																<input type="checkbox" checked="checked" id="ocultarsuperficie" name="ocultarsuperficie" >
															@else
																<input type="checkbox" id="ocultarsuperficie" name="ocultarsuperficie" >
															@endif
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
													@if($inmueble->modalidad->venta == 1)
														<input type="checkbox" value=1 id="venta" name="venta" aria-expanded="false" aria-controls="opcionventa" checked="checked">
													@else
														<input type="checkbox" value=1 id="venta" name="venta" aria-expanded="false" aria-controls="opcionventa">
													@endif
													<label for="venta">Venta</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse <?php echo ($inmueble->modalidad->venta == '1') ? 'in' : ''; ?>" id="opcionventa">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 col-sm-4 control-label" for="ventaprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="ventaprecio" name="ventaprecio" value="{{ $inmueble->modalidad->ventaprecio }}">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 col-sm-4 control-label" for="ventapreciom2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="ventapreciom2" name="ventapreciom2" value="{{ $inmueble->modalidad->ventaprecio2 }}">
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
													@if($inmueble->modalidad->traspaso == 1)
														<input type="checkbox" value=1 id="traspaso" name="traspaso" aria-expanded="false" aria-controls="opciontraspaso" checked="checked">
													@else
														<input type="checkbox" value=1 id="traspaso" name="traspaso" aria-expanded="false" aria-controls="opciontraspaso">
													@endif
													<label for="traspaso">Traspaso</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse <?php echo ($inmueble->modalidad->traspaso == 1) ? 'in' : ''; ?>" id="opciontraspaso">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="traspasoprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="traspasoprecio" name="traspasoprecio" value="{{ $inmueble->modalidad->traspasoprecio }}">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="traspasoprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="traspasoprecio2" name="traspasoprecio2" value="{{ $inmueble->modalidad->traspasoprecio2 }}">
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
													@if($inmueble->modalidad->compartir==1)
														<input type="checkbox" value=1 id="compartir" name="compartir" aria-expanded="false" aria-controls="opcioncompartir" checked="checked">
													@else
														<input type="checkbox" value=1 id="compartir" name="compartir" aria-expanded="false" aria-controls="opcioncompartir">
													@endif
													<label for="compartir">Compartir</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9">
												<div class="collapse <?php echo ($inmueble->modalidad->compartir==1) ? 'in': ''; ?>" id="opcioncompartir">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="periodicidad">Periodicidad</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<select data-plugin-selectTwo class="form-control populate" id="periodicidad" name="periodicidad" style="width: 100%;">
																		<option value="{{ $inmueble->modalidad->periodicidad }}">{{ $inmueble->modalidad->periodicidad }}</option>
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
																		<input type="number" class="form-control input-sm"  id="compartirprecio" name="compartirprecio" value="{{ $inmueble->modalidad->compartirprecio }}"> 
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="compartirprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="compartirprecio2" name="compartirprecio2" value="{{ $inmueble->modalidad->compartirprecio2 }}">
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
													@if($inmueble->modalidad->alquiler_residencial == 1)
														<input type="checkbox" value=1 id="alquilerresidencial" name="alquiler_residencial" aria-expanded="false" aria-controls="opcionalqres" checked="checked">
													@else
														<input type="checkbox" value=1 id="alquilerresidencial" name="alquiler_residencial" aria-expanded="false" aria-controls="opcionalqres">
													@endif
													<label for="alquilerresidencial">Alquiler Residencial &nbsp;&nbsp;(Mensual)</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9 col-lg-offset-3">
												<div class="collapse <?php echo ($inmueble->modalidad->alquiler_residencial == 1) ? 'in': '' ?>" id="opcionalqres">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="alqresprecio">Precio</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="alqresprecio" name="alqresprecio" value="{{ $inmueble->modalidad->alqresprecio }}">
																		<span class="input-group-addon ">.00</span>
																	</div>
																</div>
															</div>
															<div class="row">
																<label class="col-xs-4 control-label" for="alqresprecio2">Precio m<sup>2</sup></label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<div class="input-group mb-md">
																		<span class="input-group-addon">€</span>
																		<input type="number" class="form-control input-sm"  id="alqresprecio2" name="alqresprecio2" value="{{ $inmueble->modalidad->alqresprecio2 }}">
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
																			<input type="number" class="form-control input-sm"  id="alqresopcomp" name="alqresopcomp">
																			<span class="input-group-addon ">.00</span>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<label class="col-sm-4 control-label" for="alqresopcomp2">Precio m<sup>2</sup></label>
																	<div class="col-sm-6">
																		<div class="input-group mb-md">
																			<span class="input-group-addon">€</span>
																			<input type="number" class="form-control input-sm"  id="alqresopcomp2" name="alqresopcomp2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_dia_p" name="alqvac_dia_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_dia_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_dia_pm2" name="alqvac_dia_pm2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_semana_p" name="alqvac_semana_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_semana_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_semana_pm2" name="alqvac_semana_pm2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_quincena_p" name="alqvac_quincena_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_quincena_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_quincena_pm2" name="alqvac_quincena_pm2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_mes_p" name="alqvac_mes_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_mes_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_mes_pm2" name="alqvac_mes_pm2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_temporada_p" name="alqvac_temporada_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_temporada_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_temporada_pm2" name="alqvac_temporada_pm2">
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
																							<input type="number" class="form-control input-sm"  id="alqvac_anno_p" name="alqvac_anno_p">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_anno_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_anno_pm2" name="alqvac_anno_pm2">
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
									<label class="col-sm-4 control-label" for="w1-moneda">Moneda</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="moneda" id="w1-moneda" style="width: 100%">
											@foreach($monedas as $moneda)
												<option value="{{ $moneda }}">{{ $moneda }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='ocultarprecio'>
											<input type="checkbox" value=1 id="w1-ocultarprecio" name="ocultarprecio">
											<label for="w1-ocultarprecio" data-toggle="tooltip" data-placement="bottom" title="El precio visible en los anuncios despierta más interés entre los usuarios.">Ocultar precio en comunicaciones y publicaciones.</label>
										</div>
									</div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Descripción</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-idioma">Idioma</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id" style="width: 100%">
											@foreach($idiomas as $idioma)
												<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="descripcion_corta">Descripción Abreviada</label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="descripcion_corta" name="descripcion_corta">{{ $inmueble->descripcion_corta }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="descripcion_extendida">Descripción Extendida <i class="el el-info-circle"></i></label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="descripcion_extendida" name="descripcion_extendida" data-toggle="tooltip" data-placement="bottom" title="La descripción debe ser completa pero no demasiado larga. No incluyas características del inmueble que ya aparecen en el detalle y evita el exceso de mayúsculas.">{{ $inmueble->descripcion_extendida }}</textarea>
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
												<select data-plugin-selectTwo class="form-control populate" name="idioma_id2" style="width: 100%">
													<option value="">::Seleccionar::</option>
													@foreach($idiomas as $idioma)
														<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_corta2">Descripción Abreviada</label>
											<div class="col-md-8">
												<textarea class="form-control" rows="3" id="descripcion_corta2" name="descripcion_corta2">{{ $inmueble->descripcion_corta2 }}</textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-4 control-label" for="descripcion_extendida2">Descripción Extendida <i class="el el-info-circle"></i></label>
											<div class="col-md-8">
												<textarea class="form-control" rows="3" id="descripcion_extendida2" name="descripcion_extendida2">{{ $inmueble->descripcion_extendida2 }}</textarea>
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
										<input type="text" class="form-control input-sm" name="persona" id="w1-persona" required value="{{ $inmueble->persona }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-moneda">Mostrar</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" style="width: 100%">
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
																<span class="text-primary">monica.fernandez@grupogestiondiez.es</span>
																<br>
																<strong>Teléfono</strong>
																<span class="text-primary">012334567</span>
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
							<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar y Continuar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
							</div>
						</div>
						<br><br>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>