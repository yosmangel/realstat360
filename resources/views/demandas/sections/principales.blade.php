<form class="form-horizontal" novalidate="novalidate" method="post" action="{{ route('demandas.store') }}">
	<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
	<div class="col-md-12"> 
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Datos básicos de la nueva Demanda</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-asunto">Cliente</label>
					<div class="col-sm-7">
						<select data-plugin-selectTwo class="form-control populate" id="w1-cliente-id" name="cliente_id" required>
							<option value="">::Seleccionar::</option>
							@foreach($clientes as $cliente)
								<option value="{{ $cliente->id}}">{{ $cliente->nombre }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-md-7 col-md-offset-4">
						<a class=" modal-with-zoom-anim mb-xs mt-xs mr-xs btn btn-warning" href="#modalForm"><i class="fa fa-thumb-tack" aria-hidden="true"></i> Alta Cliente</a>
					</div> 
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 control-label" for="interesado-inmueble">Importancia</label>
					<div class="col-xs-12 col-sm-4">
						<div class="radio-custom radio-info">
							<input type="radio" id="interesado-inmueble" name="tipo_demanda" checked value='inmueble'>
							<label for="persona">Interesado en un inmueble</label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="radio-custom radio-success">
							<input type="radio" name="tipo_demanda" value='describir_demanda'>
							<label>Describir Demanda</label>
						</div>
					</div>
				</div>
				<!-- SECCION INTERESADO INMUEBLE: Se muestra si se selecciona la opcion en el radio button anterior -->
				<div id="seccion-interesado-inmueble" class="collapse in">
					@include('demandas.sections.interesado_inmueble')
				</div>
				<!-- SECCION DESCRIBIR DEMANDA: Se muestra si se selecciona la opcion en el radio button anterior -->
				<div id="seccion-describir-demanda" class="collapse">
					@include('demandas.sections.describir_demanda') 
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-4">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-success" id="btn-nueva-demanda">  <!-- btn-db-inmueble -->
						<i class="fa fa-floppy-o" aria-hidden="true"></i> 
						Crear demanda
					</button>
				</div> 
			</div>
		</section> 
	</div>

</form>