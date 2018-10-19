<form class="form-horizontal" novalidate="novalidate">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Acción a Realizar</h2>
			</header>
			<div class="panel-body">
					<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-tipo-cliente">Tipo Acción</label>
					<div class="col-sm-7">
						<select name="tipo_accion" id="w1-tipo-accion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							<optgroup label="AUTOMÁTICAS">
								<option value="">Enviar e-mail</option>
								<option value="">Enviar SMS</option>
							</optgroup>
							<optgroup label="CAPTACIÓN">
								<option value="">Llamada Propietario</option>
								<option value="">Seguimiento de captación</option>
								<option value="">Visita captación</option>
							</optgroup>
							<optgroup label="CIERRE">
								<option value="">Contrato</option>
								<option value="">Reservar Inmueble</option>
								<option value="">Tasación</option>
							</optgroup>
							<optgroup label="COMERCIAL">
								<option value="">Acción comercial propia</option>
								<option value="">Atención oficina</option>
								<option value="">Atención telefónica</option>
								<option value="">e-mail</option>
								<option value="">Llamada Cliente</option>
								<option value="">Oferta económica</option>
								<option value="">Primera visita</option>
								<option value="">Reunión Cliente</option>
								<option value="">Seguimiento </option>
								<option value="">Segunda visita</option>
								<option value="">Solicitud de información</option>
								<option value="">Visita</option>
							</optgroup>
								<optgroup label="MARKETING">
								<option value="">Colgar Cartel</option>
								<option value="">Escaparate</option>
								<option value="">Internet</option>
								<option value="">Mailing</option>
								<option value="">Prensa</option>
								<option value="">Publicar en Díptico</option>
								<option value="">Publicar en prensa</option>
								<option value="">Revista</option>
								<option value="">Telemarketing</option>
							</optgroup>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-asunto">Asunto</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="asunto" id="w1-asunto">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 control-label" for="persona">Importancia</label>
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="radio-custom radio-info">
							<input type="radio" id="persona" name="persona_organizacion">
							<label for="persona">Baja</label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="radio-custom radio-success">
							<input type="radio" name="persona_organizacion" checked="checked">
							<label>Media</label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-2">
						<div class="radio-custom radio-warning">
							<input type="radio" name="persona_organizacion">
							<label>Alta</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-estado-civil">Estado</label>
					<div class="col-md-7">
						<select data-plugin-selectTwo class="form-control populate select2-ajax" name="estado" id="w1-estado" style="width: 100%">
							<option value="">::Seleccionar::</option>
							<option value="Casado">Pendiente</option>
							<option value="Soltero">Realizada</option>
							<option value="Viudo">Anulada</option>
						</select>
					</div>
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Relacionada con</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-cliente">Cliente</label>
					<div class="col-sm-7">
						<select data-plugin-selectTwo class="form-control populate select2-ajax" name="clientes" id="w1-cliente" style="width: 100%">
							<option value="">::Seleccionar::</option>
							@foreach($clientes as $cliente)
								<option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-inmueble">Inmueble</label>
					<div class="col-sm-7">
						<select name="inmuebles" multiple="multiple" id="w1-inmuebles" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' class="form-control populate" style="width: 100%">
							@foreach($inmuebles as $inmueble)
								<option value='{{ $inmueble->id }}'>{{ $inmueble->tipo->nombre }} en {{ $inmueble->zona }}, {{ $inmueble->municipio->nombre }}, {{ $inmueble->pais->nombre }} </option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-demanda">Demanda</label>
					<div class="col-sm-7">
						<select name="demanda" id="w1-demanda" multiple="multiple" data-plugin-multiselect data-plugin-options='{ "maxHeight": 200 }' class="form-control populate" style="width: 100%">
							<option value='' >::Seleccionar::</option>
							@foreach($demandas as $demanda)
								<option value='{{ $demanda->id }}'>
									@if($demanda->inmueble != null)
											{{ $tipos[$demanda->inmueble->tipo_id-1]->nombre }}
											<br>
										@else
											{{ $tipos[$demanda->tipo_inmueble_id-1]->nombre }}
											<br>
										@endif
										, {{ $zonas[$demanda->id] }},
									Id: {{ $demanda->id }}
								</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
		</section>
		<!-- Poner inicialmente no visible, y mostrar solo si el select del tipo de accion es envio email -->
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Datos del envío de la plantilla email</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-agencia">Plantilla</label>
					<div class="col-md-7">
						<select data-plugin-selectTwo class="form-control populate select2-ajax" name="agencia" id="w1-agencia" style="width: 100%">
							<option value="">::Seleccionar::</option>
							<option value="1">CARTEL - ESCAPARATE 1 (1 FOTO)</option>
							<option value="2">CARTEL - ESCAPARATE 2 (2 FOTO)</option>
							<option value="12">CARTEL - ESCAPARATE 2 (2 FOTO) CAT</option>
							<option value="3">CARTEL - ESCAPARATE 3 (4 FOTO)</option>
							<option value="4">DESCRIPTIVO 1 (1 FOTO)</option>
							<option value="5">DESCRIPTIVO 2 (4 FOTO)</option>
							<option value="13">DESCRIPTIVO 2 (4 FOTO) CAT</option>
							<option value="6">(pdf) CARTEL - ESCAPARATE 1 (1 FOTO)</option>
							<option value="7">(pdf) CARTEL - ESCAPARATE 2 (2 FOTO)</option>
							<option value="14">(pdf) CARTEL - ESCAPARATE 2 (2 FOTO) CAT</option>
							<option value="8">(pdf) CARTEL - ESCAPARATE 3 (4 FOTO)</option>
							<option value="9">(pdf) DESCRIPTIVO 1 (1 FOTO)</option>
							<option value="10">(pdf) DESCRIPTIVO 2 (4 FOTO)</option>
							<option value="15">(pdf) DESCRIPTIVO 2 (4 FOTO) CAT</option>
							<option value="11">Dossier</option>
						</select>
					</div>
					<div class="col-md-1">
						<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Formato usado para enviar los inmuebles en el email."></i>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-emails-anexos">Email anexos</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="emails_anexos" id="w1-emails-anexos">
					</div>
					<div class="col-md-1">
						<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Direcciones de correo que no tiene registradas en Inmofactory a las cuales también quiere hacer el envío separados por ;"></i>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-asunto">Asunto</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="asunto" id="w1-asunto">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="mensaje-body">Mensaje</label>
					<div class="col-md-7">
						<textarea class="form-control" rows="3" name="mensaje_body" id="mensaje-body"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Seleccionar documento</label>
					<div class="col-md-7">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-success btn-file">
									<span class="fileupload-exists">Cambiar</span>
									<span class="fileupload-new">Seleccionar fichero</span>
									<input type="file" />
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Eliminar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Poner inicialmente no visible, y mostrar solo si el select del tipo de accion es envio SMS -->
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Datos del envío de SMS</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-emails-anexos">Email anexos</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="emails_anexos" id="w1-emails-anexos">
					</div>
					<div class="col-md-1">
						<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Utilizar para los teléfonos de clientes que no se tengan registrados en Inmofactory a los cuales también quieran hacer el envío. Deberán ir separados por ; El texto máximo es de 100 caracteres."></i>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="mensaje-sms-body">Mensaje</label>
					<div class="col-md-7">
						<textarea class="form-control" rows="3" name="mensaje_sms_body" id="mensaje-sms-body"></textarea>
					</div>
					<div class="col-md-1">
						<h5><span class="label label-info">0/160</span></h5>
					</div>
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Cuando se Realiza</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-4 control-label">Inicio</label>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</span>
										<input type="text" data-plugin-datepicker class="form-control" name="fecha_ini">
									</div>
							</div>
							<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</span>
										<input type="text" data-plugin-timepicker class="form-control" name="hora_ini">
									</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
						<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Especifica la fecha/hora en la que se tiene que comenzar la acción."></i>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label">Fin</label>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</span>
										<input type="text" data-plugin-datepicker class="form-control" name="fecha_fin">
									</div>
							</div>
							<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-clock-o"></i>
										</span>
										<input type="text" data-plugin-timepicker class="form-control" name="hora_fin">
									</div>
							</div>
						</div>
					</div>
					<div class="col-md-1">
						<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Especifica la fecha/hora prevista de finalización de la acción."></i>
					</div>
					<div class="col-md-7 col-md-offset-4">
						<button type="button" class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Añadir Recordatorio</button>
					</div> 
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Datos Generales</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-agencia">Agencia</label>
					<div class="col-md-7">
						<select data-plugin-selectTwo class="form-control populate select2-ajax" name="agencia" id="w1-agencia" style="width: 100%">
							<option value="{{ $agencia->id }}" >{{ $agencia->nombre }}</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-agente">Agente</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="agente" id="w1-agente">
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
					<label class="col-md-4 control-label" for="comentarios">Comentarios</label>
					<div class="col-md-8">
						<textarea class="form-control" rows="3" id="comentarios"></textarea>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div class="col-xs-12">
		<div class="row text-center">
			<button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
		</div>
		<br><br>
	</div>
</form>