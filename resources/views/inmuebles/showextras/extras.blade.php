<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="toggle" data-plugin-toggle>
			<!-- CALIDADES -->
			@if($inmueble->extra->calidades_ok == 1)
			<section class="toggle">
				<label>CALIDADES</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Calidad:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->calidades }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estado Aseos:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estado_aseos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estado Baños:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estado_banos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estado Cocina:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estado_cocina }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estado Edificio:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estado_edificio }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Tipo Edificio:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->tipo_edificio }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_calidades }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>CALIDADES</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> CALIDADES <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif
			<!-- SUPERFICIES Y DISTRIBUCION -->
			@if($inmueble->extra->supydist_ok == 1)
			<section class="toggle">
				<label>SUPERFICIES Y DISTRIBUCIÓN</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="50%"><strong>Altura:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->altura > 0) ? $inmueble->extra->altura.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Superficie Útil:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->sup_util > 0) ? $inmueble->extra->sup_util.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Superficie Cocina:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->sup_cocina > 0) ? $inmueble->extra->sup_cocina.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Superficie Edificada</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->sup_edificada > 0) ? $inmueble->extra->sup_edificada.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Superficie Salón:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->sup_salon > 0) ? $inmueble->extra->sup_salon.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Superficie Terrazas:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->sup_terrazas > 0) ? $inmueble->extra->sup_terrazas.'m<sup>2</sup>' : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Habitaciones Dobles:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->num_hab_dobles > 0) ? $inmueble->extra->num_hab_dobles : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Habitaciones Individuales:</strong></td>
									<td width="50%" class="text-left"><?php echo ($inmueble->extra->num_hab_individuales > 0) ? $inmueble->extra->num_hab_individuales : '-';  ?></td>
								</tr>
								<tr>
									<td width="50%"><strong>Observaciones:</strong></td>
									<td width="50%" class="text-left">{{ $inmueble->extra->obs_superficies }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>SUPERFICIES Y DISTRIBUCIÓN</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> SUPERFICIES Y DISTRIBUCIÓN <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif
			
			<!-- CARPINTERIA -->
			@if($inmueble->extra->carpinteria_ok == 1)
			<section class="toggle">
				<label>CARPINTERÍA</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Carpintería Exterior:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->carp_exterior }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Carpintería Interior:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->carp_interior }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Puerta Principal:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->puerta_principal }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Puertas Interiores:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->puertas_interiores }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Ventanas:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->ventanas }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Armarios:</strong></td>
									<td width="70%" class="text-left"><?php echo ($inmueble->extra->num_armarios > 0) ? $inmueble->extra->num_armarios : '-';  ?></td>
								</tr>
								<tr>
									<td width="30%"><strong>Persianas:</strong></td>
									<td width="70%" class="text-left"><?php echo ($inmueble->extra->persianas > 0) ? $inmueble->extra->persianas : '-';  ?></td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_carpinteria }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>CARPINTERÍA</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> CARPINTERÍA <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif

			<!-- ACABADOS -->
			@if($inmueble->extra->acabados_ok == 1)
			<section class="toggle">
				<label>ACABADOS</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Acabado Paredes:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->acabados_paredes }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Paredes Baños:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->paredes_banos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Paredes Cocina:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->paredes_cocina }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Suelos:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->suelos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Suelos Baños:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->suelos_banos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Suelos Cocina:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->suelos_cocina }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Techos:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->techo }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Tipos de Paredes:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->paredes }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Bañeras:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->banneras }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Grifería:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->griferia }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Plato de Ducha:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->plato_duchas }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Sanitarios:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->sanitarios }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_acabados }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>ACABADOS</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> ACABADOS <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif
		</div>
	</div>
	<div class="col-xs-12 col-md-6">
		<div class="toggle" data-plugin-toggle>
			
			<!-- INSTALACIONES Y SUMINISTROS -->
			@if($inmueble->extra->instysum_ok == 1)
			<section class="toggle">
				<label>INSTALACIONES Y SUMINISTROS</label>
				<div class="toggle-content">
					<div class="table-responsive">
					<table class="table table-striped mb-none">
						<tbody>
							<tr>
								<td width="30%"><strong>Agua:</strong></td>
								<td width="70%" class="text-left"><?php echo ($inmueble->extra->agua > 0) ? 'Si' : 'No'; ?></td>
							</tr>
							<tr>
								<td width="30%"><strong>Gas:</strong></td>
								<td width="70%" class="text-left"><?php echo ($inmueble->extra->gas > 0) ? 'Si' : 'No'; ?></td>
							</tr>
							<tr>
								<td width="30%"><strong>Teléfono:</strong></td>
								<td width="70%" class="text-left"><?php echo ($inmueble->extra->telefono > 0) ? 'Si' : 'No'; ?></td>
							</tr>
							<tr>
								<td width="30%"><strong>Tv y fm:</strong></td>
								<td width="70%" class="text-left"><?php echo ($inmueble->extra->tvyfm > 0) ? 'Si' : 'No'; ?></td>
							</tr>
							<tr>
								<td width="30%"><strong>Agua Caliente:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->agua_caliente }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Cocina:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->cocina }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Electricidad:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->electricidad }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Electrodomésticos:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->electrodomesticos }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Equipamientos:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->equipamientos }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Fontanería:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->fontaneria }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Iluminación:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->iluminacion }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Instalaciones:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->instalaciones }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Instalaciones Edificio:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->instalaciones_edificio }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Instalaciones Privadas:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->instalaciones_privadas }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Refrigeración:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->refrigeracion }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Interruptores:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->interruptores }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Mecanismos:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->mecanismos }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Sistema de seguridad/vigilancia:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->seguridad }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Tomas de Agua:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->tomasdeagua }}</td>
							</tr>
							<tr>
								<td width="30%"><strong>Observaciones:</strong></td>
								<td width="70%" class="text-left">{{ $inmueble->extra->obs_instalaciones }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>INSTALACIONES Y SUMINISTROS</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> INSTALACIONES Y SUMINISTROS <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif

			<!-- DATOS ECONOMICOS -->
			@if($inmueble->extra->dateco_ok == 1)
			<section class="toggle">
				<label>DATOS ECONÓMICOS</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Gastos de Comunidad:</strong></td>
									<td width="70%" class="text-left"><?php echo ($inmueble->extra->gastos_comunidad > 0) ? $inmueble->extra->gastos_comunidad : '-';  ?></td>
								</tr>
								<tr>
									<td width="30%"><strong>Calidad/Precio:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->calidad_precio }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Rentabilidad:</strong></td>
									<td width="70%" class="text-left"><?php echo ($inmueble->extra->rentabilidad > 0) ? 'Si' : 'No';  ?></td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_datoseconomicos }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>DATOS ECONÓMICOS</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> DATOS ECONÓMICOS <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif

			<!-- FINCA -->
			@if($inmueble->extra->finca_ok == 1)
			<section class="toggle">
				<label>FINCA</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Construcción:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->construccion }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estilo de Construcción:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estilo_construccion }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Estructura:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->estructura }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Portal y Escalera:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->portalyescalera }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Puerta Entrada:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->puerta_entrada }}</td>
								</tr>
								<tr>
									<td width="30%"><strong># de Fachadas:</strong></td>
									<td width="70%" class="text-left"><?php echo ($inmueble->extra->numfachadas > 0) ? $inmueble->extra->numfachadas > 0 : '-';  ?></td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_finca }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>FINCA</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> FINCA <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif

			<!-- SITUACION Y ENTORNO -->
			@if($inmueble->extra->siten_ok == 1)
			<section class="toggle">
				<label>SITUACIÓN Y ENTORNO</label>
				<div class="toggle-content">
					<div class="table-responsive">
						<table class="table table-striped mb-none">
							<tbody>
								<tr>
									<td width="30%"><strong>Calificación Urbana:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->calif_urbana }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Cercanía a:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->cercania_a }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Elementos comunitarios:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->elementos_comunitarios }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Entorno:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->entorno }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Equipamientos Zonas:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->equipamientos_zonas }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Grado Urbanización:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->grado_urbanizacion }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Sol:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->sol }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Transportes Públicos:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->transportes_publicos }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Vistas:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->vistas }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Distancia Población:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->distancia_poblacion }}</td>
								</tr>
								<tr>
									<td width="30%"><strong>Observaciones:</strong></td>
									<td width="70%" class="text-left">{{ $inmueble->extra->obs_situacion }}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</section>
			@else
			<section class="toggle">
				<label>SITUACIÓN Y ENTORNO</label>
				<div class="toggle-content">
					<div class="alert alert-warning">
						Pendiente: <strong>Datos Extras</strong> SITUACIÓN Y ENTORNO <a href="{{ route('inmuebles.edit',$inmueble->id) }}">(Editar)</a>.
					</div>
				</div>
			</section>
			@endif
		</div>
	</div>
</div>
