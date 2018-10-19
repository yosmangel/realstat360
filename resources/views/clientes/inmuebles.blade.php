@extends('layouts.app')
@section('title','Nuevo Cliente')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/hover/hover.css') }}" />
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Registro de Clientes</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('clientes.index') }}">Clientes</a></span></li>
								<li><span><a href="{{ route('clientes.create') }}">Nuevo Cliente</a></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<section class="panel form-wizard" id="w1">
									<header class="panel-heading">
										<h2 class="panel-title">Inmuebles del cliente: <strong>{{ $cliente_nombre }}</strong>
											<span class="pull-right">
												<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#crear-inmueble" aria-expanded="false" aria-controls="crear-inmueble">
													<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo Inmueble
												</button>
											</span>
										</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-12">
													<div class="collapse" id="crear-inmueble">
														@include('clientes.sections.crear_inmueble')
													</div>
												</div>
											</div>
											<br>
											<div class="row">
												<div class="col-xs-12">
												  <section class="panel panel-featured panel-featured-success">
													@if(count($inmuebles)>0)
														<div class="table-responsive">
															<table class="table table-bordered table-striped table-condensed table-hover mb-none" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
																<thead>
																	<tr>
																		<th>Imagen</th>
																		<th>Ref.</th>
																		<th>Tipo</th>
																		<th>Dirección</th>
																		<th>Estado</th>
																		<th>Sup.<small>(m<sup>2</sup>)</small></th>
																		<th>Precio</th>
																		<th>Hab.</th>
																		<th>Baños</th>
																		<th>Demandas</th>
																		<th>Acción</th>
																	</tr>
																</thead>
																<tbody>

																	@foreach($inmuebles as $inmueble)
																		<tr data-id="{{ $inmueble->id }}">
																			<td>
																				@if($inmueble->id_portada != '')
																					<?php if (file_exists('files_img/'.$ima[$contador_ima])) { ?>
																						<img src="{{ asset('files_img/'.$ima[$contador_ima]) }}" alt="" width="100px">
																				<?php } else { ?>
																				 segundo
																						<img src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="100px">
																				<?php } ?>
																				@else
																					<img src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="100px">
																				@endif
																				<?php $contador_ima++; ?>
																			</td>
																		
																			<td>R-{{ $inmueble->id }}</td>
																			<td>{{ $arregloTipos[$inmueble->tipo_id] }}</td>
																			<td>{{ $arregloMun[$inmueble->municipio_id] }}, calle {{ $inmueble->calle }}, No. {{ $inmueble->numero }}</td>
																			<td>{{ $inmueble->estado }}</td>
																			<td>{{ $inmueble->superficie }}</td>
																			<td><i class="fa fa-eur" aria-hidden="true"></i> </td>
																			<td>{{ $inmueble->habitaciones }}</td>
																			<td>{{ $inmueble->banos }}</td>
																			<td>-</td>
																			<td class="actions-hover actions-fade text-center" width="100">
													                            <a href="{{ route('inmuebles.show',$inmueble->id) }}"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;<small>Ficha</small></a><br>
													                            <a href="{{ route('inmuebles.edit', $inmueble->id) }}"><i class="el el-edit"></i>&nbsp;<small>Editar</small></a><br>
													                            <a href="#!" class='delete-row'><i class='fa fa-trash-o'></i>&nbsp;<small>Eliminar</small></a>
													                        </td>
																		</tr>
																	@endforeach                  	
																</tbody>
															</table>
														</div>
													@else
														<div class="well">
															<h4>Aún no ha dado de alta ningún inmueble para este cliente.</h4>
														</div>
													@endif
												  </section>
												</div>
											</div>
										</div>
									</div>
								</section>
							</div>
							
						</div>
					<!-- end: page --> 
				</section>
		</div>
		@include('partials.aside')
	</section>
	<form id="form-delete" action="{{ route('inmuebles.destroy', ':INMUEBLE_ID') }}" action2="{{ route('extras.destroy', ':INMUEBLE_ID') }}"  method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('js/main/utils.js') }}" ></script>
	<script src="{{ asset('js/main/clientes.js') }}"></script>
	<script src="{{ asset('js/main/inmuebles.js') }}"></script> 
	<script src="{{ asset('js/main/common.js') }}"></script>
	<script src="{{ asset('js/main/agencias.js') }}"></script>

	<!-- Personalized -->
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
@endsection
