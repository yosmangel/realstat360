<div class="col-xs-12">
	<div class="row">
		<div id="msj_form_nuevo_inmueble" class="alert alert-success" role="alert" style="display:none">
			Se guardó el nuevo <strong>Inmueble.</strong>
		</div>
	</div>
	<div class="row">
		</div>
			<div id="w1-demandas-sec" class="tab-pane active">
				<section class="panel panel-featured panel-featured-primary">
					<header class="panel-heading">
						<h2 class="panel-title">Demandas coincidentes con</h2>
					</header>
					<div class="panel-body">
						<section class="panel panel-featured-left panel-featured-primary">
										<div class="panel-body">
										 @if(count($demandas) > 0)
											<table class="table table-bordered table-striped" id="datatable-ajax" data-url="{{ route('inmuebles.lista') }}">
												<thead>
													<tr>
														<th>Cliente</th>
														<th>Tipo</th>
														<th>Zona</th>
														<th>Precio</th>
														<th>Superficie</th>
														<th>Hab.</th>
														<th>Fecha Alta</th>
														<th>Inmuebles</th>
														<th>Operación</th> 
													</tr>
												</thead>
												<tbody>
												 @foreach($demandas as $demanda)
													<tr data-id="{{ $demanda->id }}">
														 <td>{{ $demanda->cliente->nombre }}</td>
														 <td>
														 	@if($demanda->inmueble != null)
														 		{{ $tipos[$demanda->inmueble->tipo_id-1]->nombre }}
														 		<br>
														 	@else
														 		{{ $tipos[$demanda->tipo_inmueble_id-1]->nombre }}
														 		<br>
														 	@endif
															Id: {{ $demanda->id }}
														 </td>
														 <td>{{ $zonas[$demanda->id] }}</td> <!-- $zonas[$demanda->id] -->
														 <td></td> <!-- $precios[$demanda->id] -->
														 <td><?php  ?></td> <!-- echo $superficies[$demanda->id] -->
														 <td>{{ $habitaciones[$demanda->id] }}</td> <!--  $habitaciones[$demanda->id]  -->
														 <td>{{ $demanda->created_at }}</td>
														 <td></td> <!-- $numinmuebles[$demanda->id] -->
														 <td class="text-center">
														  <a href=""><i class="el el-edit"></i></a>&nbsp;&nbsp;|&nbsp;
														  <a href="#!" class='delete-row'><i class='fa fa-trash-o'></i></a>
														 </td>
													</tr>
												 @endforeach 
												</tbody>
											</table>
										 @else
											<h4>No hay Demandas Coincidentes.</h4>
										 @endif
										</div>
						</section>
					</div>
				</section>
			</div>
	</div>
</div>