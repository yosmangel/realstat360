<div id="popupProject{{ $inmueble->id }}" class="popup-inline-content" data-appear-animation="fadeIn" data-appear-animation-delay="200">
	<div class="row">
		<div class="pull-right">
			<a href="#" data-portfolio-close><i class="fa fa-th"></i></a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="portfolio-title">
				<div class="row">
					<div class="col-md-10 center">
						<h2 class="mb-none">INMUEBLE REF-{{ $inmueble->id }}: {{ $inmueble->tipo->nombre }}
							@if($inmueble->modalidad)
								<small>(</small>
								@if($inmueble->modalidad->venta)
									<small>
										Venta
									</small>
								@endif
								@if($inmueble->modalidad->alquiler_residencial)
									<small>
										@if($inmueble->modalidad->venta)
											/
										@endif
										Alquiler
									</small>
								@endif
								<small>)</small>
							@endif
						</h2>
					</div>
					<div class="portfolio-nav col-md-1">
						<a href="#" data-portfolio-prev class="portfolio-nav-prev"><i class="fa fa-chevron-left"></i></a>
						<a href="#" data-portfolio-next class="portfolio-nav-next"><i class="fa fa-chevron-right"></i></a>
					</div>
				</div>
			</div>
			<hr class="tall">
		</div>
	</div>
	<div class="row mb-xl">
		<div class="col-md-6">
			<span class="img-thumbnail">
				<img src="{{ asset('files_img/'.$inmueble->id_portada) }}" class="img-responsive" alt="">
			</span>
		</div>
		<div class="col-md-6">
			<!--div class="portfolio-info">
				<div class="row">
					<div class="col-md-12 center">
						<ul>
							<li>
								<i class="fa fa-calendar"></i>  $inmueble->created_at 
							</li>
						</ul>
					</div>
				</div>
			</div-->
			<h5 class="top-xmin bottom-5px">Dirección</h5>
			<p class="top-xmin">
				Calle/Ave:
				@if($inmueble->calle)
					{{ $inmueble->calle }},
				@endif
				Código Postal:
				@if($inmueble->codigo_postal)
					{{ $inmueble->codigo_postal }},
				@endif
				@if($inmueble->ciudad)
					<strong>{{ $inmueble->ciudad->nombre }}</strong>
				@endif
			</p>
			<h5 class="top-min bottom-5px">Descripción del Inmueble</h5>
			<p class="top-xmin">{{ $inmueble->descripcion_corta }}</p>
			<h5 class="top-min bottom-5px">Características</h5>
			<ul class="list list-inline list-icons">
				<li><i class="fa fa-check-circle"></i> Habitaciones:
					<span class="accomodation-value custom-color-1">
						{{ $inmueble->habitaciones }}
					</span>
				</li>
				<li><i class="fa fa-check-circle"></i> Camas:
					<span class="accomodation-value custom-color-1">
						{{ $inmueble->camas }}
					</span>
				</li>
				<li><i class="fa fa-check-circle"></i> Baños:
					<span class="accomodation-value custom-color-1">
						{{ $inmueble->banos }}
					</span>	
				</li>
			</ul>
			<h5 class="top-min bottom-5px">Detalles Interiores</h5>
			<ul class="list list-inline list-icons">
				@if($inmueble->interiores->aire_acondicionado)
					<li><i class="fa fa-check-circle"></i> 
						Aire Acondicionado
					</li>
				@endif
				@if($inmueble->interiores->calefaccion_int)
					<li><i class="fa fa-check-circle"></i> 
						Calefacción
					</li>
				@endif
				@if($inmueble->interiores->amueblado)
					<li><i class="fa fa-check-circle"></i> 
						Amueblado
					</li>
				@endif
				@if($inmueble->interiores->cocina_equipada)
					<li><i class="fa fa-check-circle"></i> 
						Cocina Equipada
					</li>
				@endif
				@if($inmueble->interiores->horno)
					<li><i class="fa fa-check-circle"></i> 
						Horno
					</li>
				@endif
				@if($inmueble->interiores->microondas)
					<li><i class="fa fa-check-circle"></i> 
						Microondas
					</li>
				@endif
				@if($inmueble->interiores->nevera)
					<li><i class="fa fa-check-circle"></i> 
						Nevera
					</li>
				@endif
				@if($inmueble->interiores->internet)
					<li><i class="fa fa-check-circle"></i> 
						Internet
					</li>
				@endif
				@if($inmueble->interiores->wifi)
					<li><i class="fa fa-check-circle"></i> 
						Wifi
					</li>
				@endif
				@if($inmueble->interiores->lavadora)
					<li><i class="fa fa-check-circle"></i> 
						Lavadora
					</li>
				@endif
				@if($inmueble->interiores->mascotas)
					<li><i class="fa fa-check-circle"></i> 
						Mascotas
					</li>
				@endif
				@if($inmueble->interiores->television)
					<li><i class="fa fa-check-circle"></i> 
						Television
					</li>
				@endif
				@if($inmueble->interiores->piscina)
					<li><i class="fa fa-check-circle"></i> 
						Piscina
					</li>
				@endif
				@if($inmueble->interiores->salida_de_humos)
					<li><i class="fa fa-check-circle"></i> 
						Salida de Humos
					</li>
				@endif
			</ul>
			<h5 class="mt-sm mb-xs">Operación</h5>
			<small class="">
					@if($inmueble->modalidad->venta)
							Precio Venta:&nbsp;
						<small class="badge card-price">
							<i class="fa fa-eur"></i> {{ $inmueble->modalidad->ventaprecio }}
						</small><br>
					@endif
					@if($inmueble->modalidad->alquiler_residencial)
							Precio Alquiler:&nbsp;
						<small class="badge card-price">
							<i class="fa fa-eur"></i> {{ $inmueble->modalidad->alqresprecio }}
						</small><br>
					@endif
					@if($inmueble->modalidad->compartir)
							Precio a compartir:&nbsp;
						<small class="badge card-price">
							<i class="fa fa-eur"></i> {{ $inmueble->modalidad->compartirprecio }}
						</small>
					@endif
			</small>
		</div> 
	</div><hr>
	<div class="row">
		<div class="col-xs-12">
			<h5 class="top-xmin bottom-5px  text-center">Agenda del Inmueble</h5>
			<br>
			<div class="row">
				<div class="col-xs-12 col-md-8">
					@if(count($inmueble->agendas)>0)  
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									<i class="fa fa-calendar" aria-hidden="true"></i> Fecha
								</th>
								<th>
									<i class="fa fa-check-square-o" aria-hidden="true"></i> Evento
								</th>
								<th>
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Descripción
								</th>
								<th>
									<i class="fa fa-flash" aria-hidden="true"></i> Acción 
								</th>
							</tr>
						</thead>
						<tbody id="tbody">
							@foreach($inmueble->agendas as $agenda)
								<tr id="row-{{ $agenda->id }}">
									<td width="20%">
										{{ $agenda->date }}
									</td>
									<td width="20%">
										<strong>REF-{{ $inmueble->id }}</strong>: {{ $agenda->title }}
									</td>
									<td>
										{{ $agenda->description }}
									</td>
									<td>
										<form action="{{ url('propietario-agenda-eliminar/'.$agenda->id) }}" method="post">
											<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
											<input type="hidden" name="_method" id="method" value="POST">
											<a type="submit" class="btn btn-danger btn-sm btn-remove-event" data-valor="{{ $agenda->id }}" >
											<i class="fa fa-refresh fa-spin" id="i-spinner-{{ $agenda->id }}" style="display: none"></i> <i class="fa fa-times" id="i-shown-{{ $agenda->id }}"></i>&nbsp; <span id="txt-eliminar-{{ $agenda->id }}">Eliminar</span>
											</a>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					@else
						<div class="alert alert-info">
							Aun no ha agregado eventos o actividades para este inmueble.
						</div>
					@endif
				</div>
				<div class="col-xs-12 col-md-4">
					<div class="toggle toggle-primary" data-plugin-toggle>
						<section class="toggle">
							<label>Agregar un evento a la Agenda.</label>
							<div class="toggle-content">
								<br>
								<form id="formInmueble{{ $inmueble->id }}" method="post" action="{{ route('propietario-agenda-crear') }}" enctype="multipart/form-data">
									<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
									<input type="hidden" name="_method" id="method" value="POST">
									<input type="hidden" name="inmueble_id" id="id" value="{{ $inmueble->id }}">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="date">Fecha del evento</label>
											<input class="form-control" id="date" name="date" type="date">
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="title">Título de la nota</label>
											<input class="form-control" id="title" name="title" placeholder="" type="text" required>
										</div>
									</div>
									<div class="col-xs-12">
										<div class="form-group">
											<label for="description">Descripción</label>
											<textarea class="form-control" id="description" name="description" rows="4" placeholder="Redacte la nota sobre el inmueble." required></textarea>
											<br>
											<div class="text-right">
												<button type="submit" data-valor="{{ $inmueble->id }}" class="btn btn-primary btn-md btn-block btn-create-event">
													<i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-floppy-o i-shown" aria-hidden="true"></i>&nbsp;
													<span class="btn-txt">Guardar</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</section>
					</div>
				</div>
			</div>
    	</div>
	</div><hr>
	<div class="row">
		<div class="col-xs-12 text-center">
			<form action="{{ route('inmuebles-eliminar',$inmueble->id) }}" method="post">
				<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
				<input type="hidden" name="_method" id="method" value="POST">
				<a href="{{ route('inmuebles-editar',$inmueble->id) }}" class="btn btn-primary btn-icon"><i class="fa fa-external-link"></i>Editar</a>
				<button type="submit" class="btn btn-danger eliminar-inmueble" data-valor="{{ $inmueble->id }}">
					<i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-eraser i-shown"></i>&nbsp;<strong><span id="btn-txt">Eliminar Inmueble</span></strong>
				</button>
			</form>
		</div>
	</div>
</div>