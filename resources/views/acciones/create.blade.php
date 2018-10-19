@extends('layouts.app')
@section('title','Nueva Acción')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-timepicker/css/bootstrap-timepicker.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') }}">

@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					
					<header class="page-header">
						<h2>Crear Nueva acción</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('acciones.index') }}">Acciones</span></a></li>
								<li><span><a href="{{ route('acciones.create') }}">Nueva Acción</a></span></li>
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
										<h2 class="panel-title">Acciones</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li class="active" id="tab-principales">
													<a href="#w1-accion" data-toggle="tab" class="text-center" active>
														<span class="badge hidden-xs">1</span>
														Acción	<br><small>Visita, llamada</small>
													</a>
												</li>
												<li id="tab-documentos"> 
													<a href="#w1-documentos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Documentos	<br><small>Contrato, dossier</small>
													</a>
												</li>
											</ul>
										</div> 
										
										<div class="tab-content">
											<div id="w1-accion" class="tab-pane active">
												<div class="row">
													<div class="form-group">
														<div id="msj_form_principales" class="alert alert-success" role="alert" style="display:none">
															Se guardaron los <strong>"Datos de la Agencia"</strong>
														</div>
														<div id="msj_error" class="alert alert-success" role="alert" style="display:none">
															<strong>Error: </strong> <strong>"Problemas de Conexión con el Servidor"</strong>
														</div>
													</div>
												</div>
												@include('acciones.sections.accion')
											</div>
											<!-- Entrada de los datos de la Direccion del Inmueble -->
											<div id="w1-documentos" class="tab-pane">
												@include('acciones.sections.documentos')
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
	<script src="{{ asset('plugins/bootstrap-timepicker/bootstrap-timepicker.js') }}"></script>
	<script src="{{ asset('plugins/autosize/autosize.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>


	<script src="{{ asset('plugins/nanoscroller/nanoscroller.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
	<script src="{{ asset('js/theme.js') }}"></script>
	<script src="{{ asset('js/theme.init.js') }}"></script>


	<!-- Personalized -->
	<script src="{{ asset('js/main/agencias.js') }}"></script>
@endsection
