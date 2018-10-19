@extends('layouts.app')
@section('title','Editar Agencia')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-multiselect/bootstrap-multiselect.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Editar Agencia</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('agencias.index') }}">Agencias</span></a></li>
								<li><span><a href="">Editar Agencia</span></a></li>
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
										<h2 class="panel-title">Editar Agencia</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li class="active">
													<a href="#w1-principales" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Agencia	<br><small>Datos Principales</small>
													</a>
												</li>
												<li>
													<a href="#w1-facturacion" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Facturación	<br><small>Acceso a su Factura</small>
													</a>
												</li>
												<li>
													<a href="#w1-agentes" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Agentes	<br><small>Agentes de la Agencia</small>
													</a>
												</li>
												<li>
													<a href="#w1-documentos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Documentos<br><small>Firmas, logo plantillas</small>
													</a>
												</li>
												<li>
													<a href="#w1-configuracion" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Configuración<br><small>y otros servicios</small>
													</a>
												</li>
											</ul>
										</div> 
										
										<div class="tab-content">
											<div id="w1-principales" class="tab-pane active">
												@include('agencias.sections.datos_principales')
											</div>
											<!-- Entrada de los datos de la Direccion del Inmueble -->
											<div id="w1-facturacion" class="tab-pane">
												@include('agencias.sections.facturacion')
											</div>
											<!-- DATOS -->
											<div id="w1-agentes" class="tab-pane">
												@include('agencias.sections.agentes')
											</div>
											<!-- DESCRIPCION -->
											<div id="w1-documentos" class="tab-pane">
												@include('agencias.sections.documentos')
											</div>
											<!-- DATOS DE CONTACTO EN PUBLICACIONES -->
											<div id="w1-configuracion" class="tab-pane">
												@include('agencias.sections.configuracion')
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
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('js/main/agencias.js') }}"></script>
@endsection
