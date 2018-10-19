@extends('layouts.app')
@section('title','Nueva Acción')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					
					<header class="page-header">
						<h2>Crear Nueva demanda</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('demandas.index') }}">Demandas</a></span></li>
								<li><span><a href="{{ route('demandas.create') }}">Nueva Demanda</a></span></li>
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
										<h2 class="panel-title">Demandas</h2>
									</header> 
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li class="active" id="tab-principales">
													<a href="#w1-principales" data-toggle="tab" class="text-center" active>
														<span class="badge hidden-xs">1</span>
														Principales	<br><small>Datos demanda</small>
													</a>
												</li>
												<li id="tab-extras"> 
													<a href="#w1-extras" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Extras	<br><small>Inmueble, Finca</small>
													</a>
												</li>
												<li id="tab-inmuebles"> 
													<a href="#w1-inmuebles" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Inmuebles	<br><small>Coincidentes</small>
													</a>
												</li>
												<li id="tab-acciones"> 
													<a href="#w1-acciones" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">4</span>
														Acciones	<br><small>Citas, Agenda</small>
													</a>
												</li>
												<li id="tab-comercial"> 
													<a href="#w1-comercial" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">4</span>
														Comercial	<br><small>Datos de gestión</small>
													</a>
												</li>
											</ul>
										</div> 
										
										<div class="tab-content">
											<div id="w1-principales" class="tab-pane active">
												<div class="row">
													<div class="form-group">
														<div id="msj_form_principales" class="alert alert-success" role="alert" style="display:none">
															Se guardaron los <strong>"Datos de Pricipales de la Demanda"</strong>
														</div>
														<div id="msj_error" class="alert alert-success" role="alert" style="display:none">
															<strong>Error: </strong> <strong>"Problemas de Conexión con el Servidor"</strong>
														</div>
													</div>
												</div>
												@include('demandas.sections.principales')
											</div>
											<div id="w1-extras" class="tab-pane">
												@include('demandas.sections.extrasdemandas')
											</div>
											<div id="w1-inmuebles" class="tab-pane">
												@include('demandas.sections.coincidentes')
											</div>
											<div id="w1-acciones" class="tab-pane">
												
											</div>
											<div id="w1-comercial" class="tab-pane">
												
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
		@include('demandas.sections.alta_cliente')
	</section>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
	<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('js/main/demandas.js') }}"></script>
	<script src="{{ asset('js/main/utils.js') }}"></script>
@endsection
