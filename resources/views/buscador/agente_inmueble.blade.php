@extends('layouts.app')
@section('title','Búsqueda')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/hover/hover.css') }}" />
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">			
					<header class="page-header">
						<h2>Búsqueda</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{route('home')}}">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Búsqueda</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<div class="panel-group" id="accordion2">
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Inmmuebles&nbsp;
											</a>
										</h4>
									</div>
									<div id="collapse2One" class="accordion-body collapse">
												<div class="panel-body">
													<section class="panel panel-featured-left panel-featured-primary">
														<div class="panel-body">

														  <div class="row">
														  	<div class="col-xs-12">
																@if(count($inmuebles)>0)
																  <div class="table-responsive">
																	<table class="table table-bordered table-striped table-condensed table-hover mb-none" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
																		<thead>
																			<tr>
																				<th class="text-center"><i class="fa fa-camera"></i></th>
																				<th>Ref.</th>
																				<th>Tipo</th>
																				<th>Dirección</th>
																				<th>Estado</th>
																				<th>Sup.<small>(m<sup>2</sup>)</small></th>
																				<th>Precio</th>
																				<th>Hab.</th>
																				<th>Baños</th>
																				<th>Demandas</th> 
																			</tr>
																		</thead>
																		<tbody>
																				@foreach($inmuebles as $inmueble)
													                                <!-- $propertyImage = $inmueble->getPropertyFrontImage() -->
																					<tr data-id="{{ $inmueble->id }}" data-ref="{{ $inmueble->id }}">
													                                  <td>
													                                  	<a href="{{ route('inmuebles.show',$inmueble->id) }}">
														                                  	<img src="{{ asset('files_img/'.$inmueble->id_portada) }}" class="img-responsive" alt="">

														                                  	<!--
														                                  	if($propertyImage != '')
														                                  		 if (file_exists('files_img/'.$propertyImage)) {
																									   <img src=" asset('files_img/'.$propertyImage) " alt="Portada del Inmueble" class="img-thumbnail" width="150px">
																								 } else { 
																									    <img src=" asset('images/miniatura_inmueble.png') " alt="Portada del Inmueble" class="img-thumbnail" width="150px">
																								 } 
														                                  	else
														                                  		<img src=" asset('images/miniatura_inmueble.png') " alt="Portada del Inmueble" class="img-thumbnail" width="150px">
														                                  	endif
														                                  	-->
													                                  	</a>
													                                  </td>
													                                  <td class="text-center"><a href="{{ route('inmuebles.show',$inmueble->id) }}">R-{{ $inmueble->id }}</a></td>
													                                  <td class="text-center">{{ $inmueble->tipo->nombre }}</td>
													                                  <td ><a href="{{ route('inmuebles.show',$inmueble->id) }}">{{ $inmueble->ciudad->nombre.', ' }} calle {{ $inmueble->calle.', '}} No {{ $inmueble->numero.', ' }} {{ $inmueble->pais->nombre }}</a></td>
													                                  <td class="text-center">{{ $inmueble->estado }}</td>
													                                  <td class="text-center">{{ $inmueble->superficie }}</td>
													                                  <td class="text-center"><i class="fa fa-eur" aria-hidden="true"></i> 
													                                  	@if ($inmueble->modalidad->venta == 1) 
																		                    Venta {{ $inmueble->modalidad->ventaprecio }} <br>
																		                @endif
																		                @if ($inmueble->modalidad->alqresprecio == 1) 
																		                    Alquiler Residencial {{ $inmueble->modalidad->alqresprecio }} <br>
																		                @endif
																		                @if ($inmueble->modalidad->alquiler_vacacional == 1) 
																		                    Alquiler Vacacional {{ $inmueble->modalidad->alquiler_vacacional }}
																		                @endif
																		                @if ($inmueble->modalidad->traspaso == 1) 
																		                    Traspaso {{ $inmueble->modalidad->traspasoprecio }}
																		                @endif
																		                @if( $inmueble->modalidad->venta == 0 && $inmueble->modalidad->alqresprecio == 0 && $inmueble->modalidad->alquiler_vacacional == 0 && $inmueble->modalidad->traspaso == 0)
																		                -
																		                @endif
													                                  </td>
													                                  <td class="text-center">{{ $inmueble->habitaciones }}</td>
													                                  <td class="text-center">{{ $inmueble->banos }}</td>
													                                  <td class="text-center"><!-- Numero de Demandas Coincidentes -->
													                                  	<a href="{{ url('inmuebles/lista_demandas_coincidentes/'.$inmueble->id.'/'.true.'') }}">
													                                  		{{ count($demCoincidentes[$inmueble->id]) }}
													                                  	</a>
													                                  </td> 
													                                </tr>
													                            @endforeach                  	
																		</tbody>
																	</table>
																  </div>
																@else
																	<h4>No hay registros de inmuebles.</h4>
												                @endif
														  	</div>
														  </div>
														</div>
													</section>
												</div>
										
									</div>
								</div>
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="##collapse2Three">
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Clientes&nbsp;
											</a>
										</h4>
									</div>
									<div id="collapse2Three" class="accordion-body collapse">
												<div class="panel-body">
													<div  class="text-right">
														<span>
															<a href="{{ route('clientes.create') }}" class="btn btn-success">
													            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo Cliente
													        </a>
														</span>
													</div>
													<section class="panel panel-featured-left panel-featured-primary">
														<div class="panel-body">
														@if(count($clientes)>0)
														 <div class="table-responsive">
															<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
																<thead>
																	<tr>
																		<th>Nombre</th>
																		<th>Ofertante</th>
																		<th>Demandante</th>
																		<th>Acciones Pendientes</th>
																		<th>Contacto</th>
																		<th>Agente</th>
																	</tr>
																</thead>
																<tbody> 
																	@foreach($clientes as $cliente)
																		<tr data-id="{{ $cliente->id }}">
																			<td>{{ $cliente->apellidos }}, {{ $cliente->nombre }}</td>
																			<td class="text-center">
																				@if(count($cliente->inmuebles) > 0)
																					<a href="{{ route('clientes.inmuebles',$cliente->id) }}">
																						{{ $string_modalidad[$cliente->id] }}&nbsp;&nbsp;
																					</a>
																				@else
																					-
																				@endif
																			</td>
																			<td><a href=""><i class="fa fa-search"></i></a></td>
																			<td><a href=""><i class="fa fa-search"></i></a></td>
																			<td>
																				<?php $c = 0; ?>
																				@if($cliente->telefono)
																					{{ $cliente->telefono }}
																					<?php $c++; ?>
																				@endif
																				@if($cliente->movil)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->movil }}
																				@endif
																				@if($cliente->email)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->email }}
																				@endif
																				@if($cliente->telefono2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->telefono2 }}
																				@endif
																				@if($cliente->movil2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->movil2 }}
																				@endif
																				@if($cliente->email2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->email2 }}
																				@endif
																			</td>
																		</tr>
																	@endforeach 
																</tbody>
															</table>
														 </div>
														@else
															<h4>No hay registros de clientes.</h4>
														@endif
														</div>
													</section>
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</section>
		</div>
		@include('partials.aside')
	</section>
@endsection
@section('js')
	<!-- Google Map Api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeHD5h03-YMxjHIQXL-TYtgxn_cSvamcQ&libraries=places" async defer></script>
	<script src="{{ asset('js/main/map.js') }}"></script>
	
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('plugins/jquery-appear/jquery-appear.js') }}"></script>

	<!-- Personalized -->
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
	<script src="{{ asset('plugins/isotope/isotope.js') }}"></script>
	<script src="{{ asset('js/pages/examples.mediagallery.js') }}"></script>
@endsection