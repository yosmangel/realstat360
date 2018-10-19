@extends('layouts.app')
@section('title','Agenda de Acciones')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel='stylesheet' href="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.min.css') }}">
	<link rel='stylesheet' href="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.print.min.css') }}"  media='print'>
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
	<link rel="stylesheet" href="{{ asset('PLUGINS/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Agenda</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('clientes.index') }}">Agenda</a></span></li>
								<li><span><a href="{{ route('clientes.create') }}">Agenda de Acciones</a></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w1">
								<div class="panel-body panel-body-nopadding">
									<div class="invoice">
										<header class="">
											<br>
											<form action="" class="form-horizontal">
														<div class="form-group">
															<label class="col-sm-3 control-label" for="w1-agente">Agente</label>
															<div class="col-sm-7">
																<input type="text" class="form-control input-sm" name="agente" id="w1-agente">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-3 control-label" for="w1-estado">Estado</label>
															<div class="col-sm-7">
																<input type="text" class="form-control input-sm" name="estado" id="w1-estado">
															</div>
														</div>
														<div class="form-group">
															<label for="tags-input-multiple" class="col-md-3 control-label">Tipo de acción:</label>
															<div class="col-md-7">
																<select id="tags-input-multiple" multiple data-role="tagsinput" data-tag-class="label label-primary">
																		<option value="Enviar e-mail">Enviar e-mail</option>
																		<option value="Enviar SMS">Enviar SMS</option>
																		<option value="">Llamada Propietario</option>
																		<option value="">Seguimiento de captación</option>
																		<option value="">Visita captación</option>
																		<option value="">Contrato</option>
																		<option value="">Reservar Inmueble</option>
																		<option value="Tasación">Tasación</option>
																		<option value="">Acción comercial propia</option>
																		<option value="">Atención oficina</option>
																		<option value="">Atención telefónica</option>
																		<option value="">e-mail</option>
																		<option value="Llamada Cliente">Llamada Cliente</option>
																		<option value="">Oferta económica</option>
																		<option value="">Primera visita</option>
																		<option value="">Reunión Cliente</option>
																		<option value="">Seguimiento </option>
																		<option value="">Segunda visita</option>
																		<option value="">Solicitud de información</option>
																		<option value="">Visita</option>
																		<option value="">Colgar Cartel</option>
																		<option value="">Escaparate</option>
																		<option value="">Internet</option>
																		<option value="">Mailing</option>
																		<option value="">Prensa</option>
																		<option value="">Publicar en Díptico</option>
																		<option value="">Publicar en prensa</option>
																		<option value="">Revista</option>
																		<option value="">Telemarketing</option>
																</select>
															</div>
														</div>
											</form><br>
										</header>
										<div class="bill-info">
											<div class="row">
												<div class="col-xs-12">
													<div class="bill-to">
														<div id='calendar'></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</section>
		</div>
		@include('partials.aside')
	</section>
	<form id="form-delete" action="" action2=""  method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/fullcalendar-3.4.0/lib/moment.min.js') }}"></script>
	<script src="{{ asset('plugins/fullcalendar-3.4.0/lib/jquery.min.js') }}"></script>
	<script src="{{ asset('plugins/fullcalendar-3.4.0/fullcalendar.min.js') }}"></script>
	<script src="{{ asset('plugins/fullcalendar-3.4.0/locale/es.js')}}"></script>
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
	<script src="{{ asset('plugins/jquery-maskedinput/jquery.maskedinput.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('js/main/agenda.js')}}"></script>
@endsection