@extends('layouts.app')
@section('title','Lista de Acciones')
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
						<h2>Lista de Acciones</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('acciones.index') }}">Acciones</a></span></li>
								<li><span><a href="{{ route('acciones.create') }}">Lista de Acciones</a></span></li>
							</ol>
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>
					<!-- start: page -->
					<div class="row">
						<div class="col-md-12">
						
							<div class="panel-group" id="accordion2">
								<div class="panel panel-accordion panel-accordion-primary">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Acciones&nbsp;
											</a>
										</h4>
									</div>
									<div id="collapse2One" class="accordion-body collapse in">
												<div class="panel-body">
													<div  class="text-right">
														<span>
															<a href="{{ route('acciones.create') }}" class="btn btn-success">
													            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo Acción
													        </a>
														</span>
													</div>
													<section class="panel panel-featured-left panel-featured-primary">
														<div class="panel-body">
															@if(count($acciones)>0)
															<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
																<thead>
																	<tr>
																		<th>Imagen</th>
																		<th>Ref.</th>
																		<th>Tipo</th>
																		<th>Estado</th>
																		<th>Sup.(m<sup>2</sup>)</th>
																		<th>Modalidad</th>
																		<th>Precio</th>
																		<th>Dirección</th>
																		<th>Hab.</th>
																		<th>Baños</th>
																		<th>Acción</th>
																	</tr>
																</thead>
																<tbody>
																	<tr data-id="" data-ref="">
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td></td>
																		 <td class="text-center">
																		  <a href=""><i class="el el-edit"></i></a>&nbsp;&nbsp;|&nbsp;
																		  <a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
																		 </td>
																	</tr>
																</tbody>
															</table>
															@else
																<h4>No hay registros de acciones.</h4>
															@endif
														</div>
													</section>
												</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</section>
		</div>
		@include('partials.aside')
	</section>
	<form id="form-delete" action="" action2=""  method="delete">
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
	<script src="{{ asset('js/main/acciones.js') }}"></script>
@endsection