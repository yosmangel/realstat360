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
						<h2>Detalle del Inmueble</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('inmuebles.index') }}">Inmuebles</span></a></li>
								<li><span><a href="#">Detalle del Inmueble</span></a></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w1">
								<div class="panel-body panel-body-nopadding">
									<section class="panel panel-group">
										<header class="panel-heading">
											<div class="widget-profile-info">
												<div class="property-picture">
													@if( ($inmueble->id_portada == null) || ($inmueble->id_portada == '') )
														<img src="{{ asset('files_img/'.$inmueble->id_portada ) }}" alt="Project" width="110px">
													@else
														<img src="{{ asset('images/miniatura_inmueble.png' ) }}" alt="" width="110px">
													@endif
												</div>
												<div class="profile-info">
													<h3 class="name text-weight-semibold">Ficha del Inmueble Ref-{{ $inmueble->id }}</h3>
													
													<div class="profile-info">
														<a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar Inmueble)</a>
													</div>
												</div>
											</div>
										</header>
										<div class="tabs tabs-secondary">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#ficha" data-toggle="tab"><i class="fa fa-newspaper-o"></i>&nbsp;Ficha del Inmueble</a>
												</li>
												<li>
													<a href="#descripcion" data-toggle="tab"><i class="fa fa-file-text-o"></i>&nbsp;Descripción y Extras</a>
												</li>
												<li>
													<a href="#fotosydoc" data-toggle="tab"><i class="fa fa-file-photo-o"></i>&nbsp;Fotos y Documentos</a>
												</li>
												<li>
													<a href="#datosint" data-toggle="tab"><i class="fa fa-list"></i>&nbsp;Datos Internos</a>
												</li>
											</ul>
											<div class="tab-content">
												<div id="ficha" class="tab-pane active">
													<div class="row">
														<div id="accordion">
															<div class="panel panel-accordion panel-accordion-first">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
																			<i class="fa fa-file-text"></i> Detalle del Inmueble
																		</a>
																	</h4>
																</div>
																<div id="collapse1One" class="accordion-body collapse in">
																	<div class="panel-body">
																		<div class="table-responsive">
																			<table class="table table-striped mb-none">
																				<tbody>
																					<tr>
																						<td width="20%"><strong>Referencia:</strong></td>
																						<td width="80%" class="text-left">{{ $inmueble->id }}</td>
																					</tr>
																					@if (!empty($inmueble->tipo))
																						<tr>
																							<td width="20%"><strong>Tipo:</strong></td>
																							<td width="80%" class="text-left">{{ $inmueble->tipo->nombre }}</td>
																						</tr>
																					@endif
																					@if (!empty($inmueble->categoria))
																						<tr>
																							<td width="20%"><strong>Categoría:</strong></td>
																							<td width="80%" class="text-left">{{ $inmueble->categoria->nombre }}</td>
																						</tr>
																					@endif
																					@if (!empty($inmueble->superficie))
																						<tr>
																							<td width="20%"><strong>Superficie:</strong></td>
																							<td width="80%" class="text-left">{{ $inmueble->superficie }} m<sup>2</sup></td>
																						</tr>
																					@endif
																					@if (!empty($operacion))
																						<tr>
																							<td width="20%"><strong>Modalidad:</strong></td>
																							<td width="80%" class="text-left"><?php echo $operacion ?></td>
																						</tr>
																					@endif
																					<tr>
																						<td width="20%"><strong>Adjudicado:</strong></td>
																						<td width="80%" class="text-left">
																							@if($inmueble->adjbancaria)
																								Si
																							@else
																								No
																							@endif
																						</td>
																					</tr>
																					@if (!empty($inmueble->tipo))
																						<tr>
																							<td width="20%"><strong>Certificado Energético:</strong></td>
																							<td width="80%" class="text-left">{{ $inmueble->certificado_energetico }}</td>
																						</tr>
																					@endif
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel panel-accordion">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1Two">
																				<i class="fa fa-map-marker"></i> Dirección del Inmueble
																		</a>
																	</h4>
																</div>
																<div id="collapse1Two" class="accordion-body collapse in">
																	<div class="panel-body">
																		<div class="row">
																			<div class="col-xs-12 col-md-12">
																				<div class="table-responsive">
																					<table class="table table-striped mb-none">
																						<tbody>
																							@if (!empty($inmueble->zona))
																								<tr>
																									<td width="20%"><strong>Zona:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->zona }}</td>
																								</tr>
																							@endif
																							@if (!empty($inmueble->distrito_id))
																								<tr>
																									<td width="20%"><strong>Distrito:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->distrito_id }}</td>
																								</tr>
																							@endif
																							@if (!empty($inmueble->ciudad))
																								<tr>
																									<td width="20%"><strong>Municipio:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->ciudad->nombre }}</td>
																								</tr>
																							@endif
																							@if (!empty($inmueble->provincia_id))
																								<tr>
																									<td width="20%"><strong>Provincia:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->provincia_id }}</td>
																								</tr>
																							@endif
																							@if (!empty($inmueble->codigo_postal))
																								<tr>
																									<td width="20%"><strong>C.P:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->codigo_postal }}</td>
																								</tr>
																							@endif
																							@if (!empty($inmueble->pais))
																								<tr>
																									<td width="20%"><strong>País:</strong></td>
																									<td width="80%" class="text-left">{{ $inmueble->pais->nombre }}</td>
																								</tr>
																							@endif
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div id="descripcion" class="tab-pane">
													<div class="row">
														<div id="accordion">
															<div class="panel panel-accordion panel-accordion-first">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseDescripcion">
																			<i class="fa fa-file-text-o"></i> Descripción
																		</a>
																	</h4>
																</div>
																<div id="collapseDescripcion" class="accordion-body collapse in">
																	<div class="panel-body">
																		<div class="table-responsive">
																			<table class="table table-striped mb-none">
																				<tbody>
																					<tr>
																						<td width="20%"><strong>Idioma:</strong></td>
																						<td width="80%" class="text-left">{{ $inmueble->idioma->nombre }}</td>
																					</tr>
																					<tr>
																						<td width="20%"><strong>Abreviada:</strong></td>
																						<td width="80%" class="text-left">{{ $inmueble->descripcion_corta }}</td>
																					</tr>
																					@if (!empty($inmueble->descripcion_extendida))
																						<tr>
																							<td width="20%"><strong>Extendida:</strong></td>
																							<td width="80%" class="text-left">{{ $inmueble->descripcion_extendida }}</td>
																						</tr>
																					@endif
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel panel-accordion">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseExtras">
																			<i class="fa fa-list-ul"></i> Extras
																		</a>
																	</h4>
																</div>
																<div id="collapseExtras" class="accordion-body collapse in">
																	<div class="panel-body">
																		@include('inmuebles.showextras.extras')
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div id="fotosydoc" class="tab-pane">
													<div class="row">
														@include('inmuebles.sections.mediagallery')
													</div>
												</div>
												<div id="datosint" class="tab-pane">
													<div class="row">
														@include('inmuebles.showinternos.internos')
													</div>
												</div>
											</div>
										</div>



									</section>
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
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/isotope/isotope.js') }}"></script>
	<script src="{{ asset('js/pages/examples.mediagallery.js') }}"></script>
@endsection

