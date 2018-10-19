<h4>Listado de tus inmuebles <small>( Total: {{ count($inmuebles) }} inmuebles )</small></h4>
<div class="container">
					<div class="row">
					  @if( count($inmuebles) > 0 )
						<div class="col-md-12">
							<div class="owl-carousel owl-theme" data-plugin-options="{'items': 4, 'margin': 20, 'loop': false, 'autoplay': true, 'autoplayTimeout': 5000}">
								@foreach($inmuebles as $inmueble)
									<div class="portfolio-item">
										<a href="#popupProject{{ $inmueble->id }}" data-portfolio-on-modal>
											<span class="thumb-info thumb-info-lighten">
												<span class="thumb-info-wrapper">
													<img src="{{ asset('files_img/'.$inmueble->id_portada) }}"  alt="" height="200px">
													<span class="thumb-info-title"> 
														<span class="thumb-info-inner">{{ $inmueble->tipo->nombre }}</span>
														@if($inmueble->modalidad)
															@if($inmueble->modalidad->venta)
																<small for="" class="label-danger">
																	Venta
																</small>
															@endif
															@if($inmueble->modalidad->alquiler_residencial)
																<small for="" class="label-danger">
																	@if($inmueble->modalidad->venta)
																		/
																	@endif
																	Alquiler
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
										@include('Homepage.propietaries.sections.detail_modal')
										<!-- Popup Project - End -->
									</div>
								@endforeach
							</div>
							<hr class="tall">
						</div>
					  @else
					  	<div class="col-xs-12">
					        <div class="alert alert-info">
					            Aun no ha agregado ningun inmueble. Ir a <a href="{{ route('inmuebles.crear-inmueble') }}" class="text-rs360p text-shadow-rs360p"><em><strong>Alta de Inmuebles</strong></em></a>
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
									<a href="{{ route('inmuebles.crear-inmueble') }}" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-plus"></i>&nbsp;Alta de Inmuebles</a>
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
									<a href="{{ route('propietarios-preferencias') }}" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-list-ol"></i>&nbsp;Editar Preferencias</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="feature-box feature-box-style-2 bottom-xs">
								<div class="feature-box-icon">
									<i class="fa fa-bars"></i>
								</div>
								<div class="feature-box-info">
									<h4 class="mb-xs">Inmuebles en Demanda</h4>
									<p>Contacto con usuarios que hayan buscado inmuebles que coinciden con tu oferta.</p>
									<a href="{{ route('contacto-propietario-demandante.index') }}" class="btn btn-rs360-light-blue btn-transparent"><i class="fa fa-eye"></i>&nbsp;Contactar Demandantes</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<hr>	