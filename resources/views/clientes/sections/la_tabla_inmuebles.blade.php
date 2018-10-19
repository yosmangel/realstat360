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
							 primero {{ $inmueble[0] }} finprimero
							 primero {{ $inmueble['id'] }} finprimero
							 segundo {{ $inmueble->id }} finsegundo

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
							<td><i class="fa fa-eur" aria-hidden="true"></i> </td>
							<td>{{ $inmueble->habitaciones }}</td>
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
	@endif
</div>