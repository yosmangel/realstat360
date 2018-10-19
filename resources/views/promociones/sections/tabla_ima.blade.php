<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Imagenes de la Promoción </h2>
	</header>
	<div class="panel-body">
		<div class="col-xs-12 col-md-8 col-md-offset-2">
			@if(count($promoima) > 0 && $promoima != '')
				<table class="table mb-none" id="tabla-ima">
					<thead>
						<tr>
							<th class="text-center"><strong>Imagen</strong></th>
							<th class="text-center"><strong>Eliminar</strong></th>
						</tr>
					</thead>
					<tbody>
							@foreach ($promoima as $imagen)
								<tr data-id="{{ $imagen->id }}">
									<td>
										<a href="#" class="thumbnail">
											<img src="{{ asset('promo_files_img/'.$imagen->nombre) }}" alt="" width="200">
										</a>
									</td>
									<td class="actions text-center">
										<a href="" class='delete-ima'><i class='fa fa-trash-o fa-2x'></i></a>
									</td>
								</tr>
							@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-warning" role="alert">Aún no ha subido imágenes.</div>
			@endif
		</div>
	</div>
</section>
<form id="form-delete" action="{{ route('imagenes.destroy', ':INMUEBLE_ID') }}" method="delete">
	<input name="_method" type="hidden" value = "DELETE">
	{{ csrf_field() }}
</form>