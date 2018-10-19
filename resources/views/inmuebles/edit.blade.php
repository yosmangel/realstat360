@extends('layouts.app')
@section('title','Registrar Inmueble')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.theme.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
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
											Editar Inmueble: <em>Ref. </em> <span class="label label-info">  <strong>R-{{ $inmueble->id }}</strong></span>
										</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li id="tab-principales" class="active">
													<a href="#w1-principales" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Principales <small>Datos Inmueble</small>
													</a>
												</li>
												<li id="tab-extras">
													<a href="#w1-extras" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Extras <small>Inmueble, Finca</small>
													</a>
												</li>
												<li id="tab-fotos">
													<a href="#w1-fotos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Fotos y Documentos
													</a>
												</li>
												<li id="tab-internos">
													<a href="#w1-internos" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Internos <small>Datos Privados</small>
													</a>
												</li>
												<li id="tab-demandas">
													<a href="#w1-demandas" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Demandas <small>coincidentes</small>
													</a>
												</li>
											</ul>
										</div>

											<div class="tab-content">
												<div id="w1-principales" class="tab-pane active">
													@include('inmuebles.sections.principales_edt')
												</div>
												<!-- Entrada de los datos de la Direccion del Inmueble -->
												<div id="w1-extras" class="tab-pane">
													@include('inmuebles.sections.extras_edt')
												</div>
												<!-- DATOS -->
												<div id="w1-fotos" class="tab-pane">
													@include('inmuebles.sections.fotos')
												</div>
												<!-- DESCRIPCION -->
												<div id="w1-internos" class="tab-pane">
													@include('inmuebles.sections.internos')
												</div>
												<!-- DATOS DE CONTACTO EN PUBLICACIONES -->
												<div id="w1-demandas" class="tab-pane">
													<form class="form-horizontal" novalidate="novalidate">
														Implementar el match de este inmueble con las demandas coincidentes
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
	<!--script src="{{ asset('plugins/select2/js/select2.js') }}"></script-->
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/archivos_dropzone.js') }}" ></script>
	<script src="{{ asset('js/main/utils.js') }}" ></script>
	<!--script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script-->
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
	<script src="{{ asset('js/main/common.js') }}"></script>
@endsection
  