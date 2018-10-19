<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Imagenes del Inmueble </h2>
	</header>
	<div class="panel-body">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			@if(count($inmuima) > 0)
			 <div id="msj_portada" class="alert alert-success" role="alert" style="display:none">
				Se ha actualizado la imagen de portada del inmueble.
			</div>
			 <form class="form-horizontal" id="form-imagenes" action="" novalidate="novalidate">
					<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
					<input name="inmueble_id" id="inmueble_id" type="hidden" value="">
				<table class="table mb-none" id="tabla-ima">
					<thead>
						<tr>
							<th class="text-center"><strong>Portada</strong></th>
							<th class="text-center"><strong>Imagen</strong></th>
							<th class="text-center"><strong>Eliminar</strong></th>
						</tr>
					</thead>
					<tbody> 
							@foreach ($inmuima as $imagen)
								<tr data-id="{{ $imagen->id }}">
									<td class="actions text-center">
										<div class="radio">
										  <label>
										   @if($inmueble->id_portada == $imagen->nombre)
										    <input type="radio" class="radio-op" name="optionsRadios" id="optionsRadios{{ $imagen->id }}" value="{{ $imagen->id }}" value2="" checked="checked">
										   @else
										   	<input type="radio" class="radio-op" name="optionsRadios" id="optionsRadios{{ $imagen->id }}" value="{{ $imagen->id }}" value2="">
										   @endif
										  </label>
										</div>
									</td>
									<td>
										<div class="thumbnail">
											<img src="{{ asset('files_img/'.$imagen->nombre) }}" alt="" width="200">
										</div>
									</td>
									<td class="actions text-center">
										<a href="" class='delete-ima'><i class='fa fa-trash-o fa-2x'></i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
			 </form>
			@else
				<div class="alert alert-warning" role="alert">Aún no ha subido imágenes del Inmueble.</div>
			@endif
		</div>
	</div>
</section>
<form id="form-delete" action="{{ route('imagenes.destroy', ':INMUEBLE_ID') }}" method="delete">
	<input name="_method" type="hidden" value = "DELETE">
	{{ csrf_field() }}
</form>