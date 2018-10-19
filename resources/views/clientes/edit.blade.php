@extends('layouts.app')
@section('title','Nuevo Cliente')
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
						<h2>Editar de Cliente</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('clientes.index') }}">Clientes</a></span></li>
								<li><span><a href="{{ route('clientes.create') }}">Editar</a></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
						<div class="row">
							<div class="col-xs-12 col-md-12">
								<section class="panel form-wizard" id="w1">
									<header class="panel-heading">
										<h2 class="panel-title">Nuevo Cliente</h2>
									</header>
									<div class="panel-body panel-body-nopadding">
										@include('clientes.sections.principales', ['cliente' => $cliente, 'url' => '/clientes/'.$cliente->id, 'method' => 'PUT', 'texto_submit' => 'Editar'] )
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
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('js/main/utils.js') }}" ></script>
	<script src="{{ asset('js/main/clientes.js') }}"></script>
	<script src="{{ asset('js/main/agencias.js') }}"></script>
@endsection
