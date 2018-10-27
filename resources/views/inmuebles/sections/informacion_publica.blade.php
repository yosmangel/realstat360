@if( count($inmuebles)>0 )
	<section class="content-with-menu content-with-menu-has-toolbar media-gallery">
		<div class="content-with-menu-container">
			<div class="inner-body mg-main">
				<div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
					<table class="table mb-none">
						<tbody>
							{{--*/ $columnas = [1,2,3] /*--}}
							{{--*/ $numprom = count($inmuebles) /*--}}
							{{--*/ $i = 0; $fil = 0; /*--}}
							{{--*/ $filas = intval(count($inmuebles)/3); 
								if (count($inmuebles)/3 > intval(count($inmuebles)/3)) {
									$filas = intval(count($inmuebles)/3) + 1;
								};
									/*--}}
								@while($fil <  $filas)
										<tr>
											@foreach($columnas as $col)
												@if($i < $numprom )
														<!--php propertyImage = $inmuebles[$i]->getPropertyFrontImage(); -->
														<?php $inmueble = $inmuebles[$i]; ?>
														<td class="isotope-item" width="33%">
																<div class="thumbnail">
																	<div class="thumb-preview">
																		<a class="thumb-image" href="{{ asset('files_img/'.$inmueble->id_portada ) }}">
																			<img src="{{ asset('files_img/'.$inmueble->id_portada) }}" class="img-responsive" alt="">
																			<!--
																			if($propertyImage != '')
																				 if (file_exists('files_img/'.propertyImage)) { 
																					<img  src=" asset('files_img/'.propertyImage) " alt="" width="120px">
																				 } else { 
																					<img  src=" asset('images/miniatura_inmueble.png') " alt="" width="120px">
																				 } 
																			else
																				<img  src=" asset('images/miniatura_inmueble.png') " alt="" width="120px">
																			endif -->
																		</a>
																		<div class="mg-thumb-options">
																			<div class="mg-zoom"><i class="fa fa-search"></i></div>
																			
																		</div>
																	</div>
																	<h5 class="mg-title text-weight-semibold"><strong>{{ $inmueble->tipo->nombre }} en {{ $inmueble->ciudad->nombre.', ' }} calle {{ $inmueble->calle.', '}} No {{ $inmueble->numero.', ' }} {{ $inmueble->pais->nombre }}</strong></h5>
																		<div class="mg-description">
																				
																			<small class="pull-left text-muted">
																				hab: {{ $inmueble->habitaciones }}, baños: {{ $inmueble->banos }}
																			</small><br>
																			<small class="pull-left text-muted">
																				@if ($inmueble->modalidad->venta == 1) 
																		            Venta {{ $inmueble->modalidad->ventaprecio }} <br>
																		        @endif
																		        @if ($inmueble->modalidad->alqresprecio == 1) 
																		            Alquiler Residencial {{ $inmueble->modalidad->alqresprecio }} <br>
																		        @endif
																		        @if ($inmueble->modalidad->alquiler_vacacional == 1) 
																		            Alquiler Vacacional {{ $inmueble->modalidad->alquiler_vacacional }}
																		        @endif
																		        @if ($inmueble->modalidad->traspaso == 1) 
																		            Traspaso {{ $inmueble->modalidad->traspasoprecio }}
																		        @endif
																		        @if( $inmueble->modalidad->venta == 0 && $inmueble->modalidad->alqresprecio == 0 && $inmueble->modalidad->alquiler_vacacional == 0 && $inmueble->modalidad->traspaso == 0)
																		        -
																		        @endif
																			</small><br>
																			<small class="pull-left text-muted">Superficie: {{ $inmueble->superficie }} m²</small><br>
																			<small class="pull-left text-muted">Ref.: {{ $inmueble->id }}</small><br>
																			<small class="pull-right text-muted">{{ $inmueble->created_at }}</small>
																			<!--<small>
																				<a href="{{ route('imagenes.descargar',$inmuebles[$i][1]) }}"><i class="fa fa-download"></i> Descargar Imagen</a>&nbsp;|&nbsp;
																				<a href="#!" class='delete-row'><i class='fa fa-trash-o'></i>&nbsp;<small>Eliminar Inmueble</small></a>
																			</small>-->
																		</div>
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
					<h4>No hay registros de inmuebles.</h4>
				</div>
			</div>
		</div>
	</section>
@endif
