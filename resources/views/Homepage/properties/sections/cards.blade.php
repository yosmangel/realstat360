<h4>Listado de tus inmuebles <small>( Total: {{ count($properties) }} inmuebles )</small></h4>
<div class="container">
					<div class="row">
					  @if( count($properties) > 0 )
						<div class="col-md-12">
							<div class="owl-carousel owl-theme" data-plugin-options="{'items': 4, 'margin': 20, 'loop': false, 'autoplay': true, 'autoplayTimeout': 5000}">
								@foreach($properties as $property)
									<div class="portfolio-item">
										<a href="#popupProject{{ $property->id }}" data-portfolio-on-modal>
											<span class="thumb-info thumb-info-lighten">
												<span class="thumb-info-wrapper">
													<img src="{{ asset('img/propiedades/'.$property->facade->name) }}" class="img-responsive" alt="">
													<span class="thumb-info-title">
														<span class="thumb-info-inner">{{ $property->name }}</span>
														@if($property->operation)
															@if($property->operation->in_sale)
																<small for="" class="label-danger">
																	Venta
																</small>
															@endif
															@if($property->operation->in_rent)
																<small for="" class="label-danger">
																	Alquiler
																</small>
															@endif
															@if($property->operation->in_share)
																<small for="" class="label-danger">
																	A compartir
																</small>
															@endif
														@endif
													</span>
													<span class="thumb-info-action">
														<span class="thumb-info-action-icon"><i class="fa fa-plus-square"></i></span>
													</span>
												</span>
											</span>
										</a>
										<!-- Popup Project - Start -->
										@include('properties.sections.detail_modal')
										<!-- Popup Project - End -->
									</div>
								@endforeach
							</div>
							<hr class="tall">
						</div>
					  @else
					  	<div class="col-xs-12">
					        <div class="alert alert-info">
					            Aun no ha agregado ningun inmueble. Ir a <a href="{{ route('propiedades.create') }}" class="text-rs360p text-shadow-rs360p"><em><strong>Alta de Inmuebles</strong></em></a>
					        </div>
					    </div>
					  @endif
					</div>
					
					<!-- GESTION DE INMUEBLES -->
					<div class="row bottom-md">
						<div class="col-md-4">
							<div class="feature-box feature-box-style-2 bottom-xs">
								<div class="feature-box-icon">
									<i class="fa fa-group"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-xs">Alta de Inmuebles</h4>
									<p>Crea tus <span class="alternative-font">inmuebles</span> de forma rápida y sencilla estableciendo sus características principales.</p>
									<a href="{{ route('propiedades.create') }}" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-plus"></i>&nbsp;Alta de Inmuebles</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature-box feature-box-style-2 bottom-xs">
								<div class="feature-box-icon">
									<i class="fa fa-film"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-xs">Preferencias</h4>
									<p>Tus inmuebles podrán ser encontrados por los clientes que cumplan las <span class="alternative-font">preferencias</span> de búsqueda que establezcas en esta sección.</p>
									<a href="{{ route('propietary.preferences') }}" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-list-ol"></i>&nbsp;Editar Preferencias</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature-box feature-box-style-2 bottom-xs">
								<div class="feature-box-icon">
									<i class="fa fa-bars"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-xs">Públicos</h4>
									<p>Puedes seleccionar algunos inmuebles para que sean visibles a todos los usuarios de la plataforma, sin requerir preferencias.</p>
									<a href="#" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-eye"></i>&nbsp;Seleccionar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>	