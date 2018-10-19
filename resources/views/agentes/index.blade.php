@extends('layouts.app')
@section('title','Lista de Agentes')
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
						<h2>Lista de Agentes</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('agentes.index') }}">Agentes</a></span></li>
								<li><span><a href="{{ route('agentes.create') }}">Nuevo Agente</a></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
							<section class="panel form-wizard" id="w1">
								<header class="panel-heading">
									<div class="panel-actions">
									</div>
									<h2 class="panel-title">
										Agentes
										<div  class="text-right">
											<span>
												<a href="{{ route('agentes.create') }}" class="btn btn-success">
										            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo Agente
										        </a>
											</span>
										</div>
									</h2>
								</header>
								<div class="panel-body panel-body-nopadding">
									<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
											@if(count($agentes)>0)
											 	@include('agentes.sections.agentes_table')
											@else
												<h4>No hay registros de agentes.</h4>
											@endif
										</div>
									</section>
								</div>
							</section>
						</div>
					</div>
				</section> 
		</div>
		@include('partials.aside')
	</section>
	<form id="form-delete"  action="{{ route('agentes.destroy', ':AGENTE_ID') }}" method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/main/agentes.js') }}"></script>
@endsection