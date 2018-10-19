<div id="accordion-internos">
	<div class="panel panel-accordion panel-accordion-first">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-internos" href="#collapsePrecios">
					<i class="fa fa-file-text-o"></i> Precios
				</a>
			</h4>
		</div>
		<div id="collapsePrecios" class="accordion-body collapse in">
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped mb-none">
						<tbody>
							<tr>
								<td width="20%"><strong>Alquiler mensual público:</strong></td>
								<td width="80%" class="text-left">
									@if(count($inmueble_interno) > 0)
										<i class="fa fa-{{ $tipoico }}"></i> 
										{{ $inmueble->interno->alqres_precio_pub }}
									@else
										-
									@endif
								</td>
							</tr>
							<tr>
							<tr>
								<td width="20%"><strong>Alquiler mensual propietario:</strong></td>
								<td width="80%" class="text-left">
									@if(count($inmueble_interno) > 0)
										<i class="fa fa-{{ $tipoico }}"></i> 
										{{ $inmueble->interno->alqres_precio_prop }}
									@else
										-
									@endif
								</td>
							</tr>
							<tr>
								<td width="20%"><strong>Honorarios:</strong></td>
								<td width="80%" class="text-left">
									@if(count($inmueble_interno) > 0)
										{{ $inmueble->interno->honorarios }}
									@else
										-
									@endif
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-accordion">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-internos" href="#collapseDir">
					<i class="fa fa-list-ul"></i> Dirección
				</a>
			</h4>
		</div>
		<div id="collapseDir" class="accordion-body collapse in">
			<div class="panel-body">
				<!-- DIRECCION -->
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<img src="{{ asset('images/mapa_ejemplo.jpg') }}" alt="" class="img-responsive">
					</div>
					<div class="col-xs-12 col-md-6">
						<div class="table-responsive">
							<table class="table table-striped mb-none">
								<tbody>
									<tr>
										<td width="20%"><strong>Tipo de Vía:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->via->nombre }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Calle:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->calle }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>N<sup>o</sup>:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->numero }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Escalera:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->escalera }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Piso:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->piso }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Puerta:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->puerta }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Distrito:</strong></td>
										<td width="80%" class="text-left"></td>
									</tr>
									<tr>
										<td width="20%"><strong>Ciudad:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->ciudad->nombre }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>Provincia:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->provincia_id }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>C.P.::</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->codigo_postal }}</td>
									</tr>
									<tr>
										<td width="20%"><strong>País:</strong></td>
										<td width="80%" class="text-left">{{ $inmueble->pais->nombre }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
