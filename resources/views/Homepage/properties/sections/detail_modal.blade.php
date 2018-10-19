<div id="popupProject{{ $property->id }}" class="popup-inline-content" data-appear-animation="fadeIn" data-appear-animation-delay="200">
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
						<h2 class="mb-none">{{ $property->name }}</h2>
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
		<div class="col-md-4">
			<span class="img-thumbnail">
				<img src="{{ asset('img/propiedades/'.$property->facade->name) }}" class="img-responsive" alt="">
			</span>
		</div>
		<div class="col-md-8">
			<div class="portfolio-info">
				<div class="row">
					<div class="col-md-12 center">
						<ul>
							<li>
								<a href="#" data-tooltip data-original-title="Like"><i class="fa fa-heart"></i>14</a>
							</li>
							<li>
								<i class="fa fa-calendar"></i> 01 January 2016
							</li>
							<li>
								<i class="fa fa-tags"></i> <a href="#">Brand</a>, <a href="#">Design</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<h5 class="mt-sm">Dirección</h5>
			<p>
				@if($property->address)
					{{ $property->address }},
				@endif
				@if($property->zone)
					{{ $property->zone }},
				@endif
				@if($property->city)
					<strong>{{ $property->city->name }}</strong>
				@endif
			</p>
			<p class="mt-xlg">{{ $property->description }}</p>
			<ul class="portfolio-details">
				<li>
					<h5 class="mt-sm mb-xs">Características
					<ul class="list list-inline list-icons">
						<li><i class="fa fa-check-circle"></i> 
							Habitaciones:
							<span class="accomodation-value custom-color-1">
					                                          {{ $property->rooms }}
					                                      </span>
						</li>
						<li><i class="fa fa-check-circle"></i> Camas</li>
						<li><i class="fa fa-check-circle"></i> Baños</li>
					</ul>
				</li>
			</ul>
			<ul class="portfolio-details">
				<li>
					<h5 class="mt-sm mb-xs">Detalles Interiores
					<ul class="list list-inline list-icons">
						@if($property->smoke_exit)
							<li><i class="fa fa-check-circle"></i> 
								Salida de Humos
							</li>
						@endif
						@if($property->air_conditioning)
							<li><i class="fa fa-check-circle"></i> 
								Aire Acondicionado
							</li>
						@endif
						@if($property->laundry)
							<li><i class="fa fa-check-circle"></i> 
								Lavandería
							</li>
						@endif
						@if($property->gymnasium)
							<li><i class="fa fa-check-circle"></i> 
								Gimnasio
							</li>
						@endif
						@if($property->fridge)
							<li><i class="fa fa-check-circle"></i> 
								Nevera
							</li>
						@endif
						@if($property->sauna)
							<li><i class="fa fa-check-circle"></i> 
								Sauna
							</li>
						@endif
						@if($property->pool)
							<li><i class="fa fa-check-circle"></i> 
								Piscina
							</li>
						@endif
						@if($property->microwave)
							<li><i class="fa fa-check-circle"></i> 
								Microondas
							</li>
						@endif
						@if($property->tv_cable)
							<li><i class="fa fa-check-circle"></i> 
								TV Cable
							</li>
						@endif
						@if($property->refigerator)
							<li><i class="fa fa-check-circle"></i> 
								Refrigerador
							</li>
						@endif
						@if($property->wifi)
							<li><i class="fa fa-check-circle"></i> 
								Wifi
							</li>
						@endif
						@if($property->internet)
							<li><i class="fa fa-check-circle"></i> 
								Internet
							</li>
						@endif
					</ul>
				</li>
				<li>
					<h5 class="mt-sm mb-xs">Operación</h5>
					<small class="">
							@if($property->operation->in_sale)
									Precio Venta:&nbsp;
								<small class="badge card-price">
									<i class="fa fa-eur"></i> {{ $property->operation->sale_price }}
								</small><br>
							@endif
							@if($property->operation->in_rent)
									Precio Alquiler:&nbsp;
								<small class="badge card-price">
									<i class="fa fa-eur"></i> {{ $property->operation->rent_price }}
								</small><br>
							@endif
							@if($property->operation->in_share)
									Precio a compartir:&nbsp;
								<small class="badge card-price">
									<i class="fa fa-eur"></i> {{ $property->operation->share_price }}
								</small>
							@endif
					</small>
				</li>
			</ul>
			<a href="{{ route('menu-prop',$property->id) }}" class="btn btn-primary btn-icon"><i class="fa fa-external-link"></i>Editar</a>
		</div>
	</div>
</div>