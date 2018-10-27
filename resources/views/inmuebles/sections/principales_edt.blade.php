<div class="col-xs-12">
	<div class="row">
		<div id="msj_edit" class="alert alert-success" role="alert" style="display:none">
			Se actualizaron los datos del inmueble.</strong>
		</div>
	</div>
	<div class="row">
		<div id="response" class="alert alert-danger" role="alert" style="display:none">
		</div>
		<form class="form-horizontal" action="{{ route('inmuebles.update',$inmueble->id) }}" method="post" id="principalInmueble" name="principalInmueble">
			<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
			<input name="numform" type="hidden" value = 0>
			<input name="idInmueble" id="idInmueble" type="hidden" value = {{$inmueble->id}}>
			<div class="tab-content">
				<div class="tab-pane active">
					<div class="col-md-12">
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Detalle del Inmueble</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label">Tipo de Inmueble</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="tipo_id" id="tipo_id">
											@foreach($tipos as $tipo)
												<option value="{{ $tipo->id }}" {{ $inmueble->tipo->id == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Categoría</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="categoria_id" id="categoria_id">
											@foreach($categorias as $categoria)
												<option value="{{ $categoria->id }}" {{ $inmueble->categoria->id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nombre }}</option>
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
												<input type="checkbox" value=0 id="obranueva_edt" name="obranueva">
											@endif
											<label for="obranueva" aria-expanded="false" aria-controls="obraNueva">Es Obra Nueva</label>
											<br>
										</div><br>
											<div class="collapse {{$inmueble->obranueva==1? 'in' : ''}}" id="obra-nueva">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-promocion">Promoción</label>
														<div class="col-md-6"> 
															<select class="esnueva" name="promocion_id" id="w1-promocion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																@if(count($promociones)>0)
																	@foreach($promociones as $promo)	
																		<option value="{{ $promo->id }}" {{ $promocion->id == $promo->id ? 'selected' : '' }}>{{ $promo->nombre }}</option>
																	@endforeach
																@else
																	<option value="">::Seleccionar::</option>
																	<option value="" disabled="disabled">-- No hay promociones --</option>
																@endif
															</select>
														</div>
													</div>
											</div>
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='adjbancaria'>
											@if($inmueble->adjbancaria == 1)
												<input type="checkbox" value=1 id="adjudicacionbancaria" name="adjbancaria" checked="checked">
											@else
												<input type="checkbox" value=0 id="adjudicacionbancaria" name="adjbancaria">
											@endif
											<label for="adjudicacionbancaria"  aria-expanded="false" aria-controls="adjudicacion">Adjudicación Bancaria</label>
										</div>
											<div class="collapse {{$inmueble->adjbancaria==1 ? 'in' : ''}}" id="adjudicacion">
													<div class="form-group">
														<label class="col-sm-4 control-label" for="w1-entidad">Entidad</label>
														<div class="col-md-6">
															<select data-plugin-selectTwo class="form-control populate" id="entidad_id" name="entidad_id" style="width: 100%">
																@foreach($entidades as $entidad)
																	<option value="{{ $entidad->id }}" {{ $inmueble->entidad_id == $entidad->id ? 'selected' : '' }}>{{ $entidad->nombre }}</option>
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
											<input type="date" class="form-control" name="fecha_alta" value="{{ $inmueble->fecha_alta }}">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label">Estado</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="estado" style="width: 100%">
												<option value="" {{ $inmueble->estado == '' ? 'selected' : '' }}>::Selecionar::</option>
												<option value="disponible" {{ $inmueble->estado == 'disponible' ? 'selected' : '' }}>Disponible</option>
												<option value="reservado" {{ $inmueble->estado == 'reservado' ? 'selected' : '' }}>Reservado</option>
												<option value="captacion" {{ $inmueble->estado == 'captacion' ? 'selected' : '' }}>Captación</option>
												<option value="nodisponible" {{ $inmueble->estado == 'nodisponible' ? 'selected' : '' }}>No disponible</option>
												<option value="enconstruccion" {{ $inmueble->estado == 'enconstruccion' ? 'selected' : '' }}>En construcción</option>
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
											@foreach($paises as $pais)
												<option value="{{ $pais->id }}" {{ $inmueble->pais->id == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="codigo_postal" id="w1-codigo-postal" value="{{ $inmueble->codigo_postal }}">
										<p>
											¿Dudas de tu código postal? <a href="www.correos.es">www.correos.es</a> 
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Provincia</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="provincia_id" id="provincia_id">
											@if($inmueble->provincia_id== null || $inmueble->provincia_id =="")
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($provincias as $provincia)
													<option value="{{ $provincia->id }}" {{ $inmueble->provincia_id == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre }}</option>
											@endforeach
										</select>
									</div>	
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Ciudad</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="ciudad_id" id="ciudad_id">
											@if($inmueble->ciudad->id== null || $inmueble->ciudad->id =="")
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($ciudades as $ciudad)
												<option value="{{ $ciudad->id }}" {{ $inmueble->ciudad->id == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-tipovia">Tipo de Vía</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="via_id" id="w1-tipovia" style="width: 100%">
											@if($inmueble->via->id== null || $inmueble->via->id =="")
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($vias as $via)
												<option value="{{ $via->id }}" {{ $inmueble->via->id == $via->id ? 'selected' : '' }}>{{ $via->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-calle">Calle</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="calle" id="w1-calle" value="{{ $inmueble->calle }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-4 control-label" for="w1-numero">No.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="numero" id="w1-numero" value="{{ $inmueble->numero }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-piso">Piso.</label>
									<div class="col-sm-7 col-md-3">
										<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso" style="width: 100%">
											@foreach($pisos as $key => $piso)
												<option value="{{ $piso }}" {{ $inmueble->piso == $piso ? 'selected' : '' }}>{{ $piso }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-escalera">Esc.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera" value="{{ $inmueble->escalera }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-puerta">Pta.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" value="{{ $inmueble->puerta }}">
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
										<input type="text" class="form-control input-sm" name="zona" id="w1-zona" value="{{ $inmueble->zona }}">
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
														<input type="number" class="form-control input-sm" name="superficie" id="w1-superficie" value="{{ $inmueble->superficie }}">
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
												<div class="collapse {{$inmueble->modalidad->venta==1? 'in' : ''}}" id="opcionventa">
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
												<div class="collapse {{$inmueble->modalidad->traspaso==1? 'in' : ''}}" id="opciontraspaso">
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
												<div class="collapse {{$inmueble->modalidad->compartir==1? 'in' : ''}}" id="opcioncompartir">
													<div class="alert alert-info">
														<div class="form-group">
															<div class="row">
																<label class="col-xs-4 control-label" for="periodicidad">Periodicidad</label>
																<div class="col-xs-8 col-sm-8 col-md-7 col-lg-7">
																	<select data-plugin-selectTwo class="form-control populate" id="periodicidad" name="periodicidad" style="width: 100%;">
																		<option value="Indiferente" {{ $inmueble->modalidad->periodicidad == 'Indiferente' ? 'selected' : '' }}>Indiferente</option>
																		<option value="Diario" {{ $inmueble->modalidad->periodicidad == 'Diario' ? 'selected' : '' }}>Diario</option>
																		<option value="Semana" {{ $inmueble->modalidad->periodicidad == 'Semana' ? 'selected' : '' }}>Semana</option>
																		<option value="Mes" {{ $inmueble->modalidad->periodicidad == 'Mes' ? 'selected' : '' }}>Mes</option>
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
														<input type="checkbox" value=1 id="alquiler_residencial" name="alquiler_residencial" aria-expanded="false" aria-controls="opcionalqres" checked="checked">
													@else
														<input type="checkbox" value=0 id="alquiler_residencial" name="alquiler_residencial"  aria-controls="opcionalqres">
													@endif
													<label for="alquilerresidencial">Alquiler Residencial &nbsp;&nbsp;(Mensual)</label>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-lg-9 col-lg-offset-3">
												<div class="collapse {{$inmueble->modalidad->alquiler_residencial==1? 'in' : ''}}" id="opcionalqres">
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
															<input type="hidden" value=0 name="opcion_compra">
															@if($inmueble->modalidad->opcion_compra == 1)
																<input type="checkbox" value=1 id="opcion_compra" name="opcion_compra" aria-expanded="false" aria-controls="alqresopcompra" checked="checked">
															@else
																<input type="checkbox" value=0 id="opcion_compra" name="opcion_compra" aria-expanded="false" aria-controls="alqresopcompra">
															@endif
															
															<label for="alqres_opcompra">Opción a Compra</label>
													</div><br><br>
													<div class="collapse {{$inmueble->modalidad->opcion_compra==1? 'in' : ''}}" id="alqresopcompra" >
														<div class="alert alert-info">
															<div class="form-group">
																<div class="row">
																	<label class="col-sm-4 control-label" for="alqresopcomp">Precio</label>
																	<div class="col-sm-6">
																		<div class="input-group mb-md">
																			<span class="input-group-addon">€</span>
																			<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="opcioncompraprecio" name="opcioncompraprecio" value="{{ $inmueble->modalidad->opcioncompraprecio }}">
																			<span class="input-group-addon ">.00</span>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<label class="col-sm-4 control-label" for="alqresopcomp2">Precio m<sup>2</sup></label>
																	<div class="col-sm-6">
																		<div class="input-group mb-md">
																			<span class="input-group-addon">€</span>
																			<input type="number" min=0 placeholder="0" class="form-control input-sm"  id="opcioncompraprecio2" name="opcioncompraprecio2" value="{{ $inmueble->modalidad->opcioncompraprecio2 }}">
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
													@if($inmueble->modalidad->alquiler_vacacional == 1)
														<input type="checkbox" value=1 id="alquiler_vacacional" name="alquiler_vacacional" aria-expanded="false" aria-controls="opcionalqvac" checked="checked">
													@else
														<input type="checkbox" value=0 id="alquiler_vacacional" name="alquiler_vacacional" aria-expanded="false" aria-controls="opcionalqvac">
													@endif
													<label for="alquiler_vacacional">Alquiler Vacacional</label>
												</div>
											</div>
											<div class="col-xs-12 ">
												<div class="collapse {{$inmueble->modalidad->alquiler_vacacional==1? 'in' : ''}}" id="opcionalqvac">
														<div class="form-group">
																<blockquote>
															<div class="row">
																	<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																		<input type="hidden" value=0 name="alqvac_dia">
																		@if($inmueble->modalidad->alqvac_dia == 1)
																			<input type="checkbox" value=1 id="alqvac_dia" name="alqvac_dia" aria-expanded="false" aria-controls="op-alqvacdia" checked="checked">
																		@else
																			<input type="checkbox" value=0 id="alqvac_dia" name="alqvac_dia" aria-expanded="false" aria-controls="op-alqvacdia">
																		@endif
																		<label for="alqvac_dia">Dia</label>
																	</div>
																	<div class="collapse {{$inmueble->modalidad->alqvac_dia==1? 'in' : ''}}" id="op-alqvacdia">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_dia_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_dia_p" name="alqvac_dia_p" value="{{$inmueble->modalidad->alqvac_dia_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_dia_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_dia_pm2" name="alqvac_dia_pm2" value="{{$inmueble->modalidad->alqvac_dia_pm2}}">
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
																	@if($inmueble->modalidad->alqvac_semana == 1)
																		<input type="checkbox" value=1 id="alqvac_semana" name="alqvac_semana" aria-expanded="false" aria-controls="op-alqvacsemana" checked="checked">
																	@else
																		<input type="checkbox" value=0 id="alqvac_semana" name="alqvac_semana" aria-expanded="false" aria-controls="op-alqvacsemana">
																	@endif
																	<label for="alqvac_semana">Semana</label>
																</div>
																<div class="collapse {{$inmueble->modalidad->alqvac_semana==1? 'in' : ''}}" id="op-alqvacsemana">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_semana_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_semana_p" name="alqvac_semana_p" value="{{$inmueble->modalidad->alqvac_semana_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_semana_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_semana_pm2" name="alqvac_semana_pm2" value="{{$inmueble->modalidad->alqvac_semana_pm2}}">
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
																	@if($inmueble->modalidad->alqvac_quincena == 1)
																		<input type="checkbox" value=1 id="alqvac_quincena" name="alqvac_quincena" aria-expanded="false" aria-controls="op-alqvacquincena" checked="checked">
																	@else
																		<input type="checkbox" value=0 id="alqvac_quincena" name="alqvac_quincena" aria-expanded="false" aria-controls="op-alqvacquincena">
																	@endif
																	<label for="alqvac_quincena">Quincena</label>
																</div>
																<div class="collapse {{$inmueble->modalidad->alqvac_quincena==1? 'in' : ''}}" id="op-alqvacquincena">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_quincena_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_quincena_p" name="alqvac_quincena_p" value="{{$inmueble->modalidad->alqvac_quincena_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_quincena_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_quincena_pm2" name="alqvac_quincena_pm2" value="{{$inmueble->modalidad->alqvac_quincena_p}}">
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
																	@if($inmueble->modalidad->alqvac_mes == 1)
																		<input type="checkbox" value=1 id="alqvac_mes" name="alqvac_mes" aria-expanded="false" aria-controls="op-alqvacmes" checked="checked">
																	@else
																		<input type="checkbox" value=0 id="alqvac_mes" name="alqvac_mes" aria-expanded="false" aria-controls="op-alqvacmes">
																	@endif
																	<label for="alqvac_mes">Mes</label>
																</div>
																<div class="collapse {{$inmueble->modalidad->alqvac_mes==1? 'in' : ''}}" id="op-alqvacmes">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_mes_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_mes_p" name="alqvac_mes_p" value="{{$inmueble->modalidad->alqvac_mes_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_mes_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_mes_pm2" name="alqvac_mes_pm2" value="{{$inmueble->modalidad->alqvac_mes_pm2}}">
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
																	@if($inmueble->modalidad->alqvac_temporada == 1)
																		<input type="checkbox" value=1 id="alqvac_temporada" name="alqvac_temporada" aria-expanded="false" aria-controls="op-alqvactemporada" checked="checked">
																	@else
																		<input type="checkbox" value=0 id="alqvac_temporada" name="alqvac_temporada" aria-expanded="false" aria-controls="op-alqvactemporada">
																	@endif
																	<label for="alqvac_temporada">Temporada (Precio para toda la temporada)</label>
																</div>
																<div class="collapse {{$inmueble->modalidad->alqvac_temporada==1? 'in' : ''}}" id="op-alqvactemporada">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_temporada_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_temporada_p" name="alqvac_temporada_p" value="{{$inmueble->modalidad->alqvac_temporada_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_temporada_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_temporada_pm2" name="alqvac_temporada_pm2" value="{{$inmueble->modalidad->alqvac_temporada_pm2}}">
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
																	@if($inmueble->modalidad->alqvac_anno == 1)
																		<input type="checkbox" value=1 id="alqvac_anno" name="alqvac_anno" aria-expanded="false" aria-controls="op-alqvacanno" checked="checked">
																	@else
																		<input type="checkbox" value=0 id="alqvac_anno" name="alqvac_anno" aria-expanded="false" aria-controls="op-alqvacanno">
																	@endif
																	<label for="alqvac_anno">Año</label>
																</div>
																<div class="collapse {{$inmueble->modalidad->alqvac_anno==1? 'in' : ''}}" id="op-alqvacanno">
																		<br>
																		<div class="alert alert-info">
																			<div class="form-group">
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_anno_p">Precio</label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_anno_p" name="alqvac_anno_p" value="{{$inmueble->modalidad->alqvac_anno_p}}">
																							<span class="input-group-addon ">.00</span>
																						</div>
																					</div>
																				</div>
																				<div class="row">
																					<label class="col-sm-4 control-label" for="alqvac_anno_pm2">Precio m<sup>2</sup></label>
																					<div class="col-sm-6">
																						<div class="input-group mb-md">
																							<span class="input-group-addon">€</span>
																							<input type="number" class="form-control input-sm"  id="alqvac_anno_pm2" name="alqvac_anno_pm2" value="{{$inmueble->modalidad->alqvac_anno_pm2}}">
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
											@if($inmueble->moneda == null)
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($monedas as $moneda)
												<option value="{{ $moneda }}" {{ $inmueble->moneda == $moneda ? 'selected' : '' }}>{{ $moneda }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<!--<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='ocultarprecio'>
											@if($inmueble->modalidad->ocultarprecio == 1)
												<input type="checkbox" value=1 id="alqvac_anno" name="alqvac_anno" aria-expanded="false" aria-controls="op-alqvacanno" checked="checked">
											@else
												<input type="checkbox" value=0 id="alqvac_anno" name="alqvac_anno" aria-expanded="false" aria-controls="op-alqvacanno">
											@endif
											<input type="checkbox" value=1 id="w1-ocultarprecio" name="ocultarprecio">
											<label for="w1-ocultarprecio" data-toggle="tooltip" data-placement="bottom" title="El precio visible en los anuncios despierta más interés entre los usuarios.">Ocultar precio en comunicaciones y publicaciones.</label>
										</div>
									</div>
								</div>-->
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-agua-caliente">Agua caliente sanitaria</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="agua_caliente" id="w1-agua-caliente">
											<option value="" {{ $inmueble->agua_caliente == '' || $inmueble->agua_caliente==null ? 'selected' : '' }}>::Selecionar::</option>
											<option value="Gas Natural" {{ $inmueble->agua_caliente == 'Gas Natural' ? 'selected' : '' }}>Gas Natural</option>
											<option value="Electricidad" {{ $inmueble->agua_caliente == 'Electricidad' ? 'selected' : '' }}>Electricidad</option>
											<option value="Gasoleo" {{ $inmueble->agua_caliente == 'Gasoleo' ? 'selected' : '' }}>Gasóleo</option>
											<option value="Butano" {{ $inmueble->agua_caliente == 'Butano' ? 'selected' : '' }}>Butano</option>
											<option value="Propano" {{ $inmueble->agua_caliente == 'Propano' ? 'selected' : '' }}>Propano</option>
											<option value="Solar" {{ $inmueble->agua_caliente == 'Solar' ? 'selected' : '' }}>Solar</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-anno-construccion">Año Contrucción</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" class="form-control" name="anio_contruccion" id="anio_contruccion" value="{{$inmueble->anio_contruccion}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-calefaccion">Calefacción</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="calefaccion" id="w1-calefaccion">
											<option value="" {{ $inmueble->calefaccion == '' || $inmueble->calefaccion==null ? 'selected' : '' }}>::Selecionar::</option>
											<option value="Gas Natural" {{ $inmueble->calefaccion == 'Gas Natural' ? 'selected' : '' }}>Gas Natural</option>
											<option value="Electricidad" {{ $inmueble->calefaccion == 'Electricidad' ? 'selected' : '' }}>Electricidad</option>
											<option value="Gasoleo" {{ $inmueble->calefaccion == 'Gasoleo' ? 'selected' : '' }}>Gasóleo</option>
											<option value="Butano" {{ $inmueble->calefaccion == 'Butano' ? 'selected' : '' }}>Butano</option>
											<option value="Propano" {{ $inmueble->calefaccion == 'Propano' ? 'selected' : '' }}>Propano</option>
											<option value="Solar" {{ $inmueble->calefaccion == 'Solar' ? 'selected' : '' }}>Solar</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-certificado-energetico">Certificado Energético</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="certificado_energetico" id="w1-calefaccion">
											<option value="" {{ $inmueble->certificado_energetico == '' || $inmueble->certificado_energetico==null ? 'selected' : '' }}>::Selecionar::</option>
											<option value="A" {{ $inmueble->certificado_energetico == 'A' ? 'selected' : '' }}>A</option>
											<option value="B" {{ $inmueble->certificado_energetico == 'B' ? 'selected' : '' }}>B</option>
											<option value="C" {{ $inmueble->certificado_energetico == 'C' ? 'selected' : '' }}>C</option>
											<option value="D" {{ $inmueble->certificado_energetico == 'D' ? 'selected' : '' }}>D</option>
											<option value="E" {{ $inmueble->certificado_energetico == 'E' ? 'selected' : '' }}>E</option>
											<option value="F" {{ $inmueble->certificado_energetico == 'F' ? 'selected' : '' }}>F</option>
											<option value="G" {{ $inmueble->certificado_energetico == 'G' ? 'selected' : '' }}>G</option>
											<option value="En tramite" {{ $inmueble->certificado_energetico == 'En tramite' ? 'selected' : '' }}>En trámite</option>
											<option value="Exento" {{ $inmueble->certificado_energetico == 'Exento' ? 'selected' : '' }}>Exento</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-conservacion">Conservación</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="conservacion" id="w1-conservacion">
											<option value="" {{ $inmueble->conservacion == '' || $inmueble->conservacion==null ? 'selected' : '' }}>::Selecionar::</option>
											<option value="Buena" {{ $inmueble->conservacion == 'Buena' ? 'selected' : '' }}>Buena</option>
											<option value="Muy Buena" {{ $inmueble->conservacion == 'Muy Buena' ? 'selected' : '' }}>Muy Buena</option>
											<option value="Excelente" {{ $inmueble->conservacion == 'Excelente' ? 'selected' : '' }}>Excelente</option>
											<option value="Regular" {{ $inmueble->conservacion == 'Regular' ? 'selected' : '' }}>Regular</option>
											<option value="Necesita Reforma" {{ $inmueble->conservacion == 'Necesita Reforma' ? 'selected' : '' }}>Necesita Reforma</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-aseos">Número de Aseos</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="num_aseos" id="w1-num-aseos" value="{{$inmueble->num_aseos}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-banos">Número de Baños</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="banos" id="w1-num-banos" value="{{$inmueble->banos}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-num-habitaciones">Número de Habitaciones</label>
									<div class="col-xs-12 col-md-7">
										<input type="number" min=0 class="form-control" name="habitaciones" id="w1-num-habitaciones" value="{{$inmueble->habitaciones}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-registro-turismo">Número de Registro de Turismo</label>
									<div class="col-xs-12 col-md-7">
										<input type="text" class="form-control" name="num_registro_turismo" id="w1-registro-turismo" value="{{$inmueble->num_registro_turismo}}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-orientacion">Orientación</label>
									<div class="col-xs-12 col-md-7">
										<select data-plugin-selectTwo class="form-control populate" name="orientacion" id="w1-orientacion">
											<option value="" {{ $inmueble->orientacion == '' || $inmueble->orientacion==null ? 'selected' : '' }}>::Selecionar::</option>
											<option value="noreste" {{ $inmueble->orientacion == 'noreste' ? 'selected' : '' }}>Noreste</option>
											<option value="oeste" {{ $inmueble->orientacion == 'oeste' ? 'selected' : '' }}>Oeste</option>
											<option value="norte" {{ $inmueble->orientacion == 'norte' ? 'selected' : '' }}>Norte</option>
											<option value="suroeste" {{ $inmueble->orientacion == 'suroeste' ? 'selected' : '' }}>Suroeste</option>
											<option value="este" {{ $inmueble->orientacion == 'este' ? 'selected' : '' }}>Este</option>
											<option value="sureste" {{ $inmueble->orientacion == 'sureste' ? 'selected' : '' }}>Sureste</option>
											<option value="noroeste" {{ $inmueble->orientacion == 'noroeste' ? 'selected' : '' }}>Noroeste</option>
											<option value="sur" {{ $inmueble->orientacion == 'sur' ? 'selected' : '' }}>Sur</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="observaciones">Observaciones</label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="observaciones" name="observaciones" value="{{$inmueble->observaciones}}"></textarea>
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
											@if($inmueble->interiores->aire_acondicionado == 1)
												<input type="checkbox" value=1 id="aire-acondicionado" name="aire_acondicionado" checked="checked">
											@else
												<input type="checkbox" value=0 id="aire-acondicionado" name="aire_acondicionado">
											@endif
											<label for="aire-acondicionado" aria-expanded="false" aria-controls="aire-acondicionado">Aire Acondicionado</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='amueblado'>
											@if($inmueble->interiores->amueblado == 1)
												<input type="checkbox" value=1 id="amueblado" name="amueblado" checked="checked">
											@else
												<input type="checkbox" value=0 id="amueblado" name="amueblado">
											@endif
											<label for="amueblado" aria-expanded="false" aria-controls="amueblado">Amueblado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='armarios'>
											@if($inmueble->interiores->armarios == 1)
												<input type="checkbox" value=1 id="armarios" name="armarios" checked="checked">
											@else
												<input type="checkbox" value=0 id="armarios" name="armarios">
											@endif
											<label for="armarios" aria-expanded="false" aria-controls="armarios">Armarios</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='calefaccion_int'>
											@if($inmueble->interiores->calefaccion_int == 1)
												<input type="checkbox" value=1 id="calefaccion_int" name="calefaccion_int" checked="checked">
											@else
												<input type="checkbox" value=0 id="calefaccion_int" name="calefaccion_int">
											@endif
											<label for="calefaccion_int" aria-expanded="false" aria-controls="calefaccion_int">Calefacción</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='cocina_equipada'>
											@if($inmueble->interiores->cocina_equipada == 1)
												<input type="checkbox" value=1 id="cocina_equipada" name="cocina_equipada" checked="checked">
											@else
												<input type="checkbox" value=0 id="cocina_equipada" name="cocina_equipada">
											@endif
											<label for="cocina-equipada" aria-expanded="false" aria-controls="cocina_equipada">Cocina Equipada</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='cocina_office'>
											@if($inmueble->interiores->cocina_office == 1)
												<input type="checkbox" value=1 id="cocina_office" name="cocina_office" checked="checked">
											@else
												<input type="checkbox" value=0 id="cocina_office" name="cocina_office">
											@endif
											<label for="cocina-office" aria-expanded="false" aria-controls="cocina_office">Cocina Office</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='domotica'>
											@if($inmueble->interiores->domotica == 1)
												<input type="checkbox" value=1 id="domotica" name="domotica" checked="checked">
											@else
												<input type="checkbox" value=0 id="domotica" name="domotica">
											@endif
											<label for="domotica" aria-expanded="false" aria-controls="domotica">Domótica</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='electrodomesticos'>
											@if($inmueble->interiores->electrodomesticos == 1)
												<input type="checkbox" value=1 id="electrodomesticos" name="electrodomesticos" checked="checked">
											@else
												<input type="checkbox" value=0 id="electrodomesticos" name="electrodomesticos">
											@endif
											<label for="electrodomesticos" aria-expanded="false" aria-controls="electrodomesticos">Electrodomésticos</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='gresceramica'>
											@if($inmueble->interiores->gresceramica == 1)
												<input type="checkbox" value=1 id="gresceramica" name="gresceramica" checked="checked">
											@else
												<input type="checkbox" value=0 id="gresceramica" name="gresceramica">
											@endif
											<label for="gresceramica" aria-expanded="false" aria-controls="gresceramica">Gres/Cerámica</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='horno'>
											@if($inmueble->interiores->horno == 1)
												<input type="checkbox" value=1 id="horno" name="horno" checked="checked">
											@else
												<input type="checkbox" value=0 id="horno" name="horno">
											@endif
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
											@if($inmueble->interiores->internet == 1)
												<input type="checkbox" value=1 id="internet" name="internet" checked="checked">
											@else
												<input type="checkbox" value=0 id="internet" name="internet">
											@endif
											<label for="internet" aria-expanded="false" aria-controls="internet">Internet</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='wifi'>
											@if($inmueble->interiores->wifi == 1)
												<input type="checkbox" value=1 id="wifi" name="wifi" checked="checked">
											@else
												<input type="checkbox" value=0 id="wifi" name="wifi">
											@endif
											<label for="wifi" aria-expanded="false" aria-controls="wifi">Wifi</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='lavadora'>
											@if($inmueble->interiores->lavadora == 1)
												<input type="checkbox" value=1 id="lavadora" name="lavadora" checked="checked">
											@else
												<input type="checkbox" value=0 id="lavadora" name="lavadora">
											@endif
											<label for="lavadora" aria-expanded="false" aria-controls="lavadora">Lavadora</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='microondas'>
											@if($inmueble->interiores->microondas == 1)
												<input type="checkbox" value=1 id="microondas" name="microondas" checked="checked">
											@else
												<input type="checkbox" value=0 id="microondas" name="microondas">
											@endif
											<label for="microondas" aria-expanded="false" aria-controls="microondas">Microondas</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='nevera'>
											@if($inmueble->interiores->nevera == 1)
												<input type="checkbox" value=1 id="nevera" name="nevera" checked="checked">
											@else
												<input type="checkbox" value=0 id="nevera" name="nevera">
											@endif
											<label for="nevera" aria-expanded="false" aria-controls="nevera">Nevera</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='no_amueblado'>
											@if($inmueble->interiores->no_amueblado == 1)
												<input type="checkbox" value=1 id="no_amueblado" name="no_amueblado" checked="checked">
											@else
												<input type="checkbox" value=0 id="no_amueblado" name="no_amueblado">
											@endif
											<label for="no_amueblado" aria-expanded="false" aria-controls="no_amueblado">No Amueblado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='parquet'>
											@if($inmueble->interiores->parquet == 1)
												<input type="checkbox" value=1 id="parquet" name="parquet" checked="checked">
											@else
												<input type="checkbox" value=0 id="parquet" name="parquet">
											@endif
											<label for="parquet" aria-expanded="false" aria-controls="parquet">Parquet</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='puerta_blindada'>
											@if($inmueble->interiores->puerta_blindada == 1)
												<input type="checkbox" value=1 id="puerta_blindada" name="puerta_blindada" checked="checked">
											@else
												<input type="checkbox" value=0 id="puerta_blindada" name="puerta_blindada">
											@endif
											<label for="puerta_blindada" aria-expanded="false" aria-controls="puerta_blindada">Puerta blindada</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='mascotas'>
											@if($inmueble->interiores->mascotas == 1)
												<input type="checkbox" value=1 id="mascotas" name="mascotas" checked="checked">
											@else
												<input type="checkbox" value=0 id="mascotas" name="mascotas">
											@endif
											<label for="mascotas" aria-expanded="false" aria-controls="mascotas">Se aceptan mascotas</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='suite_con_bano'>
											@if($inmueble->interiores->suite_con_bano == 1)
												<input type="checkbox" value=1 id="suite_con_bano" name="suite_con_bano" checked="checked">
											@else
												<input type="checkbox" value=0 id="suite_con_bano" name="suite_con_bano">
											@endif
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
											@if($inmueble->interiores->lavadero == 1)
												<input type="checkbox" value=1 id="lavadero" name="lavadero" checked="checked">
											@else
												<input type="checkbox" value=0 id="lavadero" name="lavadero">
											@endif
											<label for="lavadero" aria-expanded="false" aria-controls="lavadero">Lavadero</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='television'>
											@if($inmueble->interiores->television == 1)
												<input type="checkbox" value=1 id="television" name="television" checked="checked">
											@else
												<input type="checkbox" value=0 id="television" name="television">
											@endif
											<label for="television" aria-expanded="false" aria-controls="television">Televisión</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='sauna'>
											@if($inmueble->interiores->sauna == 1)
												<input type="checkbox" value=1 id="sauna" name="sauna" checked="checked">
											@else
												<input type="checkbox" value=0 id="sauna" name="sauna">
											@endif
											<label for="sauna" aria-expanded="false" aria-controls="sauna">Sauna</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina'>
											@if($inmueble->interiores->piscina == 1)
												<input type="checkbox" value=1 id="piscina" name="piscina" checked="checked">
											@else
												<input type="checkbox" value=0 id="piscina" name="piscina">
											@endif
											<label for="piscina" aria-expanded="false" aria-controls="piscina">Piscina</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='salida_de_humos'>
											@if($inmueble->interiores->salida_de_humos == 1)
												<input type="checkbox" value=1 id="salida_de_humos" name="salida_de_humos" checked="checked">
											@else
												<input type="checkbox" value=0 id="salida_de_humos" name="salida_de_humos">
											@endif
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
											@if($inmueble->exteriores->balcones == 1)
												<input type="checkbox" value=1 id="balcones" name="balcones" checked="checked">
											@else
												<input type="checkbox" value=0 id="balcones" name="balcones">
											@endif
											<label for="balcones" aria-expanded="false" aria-controls="balcones">Balcones</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='vista_al_mar'>
											@if($inmueble->exteriores->vista_al_mar == 1)
												<input type="checkbox" value=1 id="vista_al_mar" name="vista_al_mar" checked="checked">
											@else
												<input type="checkbox" value=0 id="vista_al_mar" name="vista_al_mar">
											@endif

											<label for="vista_al_mar" aria-expanded="false" aria-controls="vista_al_mar">Con vistas al mar</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='jardin_privado'>
											@if($inmueble->exteriores->jardin_privado == 1)
												<input type="checkbox" value=1 id="jardin_privado" name="jardin_privado" checked="checked">
											@else
												<input type="checkbox" value=0 id="jardin_privado" name="jardin_privado">
											@endif
											<label for="jardin_privado" aria-expanded="false" aria-controls="jardin_privado">Jardín Privado</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='patio'>
											@if($inmueble->exteriores->patio == 1)
												<input type="checkbox" value=1 id="patio" name="patio" checked="checked">
											@else
												<input type="checkbox" value=0 id="patio" name="patio">
											@endif
											<label for="patio" aria-expanded="false" aria-controls="patio">Patio</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina_ext'>
											@if($inmueble->exteriores->piscina_ext == 1)
												<input type="checkbox" value=1 id="piscina_ext" name="piscina_ext" checked="checked">
											@else
												<input type="checkbox" value=0 id="piscina_ext" name="piscina_ext">
											@endif
											<label for="piscina_ext" aria-expanded="false" aria-controls="piscina_ext">Piscina</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina_comunitaria'>
											@if($inmueble->exteriores->piscina_comunitaria == 1)
												<input type="checkbox" value=1 id="piscina_comunitaria" name="piscina_comunitaria" checked="checked">
											@else
												<input type="checkbox" value=0 id="piscina_comunitaria" name="piscina_comunitaria">
											@endif
											<label for="piscina_comunitaria" aria-expanded="false" aria-controls="piscina_comunitaria">Piscina comunitaria</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='primera_linea_mar'>
											@if($inmueble->exteriores->primera_linea_mar == 1)
												<input type="checkbox" value=1 id="primera_linea_mar" name="primera_linea_mar" checked="checked">
											@else
												<input type="checkbox" value=0 id="primera_linea_mar" name="primera_linea_mar">
											@endif
											<label for="primera_linea_mar" aria-expanded="false" aria-controls="primera_linea_mar">Primera línea de mar</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='terraza'>
											@if($inmueble->exteriores->terraza == 1)
												<input type="checkbox" value=1 id="terraza" name="terraza" checked="checked">
											@else
												<input type="checkbox" value=0 id="terraza" name="terraza">
											@endif
											<label for="terraza" aria-expanded="false" aria-controls="terraza">Terraza</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='vista_montana'>
											@if($inmueble->exteriores->vista_montana == 1)
												<input type="checkbox" value=1 id="vista_montana" name="vista_montana" checked="checked">
											@else
												<input type="checkbox" value=0 id="vista_montana" name="vista_montana">
											@endif
											<label for="vista_montana" aria-expanded="false" aria-controls="vista_montana">Vista a la montaña</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_comunitaria'>
											@if($inmueble->exteriores->zona_comunitaria == 1)
												<input type="checkbox" value=1 id="zona_comunitaria" name="zona_comunitaria" checked="checked">
											@else
												<input type="checkbox" value=0 id="zona_comunitaria" name="zona_comunitaria">
											@endif
											<label for="zona_comunitaria" aria-expanded="false" aria-controls="zona_comunitaria">Zona comunitaria</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_deportiva'>
											@if($inmueble->exteriores->zona_deportiva == 1)
												<input type="checkbox" value=1 id="zona_deportiva" name="zona_deportiva" checked="checked">
											@else
												<input type="checkbox" value=0 id="zona_deportiva" name="zona_deportiva">
											@endif
											<input type="checkbox" value=1 id="zona_deportiva" name="zona_deportiva">
											<label for="zona_deportiva" aria-expanded="false" aria-controls="zona_deportiva">Zona deportiva</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='zona_infantil'>
											@if($inmueble->exteriores->zona_infantil == 1)
												<input type="checkbox" value=1 id="zona_infantil" name="zona_infantil" checked="checked">
											@else
												<input type="checkbox" value=0 id="zona_infantil" name="zona_infantil">
											@endif
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
											@if($inmueble->finca->ascensor == 1)
												<input type="checkbox" value=1 id="ascensor" name="ascensor" checked="checked">
											@else
												<input type="checkbox" value=0 id="ascensor" name="ascensor">
											@endif
											<input type="checkbox" value=1 id="ascensor" name="ascensor">
											<label for="ascensor" aria-expanded="false" aria-controls="ascensor">Ascensor</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='conserje'>
											@if($inmueble->finca->conserje == 1)
												<input type="checkbox" value=1 id="conserje" name="conserje" checked="checked">
											@else
												<input type="checkbox" value=0 id="conserje" name="conserje">
											@endif
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
											@if($inmueble->finca->energia_solar == 1)
												<input type="checkbox" value=1 id="energia_solar" name="energia_solar" checked="checked">
											@else
												<input type="checkbox" value=0 id="energia_solar" name="energia_solar">
											@endif
											<label for="energia_solar" aria-expanded="false" aria-controls="energia_solar">Energía Solar</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='garage_privado'>
											@if($inmueble->finca->garage_privado == 1)
												<input type="checkbox" value=1 id="garage_privado" name="garage_privado" checked="checked">
											@else
												<input type="checkbox" value=0 id="garage_privado" name="garage_privado">
											@endif
											<label for="garage_privado" aria-expanded="false" aria-controls="garage_privado">Garaje Privado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='parking_comunitario'>
											@if($inmueble->finca->parking_comunitario == 1)
												<input type="checkbox" value=1 id="parking_comunitario" name="parking_comunitario" checked="checked">
											@else
												<input type="checkbox" value=0 id="parking_comunitario" name="parking_comunitario">
											@endif
											<label for="parking_comunitario" aria-expanded="false" aria-controls="parking_comunitario">Parking comunitario</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='trastero'>
											@if($inmueble->finca->trastero == 1)
												<input type="checkbox" value=1 id="trastero" name="trastero" checked="checked">
											@else
												<input type="checkbox" value=0 id="trastero" name="trastero">
											@endif
											<label for="trastero" aria-expanded="false" aria-controls="trastero">Trastero</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='video_portero'>
											@if($inmueble->finca->video_portero == 1)
												<input type="checkbox" value=1 id="video_portero" name="video_portero" checked="checked">
											@else
												<input type="checkbox" value=0 id="video_portero" name="video_portero">
											@endif
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
											@if($inmueble->exteriores->solo_chicas == 1)
												<input type="checkbox" value=1 id="solo_chicas" name="solo_chicas" checked="checked">
											@else
												<input type="checkbox" value=0 id="solo_chicas" name="solo_chicas">
											@endif
											<label for="solo_chicas" aria-expanded="false" aria-controls="solo_chicas">Sólo chicas</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='solo_chicos'>
											@if($inmueble->exteriores->solo_chicos == 1)
												<input type="checkbox" value=1 id="solo_chicos" name="solo_chicos" checked="checked">
											@else
												<input type="checkbox" value=0 id="solo_chicos" name="solo_chicos">
											@endif
											<label for="solo_chicos" aria-expanded="false" aria-controls="solo_chicos">Sólo chicos</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4 col-md-offset-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='solo_no_fumadores'>
											@if($inmueble->exteriores->solo_no_fumadores == 1)
												<input type="checkbox" value=1 id="solo_no_fumadores" name="solo_no_fumadores" checked="checked">
											@else
												<input type="checkbox" value=0 id="solo_no_fumadores" name="solo_no_fumadores">
											@endif
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
											@if($inmueble->exteriores->gastos_comunidad == 1)
												<input type="checkbox" value=1 id="gastos_comunidad" name="gastos_comunidad" checked="checked">
											@else
												<input type="checkbox" value=0 id="gastos_comunidad" name="gastos_comunidad">
											@endif
											<label for="gastos_comunidad" aria-expanded="false" aria-controls="gastos_comunidad">Gastos comunidad incluidas</label>
											<br>
										</div>
									</div>

									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='menos_2_mese_fianza'>
											@if($inmueble->exteriores->menos_2_mese_fianza == 1)
												<input type="checkbox" value=1 id="menos_2_mese_fianza" name="menos_2_mese_fianza" checked="checked">
											@else
												<input type="checkbox" value=0 id="menos_2_mese_fianza" name="menos_2_mese_fianza">
											@endif
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
										<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id" style="width: 100%">
											@foreach($idiomas as $idioma)
												<option value="{{ $idioma->id }}" {{ $inmueble->idioma_id== $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
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
										<textarea class="form-control" rows="3" id="descripcion_extendida" name="descripcion_extendida" data-toggle="tooltip" data-placement="bottom" title="La descripción debe ser completa pero no demasiado larga. No incluyas características del inmueble que ya aparecen en el detalle y evita el exceso de mayúsculas.">{{ $inmueble->descripcion_extendida}}</textarea>
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
														<option value="{{ $idioma->id }}" {{ $inmueble->idioma_id2== $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
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
										<input type="text" class="form-control input-sm" name="persona" id="w1-persona" value="{{ $inmueble->persona }}">
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
													@if(count($agencia))
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
													@endif
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
							<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Editar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
							</div>
						</div>
						<br><br>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>