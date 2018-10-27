<div id="msj_internos" class="alert alert-success" role="alert" style="display:none">
	Se guardaron los datos internos.</strong>
</div>
<div id="responseInternos" class="alert alert-danger" role="alert" style="display:none">
		</div>
<form class="form-horizontal" id="form-internos" novalidate="novalidate" action="{{ route('internos.update',0) }}"  method="post">
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
								<select name="agente_id" id="w1-agente" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									@if(count($agentes)>0)
										@foreach($agentes as $agente)
											<option value="{{ $agente->id }}" {{ $inmueble->interno->agente_id == $agente->id ? 'selected' : '' }}>{{ $agente->nombre }}</option>
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
								<select name="cliente_prop_id" id="w1-cliente-propietario" data-plugin-selectTwo class="form-control populate" style="width: 100%">
									@if(count($clientes)>0)
										@foreach($clientes as $cliente)
											<option value="{{ $cliente->id }}" {{ $inmueble->interno->cliente_prop_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }} {{ $cliente->apellidos }}</option>
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
											<input type="number" min=0 class="form-control input-sm" name="alqres_precio_pub" id="w1-precio-publico" placeholder="0" value={{$inmueble->interno->alqres_precio_pub}}>
										</div>
									</div>
									<div class="row">
										<label class="col-sm-4 control-label" for="w1-precio-propietario">Precio propietario</label>
										<div class="col-sm-7">
											<input type="number" min=0  class="form-control input-sm" name="alqres_precio_prop" id="w1-precio-propietario" placeholder="0" value={{$inmueble->interno->alqres_precio_prop}}>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-honorarios">Honorarios</label>
							<div class="col-sm-7">
								<textarea class="form-control" name="honorarios" rows="3" id="w1-honorarios" placeholder="Indica el tipo de honorarios">{{$inmueble->interno->honorarios}}</textarea>
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
										<option value="" {{ $inmueble->interno->medio_captacion == '' || $inmueble->interno->medio_captacion==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Acciones de Buzoneo" {{ $inmueble->interno->medio_captacion == "Acciones de Buzoneo" ? 'selected' : '' }}>Acciones de Buzoneo</option>
										<option value="Anuncio neon" {{ $inmueble->interno->medio_captacion == "Anuncio neon" ? 'selected' : '' }}>Anuncio neon</option>
										<option value="anuncit.com" {{ $inmueble->interno->medio_captacion == "anuncit.com" ? 'selected' : '' }}>anuncit.com</option>
										<option value="Buscador Web 2" {{ $inmueble->interno->medio_captacion == "Buscador Web 2" ? 'selected' : '' }}>Buscador Web 2</option>
										<option value="cartel 2" {{ $inmueble->interno->medio_captacion == "cartel 2" ? 'selected' : '' }}>cartel 2</option>
										<option value="Cliente recomendado" {{ $inmueble->interno->medio_captacion == "Cliente recomendado" ? 'selected' : '' }}>Cliente recomendado</option>
										<option value="Colaborador" {{ $inmueble->interno->medio_captacion == "Colaborador" ? 'selected' : '' }}>Colaborador</option>
										<option value="dividendo.es" {{ $inmueble->interno->medio_captacion == "dividendo.es" ? 'selected' : '' }}>dividendo.es</option>
										<option value="EL CORREO" {{ $inmueble->interno->medio_captacion == "EL CORREO" ? 'selected' : '' }}>EL CORREO</option>
						                <option value="granmanzana.es" {{ $inmueble->interno->medio_captacion == "granmanzana.es" ? 'selected' : '' }}>granmanzana.es</option>
						                <option value="Idealista" {{ $inmueble->interno->medio_captacion == "Idealista" ? 'selected' : '' }}>Idealista</option>
						                <option value="Inmoportalix" {{ $inmueble->interno->medio_captacion == "Inmoportalix" ? 'selected' : '' }}>Inmoportalix</option>
						                <option value="Jornada Puertas Abiertas" {{ $inmueble->interno->medio_captacion == "Jornada Puertas Abiertas" ? 'selected' : '' }}>Jornada Puertas Abiertas</option>
						                <option value="Llamada Telefonica" {{ $inmueble->interno->medio_captacion == "Llamada Telefonica" ? 'selected' : '' }}>Llamada Telefonica</option>
						                <option value="micasa.es" {{ $inmueble->interno->medio_captacion == "micasa.es" ? 'selected' : '' }}>micasa.es</option>
						                <option value="mitula.com" {{ $inmueble->interno->medio_captacion == "mitula.com" ? 'selected' : '' }}>mitula.com</option>
						                <option value="Oficina/Escaparate" {{ $inmueble->interno->medio_captacion == "Oficina/Escaparate" ? 'selected' : '' }}>Oficina/Escaparate</option>
						                <option value="otro" {{ $inmueble->interno->medio_captacion == "otro"? 'selected' : '' }}>otro</option>
						                <option value="pisocasas.com" {{ $inmueble->interno->medio_captacion == "pisocasas.com" ? 'selected' : '' }}>pisocasas.com</option>
						                <option value="plandeprotecciondealquiler.com" {{ $inmueble->interno->medio_captacion == "plandeprotecciondealquiler.com" ? 'selected' : '' }}>plandeprotecciondealquiler.com</option>
						                <option value="Redes Sociales" {{ $inmueble->interno->medio_captacion == "Redes Sociales" ? 'selected' : '' }}>Redes Sociales</option>
						                <option value="trovimap.com" {{ $inmueble->interno->medio_captacion == "trovimap.com" ? 'selected' : '' }}>trovimap.com</option>
						                <option value="una web" {{ $inmueble->interno->medio_captacion == "una web" ? 'selected' : '' }}>una web</option>
						                <option value="wordinmo.com" {{ $inmueble->interno->medio_captacion == "wordinmo.com" ? 'selected' : '' }}>wordinmo.com</option>
								</select>
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
									<input type='hidden' value=0 name='contrato_firmado'>
									@if($inmueble->interno->contrato_firmado == 1)
										<input type="checkbox" value=1 id="contrato-firmado" name="contrato_firmado" checked="checked">
									@else
										<input type="checkbox" value=0 checked="" id="contrato-firmado" name="contrato_firmado">
									@endif
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
									<input type="date" class="form-control" name="ini_contrato" value="{{$inmueble->interno->ini_contrato}}">
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
									<input type="date" class="form-control" name="fin_contrato" value="{{$inmueble->interno->fin_contrato}}">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
									<input type='hidden' value=0 name='en_exclusica'>
									@if($inmueble->interno->en_exclusica == 1)
										<input type="checkbox" value=1 id="en-exclusiva" name="en_exclusica" checked="checked">
									@else
										<input type="checkbox" value=0  id="en-exclusiva" name="en_exclusica">
									@endif
									<label for="en-exclusiva">Inmueble en Exclusiva.</label>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" for="w1-ubicacion-llaves">Ubicación Llaves</label>
							<div class="col-md-7">
								<select data-plugin-selectTwo class="form-control populate" id="w1-ubicacion-llaves" name="ubicacion_llaves">
										<option value="" {{ $inmueble->interno->ubicacion_llaves == '' || $inmueble->interno->ubicacion_llaves==null ? 'selected' : '' }}>::Seleccionar::</option>
										<option value="Porteria" {{ $inmueble->interno->ubicacion_llaves == "Porteria" ? 'selected' : '' }}>Porteria</option>
										<option value="Oficina" {{ $inmueble->interno->ubicacion_llaves == "Oficina" ? 'selected' : '' }}>Oficina</option>
										<option value="Empresa delegada" {{ $inmueble->interno->ubicacion_llaves == "Empresa delegada" ? 'selected' : '' }}>Empresa delegada</option>
										<option value="Propietario" {{ $inmueble->interno->ubicacion_llaves == "Propietario" ? 'selected' : '' }}>Propietario</option>
										<option value="Inquilino" {{ $inmueble->interno->ubicacion_llaves == "Inquilino" ? 'selected' : '' }}>Inquilino</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-comment_llaves">Comentario Llaves</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="comment_llaves" id="w1-comment_llaves" value="{{$inmueble->interno->comment_llaves}}">
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
								<input type="text" class="form-control input-sm" name="reg_num" id="w1-reg_num" value="{{$inmueble->interno->reg_num}}" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-tomo">Tomo</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_tomo" id="w1-reg_tomo" value="{{$inmueble->interno->reg_tomo}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-libro">Libro</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_libro" id="w1-reg_libro" value="{{$inmueble->interno->reg_libro}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-folio">Folio</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_folio" id="w1-reg_folio" value="{{$inmueble->interno->reg_folio}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-finca">Finca</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_finca" id="w1-reg_finca" value="{{$inmueble->interno->reg_finca}}" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-registrode">Registro de</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_registrode" id="w1-reg_registrode" value="{{$inmueble->interno->reg_registrode}}" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-desregistral">Des. Registral</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_desregistral" id="w1-reg_desregistral"value="{{$inmueble->interno->reg_desregistral}}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label" for="w1-reg-catastral">Ref. Catastral</label>
							<div class="col-sm-7">
								<input type="text" class="form-control input-sm" name="reg_catastral" id="w1-reg_catastral" value="{{$inmueble->interno->reg_catastral}}">
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
								<textarea class="form-control" rows="3" id="w1-notas-int" name="notas_int">{{$inmueble->interno->notas_int}}</textarea>
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