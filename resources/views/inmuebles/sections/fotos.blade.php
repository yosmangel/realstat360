<section class="panel">
	<header class="panel-heading">
		<h4>Documentos del Inmueble</h4>
		<br>
	</header>
	<div class="panel-body">
		<!-- INICIO ACORDIONES -->
		<div class="panel-group" id="accordion">
			<!-- IMAGENES DEL INMUEBLE -->
			<div id="acordion-imagenes" class="panel panel-accordion panel-accordion-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-imagenes">
							<i class="fa fa-star"></i> <strong>SUBIR</strong> Imagenes del Inmueble
						</a>
					</h4>
				</div>
				<div id="contenido-imagenes" class="accordion-body collapse in">
					<div class="panel-body">
						<div class="alert alert-info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							Sube un mínimo de <strong>10 fotos</strong>, es lo recomendable . Evita poner repetidas o similares. 
							Que sean de calidad: claras y nítidas, y mejor si son en horizontal
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h5>
									Para incluir archivos debes arrastrarlos al área de abajo, o hacer click dentro del área.
									Las imágenes se subirán automaticamente. Si desea eliminar alguna imágen, hágalo desde la tabla que aparece más abajo.
								</h5>
								<br><br>
								<form action="{{ route('imagenes.store') }}" class="dropzone" id="dropzone" method="post" files="true">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="inmueble_id" id="imainmueble_id" value="{{ $inmueble->id }}">
									<input type="hidden" name="form_type" value=0>
									<div class="dz-message">
										<h4>ARRASTRE LAS FOTOS DEL INMUEBLE AQUÍ.</h4>
										<span class="note">(Puede Arrastrar los Archivos o puede dar Click en esta área para que se abra la ventana de subida de archivos.)</span>
									</div>
									<div class="dropzone-previews"></div>
									<!--div class="text-center">
										<button type="button" id="vaciar-lista" class="btn btn-warning"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar Lista</button>
										<button type="submit" id="submit-all" class="btn btn-success"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir los Archivos</button>
									</div-->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- DOCUMENTOS DEL INMUEBLE -->
			<div id="acordion-documentos" class="panel panel-accordion panel-accordion-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-documentos">
							<i class="fa fa-cubes" aria-hidden="true"></i> <strong>SUBIR</strong> Documentos del Inmueble
						</a>
					</h4>
				</div>
				<div id="contenido-documentos" class="accordion-body collapse">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12">
								<h5>
									Para incluir archivos debes arrastrarlos al área de abajo, o hacer click dentro del área.
									Las imágenes se subirán automaticamente. Si desea eliminar alguna imágen, hágalo desde la tabla que aparece más abajo.
								</h5><br>
								<form action="{{ route('archivos.store') }}" class="dropzone" id="dropzone2" method="post" files="true">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="hidden" name="inmueble_id" id="docinmueble_id" value="{{ $inmueble->id }}">
									<input type="hidden" name="form_type" value=1>
									<div class="dz-message">
										<h4>ARRASTRE LOS DOCUMENTOS DEL INMUEBLE AQUÍ.</h4>
										<span class="note">Pueden ser archivos de Office (tipo: Word, Excel o Power Point), o imágenes, o Documentos PDF.</span>
									</div>
									<div class="dropzone-previews"></div>
									<!--div class="text-center">
										<button type="button" id="vaciar-lista2" class="btn btn-warning"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar Lista</button>
										<button type="submit" id="submit-all2" class="btn btn-success"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir los Archivos</button>
									</div-->
								</form>
							</div>
							<div class="col-xs-12">
								<h5>
									También puedes añadir un link, por ejemplo para visualizar videos o 
									tours virtuales que hayas subido previamente a una web de compartición.
									Copia aquí la URL donde se encuentra: 
								</h5>
								<form action="">
									<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
									<input type="hidden" id="form-url" name="form_url" value="form_url">
									<input name="inmueble_id" id="inmueble_id" type="hidden" value="">
									<div class="form-group">
										<label class="col-xs-12 col-md-2 control-label text-right" for="w1-">URL: http://</label>
										<div class="col-xs-12 col-md-5">
											<input type="text" class="form-control input-sm" id="input-link" name="link" id="w1-linkvideos" value="" required>
										</div>
										<div class="col-xs-12 col-md-2">
											<select data-plugin-selectTwo class="form-control populate">
												<option value="1">Video</option>
												<option value="2">Tour Virtual</option>
											</select>
										</div>
										<div class="col-md-3">
											<button type="button" data-id="form_url" class="btn btn-success btn-send-url">Guardar URL Video</button>
										</div>
									</div>
								</form><br>
								<div id="msj_form_url" class="alert alert-success" role="alert" style="display:none">
									Se guardó la URL del video
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- TABLA DE DOCUMENTOS  E IMAGENES DEL INMUEBLE -->
			<div id="acordion-tablas" class="panel panel-accordion panel-accordion-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#contenido-tablas">
							<i class="fa fa-cubes" aria-hidden="true"></i> Imágenes y Documentos del Inmueble
						</a>
					</h4>
				</div>
				<div id="contenido-tablas" class="accordion-body collapse">
					<div class="panel-body">
						<div class="row">
							<div class="col-xs-12 text-right">
								<input type="hidden" value="" name="inmuebleid" id="elinmueble">
							</div>
							<div class="col-xs-12">
								<div id="tabla-ima-content">
									@include('inmuebles.sections.tabla_ima')
								</div>
							</div>
							<div class="col-xs-12 text-right">
							</div>
							<div class="col-xs-12">
								<div id="tabla-file-content">
									@include('inmuebles.sections.tabla_file')
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>