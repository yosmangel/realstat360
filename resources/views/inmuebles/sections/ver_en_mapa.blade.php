@if(count($inmuebles)>0)
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Inmuebles </h2>
		</header>
		<div class="panel-body">
			<div class="col-xs-12 col-md-6">
					@foreach($inmuebles as $inmueble)
					 	<!-- propertyImage = inmueble->getPropertyFrontImage() -->
						<div class="panel panel-horizontal panel-card hvr-float-shadow">
							<div class="panel-heading">
							  <a href="{{ route('inmuebles.show',$inmueble->id) }}">
							  	<img src="{{ asset('files_img/'.$inmueble->id_portada) }}" class="img-responsive" alt="">
								<!--if(propertyImage != '')
									 if (file_exists('files_img/'.propertyImage)) { 
										<img  src=" asset('files_img/'.propertyImage) " alt="" width="120px">
									 } else { 
										<img  src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="120px">
									 } 
								else
									<img  src=" asset('images/miniatura_inmueble.png') " alt="" width="120px">
								endif -->
					 		  </a>
							</div>
							<div class="panel-body text-left ">
								<a href="{{ route('inmuebles.show',$inmueble->id) }}">
									<h5 class="text-left" style="margin-top: 2px; margin-bottom: 2px;">
										<strong>{{ $inmueble->tipo->nombre }} en {{ $inmueble->ciudad->nombre.', ' }} calle {{ $inmueble->calle.', '}} No {{ $inmueble->numero.', ' }} {{ $inmueble->pais->nombre }}</strong>
									</h5>
								</a>
								<i class="fa fa-bath" aria-hidden="true"></i> {{ $inmueble->habitaciones }} <br>
								<i class="fa fa-home" aria-hidden="true"></i> {{ $inmueble->banos }} m<sup>2</sup> <br>
							</div>
							<div class="panel-footer text-center" style="min-width:50px;">
								<input type="checkbox" class="form-control">
							</div>
						</div>
						<br>
					@endforeach
			</div>
			<div class="col-xs-12 col-md-6">
				<div id="map"></div>
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