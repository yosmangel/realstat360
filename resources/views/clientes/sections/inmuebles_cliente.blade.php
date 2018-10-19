<div class="col-xs-12">
	<section class="panel panel-featured-left panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">
				<p id="nombre-cliente"></p>
				<div class="text-right">
					<button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#crear-inmueble" aria-expanded="false" aria-controls="crear-inmueble">
					  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Alta Inmueble
					</button>
					<button class="btn btn-success" id="btn-recarga" type="button" data-toggle="collapse" data-target="#tabla-inmuebles-cliente" aria-expanded="false" aria-controls="tabla-inmuebles-cliente">
					  <i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Recargar
					</button>
				</div>
			</h2>
		</header>
		<div class="panel-body">
			<div class="collapse" id="crear-inmueble">
			    @include('clientes.sections.form_crear_inmueble')
			</div>
			
			<!-- TABLA DE INMUEBLES DEL CLIENTE-->
			<div class="collapse" id="tabla-inmuebles-cliente">
				<div class="col-xs-12">
					@if(count($inmuebles_cliente)>0)
					  <div class="table-responsive">
						<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
							<thead>
								<tr>
									<th>Imagen</th>
									<th>Ref.</th>
									<th>Tipo</th>
									<th>Dirección</th>
									<th>Estado</th>
									<th>Sup.<small>(m<sup>2</sup>)</small></th>
									<th>Precio</th>
									<th>Hab.</th>
									<th>Baños</th>
									<th>Demandas</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								@foreach($inmuebles_cliente as $inmueble)
									<tr data-id="{{ $inmueble[0] }}" data-ref="{{ $inmueble[0] }}">
										<td>
											@if($inmueble[1] != '')
												<?php if (file_exists('files_img/'.$inmueble[1])) { ?>
													<img src="{{ asset('files_img/'.$inmueble[1]) }}" alt="" width="100px">
											<?php } else { ?>
													<img src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="100px">
											<?php } ?>
											@else
												<img src="{{ asset('images/miniatura_inmueble.png') }}" alt="" width="100px">
											@endif
										</td>
										<td>R-{{ $inmueble[0] }}</td>
										<td>{{ $inmueble[2] }}</td>
										<td>{{ $inmueble[6] }}</td>
										<td>{{ $inmueble[3] }}</td>
										<td>{{ $inmueble[4] }}</td>
										<td><i class="fa fa-eur" aria-hidden="true"></i> {{ $preciof }}</td>
										<td>{{ $inmueble[7] }}</td>
										<td>{{ $inmueble[8] }}</td>
										<td>-</td>
										<td class="text-center">
											<a href=""><i class="fa fa-camera" aria-hidden="true"></i></a>
											<a href="{{ route('inmuebles.edit', $inmueble[0]) }}"><i class="el el-edit"></i></a>
											<a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
										</td>
									</tr>
								@endforeach                  	
							</tbody>
						</table>
					  </div>
					@else
						<h1>Aun no hay inmuebles</h1>
					@endif
				</div>
			</div>
		</div>
	</section>
</div>