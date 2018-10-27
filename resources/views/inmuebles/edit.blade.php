@extends('layouts.app')
@section('title','Editar Inmueble')
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
									<a href="{{route('home')}}">
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
										<h2 class="panel-title">
											Editar Inmueble: <em>Ref-</em><strong>{{ $inmueble->id }}</strong>
										</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li id="tab-principales" class="active">
													<a href="#" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														Principales <small>Datos Inmueble</small>
													</a>
												</li>
												<li id="tab-extras">
													<a  href="#" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														Extras <small>Inmueble, Finca</small>
													</a>
												</li>
												<li id="tab-fotos">
													<a href="#" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														Fotos y Documentos
													</a>
												</li>
												<li id="tab-internos">
													<a  href="#" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">4</span>
														Internos <small>Datos Privados</small>
													</a>
												</li>
												<li id="tab-demandas">
													<a href="#" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">5</span>
														Demandas <small>coincidentes</small>
													</a>
												</li>
											</ul>
										</div>

											<div class="tab-content">
												<div role="tabpanel" id="w1-principales" class="tab-pane active">
													@include('inmuebles.sections.principales_edt')
												</div>
												<!-- Entrada de los datos de la Direccion del Inmueble -->
												<div role="tabpanel" id="w1-extras" class="tab-pane">
													@include('inmuebles.sections.extras_edt')
												</div>
												<!-- DATOS -->
												<div role="tabpanel" id="w1-fotos" class="tab-pane">
													@include('inmuebles.sections.fotos')
												</div>
												<!-- DESCRIPCION -->
												<div role="tabpanel" id="w1-internos" class="tab-pane">
													@if(empty($inmueble->interno))
														@include('inmuebles.sections.internos')
													@else
														@include('inmuebles.sections.internos_edit')
													@endif
												</div>
												<!-- DATOS DE CONTACTO EN PUBLICACIONES -->
												<div role="tabpanel" id="w1-demandas" class="tab-pane">
													@include('inmuebles.sections.demandas')
												</div>
											</div>
									</div>
									<div class="panel-footer">
										<ul class="pager">
											<li id="previousLI" class="pull-left disabled">
												<a href="#"><i class="fa fa-angle-left"></i> Anterior</a>
											</li>
											<li id="nextLI" class="pull-right">
												<a href="#">Siguiente <i class="fa fa-angle-right"></i></a>
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
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>

	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/archivos_dropzone.js') }}" ></script>
	<script src="{{ asset('js/main/utils.js') }}" ></script>

	<script src="{{ asset('js/main/editarInmueble.js') }}"></script>
	<script src="{{ asset('js/main/common.js') }}"></script>
@endsection
  