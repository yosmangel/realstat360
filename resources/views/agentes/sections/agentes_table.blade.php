<div class="table-responsive">
	<table class="table table-bordered table-striped" id="datatable-ajax" data-url="">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Contacto</th>
				<th>Departamento</th>
				<th>Clientes</th>
				<th>Inmuebles</th>
				<th>Demandas</th>
				<th>Acciones Pendientes</th>
			</tr>
		</thead>
		<tbody>
			@foreach($agentes as $agente)
				<tr data-id="{{ $agente->id }}" data-ref="{{ $agente->id }}">
					<td>{{ $agente->nombre }} {{ $agente->apellidos }}, {{ $agente->departamento }}</td>
					<td>{{ $contactos[$agente->id] }}
						@if($contactoemail[$agente->id] != '')
						, <a href="mailto: {{ $contactoemail[$agente->id]  }}">{{ $contactoemail[$agente->id] }} </a>
						@endif
					</td>
					<td>{{ $agente->departamento }}</td>
					<td></td>
					<td></td>
					<td></td>
					<td class="actions-hover actions-fade text-center">
						<a href="{{ route('agentes.edit', $agente->id) }}"><i class="el el-edit"></i>&nbsp;<small>Editar</small></a>
						<a href="#!" class='delete-row'><i class='fa fa-trash-o'></i>&nbsp;<small>Eliminar</small></a>
					</td>
				</tr>
			@endforeach 
		</tbody>
	</table>
</div>