<!-- INICIO ACORDIONES -->
<div class="panel-group" id="accordion">
	<!-- ACORDION CALIDADES-->
	<div id="acordion-calidades" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-calidades">
					<i class="fa fa-star"></i> CALIDADES
				</a>
			</h4>
		</div>
		<div id="contenido-calidades" class="accordion-body collapse in">
			<div class="panel-body">
				<div id="msj_form_calidades" class="alert alert-success" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Calidades"</strong>
				</div>
				<form class="form-horizontal extras" id="form-calidades" action="{{ route('extras.update', 0) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input class="extras-inmu-id" name="inmueble_id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_calidades">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-12 col-md-4 control-label" for="w1-calidades">Calidad</label>
								<div class="col-xs-12 col-md-8">
									<select name="calidades" id="w1-calidades" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Baja">Baja</option>
										<option value="Buena">Buena</option>
										<option value="Escasa">Escasa</option>
										<option value="Lujo">Lujo</option>
										<option value="Muy Buena">Muy Buena</option>
										<option value="Normal">Normal</option>
										<option value="Superlujo">Superlujo</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-estado_aseos">Estado Aseos</label>
								<div class="col-xs-12 col-md-8">
									<select name="estado_aseos" id="w1-estado_aseos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Buen estado">Buen estado</option>
										<option value="Necesita Reforma">Necesita Reforma</option>
										<option value="Aseo de origen">Aseo de origen</option>
										<option value="Nuevo">Nuevo</option>
										<option value="Reformado">Reformado</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-12 col-md-4 control-label" for="w1-estado-banos">Estado Baños</label>
								<div class="col-xs-12 col-md-8">
									<select name="estado_banos" id="w1-estado-banos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Buen estado">Buen estado</option>
										<option value="Necesita Reforma">Necesita Reforma</option>
										<option value="de origen">Baño de origen</option>
										<option value="Nuevo">Nuevo</option>
										<option value="Reformado">Reformado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
									<label class="col-sm-12 col-md-4 control-label" for="w1-cocina">Estado Cocina</label>
									<div class="col-xs-12 col-md-8">
										<select name="estado_cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Buen estado">Buen estado</option>
											<option value="Necesita Reforma">Necesita Reforma</option>
											<option value="Cocina de origen">Cocina de origen</option>
											<option value="Nueva">Nueva</option>
											<option value="Reformada">Reformada</option>
										</select>
									</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-12 col-md-4 control-label" for="w1-edificio">Estado Edificio</label>
								<div class="col-xs-12 col-md-8">
									<select name="estado_edificio" id="w1-edificio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Buen estado">Buen estado</option>
										<option value="Necesita Reforma">Necesita Reforma</option>
										<option value="En ruina">En ruina</option>
										<option value="Nuevo">Nuevo</option>
										<option value="Reformado">Reformado</option>
										<option value="Rehabilitado">Rehabilitado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-12 col-md-4 control-label" for="w1-tipo-edificio">Tipo Edificio</label>
								<div class="col-xs-12 col-md-8">
									<select name="tipo_edificio" id="w1-tipo-edificio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Clásico">Clásico</option>
										<option value="Diseño">Diseño</option>
										<option value="Moderno">Moderno</option>
										<option value="Premiado">Premiado</option>
										<option value="Regio">Regio</option>
										<option value="Representativo">Representativo</option>
										<option value="Señorial">Señorial</option>
										<option value="Singular">Singular</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">	
						<div class="form-group">
							<label class="col-xs-12 col-md-2 control-label" for="w1-obs-calidades">Observaciones</label>
							<div class="col-md-10">
								<textarea name="obs_calidades" class="form-control" rows="3" id="w1-obs-calidades"></textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_calidades" data-next="contenido-superficies" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
								</div>
						</div>
							<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- SUPERFICIES Y DISTRIBUCIÓN-->
	<div id="acordion-superficies" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-superficies">
					<i class="fa fa-cubes" aria-hidden="true"></i> SUPERFICIES Y DISTRIBUCIÓN
				</a>
			</h4>
		</div>
		<div id="contenido-superficies" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_superficies" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Superficies y Distribución"</strong>
				</div>
				<form class="form-horizontal extras" id="form-superfices" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_superficies">
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-altura">Altura real</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-altura" type="number" min=0 name="altura" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-suites">Suites</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-suites" type="number" min=0 name="num_suites" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-superficie">Superficie útil</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-superficie" type="number" min=0 name="sup_util" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-cocina">Superficie cocina</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-cocina" type="number" min=0 name="sup_cocina" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-edificada">Superficie edificada</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-edificada" type="number" min=0 name="sup_edificada" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-salon">Superficie salón</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-salon" type="number" min=0 name="sup_salon" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-terrazas">Superficie terrazas</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-terrazas" type="number" min=0 name="sup_terrazas" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-habdobles">Hab. Dobles</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-habdobles" type="number" min=0 name="num_hab_dobles" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-habindividuaes">Hab. Individuales</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-habindividuaes" type="number" min=0 name="num_hab_individuales" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">
						<div class="form-group">
							<label class="col-md-2 control-label" for="obs_superficies">Observaciones</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" name="obs_superficies" id="obs_superficies"></textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_superficies" data-next="contenido-carpinteria" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
								</div>
						</div>
							<br><br>
					</div>
			</form>
			</div>
		</div>
	</div>
	<!-- CARPINTERIA-->
	<div id="acordion-carpinteria" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-carpinteria">
					<img src="{{ asset('images/icons/carpinteria.png') }}" alt="" width="20px"> CARPINTERÍA
				</a>
			</h4>
		</div>
		<div id="contenido-carpinteria" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_carpinteria" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Carpintería"</strong>
				</div>
				<form class="form-horizontal extras" id="form-carpinteria" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_carpinteria">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-carp-exterior">Carpintería Exterior</label>
								<div class="col-xs-12 col-md-8">
									<select name="carp_exterior" id="w1-carp-exterior" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value=Aluminio"">Aluminio</option>
										<option value="Aluminio Lacado">Aluminio Lacado</option>
										<option value="Hierro">Hierro</option>
										<option value="Madera">Madera</option>
										<option value="Madera Barnizada">Madera Barnizada</option>
										<option value="Madera Noble">Madera Noble</option>
										<option value="Madera Pintada">Madera Pintada</option>
										<option value="Madera Teka">Madera Teka</option>
										<option value="PVC">PVC</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-carp-interior">Carpintería Interior</label>
								<div class="col-xs-12 col-md-8">
									<select name="carp_interior" id="w1-carp-interior" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Aluminio">Aluminio</option>
										<option value="Aluminio Lacado">Aluminio Lacado</option>
										<option value="Hierro">Hierro</option>
										<option value="Madera">Madera</option>
										<option value="Madera Barnizada">Madera Barnizada</option>
										<option value="Madera Embero">Madera Embero</option>
										<option value="Madera Haya">Madera Haya</option>
										<option value="Madera Lacada">Madera Lacada</option>
										<option value="Madera Noble">Madera Noble</option>
										<option value="Madera Pintada">Madera Pintada</option>
										<option value="Madera Sapelly">Madera Sapelly</option>
										<option value="Madera Teka">Madera Teka</option>
										<option value="PVC">PVC</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-puerta-principal">Puerta Principal</label>
								<div class="col-xs-12 col-md-8">
									<select id="w1-puerta-principal" name="puerta_principal" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Cuarterones">Cuarterones</option>
										<option value="Hierro">Hierro</option>
										<option value="Seguridad">Seguridad</option>
										<option value="Vidrio">Vidrio</option>
										<option value="Enrejada">Enrejada</option>
										<option value="Mazisa">Mazisa</option>
										<option value="Madera">Madera</option>
										<option value="Mixta">Mixta</option>
										<option value="Normal">Normal</option>
										<option value="Reforzada">Reforzada</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-puertas-interiores">Puertas Interiores</label>
								<div class="col-xs-12 col-md-8">
									<select name="puertas_interiores" id="w1-puertas-interiores" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Aluminio Lacado">Aluminio Lacado</option>
										<option value="Correderas">Correderas</option>
										<option value="Cristal/Madera">Cristal/Madera</option>
										<option value="Cuarterón">Cuarterón</option>
										<option value="Embero">Embero</option>
										<option value="Etimoe">Etimoe</option>
										<option value="Inglesa">Inglesa</option>
										<option value="Nuevas">Nuevas</option>
										<option value="Rústicas">Rústicas</option>
										<option value="Sapelly">Sapelly</option>
										<option value="Tapizadas">Tapizadas</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-md-6 hidden-lg"></div>
						<div class="col-xs-12 col-md-6 col-lg-6">
							<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-ventanas">Ventanas</label>
									<div class="col-xs-12 col-md-8">
										<select name="ventanas" id="w1-ventanas" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Aluminio">Aluminio</option>
											<option value="Climalit">Climalit</option>
											<option value="Cuarterones">Cuarterones</option>
											<option value="Persianas">Persianas</option>
											<option value="Rejas">Rejas</option>
											<option value="Doble cristal">Doble cristal</option>
											<option value="Madera">Madera</option>
											<option value="PVC">PVC</option>
										</select>
									</div>
							</div>
						</div>
						<div class="hidden-xs hidden-lg">
							<br><br>
						</div>
						<div class="col-xs-12 col-md-6 col-lg-3">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-armarios">Armarios</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-armarios" min=0 type="number" name="num_armarios" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6 col-lg-3">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-persianas">Persianas</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-persianas" min=0 type="number" name="persianas" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">
						<div class="form-group">
							<label class="col-md-2 control-label" for="w1-obsercarpinteria">Observaciones</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" id="w1-obsercarpinteria" name="obs_carpinteria"></textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_carpinteria" data-next="contenido-acabados" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
								</div>
						</div>
							<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ACABADOS -->
	<div id="acordion-acabados" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-acabados">
					<img src="{{ asset('images/icons/acabados.png') }}" alt="" width="20px"> ACABADOS
				</a>
			</h4>
		</div>
		<div id="contenido-acabados" class="accordion-body collapse">
			<div class="panel-body">
				<div class="panel-body">
					<div id="msj_form_acabados" class="alert alert-success alert-dismissible" role="alert" style="display:none">
						Se guardaron los datos de <strong>"Acabados"</strong>
					</div>
					<form class="form-horizontal extras" id="form-acabados" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
						<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
						<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
						<input name="form_seccion" type="hidden" value="form_acabados">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-acabado-paredes">Acabado Paredes</label>
									<div class="col-xs-12 col-md-8">
										<select name="acabados_paredes" id="w1-acabado-paredes" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Corcho">Corcho</option>
											<option value="Estuco">Estuco</option>
											<option value="Estuco Veneciano">Estuco Veneciano</option>
											<option value="Gotele">Gotele</option>
											<option value="Madera">Madera</option>
											<option value="Moqueta">Moqueta</option>
											<option value="Papel">Papel</option>
											<option value="Acabado">Acabado</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-paredes-bannos">Paredes Baños</label>
									<div class="col-xs-12 col-md-8">
										<select name="paredes_banos" id="w1-paredes-bannos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Alicatado Ceramico">Alicatado Cerámico</option>
											<option value="Gresite">Gresite</option>
											<option value="Madera">Madera</option>
											<option value="Marmol">Marmol</option>
											<option value="Pintura Plastica">Pintura Plástica</option>
											<option value="Yeso">Yeso</option>
										</select>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-paredes-cocina">Paredes Cocina</label>
									<div class="col-xs-12 col-md-8">
										<select name="paredes_cocina" id="w1-paredes-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Alicatado Ceramico">Alicatado Cerámico</option>
											<option value="Madera">Madera</option>
											<option value="Marmol">Marmol</option>
											<option value="Pintura Plastica">Pintura Plástica</option>
											<option value="Yeso">Yeso</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-suelos">Suelos</label>
									<div class="col-xs-12 col-md-8">
										<select name="suelos" id="w1-suelos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Baldosa">Baldosa</option>
											<option value="Baldosa Rustica">Baldosa Rústica</option>
											<option value="Ceramico">Cerámico</option>
											<option value="Corcho">Corcho</option>
											<option value="Gres">Gres</option>
											<option value="Madera">Madera</option>
											<option value="Marmol">Mármol</option>
											<option value="Tarima">Tarima</option>
											<option value="Terrazo">Terrazo</option>
											<option value="Gresite">Gresite</option>
											<option value="Linoleo">Linóleo</option>
											<option value="Moqueta">Moqueta</option>
											<option value="Mosaico">Mosaico</option>
											<option value="Porcelanato">Porcelanato</option>
										</select>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-suelos-bannos">Suelos Baños</label>
									<div class="col-xs-12 col-md-8">
										<select name="suelos_banos" id="w1-suelos-bannos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Baldosa">Baldosa</option>
											<option value="Ceramico">Cerámico</option>
											<option value="Corcho">Corcho</option>
											<option value="Gres">Gres</option>
											<option value="Madera">Madera</option>
											<option value="Marmol">Mármol</option>
											<option value="Parquet">Parquet</option>
											<option value="Terrazo">Terrazo</option>
											<option value="Gresite">Gresite</option>
											<option value="Linoleo">Linóleo</option>
											<option value="Mosaico">Mosaico</option>
											<option value="Porcelanato">Porcelanato</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-suelos-cocina">Suelos Cocina</label>
									<div class="col-xs-12 col-md-8">
										<select name="suelos_cocina" id="w1-suelos-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Baldosa">Baldosa</option>
											<option value="Ceramico">Cerámico</option>
											<option value="Corcho">Corcho</option>
											<option value="Gres">Gres</option>
											<option value="Madera">Madera</option>
											<option value="Marmol">Mármol</option>
											<option value="Parquet">Parquet</option>
											<option value="Terrazo">Terrazo</option>
											<option value="Gresite">Gresite</option>
											<option value="Linoleo">Linóleo</option>
											<option value="Mosaico">Mosaico</option>
											<option value="Porcelanato">Porcelanato</option>
										</select>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-techos">Techos</label>
									<div class="col-xs-12 col-md-8">
										<select name="techo" id="w1-techos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Altillos en Techo">Altillos en Techo</option>
											<option value="Falso Techo">Falso Techo</option>
											<option value="Cielo Raso">Cielo Raso</option>
											<option value="Techo de Bobeda">Techo de Bobeda</option>
											<option value="Lucido Yeso">Lucido Yeso</option>
											<option value="Placas Registrables">Placas Registrables</option>
											<option value="Techos Altos">Techos Altos</option>
											<option value="Artesonados">Artesonados</option>
											<option value="Madera">Madera</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-tipos-paredes">Tipos de Paredes</label>
									<div class="col-xs-12 col-md-8">
										<select name="paredes" id="w1-tipos-paredes" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" selected>::Seleccionar::</option>
											<option value="Hormigon">Hormigon</option>
											<option value="Ladrillo">Ladrillo</option>
											<option value="Pladur">Pladur</option>
											<option value="Tabique">Tabique</option>
										</select>
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-banneras">Bañeras</label>
									<div class="col-xs-12 col-md-8">
										<input id="w1-banneras" type="text" name="banneras" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-griferia">Griferia</label>
									<div class="col-xs-12 col-md-8">
										<input id="w1-griferia" type="text" name="griferia" class="form-control">
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-plato-duchas">Plato de ducha</label>
									<div class="col-xs-12 col-md-8 ">
										<input id="w1-plato-duchas" type="text" name="plato_duchas" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-sanitarios">Sanitarios</label>
									<div class="col-xs-12 col-md-8 ">
										<input id="w1-sanitarios" type="text" name="sanitarios" class="form-control">
									</div>
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<label class="col-xs-12 col-md-2 control-label" for="w1-obs-acabados">Observaciones</label>
							<div class="col-xs-12 col-md-10">
								<textarea class="form-control" rows="3" id="w1-obs-acabados" name="obs_acabados"></textarea>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
									<div class="col-xs-2"></div>
									<div class="col-xs-4">
									<button type="button" data-id="form_acabados" data-next="contenido-instalaciones" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
									</div>
							</div>
								<br><br>
						</div>
					</form>
					</div>
			</div>
		</div>
	</div>
	<!-- INSTALACIONES Y SUMINISTROS -->
	<div id="acordion-instalaciones" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-instalaciones">
					<img src="{{ asset('images/icons/suministros.png') }}" alt="" width="23px"> INSTALACIONES Y SUMINISTROS
				</a>
			</h4>
		</div>
		<div id="contenido-instalaciones" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_instalaciones" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Instalaciones y Suministros"</strong>
				</div>
				<form class="form-horizontal extras" id="form-instalaciones" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_instalaciones">
					<div class="row">
						<div class="col-xs-1"></div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type='hidden' value=0 name='agua'>
										<input type="checkbox" value=1 id="agua" name="agua"> Agua
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='gas'>
											<input type="checkbox" value=1 id="gas" name="gas"> Gas
										</label>
									</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='telefono'>
											<input type="checkbox" value=1 id="telefono" name="telefono">Teléfono
										</label>
									</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='tvyfm'>
											<input type="checkbox" value=1 id="tvyfm" name="tvyfm">Tv y fm
										</label>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-agua-caliente">Agua Caliente</label>
								<div class="col-md-8">
									<select name="agua_caliente" id="w1-agua-caliente" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Gas Butano">Gas Butano</option>
										<option value="Gas Natural">Gas Natural</option>
										<option value="Gas Propano">Gas Propano</option>
										<option value="No tiene Gas">No tiene Gas</option>
										<option value="Termo-Electrico">Termo-Electrico</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-cocina">Cocina</label>
								<div class="col-md-8">
									<select name="cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Pequena">Pequeña</option>
										<option value="Americana">Americana</option>
										<option value="Amueblada">Amueblada</option>
										<option value="Con Armarios">Con Armarios</option>
										<option value="Formica">Formica</option>
										<option value="Francesa">Francesa</option>
										<option value="Kitchenette">Kitchenette</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-electricidad">Electricidad</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-electricidad" type="text" name="electricidad" class="form-control" placeholder="">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-electrodomesticos">Electrodomésticos</label>
								<div class="col-md-8">
									<select id="electrodomesticos" id="w1-electrodomesticos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Calentador de Agua">Calentador de Agua</option>
										<option value="Cocina">Cocina</option>
										<option value="Cocina de Gas">Cocina de Gas</option>
										<option value="Cocina Electrica">Cocina Eléctrica</option>
										<option value="Cocina Vitroceramica">Cocina Vitrocerámica</option>
										<option value="Congelador">Congelador</option>
										<option value="Equipo de Musica">Equipo de Musica</option>
										<option value="Frigorifico">Frigorifico</option>
										<option value="Hilo/Ambiente musical">Hilo/Ambiente musical</option>
										<option value="Horno de Gas">Horno de Gas</option>
										<option value="Horno Electrico">Horno Eléctrico</option>
										<option value="Lavavajillas">Lavavajillas</option>
										<option value="Muchos electrodomesticos">Muchos electrodomésticos</option>
										<option value="Secadora">Secadora</option>
										<option value="Triturador Basura">Triturador Basura</option>
										<option value="Video">Video</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-equipamientos">Equipamientos</label>
								<div class="col-md-8">
									<select name="equipamientos" id="w1-equipamientos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Antena TV Colectiva">Antena TV Colectiva</option>
										<option value="Antena TV Parabolica">Antena TV Parabólica</option>
										<option value="Auditorio">Auditorio</option>
										<option value="Centralita Telefonos">Centralita Telefonos</option>
										<option value="Electricidad Instalada">Electricidad Instalada</option>
										<option value="Hilo Musical/Musica Ambiental">Hilo Musical/Música Ambiental</option>
										<option value="Lineas Digitales">Líneas Digitales</option>
										<option value="Lineas Telefono Analogicas">Lineas Teléfono Analógicas</option>
										<option value="Megafonia">Megafonia</option>
										<option value="Musica Ambiente">Música Ambiente</option>
										<option value="Portero Electronico">Portero Electrónico</option>
										<option value="Red Datos">Red Datos</option>
										<option value="Red Datos Perimetral">Red Datos Perimetral</option>
										<option value="Sala de Juntas">Sala de Juntas</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-fontaneria">Fontanería</label>
								<div class="col-md-8">
									<input id="w1-fontaneria" type="text" name="fontaneria" class="form-control" placeholder="">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-iluminacion">Iluminación</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-iluminacion" type="text" name="iluminacion" class="form-control" placeholder="">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-instalaciones">Instalaciones</label>
								<div class="col-md-8">
									<select name="instalaciones" id="w1-instalaciones" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="instalaciones">instalaciones</option>
										<option value="Agua Propia">Agua Propia</option>
										<option value="Aire Comprimido">Aire Comprimido</option>
										<option value="Caja Fuerte">Caja Fuerte</option>
										<option value="Camara Frigorifica">Camara Frigorifica</option>
										<option value="Contador Agua">Contador Agua</option>
										<option value="Contador Gas">Contador Gas</option>
										<option value="Contador Luz">Contador Luz</option>
										<option value="Deposito de Combustible">Deposito de Combustible</option>
										<option value="Deposito Residuos Contaminantes">Deposito Residuos Contaminantes</option>
										<option value="Deposito Residuos Liquidos">Deposito Residuos Liquidos</option>
										<option value="Deposito Residuos Solidos">Deposito Residuos Solidos</option>
										<option value="Depuradora">Depuradora</option>
										<option value="Electricidad">Electricidad</option>
										<option value="Estanterias de Almacenaje">Estanterias de Almacenaje</option>
										<option value="Extraccion Forzada de Aire">Extraccion Forzada de Aire</option>
										<option value="Foso">Foso</option>
										<option value="Gas">Gas</option>
										<option value="Grupo Electrogeno">Grupo Electrógeno</option>
										<option value="Iluminacion Patio Exterior">Iluminacion Patio Exterior</option>
										<option value="Lineas Telefonicas">Lineas Telefonicas</option>
										<option value="Linea Cenital">Linea Cenital</option>
										<option value="Linea Lateral">Linea Lateral</option>
										<option value="Megafonia Interior">Megafonia Interior</option>
										<option value="Plataforma Elevadora">Plataforma Elevadora</option>
										<option value="Polipasto">Polipasto</option>
										<option value="Puente Grua">Puente Grua</option>
										<option value="Trasnformador">Trasnformador</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-instalaciones-edif">Instalaciones edificio</label>
								<div class="col-md-8">
									<select id="w1-instalaciones-edif" name="instalaciones_edificio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Agua Comunitaria">Agua Comunitaria</option>
										<option value="Aspirotec">Aspirotec</option>
										<option value="Bajante Recogida de Basuras">Bajante Recogida de Basuras</option>
										<option value="Bocas Incendio en Edificio">Bocas Incendio en Edificio</option>
										<option value="Columna Seca">Columna Seca</option>
										<option value="Electricidad Comunitaria">Electricidad Comunitaria</option>
										<option value="Escalera de Incendios">Escalera de Incendios</option>
										<option value="Extintores Edificio">Extintores Edificio</option>
										<option value="Gas Butano">Gas Butano</option>
										<option value="Gas Ciudad">Gas Ciudad</option>
										<option value="Gas Propano">Gas Propano</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-instalacionesprivadas">Instalaciones privadas</label>
								<div class="col-md-8">
									<select id="w1-instalacionesprivadas" name="instalaciones_privadas" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Acometida de Agua pie parc">Acometida de Agua pie parc</option>
										<option value="Acometida de Gas pie parc">Acometida de Gas pie parc</option>
										<option value="Acometida de Luz pie parc">Acometida de Luz pie parc</option>
										<option value="Barbacoa">Barbacoa</option>
										<option value="Cuadras">Cuadras</option>
										<option value="Deposito de Agua">Deposito de Agua</option>
										<option value="Embarcadero">Embarcadero</option>
										<option value="Fosa Septica">Fosa Septica</option>
										<option value="Fronton">Fronton</option>
										<option value="Glorieta/Cenador">Glorieta/Cenador</option>
										<option value="Iluminacion Jardin">Iluminacion Jardin</option>
										<option value="Invernadero">Invernadero</option>
										<option value="Pozo Propio">Pozo Propio</option>
										<option value="Riego Automatico">Riego Automatico</option>
										<option value="Sistemas Domoticos">Sistemas Domoticos</option>
										<option value="Squash">Squash</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-refrigeracion">Refrigeración</label>
								<div class="col-md-8">
									<select id="w1-refrigeracion" name="refrigeracion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Aacc Central">Aacc Central</option>
										<option value="Aacc Consolas">Aacc Consolas</option>
										<option value="Aacc Frio Calor">Aacc Frio Calor</option>
										<option value="Aacc Solo Frio">Aacc Solo Frio</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-interruptores">Interruptores</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-interruptores" type="number" min=0 name="interruptores" class="form-control" placeholder="">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-mecanismos">Mecanismos</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-mecanismos" type="text" name="mecanismos" class="form-control" placeholder="">
								</div>
							</div>
								</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-seguridad">Sistema de seguridad/vigilancia</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-seguridad" type="text" name="seguridad" class="form-control" placeholder="">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6 col-md-offset-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-tomasdeagua">Tomas de Agua</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-tomasdeagua" type="number" min=0 name="tomasdeagua" class="form-control" placeholder="">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obs-instalaciones">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" id="w1-obs-instalaciones" name="obs_instalaciones"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_instalaciones" data-next="contenido-datos-economicos" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
							</div>
						</div>
						<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- DATOS ECONOMICOS -->
	<div id="acordion-datos-economicos" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-datos-economicos">
					<img src="{{ asset('images/icons/datoseconomicos.png') }}" alt="" width="23px"> DATOS ECONÓMICOS
				</a>
			</h4>
		</div>
		<div id="contenido-datos-economicos" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_economicos" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Datos Económicos"</strong>
				</div>
				<form class="form-horizontal extras" id="form-economicos" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_economicos">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-gastoscomunidad">Gastos de comunidad</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-gastoscomunidad" type="number" min=0 name="gastos_comunidad" class="form-control" placeholder="">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-calidadprecio">Calidad/Precio</label>
								<div class="col-md-8">
									<select name="calidad_precio" data-plugin-selectTwo id="w1-calidadprecio" class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Buen Precio">Buen Precio</option>
										<option value="Caro">Caro</option>
										<option value="Ganga">Ganga</option>
										<option value="Muy Caro">Muy Caro</option>
										<option value="Precio Justo">Precio Justo</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="hidden-xs col-md-2"></div>
						<div class="col-xs-6 col-md-3">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='rentabilidad'>
											<input type="checkbox" value=1 id="rentabilidad" name="rentabilidad"> Rentabilidad
										</label>
									</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obsdatoseconomicos">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea name="obs_datoseconomicos" class="form-control" rows="3" id="w1-obsdatoseconomicos"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_economicos" data-next="contenido-finca" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
							</div>
						</div>
						<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="acordion-finca" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-finca">
					<img src="{{ asset('images/icons/finca.png') }}" alt="" width="23px"> FINCA
				</a>
			</h4>
		</div>
		<div id="contenido-finca" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_finca" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Finca"</strong>
				</div>
				<form class="form-horizontal extras" id="form-finca" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_finca">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-construccion">Construccion</label>
								<div class="col-md-8">
									<select name="construccion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Bloque Granito">Bloque Granito</option>
										<option value="Bloque Toro">Bloque Toro</option>
										<option value="Hormigon Prefabricado">Hormigon Prefabricado</option>
										<option value="Ladrillo Obra Vista">Ladrillo Obra Vista</option>
										<option value="Obra Metalica">Obra Metalica</option>
										<option value="Plancha Metalica">Plancha Metalica</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-estiloconstruccion">Estilo de Construcción</label>
								<div class="col-md-8">
									<select name="estilo_construccion" id="w1-estiloconstruccion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Casa de Pueblo">Casa de Pueblo</option>
										<option value="Cortijo">Cortijo</option>
										<option value="Diseno Exclusivo">Diseno Exclusivo</option>
										<option value="Diseno Moderno">Diseno Moderno</option>
										<option value="Estilo Pirenaico">Estilo Pirenaico</option>
										<option value="Estilo Clasico">Estilo Clasico</option>
										<option value="Estilo Colonial">Estilo Colonial</option>
										<option value="Estilo Neoclásico">Estilo Neoclásico</option>
										<option value="Estilo Provenzal">Estilo Provenzal</option>
										<option value="Estilo Rustico">Estilo Rustico</option>
										<option value="Masía">Masía</option>
										<option value="Molino">Molino</option>
										<option value="Otras">Otras</option>
										<option value="Pazo">Pazo</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-estructura">Estructura</label>
								<div class="col-md-8">
									<select name="estructura" id="w1-estructura" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Hormigon">Hormigon</option>
										<option value="Madera">Madera</option>
										<option value="Metalica">Metálica</option>
										<option value="Mixta">Mixta</option>
										<option value="Vigas de Madera">Vigas de Madera</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-portalescalera">Portal y Escalera</label>
								<div class="col-md-8">
									<select name="portalyescalera" id="w1-portalescalera" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Entrada servicio independiente">Entrada servicio independiente</option>
										<option value="Portal noble">Portal noble</option>
										<option value="Portal señorial">Portal señorial</option>
										<option value="Portal sin escalones">Portal sin escalones</option>
										<option value="Portal y caja de escaleras">Portal y caja de escaleras</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-puertaentrada">Puerta Entrada</label>
								<div class="col-md-8">
									<select name="puerta_entrada" id="w1-puertaentrada" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Barrera Vigilada">Barrera Vigilada</option>
										<option value="Persiana">Persiana</option>
										<option value="Persiana Automatica">Persiana Automatica</option>
										<option value="Puerta Abatible Manual">Puerta Abatible Manual</option>
										<option value="Puerta Batiente Automatica">Puerta Batiente Automatica</option>
										<option value="Puerta Batiente Manual">Puerta Batiente Manual</option>
										<option value="Puerta Manual">Puerta Manual</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-numfachadas">Número de Fachadas</label>
								<div class="col-sm-8">
									<input id="w1-numfachadas" type="number" min=0 name="numfachadas" class="form-control" placeholder="0">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obsfinca">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" name="obs_finca" id="w1-obsfinca"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_finca" data-next="contenido-situacion" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
							</div>
						</div>
						<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="acordion-situacion" class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-situacion">
					<img src="{{ asset('images/icons/situacion.png') }}" alt="" width="23px"> SITUACIÓN Y ENTORNO
				</a>
			</h4>
		</div>
		<div id="contenido-situacion" class="accordion-body collapse">
			<div class="panel-body">
				<div id="msj_form_situacion" class="alert alert-success alert-dismissible" role="alert" style="display:none">
					Se guardaron los datos de <strong>"Situación y Entorno"</strong>
				</div>
				<form class="form-horizontal extras" id="form-situacion" action="{{ route('extras.update', $inmueble_id) }}" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" class="extras-inmu-id" id="inmueble_id" type="hidden" value="{{ $inmueble_id }}">
					<input name="form_seccion" type="hidden" value="form_situacion">
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-calif-urbana">Calificación urbana</label>
								<div class="col-md-8">
									<select name="calif_urbana" id="w1-calif-urbana" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Conservacion centro historico">Conservacion centro historico</option>
										<option value="Densificacion urbana intensiva">Densificacion urbana intensiva</option>
										<option value="Densificacion urbana semi-intensiva">Densificacion urbana semi-intensiva</option>
										<option value="Industrial">Industrial</option>
										<option value="Remodelacion privada">Remodelacion privada</option>
										<option value="Remodelacion publica">Remodelacion publica</option>
										<option value="Sub-zonas plurifamiliares">Sub-zonas plurifamiliares</option>
										<option value="Sub-zonas unifamiliares">Sub-zonas unifamiliares</option>
										<option value="Sustitucion edificacion antigua">Sustitucion edificacion antigua</option>
										<option value="Verde privado protegido">Verde privado protegido</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-cercania">Cercanía a</label>
								<div class="col-md-8">
									<select name="cercania_a" id="w1-cercania" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Campo de Golf">Campo de Golf</option>
										<option value="Playa">Playa</option>
										<option value="Lago">Lago</option>
										<option value="Mar">Mar</option>
										<option value="Pantano">Pantano</option>
										<option value="Pistas de Esquí">Pistas de Esquí</option>
										<option value="Pueblo">Pueblo</option>
										<option value="Río">Río</option>
										<option value="Primera Línea de Playa">Primera Línea de Playa</option>
										<option value="Segunda Línea de Playa">Segunda Línea de Playa</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-elementos-comunitarios">Elementos comunitarios</label>
								<div class="col-md-8">
									<select name="elementos_comunitarios" id="w1-elementos-comunitarios" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Antena colectiva">Antena colectiva</option>
										<option value="Antena parabolica">Antena parabólica</option>
										<option value="Club social">Club social</option>
										<option value="Fronton">Frontón</option>
										<option value="Interfono">Interfono</option>
										<option value="Piscina">Piscina</option>
										<option value="Pista de tenis">Pista de tenis</option>
										<option value="Portero automatico">Portero automático</option>
										<option value="Sala de lavanderia">Sala de lavandería</option>
										<option value="Solarium">Solarium</option>
										<option value="Squash">Squash</option>
										<option value="Television por cable">Televisión por cable</option>
										<option value="Television por satelite">Televisión por satélite</option>
										<option value="Terrado con tendedero">Terrado con tendedero</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-entorno">Entorno</label>
								<div class="col-md-8">
									<select name="entorno" id="w1-entorno" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Cerca zona comercial">Cerca zona comercial</option>
										<option value="Edificio aislado">Edificio aislado</option>
										<option value="Pocos vecinos">Pocos vecinos</option>
										<option value="Zona alto nivel">Zona alto nivel</option>
										<option value="Zona bien comunicada">Zona bien comunicada</option>
										<option value="Zona céntrica">Zona céntrica</option>
										<option value="Zona habitada permanentemente">Zona habitada permanentemente</option>
										<option value="Zona rural">Zona rural</option>
										<option value="Zona tranquila">Zona tranquila</option>
										<option value="Zona urbana">Zona urbana</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-equipamientos-zonas">Equipamientos Zonas</label>
								<div class="col-md-8">
									<select name="equipamientos_zonas" id="w1-equipamientos-zonas" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Cerca campo golf">Cerca campo golf</option>
										<option value="Cerca colegios">Cerca colegios</option>
										<option value="Cerca farmacia">Cerca farmacia</option>
										<option value="Cerca guarderia">Cerca guarderia</option>
										<option value="Cerca instalaciones colectivas">Cerca instalaciones colectivas</option>
										<option value="Cerca mercado">Cerca mercado</option>
										<option value="Cerca parque publico">Cerca parque publico</option>
										<option value="Cerca supermercado">Cerca supermercado</option>
										<option value="Cerca zona comercial">Cerca zona comercial</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-grado-urbanizacion">Grado Urbanización</label>
								<div class="col-md-8">
									<select name="grado_urbanizacion" id="w1-grado-urbanizacion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Alto">Alto</option>
										<option value="Bajo">Bajo</option>
										<option value="Medio">Medio</option>
										<option value="Muy Alto">Muy Alto</option>
										<option value="Muy Bajo">Muy Bajo</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-sol">Sol</label>
								<div class="col-md-8">
									<select name="sol" id="w1-sol" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Muy luminosos">Muy luminosos</option>
										<option value="Sol mañanas">Sol mañanas</option>
										<option value="Sol tardes">Sol tardes</option>
										<option value="Sol todo el dia">Sol todo el dia</option>
										<option value="Soleado">Soleado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-transportes-publicos">Transportes públicos</label>
								<div class="col-md-8">
									<select name="transportes_publicos" id="w1-transportes-publicos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Bien comunicado transp. publicos">Bien comunicado transp. públicos</option>
										<option value="Cerca aeropuerto">Cerca aeropuerto</option>
										<option value="Cerca autobuses">Cerca autobuses</option>
										<option value="Cerca estacion ferrocarril">Cerca estación ferrocarril</option>
										<option value="Cerca estacion tren cercanias">Cerca estación tren cercanias</option>
										<option value="Cerca metro">Cerca metro</option>
										<option value="Cerca puerto">Cerca puerto</option>
										<option value="Cerca tranvia">Cerca tranvía</option>
										<option value="Comunicaciones bien">Comunicaciones bien</option>
										<option value="Comunicaciones mal">Comunicaciones mal</option>
										<option value="Comunicaciones muy bien transp. publicos">Comunicaciones muy bien transp. públicos</option>
										<option value="Comunicaciones muy buenas">Comunicaciones muy buenas</option>
										<option value="Comunicaciones regular">Comunicaciones regular</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-vistas">Vistas</label>
								<div class="col-md-8">
									<select name="vistas" id="w1-vistas" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" selected>::Seleccionar::</option>
										<option value="Buenas vistas">Buenas vistas</option>
										<option value="Vistas a patio interior manzana">Vistas a patio interior manzana</option>
										<option value="Vistas a calle">Vistas a calle</option>
										<option value="Vistas a campo de golf">Vistas a campo de golf</option>
										<option value="Vistas a estacion de esqui">Vistas a estacion de esqui</option>
										<option value="Vistas a la ciudad">Vistas a la ciudad</option>
										<option value="Vistas a la montana">Vistas a la montana</option>
										<option value="Vistas a la piscina">Vistas a la piscina</option>
										<option value="Vistas a la zona comunitaria">Vistas a la zona comunitaria</option>
										<option value="Vistas a la zona deportiva">Vistas a la zona deportiva</option>
										<option value="Vistas a la zona verde">Vistas a la zona verde</option>
										<option value="Vistas a mar y montana">Vistas a mar y montana</option>
										<option value="Vistas a parque nacional">Vistas a parque nacional</option>
										<option value="Vistas a parque publico">Vistas a parque publico</option>
										<option value="Vistas a patio interior ajardinado">Vistas a patio interior ajardinado</option>
										<option value="Vistas a plaza">Vistas a plaza</option>
										<option value="Vistas al lago">Vistas al lago</option>
										<option value="Vistas al mar">Vistas al mar</option>
										<option value="Vistas al puerto">Vistas al puerto</option>
										<option value="Vistas al valle">Vistas al valle</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-distancia-poblacion">Distancia población</label>
								<div class="col-md-8">
									<input id="w1-distancia-poblacion" type="text" name="distancia_poblacion" class="form-control" placeholder="">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obs-situacion">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" name="obs_situacion" id="w1-obs-situacion"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_situacion" class="mb-xs mt-xs mr-xs btn btn-success btn-edit-extras"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
							</div>
						</div>
						<br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-xs-12">
	<div class="row">
		<div class="hidden-xs col-md-4"></div>
		<div class="col-md-8">
		<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-continuar" data-getouttab="tab-extras" data-getoutcontent="w1-extras" data-getintab="tab-fotos" data-getincontent="w1-fotos"><i class="fa fa-floppy-o" aria-hidden="true"></i> Continuar <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
		</div> 
	</div>
	<br><br>
</div>