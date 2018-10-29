@extends('layouts.app')
@section('title','Detalle Cliente')
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
						<h2>Detalle del Cliente</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{route('home')}}">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('clientes.index') }}">Clientes</span></a></li>
								<li><span><a href="#">Detalle del Cliente</span></a></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<div class="row">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w1">
								<div class="panel-body panel-body-nopadding">
									<section class="panel panel-group">
										<header class="panel-heading ">
											<div class="widget-profile-info">

												<div class="profile-info">
													<h3 class="name text-weight-semibold">{{$cliente->nombre}} {{$cliente->apellidos}}</h3>
													
													<div class="profile-info">
														<a href="{{ route('clientes.edit',$cliente->id) }}">(Editar Cliente)</a>
													</div>
												</div>
											</div>
										</header>
										<div class="tabs tabs-secondary">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#ficha" data-toggle="tab"><i class="fa fa-newspaper-o"></i>&nbsp;Ficha del Cliente</a>
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
																			<i class="fa fa-file-text"></i> Detalle del Cliente
																		</a>
																	</h4>
																</div>
																<div id="collapse1One" class="accordion-body collapse in">
																	<div class="panel-body">
																		<div class="table-responsive">
																			<table class="table table-striped mb-none">
																				<tbody>
																					<tr>
																						<td width="20%"><strong>Correo:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->email}}</td>
																					</tr>
																					<tr>
																						<td width="20%"><strong>Télefono:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->telefono}}</td>
																					</tr>
																					@if (!empty($cliente->alias))
																						<tr>
																							<td width="20%"><strong>Alias:</strong></td>
																							<td width="80%" class="text-left">{{$cliente->alias}}</td>
																						</tr>
																					@endif
																					<tr>
																						<td width="20%"><strong>Fecha de Nacimiento:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->fecha_nacimiento}}</td>
																					</tr>
																					<tr>
																						<td width="20%"><strong>Tipo de Documento:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->tipo_doc}}: {{$cliente->tipo_doc_num}}</td>
																					</tr>
																					<tr>
																						<td width="20%"><strong>Tipo de cliente:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->tipo_cliente}}</td>
																					</tr>
																					<tr>
																						<td width="20%"><strong>Presupuesto:</strong></td>
																						<td width="80%" class="text-left">{{$cliente->presupuesto}}.00</td>
																					</tr>
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
																				<i class="fa fa-map-marker"></i> Dirección del Cliente
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
																							@if(!empty($cliente->pais))
																								<tr>
																									<td width="20%"><strong>País:</strong></td>
																									<td width="80%" class="text-left">{{$cliente->pais->nombre}}</td>
																								</tr>
																							@endif
																							<tr>
																								<td width="20%"><strong>Dirección:</strong></td>
																								<td width="80%" class="text-left">
																									@if (!empty($cliente->calle))
																										{{$cliente->calle}} 
																									@endif 
																									@if (!empty($cliente->numero))
																										{{$cliente->numero}} 
																									@endif
																									@if (!empty($cliente->piso))
																										{{$cliente->piso}} 
																									@endif
																									@if (!empty($cliente->escalera))
																										{{$cliente->escalera}} 
																									@endif
																									@if (!empty($cliente->puerta))
																										{{$cliente->puerta}} 
																									@endif
																									@if (!empty($cliente->codigo_postal))
																										{{$cliente->codigo_postal}}
																									@endif
																								</td>
																							</tr>
																						</tbody>
																					</table>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="panel panel-accordion">
																<div class="panel-heading">
																	<h4 class="panel-title">
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse1Three">
																				<i class="fa fa-plus"></i> Otros datos
																		</a>
																	</h4>
																</div>
																<div id="collapse1Three" class="accordion-body collapse in">
																	<div class="panel-body">
																		<div class="row">
																			<div class="col-xs-12 col-md-12">
																				<div class="table-responsive">
																					<table class="table table-striped mb-none">
																						<tbody>
																							<tr>
																								<td width="20%"><strong>Visitas:</strong></td>
																								<td width="80%" class="text-left">{{$cliente->visitas}}</td>
																							</tr>
																							@if (!empty($cliente->medio_contacto))
																								<tr>
																									<td width="20%"><strong>Medio de contacto:</strong></td>
																									<td width="80%" class="text-left">{{$cliente->medio_contacto}}</td>
																								</tr>
																							@endif
																							@if (!empty($cliente->movil))
																								<tr>
																									<td width="20%"><strong>Móvil:</strong></td>
																									<td width="80%" class="text-left">{{$cliente->movil}}</td>
																								</tr>
																							@endif
																							@if (!empty($cliente->web))
																								<tr>
																									<td width="20%"><strong>Web:</strong></td>
																									<td width="80%" class="text-left">{{$cliente->web}}</td>
																								</tr>
																							@endif
																							@if (!empty($cliente->comentarios))
																								<tr>
																									<td width="20%"><strong>Comentarios:</strong></td>
																									<td width="80%" class="text-left">{{$cliente->comentarios}}</td>
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

