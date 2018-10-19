<div class="row">
	<form class="form-horizontal" novalidate="novalidate" action="{{ route('agencias.store') }}" method="post">
		<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
		<input name="user_id" id="user-id" type="hidden" value="{{ Auth::user()->id }}">
		<input name="form_section" type="hidden" value="form_principales">

		<div class="col-md-12">
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Datos generales</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="w1-tipo-p1">Tipo</label>
						<div class="col-sm-3">
							<select name="tipo_p1" id="w1-tipo-p1" data-plugin-selectTwo class="form-control populate" >
								<option value="" selected>::Seleccionar::</option>
								<option value="NIF">NIF</option>
								<option value="otro">Otro</option>
							</select>
						</div>
						<div class="col-sm-4">
							<input type="text" class="form-control input-sm" name="tipo_p2" id="w1-tipo-p2" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="nombre">Nombre</label>
						<div class="col-md-7">
							<input type="text" class="form-control input-sm" name="nombre" id="w1-nombre" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-tipo-sociedad">Tipo sociedad</label>
						<div class="col-md-7">
							<select name="tipo_sociedad" id="w1-tipo-sociedad" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="S.A.">S.A.</option>
								<option value="otro">Otro</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="razon">Razón Social</label>
						<div class="col-md-7">
							<input type="text" class="form-control input-sm" name="razon_social" id="w1-razon" required>
						</div>
					</div>
				</div>
			</section>
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Datos de Contacto</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-telefono">Teléfono</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-sm" name="telefono" id="w1-telefono" required>
						</div>
						<div class="col-md-3">
							<select name="telefono_de" id="w1-telefono-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="Casa">Casa</option>
								<option value="Otro">Otro</option>
								<option value="Personal">Personal</option>
								<option value="Principal">Principal</option>
								<option value="Trabajo">Trabajo</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-telefono">Móvil</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-sm" name="movil" id="w1-movil" required>
						</div>
						<div class="col-md-3">
							<select name="movil_de" id="w1-movil-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="Casa">Casa</option>
								<option value="Otro">Otro</option>
								<option value="Personal">Personal</option>
								<option value="Principal">Principal</option>
								<option value="Trabajo">Trabajo</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-fax">Fax</label>
						<div class="col-md-4">
							<input type="text" class="form-control input-sm" name="fax" id="w1-fax" required>
						</div>
						<div class="col-md-3">
							<select name="fax_de" id="w1-fax-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="Casa">Casa</option>
								<option value="Otro">Otro</option>
								<option value="Personal">Personal</option>
								<option value="Principal">Principal</option>
								<option value="Trabajo">Trabajo</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-email">Correo Electrónico</label>
						<div class="col-md-4">
							<input type="email" class="form-control input-sm" name="email" id="w1-email" required>
						</div>
						<div class="col-md-3">
							<select name="email_de" id="w1-email-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="Casa">Casa</option>
								<option value="Otro">Otro</option>
								<option value="Personal">Personal</option>
								<option value="Principal">Principal</option>
								<option value="Trabajo">Trabajo</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" id="w1-web">Web</label>
						<div class="col-md-7">
							<input type="text" class="form-control input-sm" name="web" id="w1-web" required>
						</div>
					</div>
				</div>
			</section>
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Dirección</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-pais">País</label>
						<div class="col-md-7">
							<select id="w1-pais" data-plugin-selectTwo class="form-control populate" name="pais_id">
									<option value="" selected>::Seleccionar::</option>
								@foreach($paises as $pais)
									<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-codigo-postal">C.P.</label>
						<div class="col-md-7">
							<input type="text" class="form-control input-sm" name="codigo_postal" id="w1-codigo-postal" required>
						</div>
						<div class="col-md-7 col-md-offset-4">
								¿Dudas de tu código postal? <a href="www.correos.es">www.correos.es</a> 
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Municicpio</label>
						<div class="col-md-7">
							<select name="municipio_id" id="w1-municipio" data-plugin-selectTwo class="form-control populate" style="width: 100%">
								<option value="" selected>::Seleccionar::</option>
								<option value="">municipio1</option>
								<option value="">municipio2</option>
								<option value="">municipio3</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-tipovia">Tipo de Vía</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo class="form-control populate" name="via_id" id="w1-tipovia">
									<option value="" selected>::Seleccionar::</option>
								@foreach($vias as $via)
									<option value="{{ $via->id }}">{{ $via->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-calle">Calle</label>
						<div class="col-md-7">
							<input type="text" class="form-control input-sm" name="calle" id="w1-calle" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-numero">No.</label>
						<div class="col-md-3">
							<input type="text" class="form-control input-sm" name="numero" id="w1-numero" required>
						</div>
						<label class="col-md-1 control-label" for="w1-piso">Piso.</label>
						<div class="col-md-3">
							<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso">
								<option value="" selected>::Seleccionar::</option>
								<option value="Sotano">Sótano</option>
								<option value="Subsotano">Subsótano</option>
								<option value="Bajos">Bajos</option>
								<option value="Entresuelo">Entresuelo</option>
								<option value="Principal">Principal</option>
								<option value="1ro">1ro</option>
								<option value="2do">2do</option>
								<option value="3ro">3ro</option>
								<option value="4to">4to</option>
								<option value="5to">5to</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-escalera">Esc.</label>
						<div class="col-md-3">
							<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera" required>
						</div>
						<label class="col-md-1 control-label" for="w1-puerta">Pta.</label>
						<div class="col-md-3">
							<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-7 col-md-offset-4">
							<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-block"><i class="el el-map-marker-alt"></i> Comprobar dirección en el mapa</button>
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
						<label class="col-md-4 control-label" for="w1-notas">Notas</label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="w1-notas" name="notas"></textarea>
						</div>
				</div>
			</section>
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Caducidad</h2>
				</header>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-7 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type='hidden' value=0 name='caducidad_inmuebles'>
									<input type="checkbox" value=1 id="agua" name="caducidad_inmuebles"> Sistema automático de caducidad de Inmuebles
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-7 col-md-offset-4">
							<div class="checkbox">
								<label>
									<input type='hidden' value=0 name='agua'>
									<input type="checkbox" value=1 id="agua" name="agua"> Agua
								</label>
							</div>
						</div>
					</div>
			</section>
			
			<section class="panel panel-featured panel-featured-primary">
				<header class="panel-heading">
					<h2 class="panel-title">Caducidad</h2>
				</header>
				<div class="panel-body">
					<h4>Pendiente</h4>
				</div>
			</section>
		</div>
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-4"></div>
				<div class="col-xs-4">
				<button type="submit"  data-id="form_principales" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block btn-create">Guardar y Continuar</button>
				</div>
				<div class="col-xs-4"></div>
			</div>
			<br><br>
		</div>
	</form>
</div>
<div class="row">
	<div class="col-xs-12">
		<div id="msj_form_principales" class="alert alert-success text-center" role="alert" style="display:none">
			Se guardaron los <strong>"Datos Generales de la Agencia"</strong>
		</div>
	</div>
</div>
