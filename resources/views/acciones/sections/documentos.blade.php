<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Subida de Documentos</h2>
	</header>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">
				<h5>
					Para incluir archivos debes pulsar <strong>“Seleccionar archivos”</strong>, 
					seleccionar uno o varios archivos y una vez elegidos, pulsar 
					“Subir archivos” para incluirlos. 
					<br><br>
					La múltiple selección de archivos 
					está disponible para estas versiones de navegador: Google Chrome, 
					Apple Safari iOS 5.0+, Mozilla Firefox 3.6+ y Microsoft Internet 
					Explorer 10.0+. Si tienes problemas para subir archivos dispones de 
					otra forma de hacerlo: 
					<br><br>Acceder a la versión lenta para subir archivos 
					uno a uno.
				</h5>
				<button class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-search" aria-hidden="true"></i> Seleccionar Archivos</button>
				<button class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Subir Archivos</button>
				<button class="mb-xs mt-xs mr-xs btn btn-warning"><i class="fa fa-trash" aria-hidden="true"></i> Vaciar Lista</button>
				<br><br>
				<!--form action="/upload" class="dropzone dz-square" id="dropzone-example"></form-->
				<!--form action="/file-upload" class="dropzone" id="my-awesome-dropzone"></form-->
				<form action="/extras" class="dropzone"></form>
				<div class="progress progress-striped light active m-md">
					<div class="progress-bar progress-bar-dark" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
						60%
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<h2 class="panel-title">Lista de Documentos (0)</h2>
	</header>
	<div class="panel-body">
		<div class="col-xs-12">
				<table class="table mb-none">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre del Documento</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>resumen.pdf</td>
								<td class="actions">
									<a href=""><i class="fa fa-pencil"></i></a>
									<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
							<tr>
								<td>2</td>
								<td>registro.doc</td>
								<td class="actions">
									<a href=""><i class="fa fa-pencil"></i></a>
									<a href="" class="delete-row"><i class="fa fa-trash-o"></i></a>
								</td>
							</tr>
						</tbody>
					</table>
			</div>
	</div>
</section>
<div class="col-xs-12">
	<div class="row text-center">
		<button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar Fotos y Planos</button>
	</div>
	<br><br>
</div>