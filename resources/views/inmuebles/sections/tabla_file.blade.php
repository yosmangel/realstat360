<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Documentos del Inmueble </h2>
	</header>
	<div class="panel-body">
	  <div class="col-xs-12 col-md-8 col-md-offset-2">
		  @if(count($inmufile) > 0)
			<table class="table mb-none" id="tabla-file">
				<thead>
					<tr>
						<th class="text-center">Nombre del Documento</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($inmufile as $file)
						<tr data-id="{{ $file->id }}">
							<td>{{ $file->nombre }}</td>
							<td class="actions text-center">
								<a href="" class='delete-file'><i class='fa fa-trash-o fa-2x'></i></a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		  @else
		  	<div class="alert alert-warning" role="alert">Aún no ha subido documentos del Inmueble.</div>
		  @endif
	  </div>
	</div>
</section>
<form id="form-delete-file" action="{{ route('archivos.destroy', ':INMUEBLE_ID') }}" method="delete">
	<input name="_method" type="hidden" value = "DELETE">
	{{ csrf_field() }}
</form>