@extends('layouts.app')
@section('title','Registrar Inmueble')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/dropzone/basic.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@endsection 
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Inmuebles</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Inmuebles</span></li>
								<li><span>Editar Inmueble</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<section class="panel form-wizard" id="w1">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>
										<h2 class="panel-title">
											Editar Inmueble  <strong>REF:  {{ $inmueble->referencia }} </strong>
										</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li>
													<a href="#w1-principales" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Principales <small>Datos Inmueble</small>
													</a>
												</li>
												<li class="active">
													<a href="#w1-extras" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Extras <small>Inmueble, Finca</small>
													</a>
												</li>
												<li>
													<a href="#w1-fotos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Fotos y Documentos
													</a>
												</li>
												<li>
													<a href="#w1-internos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Internos <small>Datos Privados</small>
													</a>
												</li>
												<li>
													<a href="#w1-demandas" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Demandas <small>coincidentes</small>
													</a>
												</li>
											</ul>
										</div>

											<div class="tab-content">
												<div id="w1-principales" class="tab-pane">
												
												</div>
												<!-- Entrada de los datos de la Direccion del Inmueble -->
												<div id="w1-extras" class="tab-pane active">
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
																	<form class="form-horizontal" data-id="{{ $inmueble->id }}" action="{{ route }}" novalidate="novalidate" method="post">
																		<div class="row">
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-sm-12 col-md-4 control-label" for="w1-calidades">Calidad</label>
																					<div class="col-xs-12 col-md-8">
																						<select name="calidades" id="w1-calidades" data-plugin-selectTwo class="form-control populate">
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
																						<select name="estado_aseos" id="w1-estado_aseos" data-plugin-selectTwo class="form-control populate">
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
																						<select name="estado_banos" id="w1-estado-banos" data-plugin-selectTwo class="form-control populate">
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
																							<select name="estado_cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate">
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
																						<select name="estado_edificio" id="w1-edificio" data-plugin-selectTwo class="form-control populate">
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
																						<select name="tipo_edificio" id="w1-tipo-edificio" data-plugin-selectTwo class="form-control populate">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block btn-edit-calidades">Guardar</button>
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
																	<form class="form-horizontal" novalidate="novalidate">
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
																				<label class="col-md-2 control-label" for="descripcion_corta">Observaciones</label>
																				<div class="col-md-10">
																					<textarea class="form-control" rows="3" id="descripcion_corta"></textarea>
																				</div>
																			</div>
																		</div>
																		<div class="col-xs-12">
																			<div class="row">
																			 	<div class="col-xs-2"></div>
																			 	<div class="col-xs-4">
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
																			 	</div>
																			</div>
																		 	<br><br>
																		</div>
																	</form>
																</div>
															</div>
														</div>
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
																	<form class="form-horizontal" novalidate="novalidate">
																		<div class="row">
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-xs-12 col-md-4 control-label" for="w1-carp-exterior">Carpintería Exterior</label>
																					<div class="col-xs-12 col-md-8">
																						<select name="carp_exterior" id="w1-carp-exterior" data-plugin-selectTwo class="form-control populate">
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
																						<select name="carp_interior" id="w1-carp-interior" data-plugin-selectTwo class="form-control populate">
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
																						<select id="w1-puerta-principal" data-plugin-selectTwo class="form-control populate">
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
																						<select name="puertas_interiores" id="w1-puertas-interiores" data-plugin-selectTwo class="form-control populate">
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
																							<select name="ventanas" id="w1-ventanas" data-plugin-selectTwo class="form-control populate">
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
																						<input id="w1-persianas" type="number" min=0 name="num_persianas" class="form-control" placeholder="0">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
																			 	</div>
																			</div>
																		 	<br><br>
																		</div>
																	</form>
																</div>
															</div>
														</div>
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
																		<form class="form-horizontal" novalidate="novalidate">
																			<div class="row">
																				<div class="col-xs-12 col-md-6">
																					<div class="form-group">
																						<label class="col-xs-12 col-md-4 control-label" for="w1-acabado-paredes">Acabado Paredes</label>
																						<div class="col-xs-12 col-md-8">
																							<select name="acabados_paredes" id="w1-acabado-paredes" data-plugin-selectTwo class="form-control populate">
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
																							<select name="paredes_banos" id="w1-paredes-bannos" data-plugin-selectTwo class="form-control populate">
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
																							<select name="paredes_cocina" id="w1-paredes-cocina" data-plugin-selectTwo class="form-control populate">
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
																							<select name="suelos" id="w1-suelos" data-plugin-selectTwo class="form-control populate">
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
																							<select name="suelos_banos" id="w1-suelos-bannos" data-plugin-selectTwo class="form-control populate">
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
																							<select name="suelos_cocina" id="w1-suelos-cocina" data-plugin-selectTwo class="form-control populate">
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
																							<select name="techos" id="w1-techos" data-plugin-selectTwo class="form-control populate">
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
																							<select name="paredes" id="w1-tipos-paredes" data-plugin-selectTwo class="form-control populate">
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
																				<div class="col-xs-12 col-md-3">
																					<div class="form-group">
																						<label class="col-xs-12 col-md-6 control-label" for="w1-banneras">Bañeras</label>
																						<div class="col-xs-12 col-md-6">
																							<input id="w1-banneras" type="number" min=0 name="banneras" class="form-control" placeholder="0">
																						</div>
																					</div>
																				</div>
																				<div class="col-xs-12 col-md-3">
																					<div class="form-group">
																						<label class="col-xs-12 col-md-6 control-label" for="w1-griferia">Griferia</label>
																						<div class="col-xs-12 col-md-6">
																							<input id="w1-griferia" type="number" min=0 name="griferia" class="form-control" placeholder="0">
																						</div>
																					</div>
																				</div>
																				<div class="col-xs-12 col-md-3">
																					<div class="form-group">
																						<label class="col-xs-12 col-md-6 control-label" for="w1-plato-duchas">Plato de ducha</label>
																						<div class="col-xs-12 col-md-6 ">
																							<input id="w1-plato-duchas" type="number" min=0 name="plato_duchas" class="form-control" placeholder="0">
																						</div>
																					</div>
																				</div>
																				<div class="col-xs-12 col-md-3">
																					<div class="form-group">
																						<label class="col-xs-12 col-md-6 control-label" for="w1-sanitarios">Sanitarios</label>
																						<div class="col-xs-12 col-md-6 ">
																							<input id="w1-sanitarios" type="number" min=0 name="sanitarios" class="form-control" placeholder="0">
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
																						<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
																				 	</div>
																				</div>
																			 	<br><br>
																			</div>
																		</form>
																		</div>
																</div>
															</div>
														</div>
														<div id="acordion-instalaciones" class="panel panel-accordion panel-accordion-primary">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-instalaciones">
																		<img src="{{ asset('images/icons/suministros.png') }}" alt="" width="23px"> Instalaciones y Suministros
																	</a>
																</h4>
															</div>
															<div id="contenido-instalaciones" class="accordion-body collapse">
																<div class="panel-body">
																	<form class="form-horizontal" novalidate="novalidate">
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
																						<select name="agua_caliente" id="w1-agua-caliente" data-plugin-selectTwo class="form-control populate">
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
																						<select name="cocina" id="w1-cocina" data-plugin-selectTwo class="form-control populate">
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
																					<label class="col-xs-12 col-md-4 control-label" for="w1-electrodomesticos">Electrodoméstivos</label>
																					<div class="col-md-8">
																						<select id="electrodomesticos" id="w1-electrodomesticos" data-plugin-selectTwo class="form-control populate">
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
																							<option value="Muchos electrodomesticos">Muchos electrodomesticos</option>
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
																						<select name="equipamientos" id="w1-equipamientos" data-plugin-selectTwo class="form-control populate">
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
																						<select name="instalaciones" id="w1-instalaciones" data-plugin-selectTwo class="form-control populate">
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
																							<option value="Grupo Electrogeno">Grupo Electrogeno</option>
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
																						<select id="w1-instalaciones-edif" name="instalaciones_edificio" data-plugin-selectTwo class="form-control populate">
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
																						<select id="w1-instalacionesprivadas" name="instalaciones_privadas" data-plugin-selectTwo class="form-control populate">
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
																						<select id="w1-refrigeracion" name="refrigeracion" data-plugin-selectTwo class="form-control populate">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
																				</div>
																			</div>
																			<br><br>
																		</div>
																	</form>
																</div>
															</div>
														</div>
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
																	<form class="form-horizontal" novalidate="novalidate">
																		<div class="row">
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-xs-12 col-md-4 control-label" for="w1-gastoscomunidad">Gastos de comunidad</label>
																					<div class="col-xs-12 col-md-8">
																						<input id="w1-gastoscomunidad" type="text" name="gastoscomunidad" class="form-control" placeholder="">
																					</div>
																				</div>
																			</div>
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-sm-4 control-label" for="w1-calidadprecio">Calidad/Precio</label>
																					<div class="col-md-8">
																						<select name="calidad_precio" data-plugin-selectTwo id="w1-calidadprecio" class="form-control populate">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
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
																	<form class="form-horizontal" novalidate="novalidate">
																		<div class="row">
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-sm-4 control-label" for="w1-construccion">Construccion</label>
																					<div class="col-md-8">
																						<select name="construccion" data-plugin-selectTwo class="form-control populate">
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
																						<select name="estilo_construccion" id="w1-estiloconstruccion" data-plugin-selectTwo class="form-control populate">
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
																						<select name="estructura" id="w1-estructura" data-plugin-selectTwo class="form-control populate">
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
																						<select name="portalyescalera" id="w1-portalescalera" data-plugin-selectTwo class="form-control populate">
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
																						<select name="puerta_entrada" id="w1-puertaentrada" data-plugin-selectTwo class="form-control populate">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
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
																	<form class="form-horizontal" novalidate="novalidate">
																		<div class="row">
																			<div class="col-xs-12 col-md-6">
																				<div class="form-group">
																					<label class="col-sm-4 control-label" for="w1-calif-urbana">Calificación urbana</label>
																					<div class="col-md-8">
																						<select name="calif_urbana" id="w1-calif-urbana" data-plugin-selectTwo class="form-control populate">
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
																						<select name="cercania_a" id="w1-cercania" data-plugin-selectTwo class="form-control populate">
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
																						<select name="elementos_comunitarios" id="w1-elementos-comunitarios" data-plugin-selectTwo class="form-control populate">
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
																						<select name="entorno" id="w1-entorno" data-plugin-selectTwo class="form-control populate">
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
																						<select name="equipamientos_zonas" id="w1-equipamientos-zonas" data-plugin-selectTwo class="form-control populate">
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
																						<select name="grado_urbanizacion" id="w1-grado-urbanizacion" data-plugin-selectTwo class="form-control populate">
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
																						<select name="sol" id="w1-sol" data-plugin-selectTwo class="form-control populate">
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
																						<select name="transportes_publicos" id="w1-transportes-publicos" data-plugin-selectTwo class="form-control populate">
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
																						<select name="vistas" id="w1-vistas" data-plugin-selectTwo class="form-control populate">
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
																					<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-block">Guardar</button>
																				</div>
																			</div>
																			<br><br>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-12 col-sm-4 col-sm-offset-4">
															<button type="button" class="mb-xs mt-xs mr-xs btn btn-success btn-lg btn-block">Continuar&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
														</div>
													</div>
												</div>
												<!-- DATOS -->
												<div id="w1-fotos" class="tab-pane">
													<section class="panel">
														<header class="panel-heading">
															<div class="panel-actions">
																<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
																<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
															</div>
															<h4>Documentos multimedia de ...</h4>
															<br>
															<div class="alert alert-primary">
																<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																Sube un mínimo de <strong>10 fotos</strong>, es lo recomendable . Evita poner repetidas o similares. 
																Que sean de calidad: claras y nítidas, y mejor si son en horizontal
															</div>
														</header>
														<div class="panel-body">
															<div class="row">
																<div class="col-xs-12">
																	<h5>
																		Para incluir archivos debes pulsar “Seleccionar archivos”, 
																		seleccionar uno o varios archivos y una vez elegidos, pulsar 
																		“Subir archivos” para incluirlos. 
																		<br><br>
																		La múltiple selección de archivos 
																		está disponible para estas versiones de navegador: Google Chrome, 
																		Apple Safari iOS 5.0+, Mozilla Firefox 3.6+ y Microsoft Internet 
																		Explorer 10.0+. Si tienes problemas para subir archivos dispones de 
																		otra forma de hacerlo: 
																		<br><br>Acceder a la versión lenta para subir archivos 
																		uno a uno.
																	</h5>
																	<button class="mb-xs mt-xs mr-xs btn btn-primary">Seleccionar Archivos</button>
																	<button class="mb-xs mt-xs mr-xs btn btn-primary">Subr Archivos</button>
																	<button class="mb-xs mt-xs mr-xs btn btn-primary">Vaciar Lista</button>
																	<br><br>
																	<form action="/upload" class="dropzone dz-square" id="dropzone-example"></form>
																	<div class="progress progress-striped light active m-md">
																		<div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
																			60%
																		</div>
																	</div>
																</div><br><br>
																<div class="col-xs-12">
																	<h5>
																		También puedes añadir un link, por ejemplo para visualizar videos o 
																		tours virtuales que hayas subido previamente a una web de compartición.
																		Copia aquí la URL donde se encuentra:
																	</h5>
																	<form action="">
																		<div class="form-group">
																			<div class="hidden-xs col-md-3"></div>
																			<label class="col-xs-12 col-md-3 control-label text-right" for="w1-">URL: http://</label>
																			<div class="col-xs-12 col-md-3">
																				<input type="text" class="form-control input-sm" name="link" id="w1-linkvideos" required>
																			</div>
																			<div class="col-xs-12 col-md-3">
																				<select data-plugin-selectTwo class="form-control populate">
																					<option value="1">Video</option>
																					<option value="2">Tour Virtual</option>
																				</select>
																			</div>
																		</div>
																	</form><br>
																	<div class="alert alert-info">
																		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																		GESTIÓN DE DOCUMENTOS MULTIMEDIA<strong>(0)</strong> <small>* Arrastra las imagenes para ordenarlas y guarda los cambios</small>
																	</div>
																		<table class="table mb-none">
																			<thead>
																				<tr>
																					<th>#</th>
																					<th>Nombre de la Imagen</th>
																					<th>Acciones</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>1</td>
																					<td>local.jpg</td>
																					<td class="actions">
																						<a href=""><i class="fa fa-pencil"></i></a>
																						<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
																					</td>
																				</tr>
																				<tr>
																					<td>2</td>
																					<td>casa_en_venta.jpg</td>
																					<td class="actions">
																						<a href=""><i class="fa fa-pencil"></i></a>
																						<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																	<div class="alert alert-info">
																		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
																		GESTIÓN DE DOCUMENTOS <strong>(0)</strong>
																	</div>
																	<table class="table mb-none">
																			<thead>
																				<tr>
																					<th>#</th>
																					<th>Nombre del Documento</th>
																					<th>Acciones</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>1</td>
																					<td>resumen.pdf</td>
																					<td class="actions">
																						<a href=""><i class="fa fa-pencil"></i></a>
																						<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
																					</td>
																				</tr>
																				<tr>
																					<td>2</td>
																					<td>registro.doc</td>
																					<td class="actions">
																						<a href=""><i class="fa fa-pencil"></i></a>
																						<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
																					</td>
																				</tr>
																			</tbody>
																		</table>
																</div>
															</div>
														</div>
													</section>
													<div class="col-xs-12">
														<div class="row">
															 <div class="col-xs-4">
																<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Guardar y Retroceder</button>
															 </div>
															 <div class="col-xs-2">
																<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Guardar</button>
															 </div>
															 <div class="col-xs-3">
																<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Guardar y Continuar</button>
															 </div>
														</div>
														<br><br>
													</div>
												</div>
												<!-- DESCRIPCION -->
												<div id="w1-internos" class="tab-pane">
													<form class="form-horizontal" novalidate="novalidate">
														<div class="tab-content">
																<div class="col-md-12">
																	<section class="panel panel-featured panel-featured-primary">
																		<header class="panel-heading">
																			<h2 class="panel-title">Datos Internos de: ...</h2>
																		</header>
																		<div class="panel-body">
																			<div class="form-group">
																				<label class="col-md-4 control-label" for="w1-agencia">Agencia</label>
																				<div class="col-md-7">
																					<select data-plugin-selectTwo class="form-control populate" id="w1-agencia">
																						<optgroup label="Alaskan/Hawaiian Time Zone">
																							<option value="AK">Alaska</option>
																							<option value="HI">Hawaii</option>
																						</optgroup>
																						<optgroup label="Pacific Time Zone">
																							<option value="CA">California</option>
																							<option value="NV">Nevada</option>
																							<option value="OR">Oregon</option>
																							<option value="WA">Washington</option>
																						</optgroup>
																					</select>
																				</div>
																				<div class="demo-icon-hover col-md-1">
																					<i class="el el-info-circle"></i>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-agente">Agente</label>
																				<div class="col-sm-7">
																					<input type="text" class="form-control input-sm" name="agente" id="w1-agente" required>
																				</div>
																				<div class="demo-icon-hover col-md-1">
																					<i class="el el-info-circle"></i>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-cliente-propietario">Cliente Propietario</label>
																				<div class="col-sm-7">
																					<input type="text" class="form-control input-sm" name="clientepropietario" id="w1-cliente-propietario" required>
																				</div>
																				<div class="demo-icon-hover col-md-1">
																					<i class="el el-info-circle"></i>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-3 col-md-offset-4">
																					<button class="btn btn-info"> Alta Cliente</button>
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
																								<input type="text" class="form-control input-sm" name="preciopublico" id="w1-precio-publico" required>
																							</div>
																						</div>
																						<div class="row">
																							<label class="col-sm-4 control-label" for="w1-precio-propietario">Precio propietario</label>
																							<div class="col-sm-8">
																								<input type="text" class="form-control input-sm" name="preciopropietario" id="w1-precio-propietario" required>
																							</div>
																							<div class="col-sm-8 col-sm-offset-4">
																								<button class="btn btn-info mt-xs mb-xs"> Ver Histórico de Precios</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-honorarios">Honorarios</label>
																				<div class="col-sm-8">
																					<textarea class="form-control" rows="3" id="w1-honorarios"></textarea>
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
																					<select data-plugin-selectTwo class="form-control populate" id="w1-medio">
																						<optgroup label="Alaskan/Hawaiian Time Zone">
																							<option value="AK">Alaska</option>
																							<option value="HI">Hawaii</option>
																						</optgroup>
																						<optgroup label="Pacific Time Zone">
																							<option value="CA">California</option>
																							<option value="NV">Nevada</option>
																							<option value="OR">Oregon</option>
																							<option value="WA">Washington</option>
																						</optgroup>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-superficie">Nombre (*)</label>
																				<div class="col-sm-7">
																					<input type="text" class="form-control input-sm" name="superficie" id="w1-superficie" required>
																				</div>
																				<div class="demo-icon-hover col-md-1">
																					<i class="el el-info-circle"></i>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-8 col-md-offset-4">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="exampleCheckbox1">Ocultar superficie en comunicaciones y publicaciones.</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-superficie">Modalidad</label>
																				<div class="col-md-8">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Venta</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Alquiler Residencial (mensual)</label>
																					</div>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Alquiler Vacacional</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Traspaso</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Compartir</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-moneda">Moneda</label>
																				<div class="col-md-8">
																					<select data-plugin-selectTwo class="form-control populate">
																						<optgroup label="Alaskan/Hawaiian Time Zone">
																							<option value="AK">Alaska</option>
																							<option value="HI">Hawaii</option>
																						</optgroup>
																						<optgroup label="Pacific Time Zone">
																							<option value="CA">California</option>
																							<option value="NV">Nevada</option>
																							<option value="OR">Oregon</option>
																							<option value="WA">Washington</option>
																						</optgroup>
																						<optgroup label="Mountain Time Zone">
																							<option value="AZ">Arizona</option>
																							<option value="CO">Colorado</option>
																							<option value="ID">Idaho</option>
																							<option value="MT">Montana</option>
																							<option value="NE">Nebraska</option>
																							<option value="NM">New Mexico</option>
																							<option value="ND">North Dakota</option>
																							<option value="UT">Utah</option>
																							<option value="WY">Wyoming</option>
																						</optgroup>
																						<optgroup label="Central Time Zone">
																							<option value="AL">Alabama</option>
																							<option value="AR">Arkansas</option>
																							<option value="IL">Illinois</option>
																							<option value="IA">Iowa</option>
																							<option value="KS">Kansas</option>
																							<option value="KY">Kentucky</option>
																							<option value="LA">Louisiana</option>
																							<option value="MN">Minnesota</option>
																							<option value="MS">Mississippi</option>
																							<option value="MO">Missouri</option>
																							<option value="OK">Oklahoma</option>
																							<option value="SD">South Dakota</option>
																							<option value="TX">Texas</option>
																							<option value="TN">Tennessee</option>
																							<option value="WI">Wisconsin</option>
																						</optgroup>
																						<optgroup label="Eastern Time Zone">
																							<option value="CT">Connecticut</option>
																							<option value="DE">Delaware</option>
																							<option value="FL">Florida</option>
																							<option value="GA">Georgia</option>
																							<option value="IN">Indiana</option>
																							<option value="ME">Maine</option>
																							<option value="MD">Maryland</option>
																							<option value="MA">Massachusetts</option>
																							<option value="MI">Michigan</option>
																							<option value="NH">New Hampshire</option>
																							<option value="NJ">New Jersey</option>
																							<option value="NY">New York</option>
																							<option value="NC">North Carolina</option>
																							<option value="OH">Ohio</option>
																							<option value="PA">Pennsylvania</option>
																							<option value="RI">Rhode Island</option>
																							<option value="SC">South Carolina</option>
																							<option value="VT">Vermont</option>
																							<option value="VA">Virginia</option>
																							<option value="WV">West Virginia</option>
																						</optgroup>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-8 col-md-offset-4">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="exampleCheckbox1">Ocultar superficie en comunicaciones y publicaciones.</label>
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
																				<label class="col-sm-4 control-label" for="w1-superficie">Idioma</label>
																				<div class="col-md-8">
																					<select data-plugin-selectTwo class="form-control populate">
																						<optgroup label="Alaskan/Hawaiian Time Zone">
																							<option value="AK">Alaska</option>
																							<option value="HI">Hawaii</option>
																						</optgroup>
																						<optgroup label="Pacific Time Zone">
																							<option value="CA">California</option>
																							<option value="NV">Nevada</option>
																							<option value="OR">Oregon</option>
																							<option value="WA">Washington</option>
																						</optgroup>
																						<optgroup label="Mountain Time Zone">
																							<option value="AZ">Arizona</option>
																							<option value="CO">Colorado</option>
																							<option value="ID">Idaho</option>
																						</optgroup>
																						<optgroup label="Central Time Zone">
																							<option value="AL">Alabama</option>
																							<option value="AR">Arkansas</option>
																							<option value="WI">Wisconsin</option>
																						</optgroup>
																						<optgroup label="Eastern Time Zone">
																							<option value="VA">Virginia</option>
																							<option value="WV">West Virginia</option>
																						</optgroup>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label" for="descripcion_corta">Descripción Abreviada</label>
																				<div class="col-md-8">
																					<textarea class="form-control" rows="3" id="descripcion_corta"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-4 control-label" for="descripcion_corta">Descripción Extendida <i class="el el-info-circle"></i></label>
																				<div class="col-md-8">
																					<textarea class="form-control" rows="3" id="descripcion_extendida"></textarea>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-8 col-md-offset-4">
																					<a class="btn btn-primary" role="button" data-toggle="collapse" href="#nuevoIdioma" aria-expanded="false" aria-controls="collapseExample">
																					  Añadir nuevo idioma
																					</a>
																				</div>
																			</div>
																			<div class="collapse" id="nuevoIdioma">
																					<div class="form-group">
																						<label class="col-sm-4 control-label" for="w1-superficie">Idioma</label>
																						<div class="col-md-8">
																							<select data-plugin-selectTwo class="form-control populate">
																								<optgroup label="Alaskan/Hawaiian Time Zone">
																									<option value="AK">Alaska</option>
																									<option value="HI">Hawaii</option>
																								</optgroup>
																								<optgroup label="Pacific Time Zone">
																									<option value="CA">California</option>
																									<option value="NV">Nevada</option>
																									<option value="OR">Oregon</option>
																									<option value="WA">Washington</option>
																								</optgroup>
																								<optgroup label="Mountain Time Zone">
																									<option value="AZ">Arizona</option>
																									<option value="CO">Colorado</option>
																									<option value="ID">Idaho</option>
																									<option value="MT">Montana</option>
																									<option value="NE">Nebraska</option>
																									<option value="NM">New Mexico</option>
																									<option value="ND">North Dakota</option>
																									<option value="UT">Utah</option>
																									<option value="WY">Wyoming</option>
																								</optgroup>
																								<optgroup label="Central Time Zone">
																									<option value="AL">Alabama</option>
																									<option value="AR">Arkansas</option>
																									<option value="IL">Illinois</option>
																									<option value="WI">Wisconsin</option>
																								</optgroup>
																								<optgroup label="Eastern Time Zone">
																									<option value="CT">Connecticut</option>
																									<option value="VT">Vermont</option>
																									<option value="VA">Virginia</option>
																									<option value="WV">West Virginia</option>
																								</optgroup>
																							</select>
																						</div>
																					</div>
																					<div class="form-group">
																						<label class="col-md-4 control-label" for="descripcion_corta">Descripción Abreviada</label>
																						<div class="col-md-8">
																							<textarea class="form-control" rows="3" id="descripcion_corta"></textarea>
																						</div>
																					</div>
																					<div class="form-group">
																						<label class="col-md-4 control-label" for="descripcion_corta">Descripción Extendida <i class="el el-info-circle"></i></label>
																						<div class="col-md-8">
																							<textarea class="form-control" rows="3" id="descripcion_extendida"></textarea>
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
																				<label class="col-sm-4 control-label" for="w1-superficie">Superficie</label>
																				<div class="col-sm-8">
																					<input type="text" class="form-control input-sm" name="superficie" id="w1-superficie" required>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-8 col-md-offset-4">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="exampleCheckbox1">Ocultar superficie en comunicaciones y publicaciones.</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-superficie">Modalidad</label>
																				<div class="col-md-8">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Venta</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Alquiler Residencial (mensual)</label>
																					</div>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Alquiler Vacacional</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Traspaso</label>
																					</div><br>
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="venta">Compartir</label>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-sm-4 control-label" for="w1-moneda">Moneda</label>
																				<div class="col-md-8">
																					<select data-plugin-selectTwo class="form-control populate">
																						<optgroup label="Alaskan/Hawaiian Time Zone">
																							<option value="AK">Alaska</option>
																							<option value="HI">Hawaii</option>
																						</optgroup>
																						<optgroup label="Pacific Time Zone">
																							<option value="CA">California</option>
																							<option value="OR">Oregon</option>
																							<option value="WA">Washington</option>
																						</optgroup>
																						<optgroup label="Mountain Time Zone">
																							<option value="AZ">Arizona</option>
																							<option value="CO">Colorado</option>
																						</optgroup>
																						<optgroup label="Central Time Zone">
																							<option value="AL">Alabama</option>
																							<option value="AR">Arkansas</option>
																							<option value="IL">Illinois</option>
																							<option value="IA">Iowa</option>
																							<option value="KS">Kansas</option>
																						</optgroup>
																						<optgroup label="Eastern Time Zone">
																							<option value="CT">Connecticut</option>
																							<option value="DE">Delaware</option>
																							<option value="FL">Florida</option>
																							<option value="NH">New Hampshire</option>
																						</optgroup>
																					</select>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-8 col-md-offset-4">
																					<div class="checkbox-custom checkbox-default checkbox-inline mt-sm ml-md mr-md">
																						<input type="checkbox" checked="" id="exampleCheckbox1">
																						<label for="exampleCheckbox1">Ocultar superficie en comunicaciones y publicaciones.</label>
																					</div>
																				</div>
																			</div>
																		</div>
																	</section>
																</div>
																<div class="col-xs-12">
																 <div class="row">
																 	<div class="col-xs-2"></div>
																 	<div class="col-xs-4">
																		<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Guardar</button>
																 	</div>
																 	<div class="col-xs-4">
																		<button type="button" class="mb-xs mt-xs mr-xs btn btn-primary btn-lg btn-block">Guardar y Continuar</button>
																 	</div>
																 	<div class="col-xs-2"></div>
																 </div>
																 	<br><br>
																</div>
														</div>
													</form>
												</div>
												<!-- DATOS DE CONTACTO EN PUBLICACIONES -->
												<div id="w1-demandas" class="tab-pane">
													<form class="form-horizontal" novalidate="novalidate">
														Demandas dd
													</form>
												</div>
											</div>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li class="previous disabled">
												<a><i class="fa fa-angle-left"></i> Anterior</a>
											</li>
											<li class="finish hidden pull-right">
												<a>Último</a>
											</li>
											<li class="next">
												<a>Siguiente <i class="fa fa-angle-right"></i></a>
											</li>
										</ul>
									</div>
								</section>
							</div>
							
						</div>
					<!-- end: page -->
				</section>
		</div>
		@include('partials.aside')
	</section>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
@endsection
