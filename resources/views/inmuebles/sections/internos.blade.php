<div id="msj_internos" class="alert alert-success" role="alert" style="display:none">
	Se guardaron los datos internos.</strong>
</div>
<form class="form-horizontal" id="form-internos" novalidate="novalidate" action="{{ route('internos.store') }}"  method="post">
	<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
	<input id="idu" name="idu" type="hidden" value="{{ $inmueble_id }}">
	<input name="numform" type="hidden" value = 1>
	<div class="tab-content">
			<div class="col-md-12"> 
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Datos Internos del Inmueble</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-4 control-label" for="w1-agencia">Agencia</label>
							<div class="col-md-7">
								<select data-plugin-selectTwo name="agencia_id" class="form-control populate select2-ajax" id="w1-agencia" style="width: 100%">
									@if(count($agencia)>0)
										<option value="{{ $agencia[0]->id }}" selected>{{ $agencia[0]->nombre }}</option>
									@else
										<option value="" selected disabled>--Aun no ha registrado su agencia--</option>
									@endif
								</select>
							</div>
							<div class="demo-icon-hover col-md-1">
								<i class="el el-info-circle"></i>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-agente">Agente</label>
							<div class="col-sm-7">
								<select name="agente" id="w1-agente" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									@if(count($agentes)>0)
										@foreach($agentes as $agente)
											<option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
										@endforeach
									@else
										<option value="" selected disabled>-- Aun no hay Agentes registrados --</option>
									@endif
								</select>
							</div>
							<div class="demo-icon-hover col-md-1">
								<i class="el el-info-circle"></i>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-cliente-propietario">Cliente Propietario</label>
							<div class="col-sm-7">
								<select name="clientepropietario" id="w1-cliente-propietario" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									@if(count($clientes)>0)
										@foreach($clientes as $cliente)
											<option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
										@endforeach
									@else
										<option value="" selected disabled>-- Aun no hay Clientes registrados --</option>
									@endif
								</select>
							</div>
							<div class="demo-icon-hover col-md-1">
								<i class="el el-info-circle"></i>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-3 col-md-offset-4">
								<a href="{{ route('clientes.create') }}" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i> Dar de Alta un Cliente</a>
							</div> 
						</div>
					</div>
				</section>
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Precios Propietario</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-4 control-label" for="w1-precio-publico">Modalidad</label>
							<div class="col-md-8">
								<div class="alert alert-info fade in nomargin">
									<h6>Alquiler residencial (Mensual)</h6>
									<div class="row">
										<label class="col-sm-4 control-label" for="w1-precio-publico">Precio público</label>
										<div class="col-sm-8">
											<input type="number" min=0 class="form-control input-sm" name="alqres_precio_pub" id="w1-precio-publico" placeholder="0" required>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 control-label" for="w1-precio-propietario">Precio propietario</label>
										<div class="col-sm-7">
											<input type="number" min=0  class="form-control input-sm" name="alqres_precio_prop" id="w1-precio-propietario" placeholder="0" required>
										</div>
										<div class="col-sm-7 col-sm-offset-4">
											<button class="btn btn-info mt-xs mb-xs"><i class="fa fa-book" aria-hidden="true"></i> Ver Histórico de Precios</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-honorarios">Honorarios</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="honorarios" rows="3" id="w1-honorarios" placeholder="Indica el tipo de honorarios"></textarea>
							</div>
						</div>
					</div>
				</section>
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Datos Internos</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-4 control-label" for="w1-medio">Medio Captación</label>
							<div class="col-md-7">
								<select data-plugin-selectTwo class="form-control populate" id="w1-medio" name="medio_captacion">
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
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
									<input type="checkbox" value=0 id="contrato-firmado" name="contrato_firmado">
									<input type="checkbox" value=1 checked="" id="contrato-firmado" name="contrato_firmado">
									<label for="contrato-firmado">Dispone de contrato firmado.</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Inicio Contrato</label>
							<div class="col-md-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" name="ini_contrato">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Fin Contrato</label>
							<div class="col-md-7">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</span>
									<input type="date" class="form-control" name="fin_contrato">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
									<input type="checkbox" value=0 id="en-exclusiva" name="en_exclusica">
									<input type="checkbox" value=1 checked="" id="en-exclusiva" name="en_exclusica">
									<label for="en-exclusiva">Inmueble en Exclusiva.</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="w1-ubicacion-llaves">Ubicación Llaves</label>
							<div class="col-md-7">
								<select data-plugin-selectTwo class="form-control populate" id="w1-ubicacion-llaves" name="ubicacion_llaves">
										<option value="">::Seleccionar::</option>
										<option value="Porteria">Porteria</option>
										<option value="Oficina">Oficina</option>
										<option value="Empresa delegada">Empresa delegada</option>
										<option value="Propietario">Propietario</option>
										<option value="Inquilino">Inquilino</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-comment_llaves">Comentario Llaves</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="comment_llaves" id="w1-comment_llaves" required>
							</div>
						</div>
					</div>
				</section>
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Datos Registrables</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-num">Número</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_num" id="w1-reg_num" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-tomo">Tomo</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_tomo" id="w1-reg_tomo" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-libro">Libro</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_libro" id="w1-reg_libro" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-folio">Folio</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_folio" id="w1-reg_folio" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-finca">Finca</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_finca" id="w1-reg_finca" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-registrode">Registro de</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_registrode" id="w1-reg_registrode" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-desregistral">Des. Registral</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_desregistral" id="w1-reg_desregistral" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-catastral">Ref. Catastral</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_catastral" id="w1-reg_catastral" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<a href="" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i> Obtener Ref. Catastro</a>
								<a href="" class="btn btn-warning"><i class="fa fa-user-plus" aria-hidden="true"></i> Validar Referencia</a>
							</div> 
						</div>
					</div>
				</section>
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Notas Internas</h2>
					</header>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-notas-int">Notas</label>
							<div class="col-sm-8">
								<textarea class="form-control" rows="3" id="w1-notas-int" name="notas_int"></textarea>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-xs-12">
				<div class="row text-center">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-guardar-internos"  data-getouttab="tab-internos" data-getoutcontent="w1-internos" data-getintab="tab-demandas" data-getincontent="w1-demandas"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
				</div>
				<br><br>
			</div>
	</div>
</form>