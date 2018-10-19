<div class="panel-group" id="accordion2">
	<div class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2One">
					<i class="fa fa-star"></i> Datos Principales
				</a>
			</h4>
		</div> 
		<div id="collapse2One" class="accordion-body collapse in">
			<div class="panel-body">
				@include('promociones.sections.datos_principales')
			</div>
		</div>
		<div id="msj_form_principales" class="alert alert-success" role="alert" style="display:none">
			Se guardaron los detalles de la<strong>Promoción</strong>
		</div>
	</div>
	<div class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Two">
					<i class="fa fa-camera" aria-hidden="true"></i> Fotos / Planos
				</a>
			</h4>
		</div>
		<div id="collapse2Two" class="accordion-body collapse">
			<div class="panel-body">
				@include('promociones.sections.fotos')
			</div>
		</div>
	</div>
	<div class="panel panel-accordion panel-accordion-primary">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2Three">
					<i class="fa fa-file-text" aria-hidden="true"></i> Datos internos
				</a>
			</h4>
		</div>
		<div id="collapse2Three" class="accordion-body collapse"> 
			<div class="panel-body">
				@include('promociones.sections.datos_internos')
			</div>
		</div>
		<div id="msj_form_internos" class="alert alert-success" role="alert" style="display:none">
			Se guardaron los datos internos de la<strong>Promoción</strong>
		</div>
	</div>
</div>

