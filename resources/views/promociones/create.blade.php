@extends('layouts.app') 
@section('title','Crear Promoción')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/codemirror/lib/codemirror.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					
					<header class="page-header">
						<h2>Nueva Promoción</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li><a href="/"><i class="fa fa-home"></i></a>
								</li>
								<li><span><a href="{{ route('inmuebles.index') }}">Inmuebles</a></span>
								</li>
								<li><span><a href="{{ route('promociones.index') }}">Promociones</a></span>
								</li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<section class="panel form-wizard" id="w1">
									<div class="panel-body panel-body-nopadding">
										<div class="wizard-tabs">
											<ul class="wizard-steps">
												<li class="active" id="tab-select-promo">
													<a href="#w1-promocion" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">1</span>
														<strong>Promoción</strong><br><small>de obra nueva</small>
													</a>
												</li>
												<li id="tab-select-nuevo">
													<a href="#w1-nuevo-inmueble" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">2</span>
														<strong>Nuevo Inmueble</strong><br><small>por tipología</small>
													</a>
												</li>
												<li id="tab-select-lista">
													<a href="#w1-lista-inmuebles" data-toggle="tab" class="text-center">
														<span class="badge hidden-xs">3</span>
														<strong>Lista Inmuebles</strong><br><small>por tipologías</small>
													</a>
												</li>
											</ul>
										</div>
										<div class="tab-content">
												<!-- Nueva Promocion-->
												<div id="w1-promocion" class="tab-pane active">
													@include('promociones.sections.promocion')
												</div>
												<!-- Nuevo Inmueble en Promocion-->
												<div id="w1-nuevo-inmueble" class="tab-pane">
													@include('promociones.sections.nuevo_inmueble')
												</div>
												<!-- Lista Inmuebles -->
												<div id="w1-lista-inmuebles" class="tab-pane">
													<h4>contenido</h4>
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
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/summernote/summernote.js') }}"></script>
	<script src="{{ asset('js/main/utils.js') }}"></script>
	<script src="{{ asset('js/main/promociones.js') }}"></script>
	<script src="{{ asset('js/main/common.js') }}"></script>
	<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('js/main/archivos_promo_dropzone.js') }}"></script>
@endsection
