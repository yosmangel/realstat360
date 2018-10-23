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
					<h2>Nuevo Inmueble</h2>
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="{{route('home')}}">
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Inmuebles</span></li>
							<li><span>Nuevo Inmueble</span></li>
						</ol>
						<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
					</div>
				</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<section class="panel form-wizard" id="w1">
									<header class="panel-heading">
										
										<h2 class="panel-title">Crear Inmueble</h2>
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
													<a href="#" data-toggle="tab" class="text-center">
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
													<a href="#" data-toggle="tab" class="text-center">
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
											<div  role="tabpanel" id="w1-principales" class="tab-pane active">
												@include('inmuebles.sections.principales')
											</div>
											<div  role="tabpanel" id="w1-extras" class="tab-pane">
												@include('inmuebles.sections.extras')
											</div>
											<!-- DATOS -->
											<div  role="tabpanel" id="w1-fotos" class="tab-pane">
												@include('inmuebles.sections.fotos_create')
											</div>
											<!-- DESCRIPCION -->
											<div  role="tabpanel" id="w1-internos" class="tab-pane">
												@include('inmuebles.sections.internos')
											</div>
											<!-- DATOS DE CONTACTO EN PUBLICACIONES -->
											<div role="tabpanel" id="w1-demandas" class="tab-pane">
												@include('inmuebles.sections.demandas')
												<input type="hidden" id="tipoinmueble" value=""/>
												<input type="hidden" id="habitaciones" value=""/>
												<input type="hidden" id="zona" value=""/>
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
	<!-- Google Map Api 
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeHD5h03-YMxjHIQXL-TYtgxn_cSvamcQ&libraries=places" async defer></script>
	<script src="{{ asset('js/main/map.js') }}"></script>-->
	
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/archivos_dropzone_create.js') }}" ></script>
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
	<script src="{{ asset('js/main/common.js') }}"></script>
@endsection
