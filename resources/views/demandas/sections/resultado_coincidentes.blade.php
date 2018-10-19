<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Lista de Inmuebles</h2>
	</header>
	<div class="panel-body">
		<div class="col-xs-12 col-md-6">
			<div class="alert alert-info" role="alert">
				@if(count($inmueble) == 1)
					1 {{ $inmueble->tipo->nombre }} coincidente con la demanda
					<br>
					<div class="panel panel-horizontal panel-card">
						<div class="panel-heading">
							@if( ($inmueble->id_portada != null) && ($inmueble->id_portada != '') )
								<img src="{{ asset('files_img/'.$inmueble->id_portada ) }}" class="img-responsive" alt="Project" width="110px">
							@else
							 	<?php  $ima = (count($inmueble->imagenes)>0) ? $inmueble->imagenes[0]->nombre : 'miniatura_inmueble.png'; ?>
								<img src="{{ asset('files_img/'.$ima ) }}" alt="" width="110px">
							@endif
						</div>
						<div class="panel-body text-left ">
							<h5 class="text-left" style="margin-top: 2px; margin-bottom: 2px;">
								<strong>
									{{ $inmueble->tipo->nombre }}, 
									Calle {{ $inmueble->calle }}, 
									# {{ $inmueble->numero }},
									{{ $inmueble->municipio->nombre }},
									{{ $inmueble->pais->nombre }}, 
									<strong></strong>
								</strong>
							</h5>
							 <h5 class="media-heading" >En <span class="label label-danger">{{ $operacion }}</span></h5> 
							<i class="fa fa-bath" aria-hidden="true"></i> {{ $inmueble->banos }} <br>
							<i class="fa fa-home" aria-hidden="true"></i> {{ $inmueble->habitaciones }} <br>
							<small class="pull-left text-muted">Sup. {{ $inmueble->superficie }} m²</small><br>
						</div>
					<br>
					</div>
					<br>
				@endif
			</div>
			
		</div>
		<div class="col-xs-12 col-md-6">
			<img src="{{ asset('images/mapa_ejemplo.jpg') }}" alt="" class="img-responsive">
		</div>
	</div>
</section>