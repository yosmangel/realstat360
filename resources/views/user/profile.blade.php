@extends('layouts.app')
@section('title','Lista de Inmuebles')
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
						<h2>Perfil de Usuario</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{ url('/') }}">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Perfil de Usuario</span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<div class="tabs">
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#edit" data-toggle="tab">Editar Perfil</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="edit" class="tab-pane active">
										<form class="form-horizontal" method="get">
											<h4 class="mb-xlg">Información Personal</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="nombre">Nombre</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="nombre" name="nombre">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="apellidos">Apellidos</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="apellidos" name="apellidos">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="direccion">Dirección</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="direccion" name="direccion">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="Empresa">Empresa</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="empresa">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="profileBio">Breve reseña sobre tí</label>
													<div class="col-md-8">
														<textarea class="form-control" rows="3" id="profileBio"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label mt-xs pt-none">Publica</label>
													<div class="col-md-8">
														<div class="checkbox-custom checkbox-default checkbox-inline mt-xs">
															<input type="checkbox" checked="" id="profilePublic">
															<label for="profilePublic"></label>
														</div>
													</div>
												</div>
											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">Cambiar Contraseña</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="password">Nueva Contraseña</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="password" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="password2">Repetir Contraseña</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="password2" name="password2">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Enviar</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end: page -->
				</section>
		</div>
		@include('partials.aside')
	</section>
	<form id="form-delete" action="{{ route('inmuebles.destroy', ':INMUEBLE_ID') }}" action2="{{ route('extras.destroy', ':INMUEBLE_ID') }}"  method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('js/main/inmuebles.js') }}"></script>
@endsection