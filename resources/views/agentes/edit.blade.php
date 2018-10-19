@extends('layouts.app')
@section('title','Nuevo Agente')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Nuevo Agente</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('agentes.index') }}">Agentes</span></a></li>
								<li><span><a href="{{ route('agentes.create') }}">Editar Agente</span></a></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w1">
								<header class="panel-heading">
									<div class="panel-actions">
										<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
									</div>
									<h2 class="panel-title">Editar Agente</h2>
								</header>
								<div class="panel-body panel-body-nopadding">
									@if($agencia == '') <!-- Si no se han completado los datos de la agencia se muestra una alerta -->
										<div class="row">
											<div class="col-xs-10 col-xs-offset-1">
												<br>
												<div class="alert alert-dark">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
													<strong>¡Alerta!</strong>
													Antes de crear un agente debe
													<a href="{{ route('agencias.create') }}" class="alert-link"><strong> Completar los datos de la Agencia</strong>
													</a>.
												</div>
											</div>
										</div>
									@else
											<div id="msj_edit" class="alert alert-success" role="alert" style="display:none">
												Se actualizaron los datos del Agente.</strong>
											</div>
											<form class="form-horizontal" novalidate="novalidate" action="{{ route('agentes.update', $agente->id) }}" method="post">
												<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">

												@if(count($errors)>0)
													<section>
														<div class="panel-body">
																<div class="form-group">
																	<!-- Validation ERRORS -->
																		<div class="alert alert-danger" role="alert">
																			<ul>
																				@foreach($errors->all() as $error)
																					<li>{{ $error }}</li>
																				@endforeach
																			</ul>
																		</div>
																</div>
														</div>
													</section>
												@endif

												<section class="panel panel-featured panel-featured-primary">
													<header class="panel-heading">
														<h2 class="panel-title">Datos generales del Agente </h2>
													</header>
													<div class="panel-body">
														<div class="form-group">
															<label class="col-xs-12 col-sm-4 control-label" for="radioSr">Tratamiento</label>
															<div class="hidden-xs hidden-sm col-md-1"></div>
															<div class="col-xs-12 col-sm-4 col-md-3">
																<div class="radio-custom radio-primary">
																	<input type="radio" id="radioSr" name="tratamiento" value=1 <?php echo ($agente->tratamiento == 1) ? 'checked=\"checked\"' : '' ?> >
																	<label for="radioSr">Señor (Sr.)</label>
																</div>
															</div>
															<div class="col-xs-12 col-sm-4 col-md-3">
																<div class="radio-custom radio-warning">
																	<input type="radio" id="radioSra" name="tratamiento" value=0 <?php echo ($agente->tratamiento == 0) ? 'checked=\"checked\"' : '' ?>>
																	<label for="radioSra">Señora (Sra.)</label>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Nombre</label>
															<div class="col-md-7">
																<input type="text" class="form-control input-sm" name="nombre" id="w1-nombre" value="{{ $agente->nombre }}" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Apellidos</label>
															<div class="col-md-7">
																<input type="text" class="form-control input-sm" name="apellidos" id="w1-apellidos" value="{{ $agente->apellidos }}" required>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-4 control-label" for="w1-idioma">Idioma</label>
															<div class="col-md-7">
																<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id">
																	@foreach($idiomas as $idioma)
																		<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
																	@endforeach
																</select>
															</div>
															<div class="col-md-1">
																<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica los idiomas que habla el Agente para permitir una atención mas personalizada a tus clientes.">
																	<i class="el el-info-circle"></i>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Asignar Color</label>
															<div class="col-md-2">
																<div class="input-group color" data-plugin-colorpicker>
																	<span class="input-group-addon"><i></i></span>
																	<input type="text" name="color" class="form-control" value="#0088cc">
																</div>
															</div>
															<label class="col-xs-12 col-sm-1 control-label" for="acceso-permitido">Acceso</label>
															<div class="col-xs-12 col-sm-2">
																<div class="radio-custom radio-success">
																	<input type="radio" id="acceso-permitido" name="acceso" id="acceso-permitido" value=1 <?php echo ($agente->acceso == 1) ? 'checked=\"checked\"' : '' ?>>
																	<label for="acceso-permitido">Permitido</label>
																</div>
															</div>
															<div class="col-xs-12 col-sm-2">
																<div class="radio-custom radio-default">
																	<input type="radio" id="acceso-no-permitido" name="acceso" value=0 <?php echo ($agente->acceso == 0) ? 'checked=\"checked\"' : '' ?>>
																	<label for="acceso-no-permitido">No Permitido</label>
																</div>
															</div>
														</div>
														
														<div class="form-group">
															<label class="col-sm-4 control-label" for="w1-idioma">Rol Usuario</label> 
															<div class="col-md-7">
																<select data-plugin-selectTwo class="form-control populate" id="w1-rol" name="rol">
																	<option value="{{ $agente->rol }}">{{ $agente->rol }}</option>
																	<option value="Gestor">Gestor</option>
																	<option value="Comercial">Comercial</option>
																	<option value="Comercial Junior">Comercial Junior</option>
																</select>
															</div>
															<div class="col-md-1">
																<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica los roles asociados al Agente para indicar que permisos tendrá soble la aplicación.">
																	<i class="el el-info-circle"></i>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Horario</label>
															<div class="col-md-7">
																<div class="table-responsive">
																	<table class="table table-striped mb-none text-center">
																		<thead>
																			<tr>
																				<th>Sesión</th>
																				<th>Lun.</th>
																				<th>Mar.</th>
																				<th>Mie.</th>
																				<th>Jue.</th>
																				<th>Vie.</th>
																				<th>Sab.</th>
																				<th>Dom.</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Mañana</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="lun_man">
																						<input type="checkbox" id="lun-man" value=1 name="lun_man" <?php echo ($agente->lun_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="mar_man">
																						<input type="checkbox" id="lun-man" value=1 name="mar_man" <?php echo ($agente->mar_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="mie_man">
																						<input type="checkbox" id="mie-man" value=1 name="mie_man" <?php echo ($agente->mie_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="jue_man">
																						<input type="checkbox" id="jue-man" value=1 name="jue_man" <?php echo ($agente->jue_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="vie_man">
																						<input type="checkbox" id="vie-man" value=1 name="vie_man" <?php echo ($agente->vie_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="sab_man">
																						<input type="checkbox" id="sab-man" value=1 name="sab_man" <?php echo ($agente->sab_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="dom_man">
																						<input type="checkbox" id="dom-man" value=1 name="dom_man" <?php echo ($agente->dom_man == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																			</tr>
																			<tr>
																				<td>Tarde</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="lun_tar">
																						<input type="checkbox" id="lun-tar" value=1 name="lun_tar" <?php echo ($agente->lun_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="mar_tar">
																						<input type="checkbox" id="lun-tar" value=1 name="mar_tar" <?php echo ($agente->mar_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="mie_tar">
																						<input type="checkbox" id="mie-tar" value=1 name="mie_tar" <?php echo ($agente->mie_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="jue_tar">
																						<input type="checkbox" id="jue-tar" value=1 name="jue_tar" <?php echo ($agente->jue_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="vie_tar">
																						<input type="checkbox" id="vie-tar" value=1 name="vie_tar" <?php echo ($agente->vie_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="sab_tar">
																						<input type="checkbox" id="sab-tar" value=1 name="sab_tar" <?php echo ($agente->sab_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																				<td>
																					<label class="checkbox">
																						<input type="hidden" value=0 name="dom_tar">
																						<input type="checkbox" id="dom-tar" value=1 name="dom_tar" <?php echo ($agente->dom_tar == 1) ? 'checked=\"checked\"' : '' ?>>
																					</label>
																				</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="col-md-1">
																<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el horario de trabajo de los Agentes para poder gestionar sus Agendas con mayor eficacia.">
																	<i class="el el-info-circle"></i>
																</div>
															</div>
														</div>
													</div>
												</section>
												<section class="panel panel-featured panel-featured-primary">
													<header class="panel-heading">
														<h2 class="panel-title">
															Gestión de Entidades 
																<span class="demo-icon-hover test" data-toggle="tooltip" data-placement="bottom" 
																title="Cuando en una entidad, por ejemplo clientes, se asigne que solo puede trabajar con lo que el agente esté asignado, 
																el agente podrá:
																	(1)- En la pestaña clientes no podrá buscar clientes en los que él no esté como agente asignado.
																	(2)- Al imprimir y exportar tampoco mostraran datos de los clientes en los que el agente no esté asignado.
																	(3)- En cliente propietario de inmueble, demandas y acciones se visualizará el nombre del cliente pero no podrá acceder a él si el agente no lo tiene asignado."><i class="el el-info-circle"></i>
																	</span>	
														</h2>
													</header>
													<div class="panel-body">
														<div class="form-group">
															<label class="col-xs-12 col-sm-4 control-label">Clientes</label>
															<div class="hidden-xs hidden-sm col-md-1"></div>
															<div class="col-xs-12 col-sm-3 col-md-2">
																<div class="radio-custom radio-primary">
																	<input type="radio" id="clientes-todos" name="clientes_permitidos" <?php echo ($agente->clientes_permitidos == 1) ? 'checked=\"checked\"' : '' ?> value=1>
																	<label for="clientes-todos">Todos</label>
																</div>
															</div>
															<div class="col-xs-12 col-sm-5 col-md-5">
																<div class="radio-custom radio-warning">
																	<input type="radio" id="clientes-asignados" name="clientes_permitidos" <?php echo ($agente->clientes_permitidos == 0) ? 'checked=\"checked\"' : '' ?> value=0>
																	<label for="clientes-asignados">Sólo los asignados a este agente</label>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-xs-12 col-sm-4 control-label">Acciones</label>
															<div class="hidden-xs hidden-sm col-md-1"></div>
															<div class="col-xs-12 col-sm-3 col-md-2">
																<div class="radio-custom radio-primary">
																	<input type="radio" id="acciones-todas" name="acciones_permitidas" <?php echo ($agente->acciones_permitidas == 1) ? 'checked=\"checked\"' : '' ?> value=1>
																	<label for="acciones-todas">Todas</label>
																</div>
															</div>
															<div class="col-xs-12 col-sm-5 col-md-5">
																<div class="radio-custom radio-warning">
																	<input type="radio" id="acciones-asignadas" name="acciones_permitidas" <?php echo ($agente->acciones_permitidas == 0) ? 'checked=\"checked\"' : '' ?> value=0>
																	<label for="acciones-asignadas">Sólo las asignadas a este agente</label>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-xs-12 col-sm-4 control-label">Inmuebles</label>
															<div class="hidden-xs hidden-sm col-md-1"></div>
															<div class="col-xs-12 col-sm-3 col-md-2">
																<div class="radio-custom radio-primary">
																	<input type="radio" id="inmuebles-todos" name="inmuebles_permitidos" <?php echo ($agente->inmuebles_permitidos == 1) ? 'checked=\"checked\"' : '' ?> value=1>
																	<label for="inmuebles-todos">Todos</label>
																</div>
															</div>
															<div class="col-xs-12 col-sm-5 col-md-5">
																<div class="radio-custom radio-warning">
																	<input type="radio" id="inmuebles-asignados" name="inmuebles_permitidos" <?php echo ($agente->acciones_permitidas == 0) ? 'checked=\"checked\"' : '' ?> value=0>
																	<label for="inmuebles-asignados">Sólo los asignados a este agente <strong><sup>(*)</sup></strong></label>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-xs-12 col-sm-7 col-sm-offset-4">
																<div class="alert alert-info">
																	<strong>(*)</strong> Estamos evaluando las agencias interesadas en la funcionalidad para activarla próximamente. Si te interesa aplicarlo, guarda estos permisos para ser de los primeros en tener información cuando la opción esté disponible.
																</div>
															</div>
														</div>
													</div>
												</section>
												<section class="panel panel-featured panel-featured-primary">
													<header class="panel-heading">
														<h2 class="panel-title">
															Datos de Contacto 
														</h2>
													</header>
													<div class="panel-body">
														<div class="form-group">
															<label class="col-xs-12 col-md-4 control-label" for="w1-telefono">
															Teléfono 
																<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
															</label>
															<div class="col-xs-6 col-md-3">
																<input type="text" class="form-control input-sm" name="telefono" id="w1-telefono" value="{{ $agente->telefono }}" required>
															</div>
															<div class="col-xs-6 col-md-2">
																<select name="telefono_de" id="w1-telefono-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->telefono_de }}" selected>{{ $agente->telefono_de }}</option>
																	<option value="Casa">Casa</option>
																	<option value="Otro">Otro</option>
																	<option value="Personal">Personal</option>
																	<option value="Principal">Principal</option>
																	<option value="Trabajo">Trabajo</option>
																</select>
															</div>
															<div class="col-md-2">Añadir
																<a role="button" data-toggle="collapse" href="#telefono2" aria-expanded="false" aria-controls="collapseExample">
																	<i class="fa fa-plus-circle" aria-hidden="true"></i>
																</a>
															</div>
															
														</div>
														<div class="form-group">
															<div class="collapse" id="telefono2">
																<label class="col-md-4 control-label" for="w1-telefono2">
																	Teléfono <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
																</label>
																<div class="col-md-3">
																	<input type="text" class="form-control input-sm" name="telefono2" id="w1-telefono2" required value="{{ $agente->telefono2 }}">
																</div>
																<div class="col-md-2">
																	<select name="telefono_de2" id="w1-telefono-de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																		<option value="{{ $agente->telefono_de2 }}" selected>{{ $agente->telefono_de2 }}</option>
																		<option value="Casa">Casa</option>
																		<option value="Otro">Otro</option>
																		<option value="Personal">Personal</option>
																		<option value="Principal">Principal</option>
																		<option value="Trabajo">Trabajo</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="w1-movil">
																Móvil <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
															</label>
															<div class="col-md-3">
																<input type="text" class="form-control input-sm" name="movil" value="{{ $agente->movil }}" id="w1-movil" required>
															</div>
															<div class="col-md-2">
																<select name="movil_de" id="w1-movil-de"  data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->movil_de }}" selected>{{ $agente->movil_de }}</option>
																	<option value="Casa">Casa</option>
																	<option value="Otro">Otro</option>
																	<option value="Personal">Personal</option>
																	<option value="Principal">Principal</option>
																	<option value="Trabajo">Trabajo</option>
																</select>
															</div>
															<div class="col-md-2">Añadir
																<a role="button" data-toggle="collapse" href="#movil2" aria-expanded="false" aria-controls="collapsemovil2">
																	<i class="fa fa-plus-circle" aria-hidden="true"></i>
																</a>
															</div>
														</div>
														<div class="form-group">
															<div class="collapse" id="movil2">
																<label class="col-md-4 control-label" for="w1-movil2">
																	Móvil <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
																</label>
																<div class="col-md-3">
																	<input type="text" class="form-control input-sm" name="movil2" id="w1-movil2" value="{{ $agente->movil2 }}" required>
																</div>
																<div class="col-md-2">
																	<select name="movil_de2" id="w1-movil-de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																		<option value="{{ $agente->movil_de2 }}" selected>{{ $agente->movil_de2 }}</option>
																		<option value="Casa">Casa</option>
																		<option value="Otro">Otro</option>
																		<option value="Personal">Personal</option>
																		<option value="Principal">Principal</option>
																		<option value="Trabajo">Trabajo</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="w1-fax">
																Fax <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
															</label>
															<div class="col-md-3">
																<input type="text" class="form-control input-sm" name="fax" id="w1-fax" value="{{ $agente->fax }}" required>
															</div>
															<div class="col-md-2">
																<select name="fax_de" id="w1-fax-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->fax_de }}" selected>{{ $agente->fax_de }}</option>
																	<option value="Casa">Casa</option>
																	<option value="Otro">Otro</option>
																	<option value="Personal">Personal</option>
																	<option value="Principal">Principal</option>
																	<option value="Trabajo">Trabajo</option>
																</select>
															</div>
															<div class="col-md-2">Añadir
																<a role="button" data-toggle="collapse" href="#fax2" aria-expanded="false" aria-controls="collapsemfax2">
																	<i class="fa fa-plus-circle" aria-hidden="true"></i>
																</a>
															</div>
														</div>
														<div class="form-group">
															<div class="collapse" id="fax2">
																<label class="col-md-4 control-label" for="w1-fax2">
																	Fax <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
																</label>
																<div class="col-md-3">
																	<input type="text" class="form-control input-sm" name="fax2" id="w1-fax2" value="{{ $agente->fax2 }}" required>
																</div>
																<div class="col-md-2">
																	<select name="fax_de2" id="w1-fax-de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																		<option value="{{ $agente->fax_de2 }}" selected>{{ $agente->fax_de2 }}</option>
																		<option value="Casa">Casa</option>
																		<option value="Otro">Otro</option>
																		<option value="Personal">Personal</option>
																		<option value="Principal">Principal</option>
																		<option value="Trabajo">Trabajo</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label" for="w1-email">Correo Electrónico</label>
															<div class="col-md-3">
																<input type="email" class="form-control input-sm" name="email" id="w1-email" value="{{ $agente->email }}" required>
															</div>
															<div class="col-md-2">
																<select name="email_de" id="w1-email-de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->email_de }}" selected>{{ $agente->email_de }}</option>
																	<option value="Casa">Casa</option>
																	<option value="Otro">Otro</option>
																	<option value="Personal">Personal</option>
																	<option value="Principal">Principal</option>
																	<option value="Trabajo">Trabajo</option>
																</select>
															</div>
														</div>
													</div>
												</section>
												<section class="panel panel-featured panel-featured-primary">
													<header class="panel-heading">
														<h2 class="panel-title">
															Agencia
														</h2>
													</header>
													<div class="panel-body">
														<div class="form-group">
															<label class="col-xs-12 col-md-4 control-label" for="w1-nombre-agencia">
																Nombre de la Agencia
															</label>
															<div class="col-xs-12 col-md-7">
																<select name="agencia_id" id="w1-nombre-agencia" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agencia[0]->id }}">{{ $agencia[0]->nombre }}</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-xs-12 col-md-4 control-label" for="w1-departamento">
																Departamento
															</label>
															<div class="col-xs-12 col-md-7">
																<select name="departamento" id="w1-departamento" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->departamento }}" selected>{{ $agente->departamento }}</option>
																	<option value="Comercial">Comercial</option>
																	<option value="Administracion">Administración</option>
																	<option value="Gerencia">Gerencia</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-xs-12 col-md-4 control-label" for="w1-cargo">
																Cargo
															</label>
															<div class="col-xs-12 col-md-7">
																<select name="cargo" id="w1-cargo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	<option value="{{ $agente->cargo }}" selected>{{ $agente->cargo }}</option>
																	<option value="Comercial">Comercial</option>
																	<option value="Responsable Comercial">Responsable Comercial</option>
																	<option value="Comercial Junior">Comercial Junior</option>
																	<option value="Administracion">Administración</option>
																	<option value="Responsable Administracion">Responsable Administracion</option>
																	<option value="Gerencia">Gerencia</option>
																	<option value="Direccion General">Dirección General</option>
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-xs-12 col-md-4 control-label" for="w1-departamento">
																Estado
															</label>
															<div class="col-xs-12 col-md-7">
																<select name="estado" id="w1-estado" data-plugin-selectTwo class="form-control populate" style="width: 100%">
																	@if($agente->estado)
																		<option value="Activo" selected>Activo</option>
																		<option value="Inactivo">Inactivo</option>
																	@else
																		<option value="Activo">Activo</option>
																		<option value="Inactivo" selected>Inactivo</option>
																	@endif
																</select>
															</div>
														</div>
														<div class="form-group">
															<label class="col-md-4 control-label">Fecha Alta</label>
															<div class="col-md-7">
																<div class="input-group">
																	<span class="input-group-addon">
																		<i class="fa fa-calendar"></i>
																	</span>
																	<input type="date" class="form-control" name="fecha_alta" value="{{ $agente->fecha_alta }}">
																</div>
															</div>
														</div>
													</div>
												</section>
												<section class="panel panel-featured panel-featured-primary">
													<header class="panel-heading">
														<h2 class="panel-title">
															Agencia
														</h2>
													</header>
													<div class="panel-body">
														<div class="form-group">
															<label class="col-md-4 control-label" for="notas">Notas</label>
															<div class="col-md-8">
																<textarea class="form-control" rows="3" id="notas" name="notas">{{ $agente->notas }}</textarea>
															</div>
														</div>
													</div>
												</section>
												<section class="panel ">
													<div class="col-xs-12 col-md-7 col-md-offset-4">
														<div class="form-group">
															<button type="button" class="mb-xs mt-xs mr-xs btn btn-success actualizar"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;Actualizar</button>
														</div>
													</div>
												</section>
												<br><br><br>
											</form>
									@endif
								</div>
							</section>
						</div>
					</div>
				</section>
		</div>
	</section>
@endsection
@section('js')
	<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
	<script src="{{ asset('js/main/utils.js') }}"></script>
	<script src="{{ asset('js/main/agentes.js') }}"></script>
@endsection