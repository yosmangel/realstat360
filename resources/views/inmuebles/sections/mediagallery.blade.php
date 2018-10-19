	<div id="accordion">
		<div class="panel panel-accordion panel-accordion-first">
			<div id="collapse1One" class="accordion-body collapse in">
				<div class="panel-body">
						<section class="media-gallery">
							<div class="content-with-menu-container">
								<div class="inner-body mg-main" style="paddding-botom: 300px">
									<div class="inner-toolbar clearfix">
										<ul>
											<li>
												<a href="#" id="mgSelectAll"><i class="fa fa-check-square"></i> <span data-all-text="Select All" data-none-text="Select None">Seleccionar Todos</span></a>
											</li>
											<li>
												<a href="#"><i class="fa fa-trash-o"></i> Eliminar</a>
											</li>
											<li class="right" data-sort-source data-sort-id="media-gallery">
												<ul class="nav nav-pills nav-pills-primary">
													<li class="active">
														<a data-option-value=".inicio">Inicio</a>
													</li>
													<li>
														<a data-option-value=".document">Documentos</a>
													</li>
													<li >
														<a data-option-value=".image">Imagenes</a>
													</li>
													<li>
														<a data-option-value=".video">Videos</a>
													</li>
												</ul>
											</li>
										</ul>
									</div>
									<div class="row mg-files" data-sort-destination data-sort-id="media-gallery" style="paddding-botom: 300px">
										<!-- INICIO -->
										<div class="isotope-item inicio col-xs-12">
											<div class="alert alert-info">
												<h4>
												@if(count($inmueble->imagenes) > 0)
													({{ count($inmueble->imagenes) }}) <a data-option-value=".image" href="#image">Fotos</a> 
												@endif
												@if(count($documentos) > 0)
													({{ count($documentos) }}) <a data-option-value=".document" href="#document">Documentos</a> 
												@endif
												@if(count($documentos) == 0 && count($inmueble->imagenes) == 0) 
													No se han subido fotos ni documentos de este inmueble.
												@else
													del Inmueble.
												@endif
												</h4>
											</div>
										</div>

										<!-- DOCUMENTOS -->
										@if(count($documentos) > 0)
											@foreach($documentos as $documento)
												<div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
													<div class="thumbnail">
														<div class="thumb-preview">
															<a class="thumb-image" href="#">
																<img src="{{ asset('images/icons/'.$documento['imaico']) }}"  alt="icono documento" width="60">
															</a>
															<p><i class="fa {{ $documento['icono'] }}"></i>&nbsp;{{ $documento['nombre'] }}</p>
															<div class="mg-thumb-options">
																<div class="mg-toolbar">
																	<div class="mg-option checkbox-custom checkbox-inline">
																		<input type="checkbox" id="file_4" value="1">
																		<label for="file_4">SELECT</label>
																	</div>
																	<div class="mg-group pull-right">
																		<ul class="dropdown-menu mg-menu" role="menu">
																			<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@else
											<div class="isotope-item document">
												<div class="alert alert-warning">
													<h4>Aun no ha subido documentos de este inmueble.</h4>
												</div>
											</div>
										@endif
										<!-- IMAGENES -->
										@if(count($inmueble->imagenes) > 0)
											@foreach($inmueble->imagenes as $imagen)
												<div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
													<div class="thumbnail">
														<div class="thumb-preview">
															<a class="thumb-image" href="assets/images/projects/project-4.jpg">
																<img src="{{ asset('files_img/'.$imagen->nombre) }}" class="img-responsive" alt="Project">
															</a>
															<div class="mg-thumb-options">
																<div class="mg-toolbar">
																	<div class="mg-option checkbox-custom checkbox-inline">
																		<input type="checkbox" id="file_4" value="1">
																		<label for="file_4">SELECT</label>
																	</div>
																	<div class="mg-group pull-right">
																		<ul class="dropdown-menu mg-menu" role="menu">
																			<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
														
													</div>
												</div>
											@endforeach
										@else
											<div class="isotope-item image">
												<div class="alert alert-warning">
													<h4>Aun no ha subido imágenes de este inmueble.</h4>
												</div>
											</div>
										@endif
										<!-- VIDEOS -->
										@if(count($videos) > 0)
											@foreach($videos as $video)
												<div class="isotope-item video col-xs-12">
													<div class="thumbnail">
														<div class="thumb-preview">
														</div>
													</div>
												</div>
											@endforeach
										@else
											<div class="isotope-item video">
												<div class="alert alert-warning">
													<h4>Aun no ha subido enlaces de video de este inmueble.
													</h4>
												</div>
											</div>
										@endif
									</div>
								</div>
								<br><br><br><br><br><br><br><br><br><br>
							</div>
						</section>
				</div>
			</div>
		</div>
	</div>

	
	


