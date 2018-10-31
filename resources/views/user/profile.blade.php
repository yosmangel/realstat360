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
				<section role="main" class="content-body" id="w1">
					<header class="page-header">
						<h2>Perfil de Usuario</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{ url('home') }}">
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
						<div id="msj_form_usuario_editado" class="alert alert-success" role="alert" style="display:none">
							Se guardaron los datos del  <strong>usuario.</strong>
						</div>
						<div id="response" class="alert alert-danger" role="alert" style="display:none">
						</div>
						<div class="col-md-12">
							<div class="tabs" >
								<ul class="nav nav-tabs tabs-primary">
									<li class="active">
										<a href="#edit" data-toggle="tab">Editar Perfil</a>
									</li>
								</ul>
								<div class="tab-content">
									<div id="edit" class="tab-pane active">
										<form class="form-horizontal" action="{{ route('user.update',$user->id) }}" method="post" id="userProfileForm" name="userProfileForm">
											<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
											{{ method_field("PUT") }}
											<h4 class="mb-xlg">Información Personal</h4>
											<fieldset>
												<div class="form-group">
													<label class="col-md-3 control-label" for="nombre">Nombre</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="nombre" name="nombre"value="{{$user->name}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="apellidos">Apellidos</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="direccion">Dirección</label>
													<div class="col-md-8">
														<input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
													</div>
												</div>
											</fieldset>
											<hr class="dotted tall">
											<h4 class="mb-xlg">Cambiar Contraseña</h4>
											<fieldset class="mb-xl">
												<div class="form-group">
													<label class="col-md-3 control-label" for="password">Nueva Contraseña</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="password" name="password">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label" for="password2">Repetir Contraseña</label>
													<div class="col-md-8">
														<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
													</div>
												</div>
											</fieldset>
											<div class="panel-footer">
												<div class="row">
													<div class="col-md-9 col-md-offset-3">
														<button type="submit" class="btn btn-primary">Guardar</button>
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
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<!-- Personalized -->
	<script src="{{ asset('js/main/user.js') }}"></script>
@endsection