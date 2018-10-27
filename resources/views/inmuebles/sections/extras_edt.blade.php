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
										<option value="" {{ $inmueble->extra->calidades == '' || $inmueble->extra->calidades==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Baja"  {{ $inmueble->extra->calidades == 'Baja' ? 'selected' : '' }}>Baja</option>
										<option value="Buena"  {{ $inmueble->extra->calidades == 'Buena' ? 'selected' : '' }}>Buena</option>
										<option value="Escasa"  {{ $inmueble->extra->calidades == 'Escasa' ? 'selected' : '' }}>Escasa</option>
										<option value="Lujo"  {{ $inmueble->extra->calidades == 'Lujo' ? 'selected' : '' }}>Lujo</option>
										<option value="Muy Buena"  {{ $inmueble->extra->calidades == 'Muy Buena' ? 'selected' : '' }}>Muy Buena</option>
										<option value="Normal"  {{ $inmueble->extra->calidades == 'Normal' ? 'selected' : '' }}>Normal</option>
										<option value="Superlujo"  {{ $inmueble->extra->calidades == 'Superlujo' ? 'selected' : '' }}>Superlujo</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-estado_aseos">Estado Aseos</label>
								<div class="col-xs-12 col-md-8">
									<select name="estado_aseos" id="w1-estado_aseos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->estado_aseos == '' || $inmueble->extra->estado_aseos==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Buen estado"  {{ $inmueble->extra->estado_aseos == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
										<option value="Necesita Reforma"  {{ $inmueble->extra->estado_aseos == 'Necesita Reforma' ? 'selected' : '' }}>Necesita Reforma</option>
										<option value="Aseo de origen"  {{ $inmueble->extra->estado_aseos == 'Aseo de origen' ? 'selected' : '' }}>Aseo de origen</option>
										<option value="Nuevo"  {{ $inmueble->extra->estado_aseos == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
										<option value="Reformado"  {{ $inmueble->extra->estado_aseos == 'Reformado' ? 'selected' : '' }}>Reformado</option>
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
										<option value="" {{ $inmueble->extra->estado_banos == '' || $inmueble->extra->estado_banos==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Buen estado"  {{ $inmueble->extra->estado_banos == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
										<option value="Necesita Reforma"  {{ $inmueble->extra->estado_banos == 'Necesita Reforma' ? 'selected' : '' }}>Necesita Reforma</option>
										<option value="de origen"  {{ $inmueble->extra->estado_banos == 'de origen' ? 'selected' : '' }}>Baño de origen</option>
										<option value="Nuevo"  {{ $inmueble->extra->estado_banos == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
										<option value="Reformado"  {{ $inmueble->extra->estado_banos == 'Reformado' ? 'selected' : '' }}>Reformado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
									<label class="col-sm-12 col-md-4 control-label" for="w1-cocina">Estado Cocina</label>
									<div class="col-xs-12 col-md-8">
										<select name="estado_cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $inmueble->extra->estado_cocina == '' || $inmueble->extra->estado_cocina==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Buen estado"  {{ $inmueble->extra->estado_cocina == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
											<option value="Necesita Reforma"  {{ $inmueble->extra->estado_cocina == 'Necesita Reforma' ? 'selected' : '' }}>Necesita Reforma</option>
											<option value="Cocina de origen" {{ $inmueble->extra->estado_cocina == 'Cocina de origen' ? 'selected' : '' }}>Cocina de origen</option>
											<option value="Nueva"  {{ $inmueble->extra->estado_cocina == 'Nueva' ? 'selected' : '' }}>Nueva</option>
											<option value="Reformada"  {{ $inmueble->extra->estado_cocina == 'Reformada' ? 'selected' : '' }}>Reformada</option>
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
										<option value="" {{ $inmueble->extra->estado_edificio == '' || $inmueble->extra->estado_edificio==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Buen estado"  {{ $inmueble->extra->estado_edificio == 'Buen estado' ? 'selected' : '' }}>Buen estado</option>
										<option value="Necesita Reforma"  {{ $inmueble->extra->estado_edificio == 'Necesita Reforma' ? 'selected' : '' }}>Necesita Reforma</option>
										<option value="En ruina"  {{ $inmueble->extra->estado_edificio == 'En ruina' ? 'selected' : '' }}>En ruina</option>
										<option value="Nuevo"  {{ $inmueble->extra->estado_edificio == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
										<option value="Reformado"  {{ $inmueble->extra->estado_edificio == 'Reformado' ? 'selected' : '' }}>Reformado</option>
										<option value="Rehabilitado"  {{ $inmueble->extra->estado_edificio == 'Rehabilitado' ? 'selected' : '' }}>Rehabilitado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-12 col-md-4 control-label" for="w1-tipo-edificio">Tipo Edificio</label>
								<div class="col-xs-12 col-md-8">
									<select name="tipo_edificio" id="w1-tipo-edificio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->tipo_edificio == '' || $inmueble->extra->tipo_edificio==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Clásico"  {{ $inmueble->extra->tipo_edificio == 'Clásico' ? 'selected' : '' }}>Clásico</option>
										<option value="Diseño"  {{ $inmueble->extra->tipo_edificio == 'Diseño' ? 'selected' : '' }}>Diseño</option>
										<option value="Moderno"  {{ $inmueble->extra->tipo_edificio == 'Moderno' ? 'selected' : '' }}>Moderno</option>
										<option value="Premiado"  {{ $inmueble->extra->tipo_edificio == 'Premiado' ? 'selected' : '' }}>Premiado</option>
										<option value="Regio"  {{ $inmueble->extra->tipo_edificio == 'Regio' ? 'selected' : '' }}>Regio</option>
										<option value="Representativo"  {{ $inmueble->extra->tipo_edificio == 'Representativo' ? 'selected' : '' }}>Representativo</option>
										<option value="Señorial"  {{ $inmueble->extra->tipo_edificio == 'Señorial' ? 'selected' : '' }}>Señorial</option>
										<option value="Singular"  {{ $inmueble->extra->tipo_edificio == 'Singular' ? 'selected' : '' }}>Singular</option>
									</select>
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">	
						<div class="form-group">
							<label class="col-xs-12 col-md-2 control-label" for="w1-obs-calidades">Observaciones</label>
							<div class="col-md-10">
								<textarea name="obs_calidades" class="form-control" rows="3" id="w1-obs-calidades">{{ $inmueble->extra->obs_calidades }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_calidades" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
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
									<input id="w1-altura" type="number" min=0 name="altura" class="form-control" placeholder="0" value="{{ $inmueble->extra->altura }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-suites">Suites</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-suites" type="number" min=0 name="num_suites" class="form-control" placeholder="0" value="{{ $inmueble->extra->num_suites }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-superficie">Superficie útil</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-superficie" type="number" min=0 name="sup_util" class="form-control" placeholder="0" value="{{ $inmueble->extra->sup_util }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-cocina">Superficie cocina</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-cocina" type="number" min=0 name="sup_cocina" class="form-control" placeholder="0" value="{{ $inmueble->extra->sup_cocina }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-edificada">Superficie edificada</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-edificada" type="number" min=0 name="sup_edificada" class="form-control" placeholder="0" value="{{ $inmueble->extra->sup_edificada }}" >
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-salon">Superficie salón</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-salon" type="number" min=0 name="sup_salon" class="form-control" placeholder="0" value="{{ $inmueble->extra->sup_salon }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-sup-terrazas">Superficie terrazas</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-sup-terrazas" type="number" min=0 name="sup_terrazas" class="form-control" placeholder="0" value="{{ $inmueble->extra->sup_terrazas }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-habdobles">Hab. Dobles</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-habdobles" type="number" min=0 name="num_hab_dobles" class="form-control" placeholder="0" value="{{ $inmueble->extra->num_hab_dobles }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-4">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-habindividuaes">Hab. Individuales</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-habindividuaes" type="number" min=0 name="num_hab_individuales" class="form-control" placeholder="0" value="{{ $inmueble->extra->num_hab_individuales }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">
						<div class="form-group">
							<label class="col-md-2 control-label" for="obs_superficies">Observaciones</label>
							<div class="col-md-10">
								<textarea name="obs_superficies" class="form-control" rows="3" id="obs_superficies">{{ $inmueble->extra->obs_superficies }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_superficies" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
										<option value="" {{ $inmueble->extra->carp_exterior == '' || $inmueble->extra->carp_exterior==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Aluminio"  {{ $inmueble->extra->carp_exterior == 'Aluminio' ? 'selected' : '' }}>Aluminio</option>
										<option value="Aluminio Lacado"  {{ $inmueble->extra->carp_exterior == 'Aluminio Lacado' ? 'selected' : '' }}>Aluminio Lacado</option>
										<option value="Hierro"  {{ $inmueble->extra->carp_exterior == 'Hierro' ? 'selected' : '' }}>Hierro</option>
										<option value="Madera"  {{ $inmueble->extra->carp_exterior == 'Madera' ? 'selected' : '' }}>Madera</option>
										<option value="Madera Barnizada"  {{ $inmueble->extra->carp_exterior == 'Madera Barnizada' ? 'selected' : '' }}>Madera Barnizada</option>
										<option value="Madera Noble"  {{ $inmueble->extra->carp_exterior == 'Madera Noble' ? 'selected' : '' }}>Madera Noble</option>
										<option value="Madera Pintada"  {{ $inmueble->extra->carp_exterior == 'Madera Pintada' ? 'selected' : '' }}>Madera Pintada</option>
										<option value="Madera Teka"  {{ $inmueble->extra->carp_exterior == 'Madera Teka' ? 'selected' : '' }}>Madera Teka</option>
										<option value="PVC"  {{ $inmueble->extra->carp_exterior == 'PVC' ? 'selected' : '' }}>PVC</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-carp-interior">Carpintería Interior</label>
								<div class="col-xs-12 col-md-8">
									<select name="carp_interior" id="w1-carp-interior" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->carp_interior == '' || $inmueble->extra->carp_interior==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Aluminio"  {{ $inmueble->extra->carp_interior == 'Aluminio' ? 'selected' : '' }}>Aluminio</option>
										<option value="Aluminio Lacado"  {{ $inmueble->extra->carp_interior == 'Aluminio Lacado' ? 'selected' : '' }}>Aluminio Lacado</option>
										<option value="Hierro"  {{ $inmueble->extra->carp_interior == 'Hierro' ? 'selected' : '' }}>Hierro</option>
										<option value="Madera"  {{ $inmueble->extra->carp_interior == 'Madera' ? 'selected' : '' }}>Madera</option>
										<option value="Madera Barnizada"  {{ $inmueble->extra->carp_interior == 'Madera Barnizada' ? 'selected' : '' }}>Madera Barnizada</option>
										<option value="Madera Embero"  {{ $inmueble->extra->carp_interior == 'Madera Embero' ? 'selected' : '' }}>Madera Embero</option>
										<option value="Madera Haya"  {{ $inmueble->extra->carp_interior == 'Madera Haya' ? 'selected' : '' }}>Madera Haya</option>
										<option value="Madera Lacada"  {{ $inmueble->extra->carp_interior == 'Madera Lacada' ? 'selected' : '' }}>Madera Lacada</option>
										<option value="Madera Noble"  {{ $inmueble->extra->carp_interior == 'Madera Noble' ? 'selected' : '' }}>Madera Noble</option>
										<option value="Madera Pintada"  {{ $inmueble->extra->carp_interior == 'Madera Pintada' ? 'selected' : '' }}>Madera Pintada</option>
										<option value="Madera Sapelly"  {{ $inmueble->extra->carp_interior == 'Madera Sapelly' ? 'selected' : '' }}>Madera Sapelly</option>
										<option value="Madera Teka"  {{ $inmueble->extra->carp_interior == 'Madera Teka' ? 'selected' : '' }}>Madera Teka</option>
										<option value="PVC"  {{ $inmueble->extra->carp_interior == 'PVC' ? 'selected' : '' }}>PVC</option>
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
										<option value="" {{ $inmueble->extra->puerta_principal == '' || $inmueble->extra->puerta_principal==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Cuarterones"  {{ $inmueble->extra->puerta_principal == 'Cuarterones' ? 'selected' : '' }}>Cuarterones</option>
										<option value="Hierro"  {{ $inmueble->extra->puerta_principal == 'Hierro' ? 'selected' : '' }}>Hierro</option>
										<option value="Seguridad"  {{ $inmueble->extra->puerta_principal == 'Seguridad' ? 'selected' : '' }}>Seguridad</option>
										<option value="Vidrio"  {{ $inmueble->extra->puerta_principal == 'Vidrio' ? 'selected' : '' }}>Vidrio</option>
										<option value="Enrejada"  {{ $inmueble->extra->puerta_principal == 'Enrejada' ? 'selected' : '' }}>Enrejada</option>
										<option value="Mazisa"  {{ $inmueble->extra->puerta_principal == 'Mazisa' ? 'selected' : '' }}>Mazisa</option>
										<option value="Madera"  {{ $inmueble->extra->puerta_principal == 'Madera' ? 'selected' : '' }}>Madera</option>
										<option value="Mixta"  {{ $inmueble->extra->puerta_principal == 'Mixta' ? 'selected' : '' }}>Mixta</option>
										<option value="Normal"  {{ $inmueble->extra->puerta_principal == 'Normal' ? 'selected' : '' }}>Normal</option>
										<option value="Reforzada"  {{ $inmueble->extra->puerta_principal == 'Reforzada' ? 'selected' : '' }}>Reforzada</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-puertas-interiores">Puertas Interiores</label>
								<div class="col-xs-12 col-md-8">
									<select name="puertas_interiores" id="w1-puertas-interiores" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->puertas_interiores == '' || $inmueble->extra->puertas_interiores==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Aluminio Lacado"  {{ $inmueble->extra->puertas_interiores == 'Aluminio Lacado' ? 'selected' : '' }}>Aluminio Lacado</option>
										<option value="Correderas"  {{ $inmueble->extra->puertas_interiores == 'Correderas' ? 'selected' : '' }}>Correderas</option>
										<option value="Cristal/Madera"  {{ $inmueble->extra->puertas_interiores == 'Cristal/madera' ? 'selected' : '' }}>Cristal/Madera</option>
										<option value="Cuarterón"  {{ $inmueble->extra->puertas_interiores == 'Cuarterón' ? 'selected' : '' }}>Cuarterón</option>
										<option value="Embero"  {{ $inmueble->extra->puertas_interiores == 'Embero' ? 'selected' : '' }}>Embero</option>
										<option value="Etimoe"  {{ $inmueble->extra->puertas_interiores == 'Etimoe' ? 'selected' : '' }}>Etimoe</option>
										<option value="Inglesa"  {{ $inmueble->extra->puertas_interiores == 'Inglesa' ? 'selected' : '' }}>Inglesa</option>
										<option value="Nuevas"  {{ $inmueble->extra->puertas_interiores == 'Nuevas' ? 'selected' : '' }}>Nuevas</option>
										<option value="Rústicas"  {{ $inmueble->extra->puertas_interiores == 'Rústicas' ? 'selected' : '' }}>Rústicas</option>
										<option value="Sapelly"  {{ $inmueble->extra->puertas_interiores == 'Sapelly' ? 'selected' : '' }}>Sapelly</option>
										<option value="Tapizadas"  {{ $inmueble->extra->puertas_interiores == 'Tapizadas' ? 'selected' : '' }}>Tapizadas</option>
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
											<option value="" {{ $inmueble->extra->ventanas == '' || $inmueble->extra->ventanas==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Aluminio"  {{ $inmueble->extra->ventanas == 'Aluminio' ? 'selected' : '' }}>Aluminio</option>
											<option value="Climalit"  {{ $inmueble->extra->ventanas == 'Climalit' ? 'selected' : '' }}>Climalit</option>
											<option value="Cuarterones"  {{ $inmueble->extra->ventanas == 'Cuarterones' ? 'selected' : '' }}>Cuarterones</option>
											<option value="Persianas"  {{ $inmueble->extra->ventanas == 'Persianas' ? 'selected' : '' }}>Persianas</option>
											<option value="Rejas"  {{ $inmueble->extra->ventanas == 'Rejas' ? 'selected' : '' }}>Rejas</option>
											<option value="Doble cristal"  {{ $inmueble->extra->ventanas == 'Doble cristal' ? 'selected' : '' }}>Doble cristal</option>
											<option value="Madera"  {{ $inmueble->extra->ventanas == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="PVC"  {{ $inmueble->extra->ventanas == 'PVC' ? 'selected' : '' }}>PVC</option>
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
									<input id="w1-armarios" min=0 type="number" name="num_armarios" class="form-control" placeholder="0" value="{{ $inmueble->extra->num_armarios }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6 col-lg-3">
							<div class="form-group">
								<label class="col-xs-12 col-md-7 control-label" for="w1-persianas">Persianas</label>
								<div class="col-xs-12 col-md-5">
									<input id="w1-persianas" type="number" min=0 name="num_persianas" class="form-control" placeholder="0" value="{{ $inmueble->extra->num_persianas }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="col-xs-12">
						<div class="form-group">
							<label class="col-md-2 control-label" for="w1-obsercarpinteria">Observaciones</label>
							<div class="col-md-10">
								<textarea class="form-control" rows="3" id="w1-obsercarpinteria" name="obs_carpinteria">{{ $inmueble->extra->obs_carpinteria }}</textarea>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
								<div class="col-xs-2"></div>
								<div class="col-xs-4">
								<button type="button" data-id="form_carpinteria" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
											<option value="" {{ $inmueble->extra->acabados_paredes == '' || $inmueble->extra->acabados_paredes==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Corcho"  {{ $inmueble->extra->acabados_paredes == 'Corcho' ? 'selected' : '' }}>Corcho</option>
											<option value="Estuco"  {{ $inmueble->extra->acabados_paredes == 'Estuco' ? 'selected' : '' }}>Estuco</option>
											<option value="Estuco Veneciano"  {{ $inmueble->extra->acabados_paredes == 'Estuco Veneciano' ? 'selected' : '' }}>Estuco Veneciano</option>
											<option value="Gotele"  {{ $inmueble->extra->acabados_paredes == 'Gotele' ? 'selected' : '' }}>Gotele</option>
											<option value="Madera"  {{ $inmueble->extra->acabados_paredes == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Moqueta"  {{ $inmueble->extra->acabados_paredes == 'Moqueta' ? 'selected' : '' }}>Moqueta</option>
											<option value="Papel"  {{ $inmueble->extra->acabados_paredes == 'Papel' ? 'selected' : '' }}>Papel</option>
											<option value="Acabado"  {{ $inmueble->extra->acabados_paredes == 'Acabado' ? 'selected' : '' }}>Acabado</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-paredes-bannos">Paredes Baños</label>
									<div class="col-xs-12 col-md-8">
										<select name="paredes_banos" id="w1-paredes-bannos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $inmueble->extra->paredes_banos == '' || $inmueble->extra->paredes_banos==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Alicatado Ceramico"  {{ $inmueble->extra->paredes_banos == 'Alicatado Ceramico' ? 'selected' : '' }}>Alicatado Cerámico</option>
											<option value="Gresite"  {{ $inmueble->extra->paredes_banos == 'Gresite' ? 'selected' : '' }}>Gresite</option>
											<option value="Madera"  {{ $inmueble->extra->paredes_banos == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Marmol"  {{ $inmueble->extra->paredes_banos == 'Marmol' ? 'selected' : '' }}>Marmol</option>
											<option value="Pintura Plastica"  {{ $inmueble->extra->paredes_banos == 'Pintura Plastica' ? 'selected' : '' }}>Pintura Plástica</option>
											<option value="Yeso"  {{ $inmueble->extra->paredes_banos == 'Yeso' ? 'selected' : '' }}>Yeso</option>
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
											<option value="" {{ $inmueble->extra->paredes_cocina == '' || $inmueble->extra->paredes_cocina==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Alicatado Ceramico"  {{ $inmueble->extra->paredes_cocina == 'Alicatado Ceramico' ? 'selected' : '' }}>Alicatado Cerámico</option>
											<option value="Madera"  {{ $inmueble->extra->paredes_cocina == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Marmol"  {{ $inmueble->extra->paredes_cocina == 'Marmol' ? 'selected' : '' }}>Marmol</option>
											<option value="Pintura Plastica"  {{ $inmueble->extra->paredes_cocina == 'Pintura Plastica' ? 'selected' : '' }}>Pintura Plástica</option>
											<option value="Yeso"  {{ $inmueble->extra->paredes_cocina == 'Yeso' ? 'selected' : '' }}>Yeso</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-suelos">Suelos</label>
									<div class="col-xs-12 col-md-8">
										<select name="suelos" id="w1-suelos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $inmueble->extra->suelos == '' || $inmueble->extra->suelos==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Baldosa"  {{ $inmueble->extra->suelos == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
											<option value="Baldosa Rustica"  {{ $inmueble->extra->suelos == 'Baldosa Rustica' ? 'selected' : '' }}>Baldosa Rústica</option>
											<option value="Ceramico"  {{ $inmueble->extra->suelos == 'Ceramico' ? 'selected' : '' }}>Cerámico</option>
											<option value="Corcho"  {{ $inmueble->extra->suelos == 'Corcho' ? 'selected' : '' }}>Corcho</option>
											<option value="Gres"  {{ $inmueble->extra->suelos == 'Gres' ? 'selected' : '' }}>Gres</option>
											<option value="Madera"  {{ $inmueble->extra->suelos == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Marmol"  {{ $inmueble->extra->suelos == 'Marmol' ? 'selected' : '' }}>Mármol</option>
											<option value="Tarima"  {{ $inmueble->extra->suelos == 'Tarima' ? 'selected' : '' }}>Tarima</option>
											<option value="Terrazo"  {{ $inmueble->extra->suelos == 'Terrazo' ? 'selected' : '' }}>Terrazo</option>
											<option value="Gresite"  {{ $inmueble->extra->suelos == 'Gresite' ? 'selected' : '' }}>Gresite</option>
											<option value="Linoleo"  {{ $inmueble->extra->suelos == 'Linoleo' ? 'selected' : '' }}>Linóleo</option>
											<option value="Moqueta"  {{ $inmueble->extra->suelos == 'Moqueta' ? 'selected' : '' }}>Moqueta</option>
											<option value="Mosaico"  {{ $inmueble->extra->suelos == 'Mosaico' ? 'selected' : '' }}>Mosaico</option>
											<option value="Porcelanato"  {{ $inmueble->extra->suelos == 'Porcelanato' ? 'selected' : '' }}>Porcelanato</option>
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
											<option value="" {{ $inmueble->extra->suelos_banos == '' || $inmueble->extra->suelos_banos==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Baldosa"  {{ $inmueble->extra->suelos_banos == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
											<option value="Ceramico"  {{ $inmueble->extra->suelos_banos == 'Ceramico' ? 'selected' : '' }}>Cerámico</option>
											<option value="Corcho"  {{ $inmueble->extra->suelos_banos == 'Corcho' ? 'selected' : '' }}>Corcho</option>
											<option value="Gres"  {{ $inmueble->extra->suelos_banos == 'Gres' ? 'selected' : '' }}>Gres</option>
											<option value="Madera"  {{ $inmueble->extra->suelos_banos == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Marmol"  {{ $inmueble->extra->suelos_banos == 'Marmol' ? 'selected' : '' }}>Mármol</option>
											<option value="Parquet"  {{ $inmueble->extra->suelos_banos == 'Parquet' ? 'selected' : '' }}>Parquet</option>
											<option value="Terrazo"  {{ $inmueble->extra->suelos_banos == 'Terrazo' ? 'selected' : '' }}>Terrazo</option>
											<option value="Gresite"  {{ $inmueble->extra->suelos_banos == 'Gresite' ? 'selected' : '' }}>Gresite</option>
											<option value="Linoleo"  {{ $inmueble->extra->suelos_banos == 'Linoleo' ? 'selected' : '' }}>Linóleo</option>
											<option value="Mosaico"  {{ $inmueble->extra->suelos_banos == 'Mosaico' ? 'selected' : '' }}>Mosaico</option>
											<option value="Porcelanato"  {{ $inmueble->extra->suelos_banos == 'Porcelanato' ? 'selected' : '' }}>Porcelanato</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-suelos-cocina">Suelos Cocina</label>
									<div class="col-xs-12 col-md-8">
										<select name="suelos_cocina" id="w1-suelos-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $inmueble->extra->suelos_cocina == '' || $inmueble->extra->suelos_cocina==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Baldosa"  {{ $inmueble->extra->suelos_cocina == 'Baldosa' ? 'selected' : '' }}>Baldosa</option>
											<option value="Ceramico"  {{ $inmueble->extra->suelos_cocina == 'Ceramico' ? 'selected' : '' }}>Cerámico</option>
											<option value="Corcho"  {{ $inmueble->extra->suelos_cocina == 'Corcho' ? 'selected' : '' }}>Corcho</option>
											<option value="Gres"  {{ $inmueble->extra->suelos_cocina == 'Gres' ? 'selected' : '' }}>Gres</option>
											<option value="Madera"  {{ $inmueble->extra->suelos_cocina == 'Madera' ? 'selected' : '' }}>Madera</option>
											<option value="Marmol"  {{ $inmueble->extra->suelos_cocina == 'Marmol' ? 'selected' : '' }}>Mármol</option>
											<option value="Parquet"  {{ $inmueble->extra->suelos_cocina == 'Parquet' ? 'selected' : '' }}>Parquet</option>
											<option value="Terrazo"  {{ $inmueble->extra->suelos_cocina == 'Terrazo' ? 'selected' : '' }}>Terrazo</option>
											<option value="Gresite"  {{ $inmueble->extra->suelos_cocina == 'Gresite' ? 'selected' : '' }}>Gresite</option>
											<option value="Linoleo"  {{ $inmueble->extra->suelos_cocina == 'Linoleo' ? 'selected' : '' }}>Linóleo</option>
											<option value="Mosaico"  {{ $inmueble->extra->suelos_cocina == 'Mosaico' ? 'selected' : '' }}>Mosaico</option>
											<option value="Porcelanato"  {{ $inmueble->extra->suelos_cocina == 'Porcelanato' ? 'selected' : '' }}>Porcelanato</option>
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
											<option value="" {{ $inmueble->extra->techo == '' || $inmueble->extra->techo==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Altillos en Techo"  {{ $inmueble->extra->techo == 'Altillos en Techo' ? 'selected' : '' }}>Altillos en Techo</option>
											<option value="Falso Techo"  {{ $inmueble->extra->techo == 'Falso Techo' ? 'selected' : '' }}>Falso Techo</option>
											<option value="Cielo Raso"  {{ $inmueble->extra->techo == 'Cielo Raso' ? 'selected' : '' }}>Cielo Raso</option>
											<option value="Techo de Bobeda"  {{ $inmueble->extra->techo == 'Techo de Bobeda' ? 'selected' : '' }}>Techo de Bobeda</option>
											<option value="Lucido Yeso"  {{ $inmueble->extra->techo == 'Lucido Yeso' ? 'selected' : '' }}>Lucido Yeso</option>
											<option value="Placas Registrables"  {{ $inmueble->extra->techo == 'Placas Registrables' ? 'selected' : '' }}>Placas Registrables</option>
											<option value="Techos Altos"  {{ $inmueble->extra->techo == 'Techos Altos' ? 'selected' : '' }}>Techos Altos</option>
											<option value="Artesonados"  {{ $inmueble->extra->techo == 'Artesonados' ? 'selected' : '' }}>Artesonados</option>
											<option value="Madera"  {{ $inmueble->extra->techo == 'Madera' ? 'selected' : '' }}>Madera</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-tipos-paredes">Tipos de Paredes</label>
									<div class="col-xs-12 col-md-8">
										<select name="paredes" id="w1-tipos-paredes" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $inmueble->extra->paredes == '' || $inmueble->extra->paredes==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Hormigon"  {{ $inmueble->extra->paredes == 'Hormigon' ? 'selected' : '' }}>Hormigon</option>
											<option value="Ladrillo"  {{ $inmueble->extra->paredes == 'Ladrillo' ? 'selected' : '' }}>Ladrillo</option>
											<option value="Pladur"  {{ $inmueble->extra->paredes == 'Pladur' ? 'selected' : '' }}>Pladur</option>
											<option value="Tabique"  {{ $inmueble->extra->paredes == 'Tabique' ? 'selected' : '' }}>Tabique</option>
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
										<input id="w1-banneras" type="text" name="banneras" class="form-control" value="{{ $inmueble->extra->banneras }}">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-griferia">Griferia</label>
									<div class="col-xs-12 col-md-8">
										<input id="w1-griferia" type="text" name="griferia" class="form-control" value="{{ $inmueble->extra->griferia }}">
									</div>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-plato-duchas">Plato de ducha</label>
									<div class="col-xs-12 col-md-8 ">
										<input id="w1-plato-duchas" type="text" name="plato_duchas" class="form-control" value="{{ $inmueble->extra->plato_duchas }}">
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-sanitarios">Sanitarios</label>
									<div class="col-xs-12 col-md-8 ">
										<input id="w1-sanitarios" type="text" name="sanitarios" class="form-control" value="{{ $inmueble->extra->sanitarios }}">
									</div>
								</div>
							</div>
						</div><br>
						<div class="form-group">
							<label class="col-xs-12 col-md-2 control-label" for="w1-obs-acabados">Observaciones</label>
							<div class="col-xs-12 col-md-10">
								<textarea class="form-control" rows="3" id="w1-obs-acabados" name="obs_acabados">{{ $inmueble->extra->obs_acabados }}</textarea>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
									<div class="col-xs-2"></div>
									<div class="col-xs-4">
									<button type="button" data-id="form_acabados" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
										@if($inmueble->extra->agua == 1)
											<input type="checkbox" value=1 id="agua" name="agua" checked="checked"> Agua
										@else
											<input type="checkbox" value=0 id="agua" name="agua"> Agua
										@endif
									</label>
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='gas'>
											@if($inmueble->extra->gas == 1)
												<input type="checkbox" value=1 id="gas" name="gas" checked="checked"> Gas
											@else
												<input type="checkbox" value=0 id="gas" name="gas"> Gas
											@endif
										</label>
									</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='telefono'>
											@if($inmueble->extra->telefono == 1)
												<input type="checkbox" value=1 id="telefono" name="telefono" checked="checked">Teléfono
											@else
												<input type="checkbox" value=0 id="telefono" name="telefono">Teléfono
											@endif
										</label>
									</div>
							</div>
						</div>
						<div class="col-xs-6 col-md-2">
							<div class="form-group">
									<div class="checkbox">
										<label>
											<input type='hidden' value=0 name='tvyfm'>
											@if($inmueble->extra->tvyfm == 1)
												<input type="checkbox" value=1 id="tvyfm" name="tvyfm" checked="checked">Tv y fm
											@else
												<input type="checkbox" value=0 id="tvyfm" name="tvyfm">Tv y fm
											@endif
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
										<option value="" {{ $inmueble->extra->agua_caliente == '' || $inmueble->extra->agua_caliente==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Gas Butano"  {{ $inmueble->extra->agua_caliente == 'Gas Butano' ? 'selected' : '' }}>Gas Butano</option>
										<option value="Gas Natural"  {{ $inmueble->extra->agua_caliente == 'Gas Natural' ? 'selected' : '' }}>Gas Natural</option>
										<option value="Gas Propano"  {{ $inmueble->extra->agua_caliente == 'Gas Propano' ? 'selected' : '' }}>Gas Propano</option>
										<option value="No tiene Gas"  {{ $inmueble->extra->agua_caliente == 'No tiene Gas' ? 'selected' : '' }}>No tiene Gas</option>
										<option value="Termo-Electrico"  {{ $inmueble->extra->agua_caliente == 'Termo-Electrico' ? 'selected' : '' }}>Termo-Electrico</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-cocina">Cocina</label>
								<div class="col-md-8">
									<select name="cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->cocina == '' || $inmueble->extra->cocina==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Pequena"  {{ $inmueble->extra->cocina == 'Pequena' ? 'selected' : '' }}>Pequeña</option>
										<option value="Americana"  {{ $inmueble->extra->cocina == 'Americana' ? 'selected' : '' }}>Americana</option>
										<option value="Amueblada"  {{ $inmueble->extra->cocina == 'Amueblada' ? 'selected' : '' }}>Amueblada</option>
										<option value="Con Armarios"  {{ $inmueble->extra->cocina == 'Con Armarios' ? 'selected' : '' }}>Con Armarios</option>
										<option value="Formica"  {{ $inmueble->extra->cocina == 'Formica' ? 'selected' : '' }}>Formica</option>
										<option value="Francesa"  {{ $inmueble->extra->cocina == 'Francesa' ? 'selected' : '' }}>Francesa</option>
										<option value="Kitchenette"  {{ $inmueble->extra->cocina == 'Kitchenette' ? 'selected' : '' }}>Kitchenette</option>
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
									<input id="w1-electricidad" type="text" name="electricidad" class="form-control" placeholder="" value="{{ $inmueble->extra->electricidad }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-electrodomesticos">Electrodomésticos</label>
								<div class="col-md-8">
									<select id="w1-electrodomesticos" name="electrodomesticos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->electrodomesticos == '' || $inmueble->extra->electrodomesticos==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Calentador de Agua"  {{ $inmueble->extra->electrodomesticos == 'Calentador de Agua' ? 'selected' : '' }}>Calentador de Agua</option>
										<option value="Cocina"  {{ $inmueble->extra->electrodomesticos == 'Cocina' ? 'selected' : '' }}>Cocina</option>
										<option value="Cocina de Gas"  {{ $inmueble->extra->electrodomesticos == 'Cocina de Gas' ? 'selected' : '' }}>Cocina de Gas</option>
										<option value="Cocina Electrica"  {{ $inmueble->extra->electrodomesticos == 'Cocina Electrica' ? 'selected' : '' }}>Cocina Eléctrica</option>
										<option value="Cocina Vitroceramica"  {{ $inmueble->extra->electrodomesticos == 'Cocina Vitroceramica' ? 'selected' : '' }}>Cocina Vitrocerámica</option>
										<option value="Congelador"  {{ $inmueble->extra->electrodomesticos == 'Congelador' ? 'selected' : '' }}>Congelador</option>
										<option value="Equipo de Musica"  {{ $inmueble->extra->electrodomesticos == 'Equipo de Musica' ? 'selected' : '' }}>Equipo de Musica</option>
										<option value="Frigorifico"  {{ $inmueble->extra->electrodomesticos == 'Frigorifico' ? 'selected' : '' }}>Frigorifico</option>
										<option value="Hilo/Ambiente musical"  {{ $inmueble->extra->electrodomesticos == 'Hilo/Ambiente musical' ? 'selected' : '' }}>Hilo/Ambiente musical</option>
										<option value="Horno de Gas"  {{ $inmueble->extra->electrodomesticos == 'Horno de Gas' ? 'selected' : '' }}>Horno de Gas</option>
										<option value="Horno Electrico"  {{ $inmueble->extra->electrodomesticos == 'Horno Electrico' ? 'selected' : '' }}>Horno Eléctrico</option>
										<option value="Lavavajillas"  {{ $inmueble->extra->electrodomesticos == 'Lavavajillas' ? 'selected' : '' }}>Lavavajillas</option>
										<option value="Muchos electrodomesticos"  {{ $inmueble->extra->electrodomesticos == 'Muchos electrodomesticos' ? 'selected' : '' }}>Muchos electrodomésticos</option>
										<option value="Secadora"  {{ $inmueble->extra->electrodomesticos == 'Secadora' ? 'selected' : '' }}>Secadora</option>
										<option value="Triturador Basura"  {{ $inmueble->extra->electrodomesticos == 'Triturador Basura' ? 'selected' : '' }}>Triturador Basura</option>
										<option value="Video"  {{ $inmueble->extra->electrodomesticos == 'Video' ? 'selected' : '' }}>Video</option>
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
										<option value="" {{ $inmueble->extra->equipamientos == '' || $inmueble->extra->equipamientos==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Antena TV Colectiva"  {{ $inmueble->extra->equipamientos == 'Antena TV Colectiva' ? 'selected' : '' }}>Antena TV Colectiva</option>
										<option value="Antena TV Parabolica"  {{ $inmueble->extra->equipamientos == 'Antena TV Parabolica' ? 'selected' : '' }}>Antena TV Parabólica</option>
										<option value="Auditorio"  {{ $inmueble->extra->equipamientos == 'Auditorio' ? 'selected' : '' }}>Auditorio</option>
										<option value="Centralita Telefonos"  {{ $inmueble->extra->equipamientos == 'Centralita Telefonos' ? 'selected' : '' }}>Centralita Telefonos</option>
										<option value="Electricidad Instalada"  {{ $inmueble->extra->equipamientos == 'Electricidad Instalada' ? 'selected' : '' }}>Electricidad Instalada</option>
										<option value="Hilo Musical/Musica Ambiental"  {{ $inmueble->extra->equipamientos == 'Hilo Musical/Musica Ambiental' ? 'selected' : '' }}>Hilo Musical/Música Ambiental</option>
										<option value="Lineas Digitales"  {{ $inmueble->extra->equipamientos == 'Lineas Digitales' ? 'selected' : '' }}>Líneas Digitales</option>
										<option value="Lineas Telefono Analogicas"  {{ $inmueble->extra->equipamientos == 'Lineas Telefono Analogicas' ? 'selected' : '' }}>Lineas Teléfono Analógicas</option>
										<option value="Megafonia"  {{ $inmueble->extra->equipamientos == 'Megafonia' ? 'selected' : '' }}>Megafonia</option>
										<option value="Musica Ambiente"  {{ $inmueble->extra->equipamientos == 'Musica Ambiente' ? 'selected' : '' }}>Música Ambiente</option>
										<option value="Portero Electronico"  {{ $inmueble->extra->equipamientos == 'Portero Electronico' ? 'selected' : '' }}>Portero Electrónico</option>
										<option value="Red Datos"  {{ $inmueble->extra->equipamientos == 'Red Datos' ? 'selected' : '' }}>Red Datos</option>
										<option value="Red Datos Perimetral"  {{ $inmueble->extra->equipamientos == 'Red Datos Perimetral' ? 'selected' : '' }}>Red Datos Perimetral</option>
										<option value="Sala de Juntas"  {{ $inmueble->extra->equipamientos == 'Sala de Juntas' ? 'selected' : '' }}>Sala de Juntas</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-fontaneria">Fontanería</label>
								<div class="col-md-8">
									<input id="w1-fontaneria" type="text" name="fontaneria" class="form-control" placeholder="" value="{{ $inmueble->extra->fontaneria }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-iluminacion">Iluminación</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-iluminacion" type="text" name="iluminacion" class="form-control" placeholder="" value="{{ $inmueble->extra->iluminacion }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-instalaciones">Instalaciones</label>
								<div class="col-md-8">
									<select name="instalaciones" id="w1-instalaciones" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->instalaciones == '' || $inmueble->extra->instalaciones==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="instalaciones"  {{ $inmueble->extra->instalaciones == 'instalaciones' ? 'selected' : '' }}>instalaciones</option>
										<option value="Agua Propia"  {{ $inmueble->extra->instalaciones == 'Agua Propia' ? 'selected' : '' }}>Agua Propia</option>
										<option value="Aire Comprimido"  {{ $inmueble->extra->instalaciones == 'Aire Comprimido' ? 'selected' : '' }}>Aire Comprimido</option>
										<option value="Caja Fuerte"  {{ $inmueble->extra->instalaciones == 'Caja Fuerte' ? 'selected' : '' }}>Caja Fuerte</option>
										<option value="Camara Frigorifica"  {{ $inmueble->extra->instalaciones == 'Camara Frigorifica' ? 'selected' : '' }}>Camara Frigorifica</option>
										<option value="Contador Agua"  {{ $inmueble->extra->instalaciones == 'Contador Agua' ? 'selected' : '' }}>Contador Agua</option>
										<option value="Contador Gas"  {{ $inmueble->extra->instalaciones == 'Contador Gas' ? 'selected' : '' }}>Contador Gas</option>
										<option value="Contador Luz"  {{ $inmueble->extra->instalaciones == 'Contador Luz' ? 'selected' : '' }}>Contador Luz</option>
										<option value="Deposito de Combustible"  {{ $inmueble->extra->instalaciones == 'Deposito de Combustible' ? 'selected' : '' }}>Deposito de Combustible</option>
										<option value="Deposito Residuos Contaminantes"  {{ $inmueble->extra->instalaciones == 'Deposito Residuos Contaminantes' ? 'selected' : '' }}>Deposito Residuos Contaminantes</option>
										<option value="Deposito Residuos Liquidos"  {{ $inmueble->extra->instalaciones == 'Deposito Residuos Liquidos' ? 'selected' : '' }}>Deposito Residuos Liquidos</option>
										<option value="Deposito Residuos Solidos"  {{ $inmueble->extra->instalaciones == 'Deposito Residuos Solidos' ? 'selected' : '' }}>Deposito Residuos Solidos</option>
										<option value="Depuradora"  {{ $inmueble->extra->instalaciones == 'Depuradora' ? 'selected' : '' }}>Depuradora</option>
										<option value="Electricidad"  {{ $inmueble->extra->instalaciones == 'Electricidad' ? 'selected' : '' }}>Electricidad</option>
										<option value="Estanterias de Almacenaje"  {{ $inmueble->extra->instalaciones == 'Estanterias de Almacenaje' ? 'selected' : '' }}>Estanterias de Almacenaje</option>
										<option value="Extraccion Forzada de Aire"  {{ $inmueble->extra->instalaciones == 'Extraccion Forzada de Aire' ? 'selected' : '' }}>Extraccion Forzada de Aire</option>
										<option value="Foso"  {{ $inmueble->extra->instalaciones == 'Foso' ? 'selected' : '' }}>Foso</option>
										<option value="Gas"  {{ $inmueble->extra->instalaciones == 'Gas' ? 'selected' : '' }}>Gas</option>
										<option value="Grupo Electrogeno"  {{ $inmueble->extra->instalaciones == 'Grupo Electrogeno' ? 'selected' : '' }}>Grupo Electrógeno</option>
										<option value="Iluminacion Patio Exterior"  {{ $inmueble->extra->instalaciones == 'Iluminacion Patio Exterior' ? 'selected' : '' }}>Iluminacion Patio Exterior</option>
										<option value="Lineas Telefonicas"  {{ $inmueble->extra->instalaciones == 'Lineas Telefonicas' ? 'selected' : '' }}>Lineas Telefonicas</option>
										<option value="Linea Cenital"  {{ $inmueble->extra->instalaciones == 'Linea Cenital' ? 'selected' : '' }}>Linea Cenital</option>
										<option value="Linea Lateral"  {{ $inmueble->extra->instalaciones == 'Linea Lateral' ? 'selected' : '' }}>Linea Lateral</option>
										<option value="Megafonia Interior"  {{ $inmueble->extra->instalaciones == 'Megafonia Interior' ? 'selected' : '' }}>Megafonia Interior</option>
										<option value="Plataforma Elevadora"  {{ $inmueble->extra->instalaciones == 'Plataforma Elevadora' ? 'selected' : '' }}>Plataforma Elevadora</option>
										<option value="Polipasto"  {{ $inmueble->extra->instalaciones == 'Polipasto' ? 'selected' : '' }}>Polipasto</option>
										<option value="Puente Grua"  {{ $inmueble->extra->instalaciones == 'Puente Grua' ? 'selected' : '' }}>Puente Grua</option>
										<option value="Trasnformador"  {{ $inmueble->extra->instalaciones == 'Trasnformador' ? 'selected' : '' }}>Trasnformador</option>
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
										<option value="" {{ $inmueble->extra->instalaciones_edificio == '' || $inmueble->extra->instalaciones_edificio==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Agua Comunitaria"  {{ $inmueble->extra->instalaciones_edificio == 'Agua Comunitaria' ? 'selected' : '' }}>Agua Comunitaria</option>
										<option value="Aspirotec"  {{ $inmueble->extra->instalaciones_edificio == 'Aspirotec' ? 'selected' : '' }}>Aspirotec</option>
										<option value="Bajante Recogida de Basuras"  {{ $inmueble->extra->instalaciones_edificio == 'Bajante Recogida de Basura' ? 'selected' : '' }}>Bajante Recogida de Basuras</option>
										<option value="Bocas Incendio en Edificio"  {{ $inmueble->extra->instalaciones_edificio == 'Bocas Incendio en Edificio' ? 'selected' : '' }}>Bocas Incendio en Edificio</option>
										<option value="Columna Seca"  {{ $inmueble->extra->instalaciones_edificio == 'Columna Seca' ? 'selected' : '' }}>Columna Seca</option>
										<option value="Electricidad Comunitaria"  {{ $inmueble->extra->instalaciones_edificio == 'Electricidad Comunitaria' ? 'selected' : '' }}>Electricidad Comunitaria</option>
										<option value="Escalera de Incendios"  {{ $inmueble->extra->instalaciones_edificio == 'Escalera de Incendios' ? 'selected' : '' }}>Escalera de Incendios</option>
										<option value="Extintores Edificio"  {{ $inmueble->extra->instalaciones_edificio == 'Extintores Edificio' ? 'selected' : '' }}>Extintores Edificio</option>
										<option value="Gas Butano"  {{ $inmueble->extra->instalaciones_edificio == 'Gas Butano' ? 'selected' : '' }}>Gas Butano</option>
										<option value="Gas Ciudad"  {{ $inmueble->extra->instalaciones_edificio == 'Gas Ciudad' ? 'selected' : '' }}>Gas Ciudad</option>
										<option value="Gas Propano"  {{ $inmueble->extra->instalaciones_edificio == 'Gas Propano' ? 'selected' : '' }}>Gas Propano</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-instalacionesprivadas">Instalaciones privadas</label>
								<div class="col-md-8">
									<select id="w1-instalacionesprivadas" name="instalaciones_privadas" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->instalaciones_privadas == '' || $inmueble->extra->instalaciones_privadas==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Acometida de Agua pie parc"  {{ $inmueble->extra->instalaciones_privadas == 'Acometida de Agua pie parc' ? 'selected' : '' }}>Acometida de Agua pie parc</option>
										<option value="Acometida de Gas pie parc"  {{ $inmueble->extra->instalaciones_privadas == 'Acometida de Gas pie parc' ? 'selected' : '' }}>Acometida de Gas pie parc</option>
										<option value="Acometida de Luz pie parc"  {{ $inmueble->extra->instalaciones_privadas == 'Acometida de Luz pie parc' ? 'selected' : '' }}>Acometida de Luz pie parc</option>
										<option value="Barbacoa"  {{ $inmueble->extra->instalaciones_privadas == 'Barbacoa' ? 'selected' : '' }}>Barbacoa</option>
										<option value="Cuadras"  {{ $inmueble->extra->instalaciones_privadas == 'Cuadras' ? 'selected' : '' }}>Cuadras</option>
										<option value="Deposito de Agua"  {{ $inmueble->extra->instalaciones_privadas == 'Deposito de Agua' ? 'selected' : '' }}>Deposito de Agua</option>
										<option value="Embarcadero"  {{ $inmueble->extra->instalaciones_privadas == 'Embarcadero' ? 'selected' : '' }}>Embarcadero</option>
										<option value="Fosa Septica"  {{ $inmueble->extra->instalaciones_privadas == 'Fosa Septica' ? 'selected' : '' }}>Fosa Septica</option>
										<option value="Fronton"  {{ $inmueble->extra->instalaciones_privadas == 'Fronton' ? 'selected' : '' }}>Fronton</option>
										<option value="Glorieta/Cenador"  {{ $inmueble->extra->instalaciones_privadas == 'Glorieta/Cenador' ? 'selected' : '' }}>Glorieta/Cenador</option>
										<option value="Iluminacion Jardin"  {{ $inmueble->extra->instalaciones_privadas == 'Iluminacion Jardin' ? 'selected' : '' }}>Iluminacion Jardin</option>
										<option value="Invernadero"  {{ $inmueble->extra->instalaciones_privadas == 'Invernadero' ? 'selected' : '' }}>Invernadero</option>
										<option value="Pozo Propio"  {{ $inmueble->extra->instalaciones_privadas == 'Pozo Propio' ? 'selected' : '' }}>Pozo Propio</option>
										<option value="Riego Automatico"  {{ $inmueble->extra->instalaciones_privadas == 'Riego Automatico' ? 'selected' : '' }}>Riego Automatico</option>
										<option value="Sistemas Domoticos"  {{ $inmueble->extra->instalaciones_privadas == 'Sistemas Domoticos' ? 'selected' : '' }}>Sistemas Domoticos</option>
										<option value="Squash"  {{ $inmueble->extra->instalaciones_privadas == 'Squash' ? 'selected' : '' }}>Squash</option>
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
										<option value="" {{ $inmueble->extra->refrigeracion == '' || $inmueble->extra->refrigeracion==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Aacc Central"  {{ $inmueble->extra->refrigeracion == 'Aacc Central' ? 'selected' : '' }}>Aacc Central</option>
										<option value="Aacc Consolas"  {{ $inmueble->extra->refrigeracion == 'Aacc Consolas' ? 'selected' : '' }}>Aacc Consolas</option>
										<option value="Aacc Frio Calor"  {{ $inmueble->extra->refrigeracion == 'Aacc Frio Calor' ? 'selected' : '' }}>Aacc Frio Calor</option>
										<option value="Aacc Solo Frio"  {{ $inmueble->extra->refrigeracion == 'Aacc Solo Frio' ? 'selected' : '' }}>Aacc Solo Frio</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-interruptores">Interruptores</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-interruptores" type="number" min=0 name="interruptores" class="form-control" placeholder="" value="{{ $inmueble->extra->interruptores }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-mecanismos">Mecanismos</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-mecanismos" type="text" name="mecanismos" class="form-control" placeholder="" value="{{ $inmueble->extra->mecanismos }}">
								</div>
							</div>
								</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-seguridad">Sistema de seguridad/vigilancia</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-seguridad" type="text" name="seguridad" class="form-control" placeholder="" value="{{ $inmueble->extra->seguridad }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12 col-md-6 col-md-offset-6">
							<div class="form-group">
								<label class="col-xs-12 col-md-4 control-label" for="w1-tomasdeagua">Tomas de Agua</label>
								<div class="col-xs-12 col-md-8">
									<input id="w1-tomasdeagua" type="number" min=0 name="tomasdeagua" class="form-control" placeholder="" value="{{ $inmueble->extra->tomasdeagua }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obs-instalaciones">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" id="w1-obs-instalaciones" name="obs_instalaciones">{{ $inmueble->extra->obs_instalaciones }}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_instalaciones" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
									<input id="w1-gastoscomunidad"  type="number" min=0 name="gastos_comunidad" class="form-control" placeholder="0" value="{{ $inmueble->extra->gastos_comunidad }}">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-calidadprecio">Calidad/Precio</label>
								<div class="col-md-8">
									<select name="calidad_precio" data-plugin-selectTwo id="w1-calidadprecio" class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->calidad_precio == '' || $inmueble->extra->calidad_precio==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Buen Precio"  {{ $inmueble->extra->calidad_precio == 'Buen Precio' ? 'selected' : '' }}>Buen Precio</option>
										<option value="Caro"  {{ $inmueble->extra->calidad_precio == 'Caro' ? 'selected' : '' }}>Caro</option>
										<option value="Ganga"  {{ $inmueble->extra->calidad_precio == 'Ganga' ? 'selected' : '' }}>Ganga</option>
										<option value="Muy Caro"  {{ $inmueble->extra->calidad_precio == 'Muy Caro' ? 'selected' : '' }}>Muy Caro</option>
										<option value="Precio Justo"  {{ $inmueble->extra->calidad_precio == 'Precio Justo' ? 'selected' : '' }}>Precio Justo</option>
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
											@if($inmueble->extra->rentabilidad == 1)
												<input type="checkbox" value=1 id="rentabilidad" name="rentabilidad" checked="checked"> Rentabilidad
											@else
												<input type="checkbox" value=0 id="rentabilidad" name="rentabilidad"> Rentabilidad
											@endif
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
									<textarea name="obs_datoseconomicos" class="form-control" rows="3" id="w1-obsdatoseconomicos">{{ $inmueble->extra->obs_datoseconomicos }}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_economicos" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
										<option value="" {{ $inmueble->extra->construccion == '' || $inmueble->extra->construccion==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Bloque Granito"  {{ $inmueble->extra->construccion == 'Bloque Granito' ? 'selected' : '' }}>Bloque Granito</option>
										<option value="Bloque Toro"  {{ $inmueble->extra->construccion == 'Bloque Toro' ? 'selected' : '' }}>Bloque Toro</option>
										<option value="Hormigon Prefabricado"  {{ $inmueble->extra->construccion == 'Hormigon Prefabricado' ? 'selected' : '' }}>Hormigon Prefabricado</option>
										<option value="Ladrillo Obra Vista"  {{ $inmueble->extra->construccion == 'Ladrillo Obra Vista' ? 'selected' : '' }}>Ladrillo Obra Vista</option>
										<option value="Obra Metalica"  {{ $inmueble->extra->construccion == 'Obra Metalica' ? 'selected' : '' }}>Obra Metalica</option>
										<option value="Plancha Metalica"  {{ $inmueble->extra->construccion == 'Plancha Metalica' ? 'selected' : '' }}>Plancha Metalica</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-estiloconstruccion">Estilo de Construcción</label>
								<div class="col-md-8">
									<select name="estilo_construccion" id="w1-estiloconstruccion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->estilo_construccion == '' || $inmueble->extra->estilo_construccion==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Casa de Pueblo"  {{ $inmueble->extra->estilo_construccion == 'Casa de Pueblo' ? 'selected' : '' }}>Casa de Pueblo</option>
										<option value="Cortijo"  {{ $inmueble->extra->estilo_construccion == 'Cortijo' ? 'selected' : '' }}>Cortijo</option>
										<option value="Diseno Exclusivo"  {{ $inmueble->extra->estilo_construccion == 'Diseno Exclusivo' ? 'selected' : '' }}>Diseno Exclusivo</option>
										<option value="Diseno Moderno"  {{ $inmueble->extra->estilo_construccion == 'Diseno Moderno' ? 'selected' : '' }}>Diseno Moderno</option>
										<option value="Estilo Pirenaico"  {{ $inmueble->extra->estilo_construccion == 'Estilo Pirenaico' ? 'selected' : '' }}>Estilo Pirenaico</option>
										<option value="Estilo Clasico"  {{ $inmueble->extra->estilo_construccion == 'Estilo Clasico' ? 'selected' : '' }}>Estilo Clasico</option>
										<option value="Estilo Colonial"  {{ $inmueble->extra->estilo_construccion == 'Estilo Colonial' ? 'selected' : '' }}>Estilo Colonial</option>
										<option value="Estilo Neoclásico"  {{ $inmueble->extra->estilo_construccion == 'Estilo Neoclásico' ? 'selected' : '' }}>Estilo Neoclásico</option>
										<option value="Estilo Provenzal"  {{ $inmueble->extra->estilo_construccion == 'Estilo Provenzal' ? 'selected' : '' }}>Estilo Provenzal</option>
										<option value="Estilo Rustico"  {{ $inmueble->extra->estilo_construccion == 'Estilo Rustico' ? 'selected' : '' }}>Estilo Rustico</option>
										<option value="Masía"  {{ $inmueble->extra->estilo_construccion == 'Masía' ? 'selected' : '' }}>Masía</option>
										<option value="Molino"  {{ $inmueble->extra->estilo_construccion == 'Molino' ? 'selected' : '' }}>Molino</option>
										<option value="Otras"  {{ $inmueble->extra->estilo_construccion == 'Otras' ? 'selected' : '' }}>Otras</option>
										<option value="Pazo"  {{ $inmueble->extra->estilo_construccion == 'Pazo' ? 'selected' : '' }}>Pazo</option>
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
										<option value="" {{ $inmueble->extra->estructura == '' || $inmueble->extra->estructura==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Hormigon"  {{ $inmueble->extra->estructura == 'Hormigon' ? 'selected' : '' }}>Hormigon</option>
										<option value="Madera"  {{ $inmueble->extra->estructura == 'Madera' ? 'selected' : '' }}>Madera</option>
										<option value="Metalica"  {{ $inmueble->extra->estructura == 'Metalica' ? 'selected' : '' }}>Metálica</option>
										<option value="Mixta"  {{ $inmueble->extra->estructura == 'Mixta' ? 'selected' : '' }}>Mixta</option>
										<option value="Vigas de Madera"  {{ $inmueble->extra->estructura == 'Vigas de Madera' ? 'selected' : '' }}>Vigas de Madera</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-portalescalera">Portal y Escalera</label>
								<div class="col-md-8">
									<select name="portalyescalera" id="w1-portalescalera" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->portalyescalera == '' || $inmueble->extra->portalyescalera==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Entrada servicio independiente"  {{ $inmueble->extra->portalyescalera == 'Entrada servicio independiente' ? 'selected' : '' }}>Entrada servicio independiente</option>
										<option value="Portal noble"  {{ $inmueble->extra->portalyescalera == 'Portal noble' ? 'selected' : '' }}>Portal noble</option>
										<option value="Portal señorial"  {{ $inmueble->extra->portalyescalera == 'Portal señorial' ? 'selected' : '' }}>Portal señorial</option>
										<option value="Portal sin escalones"  {{ $inmueble->extra->portalyescalera == 'Portal sin escalones' ? 'selected' : '' }}>Portal sin escalones</option>
										<option value="Portal y caja de escaleras"  {{ $inmueble->extra->portalyescalera == 'Portal y caja de escaleras' ? 'selected' : '' }}>Portal y caja de escaleras</option>
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
										<option value="" {{ $inmueble->extra->puerta_entrada == '' || $inmueble->extra->puerta_entrada==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Barrera Vigilada"  {{ $inmueble->extra->puerta_entrada == 'Barrera Vigilada' ? 'selected' : '' }}>Barrera Vigilada</option>
										<option value="Persiana"  {{ $inmueble->extra->puerta_entrada == 'Persiana' ? 'selected' : '' }}>Persiana</option>
										<option value="Persiana Automatica"  {{ $inmueble->extra->puerta_entrada == 'Persiana Automatica' ? 'selected' : '' }}>Persiana Automatica</option>
										<option value="Puerta Abatible Manual"  {{ $inmueble->extra->puerta_entrada == 'Puerta Abatible Manual' ? 'selected' : '' }}>Puerta Abatible Manual</option>
										<option value="Puerta Batiente Automatica"  {{ $inmueble->extra->puerta_entrada == 'Puerta Batiente Automatica' ? 'selected' : '' }}>Puerta Batiente Automatica</option>
										<option value="Puerta Batiente Manual"  {{ $inmueble->extra->puerta_entrada == 'Puerta Batiente Manual' ? 'selected' : '' }}>Puerta Batiente Manual</option>
										<option value="Puerta Manual"  {{ $inmueble->extra->puerta_entrada == 'Puerta Manual' ? 'selected' : '' }}>Puerta Manual</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-numfachadas">Número de Fachadas</label>
								<div class="col-sm-8">
									<input id="w1-numfachadas" type="number" min=0 name="numfachadas" class="form-control" placeholder="0" value="{{ $inmueble->extra->numfachadas }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obsfinca">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" name="obs_finca" id="w1-obsfinca">{{ $inmueble->extra->obs_finca }}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_finca" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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
										<option value="" {{ $inmueble->extra->calif_urbana == '' || $inmueble->extra->calif_urbana==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Conservacion centro historico"  {{ $inmueble->extra->calif_urbana == 'Conservacion centro historico' ? 'selected' : '' }}>Conservacion centro historico</option>
										<option value="Densificacion urbana intensiva"  {{ $inmueble->extra->calif_urbana == 'Densificacion urbana intensiva' ? 'selected' : '' }}>Densificacion urbana intensiva</option>
										<option value="Densificacion urbana semi-intensiva"  {{ $inmueble->extra->calif_urbana == 'Densificacion urbana semi-intensiva' ? 'selected' : '' }}>Densificacion urbana semi-intensiva</option>
										<option value="Industrial"  {{ $inmueble->extra->calif_urbana == 'Industrial' ? 'selected' : '' }}>Industrial</option>
										<option value="Remodelacion privada"  {{ $inmueble->extra->calif_urbana == 'Remodelacion privada' ? 'selected' : '' }}>Remodelacion privada</option>
										<option value="Remodelacion publica"  {{ $inmueble->extra->calif_urbana == 'Remodelacion publica' ? 'selected' : '' }}>Remodelacion publica</option>
										<option value="Sub-zonas plurifamiliares"  {{ $inmueble->extra->calif_urbana == 'Sub-zonas plurifamiliares' ? 'selected' : '' }}>Sub-zonas plurifamiliares</option>
										<option value="Sub-zonas unifamiliares"  {{ $inmueble->extra->calif_urbana == 'Sub-zonas unifamiliares' ? 'selected' : '' }}>Sub-zonas unifamiliares</option>
										<option value="Sustitucion edificacion antigua"  {{ $inmueble->extra->calif_urbana == 'Sustitucion edificacion antigua' ? 'selected' : '' }}>Sustitucion edificacion antigua</option>
										<option value="Verde privado protegido"  {{ $inmueble->extra->calif_urbana == 'Vende privado protegido' ? 'selected' : '' }}>Verde privado protegido</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-cercania">Cercanía a</label>
								<div class="col-md-8">
									<select name="cercania_a" id="w1-cercania" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->cercania_a == '' || $inmueble->extra->cercania_a==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Campo de Golf"  {{ $inmueble->extra->cercania_a == 'Campo de Golf' ? 'selected' : '' }}>Campo de Golf</option>
										<option value="Playa"  {{ $inmueble->extra->cercania_a == 'Playa' ? 'selected' : '' }}>Playa</option>
										<option value="Lago"  {{ $inmueble->extra->cercania_a == 'Lago' ? 'selected' : '' }}>Lago</option>
										<option value="Mar"  {{ $inmueble->extra->cercania_a == 'Mar' ? 'selected' : '' }}>Mar</option>
										<option value="Pantano"  {{ $inmueble->extra->cercania_a == 'Pantano' ? 'selected' : '' }}>Pantano</option>
										<option value="Pistas de Esquí"  {{ $inmueble->extra->cercania_a == 'Pistas de Esquí' ? 'selected' : '' }}>Pistas de Esquí</option>
										<option value="Pueblo"  {{ $inmueble->extra->cercania_a == 'Pueblo' ? 'selected' : '' }}>Pueblo</option>
										<option value="Río"  {{ $inmueble->extra->cercania_a == 'Río' ? 'selected' : '' }}>Río</option>
										<option value="Primera Línea de Playa"  {{ $inmueble->extra->cercania_a == 'Primera Línea de Playa' ? 'selected' : '' }}>Primera Línea de Playa</option>
										<option value="Segunda Línea de Playa"  {{ $inmueble->extra->cercania_a == 'Segunda Línea de Playa' ? 'selected' : '' }}>Segunda Línea de Playa</option>
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
										<option value="" {{ $inmueble->extra->elementos_comunitarios == '' || $inmueble->extra->elementos_comunitarios==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Antena colectiva"  {{ $inmueble->extra->elementos_comunitarios == 'Antena Colectiva' ? 'selected' : '' }}>Antena colectiva</option>
										<option value="Antena parabolica"  {{ $inmueble->extra->elementos_comunitarios == 'Antena parabolica' ? 'selected' : '' }}>Antena parabólica</option>
										<option value="Club social"  {{ $inmueble->extra->elementos_comunitarios == 'Club social' ? 'selected' : '' }}>Club social</option>
										<option value="Fronton"  {{ $inmueble->extra->elementos_comunitarios == 'Fronton' ? 'selected' : '' }}>Frontón</option>
										<option value="Interfono"  {{ $inmueble->extra->elementos_comunitarios == 'Interfono' ? 'selected' : '' }}>Interfono</option>
										<option value="Piscina"  {{ $inmueble->extra->elementos_comunitarios == 'Piscina' ? 'selected' : '' }}>Piscina</option>
										<option value="Pista de tenis"  {{ $inmueble->extra->elementos_comunitarios == 'Pista de tenis' ? 'selected' : '' }}>Pista de tenis</option>
										<option value="Portero automatico"  {{ $inmueble->extra->elementos_comunitarios == 'Portero automatico' ? 'selected' : '' }}>Portero automático</option>
										<option value="Sala de lavanderia"  {{ $inmueble->extra->elementos_comunitarios == 'Sala de lavanderia' ? 'selected' : '' }}>Sala de lavandería</option>
										<option value="Solarium"  {{ $inmueble->extra->elementos_comunitarios == 'Solarium' ? 'selected' : '' }}>Solarium</option>
										<option value="Squash"  {{ $inmueble->extra->elementos_comunitarios == 'Squash' ? 'selected' : '' }}>Squash</option>
										<option value="Television por cable"  {{ $inmueble->extra->elementos_comunitarios == 'Television por cable' ? 'selected' : '' }}>Televisión por cable</option>
										<option value="Television por satelite"  {{ $inmueble->extra->elementos_comunitarios == 'Television por satelite' ? 'selected' : '' }}>Televisión por satélite</option>
										<option value="Terrado con tendedero"  {{ $inmueble->extra->elementos_comunitarios == 'Terrado con tendedero' ? 'selected' : '' }}>Terrado con tendedero</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-entorno">Entorno</label>
								<div class="col-md-8">
									<select name="entorno" id="w1-entorno" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->entorno == '' || $inmueble->extra->entorno==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Cerca zona comercial"  {{ $inmueble->extra->entorno == 'Cerca zona comercial' ? 'selected' : '' }}>Cerca zona comercial</option>
										<option value="Edificio aislado"  {{ $inmueble->extra->entorno == 'Edificio aislado' ? 'selected' : '' }}>Edificio aislado</option>
										<option value="Pocos vecinos"  {{ $inmueble->extra->entorno == 'Pocos vecinos' ? 'selected' : '' }}>Pocos vecinos</option>
										<option value="Zona alto nivel"  {{ $inmueble->extra->entorno == 'Zona alto nivel' ? 'selected' : '' }}>Zona alto nivel</option>
										<option value="Zona bien comunicada"  {{ $inmueble->extra->entorno == 'Zona alto nivel' ? 'selected' : '' }}>Zona bien comunicada</option>
										<option value="Zona céntrica"  {{ $inmueble->extra->entorno == 'Zona céntrica' ? 'selected' : '' }}>Zona céntrica</option>
										<option value="Zona habitada permanentemente"  {{ $inmueble->extra->entorno == 'Zona habitada permanentemente' ? 'selected' : '' }}>Zona habitada permanentemente</option>
										<option value="Zona rural"  {{ $inmueble->extra->entorno == 'Zona rural' ? 'selected' : '' }}>Zona rural</option>
										<option value="Zona tranquila"  {{ $inmueble->extra->entorno == '>Zona tranquila' ? 'selected' : '' }}>Zona tranquila</option>
										<option value="Zona urbana"  {{ $inmueble->extra->entorno == 'Zona urbana' ? 'selected' : '' }}>Zona urbana</option>
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
										<option value="" {{ $inmueble->extra->equipamientos_zonas == '' || $inmueble->extra->equipamientos_zonas==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Cerca campo golf"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca campo golf' ? 'selected' : '' }}>Cerca campo golf</option>
										<option value="Cerca colegios"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca colegios' ? 'selected' : '' }}>Cerca colegios</option>
										<option value="Cerca farmacia"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca farmacia' ? 'selected' : '' }}>Cerca farmacia</option>
										<option value="Cerca guarderia"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca guarderia' ? 'selected' : '' }}>Cerca guarderia</option>
										<option value="Cerca instalaciones colectivas"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca instalaciones colectivas' ? 'selected' : '' }}>Cerca instalaciones colectivas</option>
										<option value="Cerca mercado"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca mercado' ? 'selected' : '' }}>Cerca mercado</option>
										<option value="Cerca parque publico"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca parque publico' ? 'selected' : '' }}>Cerca parque publico</option>
										<option value="Cerca supermercado"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca supermercado' ? 'selected' : '' }}>Cerca supermercado</option>
										<option value="Cerca zona comercial"  {{ $inmueble->extra->equipamientos_zonas == 'Cerca zona comercial' ? 'selected' : '' }}>Cerca zona comercial</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-grado-urbanizacion">Grado Urbanización</label>
								<div class="col-md-8">
									<select name="grado_urbanizacion" id="w1-grado-urbanizacion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->grado_urbanizacion == '' || $inmueble->extra->grado_urbanizacion==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Alto"  {{ $inmueble->extra->grado_urbanizacion == 'Alto' ? 'selected' : '' }}>Alto</option>
										<option value="Bajo"  {{ $inmueble->extra->grado_urbanizacion == 'Bajo' ? 'selected' : '' }}>Bajo</option>
										<option value="Medio"  {{ $inmueble->extra->grado_urbanizacion == 'Medio' ? 'selected' : '' }}>Medio</option>
										<option value="Muy Alto"  {{ $inmueble->extra->grado_urbanizacion == 'Muy Alto' ? 'selected' : '' }}>Muy Alto</option>
										<option value="Muy Bajo"  {{ $inmueble->extra->grado_urbanizacion == 'Muy Bajo' ? 'selected' : '' }}>Muy Bajo</option>
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
										<option value="" {{ $inmueble->extra->sol == '' || $inmueble->extra->sol==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Muy luminosos"  {{ $inmueble->extra->sol == 'Muy luminosos' ? 'selected' : '' }}>Muy luminosos</option>
										<option value="Sol mañanas"  {{ $inmueble->extra->sol == 'Sol mañanas' ? 'selected' : '' }}>Sol mañanas</option>
										<option value="Sol tardes"  {{ $inmueble->extra->sol == 'Sol tardes' ? 'selected' : '' }}>Sol tardes</option>
										<option value="Sol todo el dia"  {{ $inmueble->extra->sol == 'Sol todo el dia' ? 'selected' : '' }}>Sol todo el dia</option>
										<option value="Soleado"  {{ $inmueble->extra->sol == 'Soleado' ? 'selected' : '' }}>Soleado</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-transportes-publicos">Transportes públicos</label>
								<div class="col-md-8">
									<select name="transportes_publicos" id="w1-transportes-publicos" data-plugin-selectTwo class="form-control populate" style="width: 100%">
										<option value="" {{ $inmueble->extra->transportes_publicos == '' || $inmueble->extra->transportes_publicos==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Bien comunicado transp. publicos"  {{ $inmueble->extra->transportes_publicos == 'Bien comunicado transp- publicos' ? 'selected' : '' }}>Bien comunicado transp. públicos</option>
										<option value="Cerca aeropuerto"  {{ $inmueble->extra->transportes_publicos == 'Cerca aeropuerto' ? 'selected' : '' }}>Cerca aeropuerto</option>
										<option value="Cerca autobuses"  {{ $inmueble->extra->transportes_publicos == 'Cerca autobuses' ? 'selected' : '' }}>Cerca autobuses</option>
										<option value="Cerca estacion ferrocarril"  {{ $inmueble->extra->transportes_publicos == 'Cerca estacion ferrocarril' ? 'selected' : '' }}>Cerca estación ferrocarril</option>
										<option value="Cerca estacion tren cercanias"  {{ $inmueble->extra->transportes_publicos == 'Cerca estacion tren cercanias' ? 'selected' : '' }}>Cerca estación tren cercanias</option>
										<option value="Cerca metro"  {{ $inmueble->extra->transportes_publicos == 'Cerca metro' ? 'selected' : '' }}>Cerca metro</option>
										<option value="Cerca puerto"  {{ $inmueble->extra->transportes_publicos == 'Cerca puerto' ? 'selected' : '' }}>Cerca puerto</option>
										<option value="Cerca tranvia"  {{ $inmueble->extra->transportes_publicos == 'Cerca tranvia' ? 'selected' : '' }}>Cerca tranvía</option>
										<option value="Comunicaciones bien"  {{ $inmueble->extra->transportes_publicos == 'Comunicaciones bien' ? 'selected' : '' }}>Comunicaciones bien</option>
										<option value="Comunicaciones mal"  {{ $inmueble->extra->transportes_publicos == 'Comunicaciones mal' ? 'selected' : '' }}>Comunicaciones mal</option>
										<option value="Comunicaciones muy bien transp. publicos"  {{ $inmueble->extra->transportes_publicos == 'Comunicaciones muy bien transp. publicos' ? 'selected' : '' }}>Comunicaciones muy bien transp. públicos</option>
										<option value="Comunicaciones muy buenas"  {{ $inmueble->extra->transportes_publicos == 'Comunicaciones muy buenas' ? 'selected' : '' }}>Comunicaciones muy buenas</option>
										<option value="Comunicaciones regular"  {{ $inmueble->extra->transportes_publicos == 'Comunicaciones regular' ? 'selected' : '' }}>Comunicaciones regular</option>
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
										<option value="" {{ $inmueble->extra->vistas == '' || $inmueble->extra->vistas==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Buenas vistas"  {{ $inmueble->extra->vistas == 'Buenas vistas' ? 'selected' : '' }}>Buenas vistas</option>
										<option value="Vistas a patio interior manzana"  {{ $inmueble->extra->vistas == 'Vistas a patio interior manzana' ? 'selected' : '' }}>Vistas a patio interior manzana</option>
										<option value="Vistas a calle"  {{ $inmueble->extra->vistas == 'Vistas a calle' ? 'selected' : '' }}>Vistas a calle</option>
										<option value="Vistas a campo de golf"  {{ $inmueble->extra->vistas == 'Vistas a campo de golf' ? 'selected' : '' }}>Vistas a campo de golf</option>
										<option value="Vistas a estacion de esqui"  {{ $inmueble->extra->vistas == 'Vistas a estacion de esqui' ? 'selected' : '' }}>Vistas a estacion de esqui</option>
										<option value="Vistas a la ciudad"  {{ $inmueble->extra->vistas == 'Vistas a la ciudad' ? 'selected' : '' }}>Vistas a la ciudad</option>
										<option value="Vistas a la montana"  {{ $inmueble->extra->vistas == 'Vistas a la montana' ? 'selected' : '' }}>Vistas a la montana</option>
										<option value="Vistas a la piscina"  {{ $inmueble->extra->vistas == 'Vistas a la piscina' ? 'selected' : '' }}>Vistas a la piscina</option>
										<option value="Vistas a la zona comunitaria"  {{ $inmueble->extra->vistas == 'Vistas a la zona comunitaria' ? 'selected' : '' }}>Vistas a la zona comunitaria</option>
										<option value="Vistas a la zona deportiva"  {{ $inmueble->extra->vistas == 'Vistas a la zona deportiva' ? 'selected' : '' }}>Vistas a la zona deportiva</option>
										<option value="Vistas a la zona verde"  {{ $inmueble->extra->vistas == 'Vistas a la zona verde' ? 'selected' : '' }}>Vistas a la zona verde</option>
										<option value="Vistas a mar y montana"  {{ $inmueble->extra->vistas == 'Vistas a mar y montana' ? 'selected' : '' }}>Vistas a mar y montana</option>
										<option value="Vistas a parque nacional"  {{ $inmueble->extra->vistas == 'Vistas a parque nacional' ? 'selected' : '' }}>Vistas a parque nacional</option>
										<option value="Vistas a parque publico"  {{ $inmueble->extra->vistas == 'Vistas a parque publico' ? 'selected' : '' }}>Vistas a parque publico</option>
										<option value="Vistas a patio interior ajardinado"  {{ $inmueble->extra->vistas == 'Vistas a patio interior ajardinado' ? 'selected' : '' }}>Vistas a patio interior ajardinado</option>
										<option value="Vistas a plaza"  {{ $inmueble->extra->vistas == 'Vistas a plaza' ? 'selected' : '' }}>Vistas a plaza</option>
										<option value="Vistas al lago"  {{ $inmueble->extra->vistas == 'Vistas al lago' ? 'selected' : '' }}>Vistas al lago</option>
										<option value="Vistas al mar"  {{ $inmueble->extra->vistas == 'Vistas al mar' ? 'selected' : '' }}>Vistas al mar</option>
										<option value="Vistas al puerto"  {{ $inmueble->extra->vistas == 'Vistas al puerto' ? 'selected' : '' }}>Vistas al puerto</option>
										<option value="Vistas al valle"  {{ $inmueble->extra->vistas == 'Vistas al valle' ? 'selected' : '' }}>Vistas al valle</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label class="col-sm-4 control-label" for="w1-distancia-poblacion">Distancia población</label>
								<div class="col-md-8">
									<input id="w1-distancia-poblacion" type="text" name="distancia_poblacion" class="form-control" placeholder="" value="{{ $inmueble->extra->distancia_poblacion }}">
								</div>
							</div>
						</div>
					</div><br>
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label class="col-xs-12 col-md-2  control-label" for="w1-obs-situacion">Observaciones</label>
								<div class="col-xs-12 col-md-10">
									<textarea class="form-control" rows="3" name="obs_situacion" id="w1-obs-situacion">{{ $inmueble->extra->obs_situacion }}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="row">
							<div class="col-xs-2"></div>
							<div class="col-xs-4">
								<button type="button" data-id="form_situacion" class="mb-xs mt-xs mr-xs btn btn-success btn-edit"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
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