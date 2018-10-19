<form class="form-horizontal" novalidate="novalidate">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Datos Comerciales de "nombre de cliente"</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-agencia">Agencia</label>
					<div class="col-md-7">
						<select data-plugin-selectTwo class="form-control populate select2-ajax" name="agencia" id="w1-agencia" style="width: 100%">
							<option value="">::Seleccionar::</option>
							<option value="Casado">Agencia1</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="w1-agente">Agente</label>
					<div class="col-sm-7">
						<input type="text" class="form-control input-sm" name="agente" id="w1-agente">
					</div>
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">Aceptación de envío de notificaciones</h2>
			</header>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-7 col-md-offset-4">
						<div class="checkbox-custom checkbox-primary">
							<input type="hidden" value=0>
							<input type="checkbox" value=1 id="no-emails" name="no_emails">
							<label for="no-emails">No quiere recibir Emails</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-7 col-md-offset-4">
						<div class="checkbox-custom checkbox-warning">
							<input type="hidden" value=0>
							<input type="checkbox" value=1 id="no-sms" name="no_sms">
							<label for="no-sms">No quiere recibir SMS</label>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">
				Alertas
				<div class="text-right">
					<a href="#" class="btn btn-warning">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Añadir Alerta
					</a>
				</div>
			</h2>
			</header>
			<div class="panel-body">
				<table class="table table-bordered table-striped" id="datatable-ajax" data-url="">
					<thead>
						<tr>
							<th>Imagen</th>
							<th>Ref.</th>
							<th>Tipo</th>
							<th>Estado</th>
							<th>Sup.(m<sup>2</sup>)</th>
							<th>Modalidad</th>
							<th>Precio</th>
							<th>Dirección</th>
							<th>Hab.</th>
							<th>Baños</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<tr data-id="" data-ref="">
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td class="text-center">
								<a href=""><i class="el el-edit"></i></a>&nbsp;&nbsp;|&nbsp;
								<a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
							</td>
						</tr>
					</tbody>
				</table>
				<h4>No hay alertas configuradas.</h4>
			</div>
		</section>
	</div>
	<div class="col-xs-12">
		<div class="row text-center">
			<button type="button" class="mb-xs mt-xs mr-xs btn btn-success"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
		</div>
		<br><br>
	</div>
</form>