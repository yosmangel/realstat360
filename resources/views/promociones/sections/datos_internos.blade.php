<form class="form-horizontal" id="form-internos" action="" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="numform" type="hidden" value = 1> 
					<!-- $id es el id de la promocion actual -->
					<input id="idu" name="idu" type="hidden" value=""> 
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos comerciales de la promoción</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-nombre">Agencia</label>
									<div class="col-md-7">
										@if(count($agencias)>0)
											<select data-plugin-selectTwo class="form-control populate" name="agencia" id="w1-agencia">
												@foreach($agencias as $agencia)
													<option value="{{ $agencia->id }}">{{ $agencia->nombre }}</option>
												@endforeach
											</select>
										@else
											<select data-plugin-selectTwo disabled="disabled" class="form-control populate" name="agencia" id="w1-agencia">
												<option value="">-- No se ha dado de alta a la Agencia --</option>
											</select>
										@endif
									</div>
									<div class="col-md-1">
										<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="La que administra o gestiona el inmueble.">
											<i class="el el-info-circle"></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-agente">Agente</label>
									<div class="col-md-7">
										@if(count($agentes)>0)
											<select data-plugin-selectTwo class="form-control populate" name="agente" id="w1-agente">
												@foreach($agentes as $agente)
													<option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
												@endforeach
											</select>
										@else
											<select data-plugin-selectTwo disabled="disabled" class="form-control populate" name="agente" id="w1-agente">
												<option value="">-- No se ha dado de alta ningun Agente--</option>
											</select>
										@endif
									</div>
									<div class="col-md-1">
										<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Puede asociar a este inmueble el agente que lo gestiona.">
											<i class="el el-info-circle"></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-cliente-propietario">Cliente Propietario</label>
									<div class="col-md-7">
										<input type="text" class="form-control input-sm" name="cliente_propietario" id="w1-cliente-propietario" required>
									</div>
									<div class="col-md-1">
										<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Nombre del propietario del inmueble.">
											<i class="el el-info-circle"></i>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<a class="btn btn-warning" role="button" href="#">
											<i class="fa fa-plus" aria-hidden="true"></i> Alta Cliente
										</a>
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
									<label class="col-sm-4 control-label" for="w1-medio-captacion">Medio Captación</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-medio-captacion" name="medio_captacion">
											<option value="">::Seleccionar::</option>
											<option value="el_correo">EL CORREO</option>
											<option value="worldimmo">www.worldimmo.org  </option>
											<option value="trovimap">trovimap.com</option>
											<option value="anuncit">anuncit.com</option>
											<option value="web">una web</option>
											<option value="idealista">idealista</option>
											<option value="mitula">mitula.com</option>
											<option value="granmanzana">granmanzana.es</option>
											<option value="plandeprotecciondealquiler">plandeprotecciondealquiler.com</option>
											<option value="inmoportalix">inmoportalix</option>
											<option value="Divendo">Divendo.es</option>
											<option value="Micasa">Micasa.es</option>
											<option value="Pisocasas">Pisocasas.com</option>
											<option value="anuncioneon">anuncioneon</option>
											<option value="puertas_abiertas">JORNADA PUERTAS ABIERTAS</option>
											<option value="llamada_telefonica">LLAMADA TELEFONICA</option>
											<option value="Cartel2">Cartel 2</option>
											<option value="Buscador">Buscador Web 2</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<div class="checkbox-custom checkbox-info">
											<input type="hidden" value=0 name="contrato">
											<input type="checkbox" value=1 id="contrato" name="contrato">
											<label for="contrato">Dispone de contrato</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-inicio-contrato">Inicio contrato</label>
									<div class="col-md-7">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input type="date" class="form-control inputs-contratos" name="inicio_contrato" id="w1-inicio-contrato" disabled="disabled">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-fin-contrato">Fin contrato</label>
									<div class="col-md-7">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input type="date" class="form-control inputs-contratos" name="fin_contrato" id="w1-fin-contrato" disabled="disabled">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<div class="checkbox-custom checkbox-info">
											<input type="hidden" value=0 name="inm_exclusiva">
											<input type="checkbox" value=1 id="w1-inmueble-exclusiva" name="inm_exclusiva">
											<label for="w1-inmueble-exclusiva">Inmueble en exclusiva</label>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-llaves">Ubicación llaves</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="llaves" id="w1-llaves">
											<option value="">::Seleccionar::</option>
											<option value="Porteria">Porteria</option>
											<option value="Oficina">Oficina</option>
											<option value="empresa_delegada">Empresa delegada</option>
											<option value="Propietario">Propietario</option>
											<option value="Inquilino">Inquilino</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-coment-llaves">Comentario llaves</label>
									<div class="col-md-7">
										<input type="text" class="form-control input-sm" name="coment_llaves" id="w1-coment-llaves" required>
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
									<label class="col-md-4 control-label" for="notas-internas">Notas</label>
									<div class="col-md-7">
										<textarea class="form-control" rows="3" id="notas-internas" name="notas_internas"></textarea>
									</div>
								</div>
							</div>
						</section>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-4"></div>
								<div class="col-xs-4">
									<button type="button" data-id="form_internos" class="mb-xs mt-xs mr-xs btn btn-success btn-submit-internos"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
								</div>
							</div>
							<br><br>
						</div>
				</form>