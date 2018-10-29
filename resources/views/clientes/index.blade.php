@extends('layouts.app')
@section('title','Lista de Clientes')
@section('css')
	<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
	<link rel="stylesheet" href="{{ asset('js/datatables.min.css')}}">
	<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	
@endsection
@section('content')
	<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Lista de Clientes</h2>
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="{{route('home')}}">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span><a href="{{ route('clientes.index') }}">Clientes</a></span></li>
								<li><span><a href="{{ route('clientes.create') }}">Nuevo Cliente</a></span></li>
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
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Clientes&nbsp;
											</a>
										</h4>
									</div>
									<div id="collapse2One" class="accordion-body collapse in">
												<div class="panel-body">
													<div  class="text-right">
														<span>
															<a href="{{ route('clientes.create') }}" class="btn btn-success">
													            <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nuevo Cliente
													        </a>
														</span>
													</div>
													<section class="panel panel-featured-left panel-featured-primary">
														<div class="panel-body">
														@if(count($clientes)>0)
														 
														 <div class="table-responsive">
															<table class="datatable table table-striped table-bordered" >
																<thead>
																	<tr>
																		<th>Nombre</th>
																		<th>Fecha Alta</th>
																		<th>Contacto</th>
																		<th>Estado</th>
																		<th>Operaciones</th>
																	</tr>
																</thead>
																<tbody> 
																	@foreach($clientes as $cliente)
																		<tr data-id="{{ $cliente->id }}">
																			<td><a href="{{ route('clientes.show',$cliente->id) }}">{{ $cliente->apellidos }}, {{ $cliente->nombre }}</a></td>
																			<td class="text-center">
																				{{$cliente->fecha_alta}}
																			</td>
																			<td>
																				<?php $c = 0; ?>
																				@if($cliente->telefono)
																					{{ $cliente->telefono }}
																					<?php $c++; ?>
																				@endif
																				@if($cliente->movil)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->movil }}
																				@endif
																				@if($cliente->email)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->email }}
																				@endif
																				@if($cliente->telefono2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->telefono2 }}
																				@endif
																				@if($cliente->movil2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->movil2 }}
																				@endif
																				@if($cliente->email2)
																					@if( $c > 0 )
																					,
																					@endif
																					{{ $cliente->email2 }}
																				@endif
																			</td>
																			<td>
																				{{$cliente->estado}}
																			</td>
																			<td class="text-center">
																				<a href="{{ route('clientes.edit',$cliente->id) }}"><i class="el el-edit"></i></a> | 
																				<a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
																			</td>
																		</tr>
																	@endforeach 
																</tbody>
															</table>
														 </div>
														@else
															<h4>No hay registros de clientes.</h4>
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
	<form id="form-delete"  action="{{ route('clientes.destroy', ':CLIENTE_ID') }}" method="delete">
		<input name="_method" type="hidden" value = "DELETE">
		{{ csrf_field() }}
	</form>
@endsection
@section('js')

	<script>
		/*$(document).ready(function(){
			$('.delete-row').bind('click', function(e){
				e.preventDefault();
				var row = $(this).parents('tr');
				var id = row.data('id');
				var referencia = row.data('ref');
				var form = $('#form-delete');
				var url = form.attr('action').replace(':INMUEBLE_ID',id);
				var data = form.serialize();
				var urlextras = form.attr('action2').replace(':INMUEBLE_ID',id);
				
				swal({
					title: "¿Desea eliminar el inmueble con REF: "+referencia+"?",
					text: "Se borraran todos los datos del mismo",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: '#DD6B55',
					confirmButtonText: 'Eliminar',
					closeOnConfirm: false
				},
				function(){ 
					row.fadeOut();
					$.post(urlextras, data);
					$.post(url, data, function(result){
						swal("Eliminado", "Se ha eliminado el registro del inmueble REF: " + referencia, "success");
					});
				});

			});
		});*/
	</script>
	<!--<script src="{ asset('plugins/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>-->
	<!-- Specific Page Vendor -->
	
	<script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
	<script src="{{ asset('plugins/pnotify/pnotify.custom.js') }}"></script>
	<!-- Examples -->
	<script src="{{ asset('js/forms/examples.wizard.js') }}"></script>
	<script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
	<script src="{{ asset('js/main/clientes.js') }}"></script>
	<script src="{{ asset('js/datatables.min.js') }}"></script>
	
@endsection