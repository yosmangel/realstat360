@extends('layouts.app')
@section('title','Lista de Promociones')
@section('css')
@endsection
@section('content')
<section class="body">
		@include('partials.header')
		<div class="inner-wrapper">
			@include('partials.menu_left')
			<section role="main" class="content-body">			
				<header class="page-header">
					<h2>Promociones</h2>
					<div class="right-wrapper pull-right">
						<ol class="breadcrumbs">
							<li>
								<a href="">	
									<i class="fa fa-home"></i>
								</a>
							</li>
							<li><span>Inmuebles</span></li>
							<li><span>Promociones</span></li>
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
												<i class="fa fa-list-alt" aria-hidden="true"></i> Lista de Promociones&nbsp;
											</a>
										</h4>
										
									</div>
									<div id="collapse2One" class="accordion-body collapse in">
												<div class="panel-body">
													<!-- Split button -->
													<div class="text-right">
														<a type="button" href="{{ route('promociones.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nueva Promoción</a>
														@if( count($promociones) > 0)
														<div class="btn-group">
														  <button type="button" class="btn btn-danger">Ordenar</button>
														  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														    <span class="caret"></span>
														    <span class="sr-only">Boton Opciones Ordenar</span>
														  </button>
														  <ul class="dropdown-menu">
														    <li><a href="#">Nombre</a></li>
														    <li><a href="#">Precio Ascendente</a></li>
														    <li><a href="#">Precio Descendente</a></li>
														    <li role="separator" class="divider"></li>
														    <li><a href="#">Superficie Ascendente</a></li>
														    <li><a href="#">Superficie Descendente</a></li>
														  </ul>
														</div>
														@endif
													</div>
													@if( count($promociones) > 0)
														<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
															<div class="content-with-menu-container">
																  <div class="inner-body mg-main">
																	<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
																		<table class="table mb-none">
																			<tbody>
																				{{--*/ $columnas = [1,2,3] /*--}}
																				{{--*/ $numprom = count($promociones) /*--}}
																				{{--*/ $i = 0; $fil = 0; /*--}}
																				{{--*/ $filas = intval(count($promociones)/3); 
																					if (count($promociones)/3 > intval(count($promociones)/3)) {
																						$filas = intval(count($promociones)/3) + 1;
																					};
																						/*--}}
																					@while($fil <  $filas)
																							<tr>
																								@foreach($columnas as $col)
																									@if($i < $numprom )
																											<td class="isotope-item" width="33%">
																												<div class="thumbnail">
																													<div class="thumb-preview">
																														<a class="thumb-image" href="{{ asset('promo_files_img/'.$promociones[$i]->imagenes[0]->nombre ) }}">
																														@if( count($promociones[$i]->imagenes) > 0)
																															<img src="{{ asset('promo_files_img/'.$promociones[$i]->imagenes[0]->nombre ) }}" class="img-responsive" alt="Project">
																														@else
																															<img src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="50px">
																														@endif
																														</a>
																														<div class="mg-thumb-options">
																															<div class="mg-zoom"><i class="fa fa-search"></i></div>
																															<div class="mg-toolbar">
																																<div class="mg-group pull-right">
																																	<a href="#">VER</a>
																																	<button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
																																		<i class="fa fa-caret-up"></i>
																																	</button>
																																	<ul class="dropdown-menu mg-menu" role="menu">
																																		<li><a href="#"><i class="fa fa-download"></i> Download</a></li>
																																		<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
																																	</ul>
																																</div>
																															</div>
																														</div>
																													</div>
																													<h5 class="mg-title text-weight-semibold">{{ $promociones[$i]->nombre }}<small> venta</small></h5>
																													@if($promociones[$i]->mostrardireccion == 1)
																														<div class="mg-description">
																															<small class="pull-left text-muted">
																																{{ $promociones[$i]->pais->nombre }}, 
																																{{ $promociones[$i]->municipio->nombre }},
																																@if($promociones[$i]->pais->zona != '') 
																																	Zona: {{ $promociones[$i]->pais->zona }},
																																@endif
																																@if($promociones[$i]->via->nombre != '') 
																																	{{ $promociones[$i]->via->nombre }}, 
																																@endif
																																@if($promociones[$i]->calle != '') 
																																	{{ $promociones[$i]->calle }}, 
																																@endif
																																@if($promociones[$i]->numero != '') 
																																	No.: {{ $promociones[$i]->numero }} 
																																@endif 
																															</small><br>
																															<small class="pull-left text-muted">Desde 100 m²  hasta 100 m²</small><br>
																															<small class="pull-left text-muted">De 650 m² a 200.000 m²</small><br>
																															<small class="pull-left text-muted">Ref.: 1326	1 Inmuebles</small><br>
																															<small class="pull-right text-muted">07/10/2016</small>
																														</div>
																													@elseif($promociones[$i]->mostrardireccion == 2)
																														<div class="mg-description">
																															<small class="pull-left text-muted">
																																{{ $promociones[$i]->pais->nombre }}, 
																																{{ $promociones[$i]->municipio->nombre }},
																																@if($promociones[$i]->via->nombre != '') 
																																	{{ $promociones[$i]->via->nombre }}, 
																																@endif
																																@if($promociones[$i]->calle != '') 
																																	{{ $promociones[$i]->calle }} 
																																@endif
																															</small><br>
																															<small class="pull-left text-muted">Desde 100 m²  hasta 100 m²</small><br>
																															<small class="pull-left text-muted">De 650 m² a 200.000 m²</small><br>
																															<small class="pull-left text-muted">Ref.: 1326	1 Inmuebles</small><br>
																															<small class="pull-right text-muted">07/10/2016</small>
																														</div>
																													@elseif($promociones[$i]->mostrardireccion == 3)
																														<div class="mg-description">
																															<small class="pull-left text-muted">
																																{{ $promociones[$i]->pais->nombre }}, 
																																{{ $promociones[$i]->municipio->nombre }},
																																@if($promociones[$i]->pais->zona != '') 
																																	Zona: {{ $promociones[$i]->pais->zona }}
																																@endif
																															</small><br>
																															<small class="pull-left text-muted">Desde 100 m²  hasta 100 m²</small><br>
																															<small class="pull-left text-muted">De 650 m² a 200.000 m²</small><br>
																															<small class="pull-left text-muted">Ref.: 1326	1 Inmuebles</small><br>
																															<small class="pull-right text-muted">07/10/2016</small>
																														</div>
																													@endif
																												</div>
																											</td>
																										{{--*/ $i++ /*--}}
																									@else
																											<td class="isotope-item" width="33%">
																											</td>
																									@endif
																								@endforeach
																							</tr>
																							{{--*/ $fil++ /*--}}  
																					@endwhile
																			</tbody>
																		</table>
																	</div>
																  </div>
															</div>
														 </section>
													@else
														<section class="panel panel-featured-left panel-featured-primary">
															<div class="panel-body">
																<div class="row">
																	<div class="col-xs-12">
																		<h4>No se han creado promociones.</h4>
																	</div>
																</div>
															</div>
														</section>
													@endif
												</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
	</div>
</section>
@endsection
@section('js')
	<script src="{{ asset('plugins/isotope/isotope.js') }}"></script>
	<script src="{{ asset('js/pages/examples.mediagallery.js') }}"></script>
@endsection
