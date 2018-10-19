<form class="form-horizontal" novalidate="novalidate">
	<div class="col-md-12">
		<section class="panel panel-featured panel-featured-primary">
			<header class="panel-heading">
				<h2 class="panel-title">
				Acciones de "nombre de cliente"
				<div class="text-right">
					<a href="{{ route('acciones.create') }}" class="btn btn-warning">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Nueva Acción
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
				<h4>No hay acciones configuradas.</h4>
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