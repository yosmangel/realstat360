@extends('layouts.app')
@section('title','Nueva Acción')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/hover/hover.css') }}" />
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
								<section class="panel panel-featured panel-featured-primary form-wizard" id="w1">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
										</div>
										<h2 class="panel-title">Inmuebles Coincidentes con la Demandas</h2>
									</header> 
									<div class="panel-body panel-body-nopadding">
										<div class="row separador-20">
											<div class="col-xs-12 col-md-10 col-md-offset-1">
												@if(count($inmuebles) > 0)
													@foreach($inmuebles as $inmueble)
														<div class="panel panel-card hvr-float-shadow">
															<div class="row">
																<div class="col-xs-12 col-sm-5">
																	@if( ($inmueble['inmuebles']->id_portada != null) && ($inmueble['inmuebles']->id_portada != '') )
																		<img src="{{ asset('files_img/'.$inmueble['inmuebles']->id_portada ) }}"  alt="Project"  class="img-responsive img-thumbnail">
																	@else
																	 	<?php  $ima = (count($inmueble['inmuebles']->imagenes)>0) ? $inmueble['inmuebles']->imagenes[0]->nombre : 'miniatura_inmueble.png'; ?>
																		<img src="{{ asset('files_img/'.$ima ) }}" alt="" class="img-responsive img-thumbnail">
																	@endif
																</div>
																<div class="col-xs-12 col-sm-7">
																	<h4><span class="label label-info">REF-{{ $inmueble['inmuebles']->id }}</span></h4>
																	<h5 class="text-left" style="margin-top: 2px; margin-bottom: 2px;">
																		<strong>

																			{{ $inmueble['inmuebles']->tipo->nombre }} <br>
																			Calle {{ $inmueble['inmuebles']->calle }}, 
																			# {{ $inmueble['inmuebles']->numero }},
																			{{ $inmueble['inmuebles']->municipio->nombre }},
																			{{ $inmueble['inmuebles']->pais->nombre }}, 
																			<strong></strong>
																		</strong>
																	</h5>
																	 <h5 class="media-heading" >En <span class="label label-danger">{{ $inmueble['operacion'] }}</span></h5> 
																	<i class="fa fa-bath" aria-hidden="true"></i> {{ $inmueble['inmuebles']->banos }} <br>
																	<i class="fa fa-home" aria-hidden="true"></i> {{ $inmueble['inmuebles']->habitaciones }} <br>
																	<small class="pull-left text-muted">Sup. {{ $inmueble['inmuebles']->superficie }} m²</small><br>
																</div>
															</div>
															
														</div>
														<br>
													@endforeach
												@else
													<div class="alert alert-danger">
														No hay <strong>inmuebles</strong> coincidentes con esta demanda.
													</div>
												@endif
											</div>
										</div>
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
