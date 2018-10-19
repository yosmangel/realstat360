@extends('layouts.app')
@section('title','Lista de Demandas')
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
						<h2>Lista de Demandas</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="/">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('demandas.index') }}">Demandas</a></span></li>
								<li><span><a href="{{ route('demandas.create') }}">Lista de Demandas</a></span></li>
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
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Demandas&nbsp;
											</a>
										</h4>
									</div>
									<div id="collapse2One" class="accordion-body collapse in">
												<div class="panel-body">
													<div  class="text-right">
														<span>
															<a href="{{ route('demandas.create') }}" class="btn btn-success">
													            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nueva Demanda
													        </a>
														</span>
													</div>
													<section class="panel panel-featured-left panel-featured-primary">
														<div class="panel-body">
														@if(count($demandas)>0)
														 <div class="table-responsive">
															<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
																<thead>
																	<tr>
																		<th>Id</th>
																		<th>Cliente</th>
																		<th>Tipo</th>
																		<th>Zona</th>
																		<th>Precio</th>
																		<th>Superficie</th>
																		<th>Hab.</th>
																		<th>Fecha Alta</th>
																		<th>Inmuebles</th>
																		<th>Operación</th> 
																	</tr>
																</thead>
																<tbody>
																 @foreach($demandas as $demanda)
																	<tr data-id="{{ $demanda->id }}">
																		 <td>{{ $demanda->id }}</td>
																		 <td>{{ $demanda->cliente->nombre }}</td>
																		 <td>
																		 	@if($demanda->inmueble != null)
																		 		{{ $tipos[$demanda->inmueble->tipo_id]->nombre }}
																		 	@else
																		 		{{ $tipos[$demanda->tipo_inmueble_id]->nombre }}
																		 	@endif
																		 </td>
																		 <td>{{ $zonas[$demanda->id] }}</td>
																		 <td>{{ $precios[$demanda->id] }}
																			
																		 </td>
																		 <td><?php echo $superficies[$demanda->id] ?></td> 
																		 <td class="text-center">{{ $habitaciones[$demanda->id] }}</td>
																		 <td>{{ $demanda->created_at }}</td>
																		 <td class="text-center"><a href="{{ route('demandas.inmuebles_coincidentes',$demanda->id) }}">{{ $numinmuebles[$demanda->id] }}</a></td>
																		 <td class="text-center">
																		  <a href="{{ route('demandas.edit',$demanda->id) }}"><i class="el el-edit"></i></a>&nbsp;&nbsp;|&nbsp;
																		  <a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
																		 </td>
																	</tr>
																 @endforeach 
																</tbody>
															</table>
														 </div>
														@else
															<h4>No hay registros de demandas.</h4>
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
	<form id="form-delete" action="{{ route('demandas.destroy', ':DEMANDA_ID') }}"  method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
	
	@include('demandas.sections.alta_cliente')

@endsection
@section('js')
	<!-- Specific Page Vendor -->
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('js/main/demandas.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
@endsection