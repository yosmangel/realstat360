<!-- Modal Form -->
<div id="modalForm" class="zoom-anim-dialog modal-block modal-block-success mfp-hide">
	<section class="panel">
  	 <form id="demo-form" class="form-horizontal mb-lg" action="{{ route('clientes.altarapida') }}" novalidate="novalidate">
		<header class="panel-heading">
			<h2 class="panel-title">Alta rápida cliente</h2>
		</header>
		<div class="panel-body">
				<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
				<div class="form-group">
					<label class="col-sm-3 control-label">Tipo</label>
					<div class="col-xs-9">
						<div class="radio">
							<label>
								<input type="radio" class="tipo_cliente" name="tipo_cliente" id="radioBtn-persona" value="persona" checked="">
								Persona
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" class="tipo_cliente" name="tipo_cliente" id="radioBtn-organizacion" value="organizacion">
								Organización
							</label>
						</div>
					</div>
				</div>
				<div  class="form-group">
					<label class="col-sm-3 control-label">Tratamiento</label>
					<div class="col-sm-8">
						<select id="tratamiento" data-plugin-selectTwo class="form-control populate js-example-responsive" style="width: 100%;">
								<option value="Sr.">Sr.</option>
								<option value="Sra.">Sra.</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-8">
						<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre del Cliente" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Apellidos</label>
					<div class="col-sm-8">
						<input type="text" id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos del cliente" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-9">
						<input type="text" name="telefono" class="form-control" placeholder="# de teléfono" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Móvil</label>
					<div class="col-sm-9">
						<input type="text" name="movil" class="form-control" placeholder="# de celular" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo Electrónico</label>
					<div class="col-sm-9">
						<input type="email" name="email" class="form-control" placeholder="Correo Electrónico del cliente" required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-origen">Origen</label>
					<div class="col-sm-7">
						<select name="origen" id="w1-origen" data-plugin-selectTwo class="form-control populate" style="width: 100%">
							<option value="">::Seleccionar::</option>
							<option value="Acciones de Buzoneo">Acciones de Buzoneo</option>
							<option value="Anuncio neon">Anuncio neon</option>
							<option value="anuncit.com">anuncit.com</option>
							<option value="Buscador Web 2">Buscador Web 2</option>
							<option value="cartel 2">cartel 2</option>
							<option value="Cliente recomendado">Cliente recomendado</option>
							<option value="Colaborador">Colaborador</option>
							<option value="dividendo.es">dividendo.es</option>
							<option value="EL CORREO">EL CORREO</option>
							<option value="granmanzana.es">granmanzana.es</option>
							<option value="Idealista">Idealista</option>
							<option value="Inmoportalix">Inmoportalix</option>
							<option value="Jornada Puertas Abiertas">Jornada Puertas Abiertas</option>
							<option value="Llamada Telefonica">Llamada Telefonica</option>
							<option value="micasa.es">micasa.es</option>
							<option value="mitula.com">mitula.com</option>
							<option value="Oficina/Escaparate">Oficina/Escaparate</option>
							<option value="otro">otro</option>
							<option value="pisocasas.com">pisocasas.com</option>
							<option value="plandeprotecciondealquiler.com">plandeprotecciondealquiler.com</option>
							<option value="Redes Sociales">Redes Sociales</option>
							<option value="trovimap.com">trovimap.com</option>
							<option value="una web">una web</option>
							<option value="wordinmo.com">wordinmo.com</option>
						</select>
					</div>
				</div>
		</div>
		<footer class="panel-footer">
			<div class="row">
				<div class="col-md-12 text-right">
					<button class="btn btn-primary alta-rapida" type="submit">Guardar</button>
					<button class="btn btn-default modal-dismiss">Cancel</button>
				</div>
			</div>
		</footer>
	 </form>
	</section>
</div>