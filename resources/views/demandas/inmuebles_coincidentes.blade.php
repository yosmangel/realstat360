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
						<h2>Inmuebles Coincidentes con la Demanda</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('demandas.index') }}">Demandas</a></span></li>
								<li><span><a href="{{ route('demandas.create') }}">Inmuebles Coincidentes</a></span></li>
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
										<h2 class="panel-title">Inmuebles Coincidentes con la Demandas</h2>
									</header> 
									<div class="panel-body panel-body-nopadding">
										@include('demandas.sections.resultado_coincidentes')
									</div>
									<div class="panel-footer">
										<div class="row text-right">
											<a href="{{ route('demandas.index') }}" class="btn btn-success"><i class="fa fa-arrow-left"></i>&nbsp;Volver a la lista de Demandas</a>
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
