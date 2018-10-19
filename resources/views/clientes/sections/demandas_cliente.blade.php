<div class="col-xs-12">
	<section class="panel panel-featured-left panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">
				Demandas de "nombre de cliente"
				<div class="text-right">
					<a href="{{ route('inmuebles.create') }}" class="btn btn-warning">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Alta Demanda
					</a>
				</div>
			</h2>
		</header>
		<div class="panel-body">
			<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
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
			<h4>No hay registros de inmuebles.</h4>
		</div>
	</section>
</div>