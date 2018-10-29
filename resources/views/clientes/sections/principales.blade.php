<div class="col-xs-12">
	<div class="row">
		<div id="msj_ok" class="alert alert-success" role="alert" style="display:none">
			Se ha dado de alta al Cliente de forma exitosa.
		</div>
	</div>
	<div class="row">
		<div id="response" class="alert alert-success" role="alert" style="display:none">
		</div>
		<form class="form-horizontal" novalidate="novalidate" action="{{ url($url) }}" action2="{{ route('clientes.index') }}"method="post" id="frmCliente" name="frmCliente" cliente="{{$cliente->id}}" action3="{{route('clientes.findEmail')}}" action4="{{route('clientes.findTel')}}">
			<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
			{{ method_field($method) }}
			<div class="col-md-12">
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos Generales</h2> 
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-xs-12 col-sm-4 control-label" for="persona"></label>
									<div class="hidden-xs hidden-sm col-md-1"></div>
									@if($cliente->persorgz == 1 || $cliente->persorgz == null)
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-primary">
												<input type="radio" id="persorgz1" name="persona_organizacion" value="1" checked="checked">
												<label for="persona">Persona</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-warning">
													<input type="radio" id="persorgz2" name="persona_organizacion" value="2">
													<label>Organización</label>
											</div>
										</div>
									@else
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-primary">
												<input type="radio" id="persorgz1" name="persona_organizacion" value="1">
												<label for="persona">Persona</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-warning">
												<input type="radio" id="persorgz2" name="persona_organizacion" value="2" checked="checked">
												<label>Organización</label>
											</div>
										</div>
									@endif
								</div>
								<div class="form-group">
									@if($cliente->calificativo == 1 || $cliente->calificativo == null)
										<label class="col-xs-12 col-sm-4 control-label" for="calificativo"></label>
										<div class="hidden-xs hidden-sm col-md-1"></div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-info">
												<input type="radio" id="calificativo1" name="calificativo" value="1" checked="checked">
												<label for="calificativo">Señor (Sr.)</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-danger">
												<input type="radio" id="calificativo2" name="calificativo" value="2">
												<label for="radioSra">Señora (Sra.)</label>
											</div>
										</div>
									@else
										<label class="col-xs-12 col-sm-4 control-label" for="calificativo"></label>
										<div class="hidden-xs hidden-sm col-md-1"></div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-info">
												<input type="radio" id="calificativo1" name="calificativo" value="1">
												<label for="calificativo">Señor (Sr.)</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-danger">
												<input type="radio" id="calificativo2" name="calificativo" value="2" checked="checked">
												<label for="radioSra">Señora (Sra.)</label>
											</div>
										</div>
									@endif
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-email"><i id="removeEmail" class="el el-remove" style="visibility: hidden"></i><i id="okEmail" class="el el-ok" style="visibility: hidden"></i> Correo Electrónico</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="email" id="w1-email" value="{{ $cliente->email }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-telefono">
										<i id="removeTel" class="el el-remove" style="visibility: hidden"></i><i id="okTel" class="el el-ok" style="visibility: hidden"></i> Teléfono <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="telefono" id="w1-telefono" value="{{ $cliente->telefono }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-nombre">Nombre</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="nombre" id="w1-nombre"  value="{{ $cliente->nombre }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-apellidos">Apellidos</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="apellidos" id="w1-apellidos"  value="{{ $cliente->apellidos }}">
									</div>
								</div>
								<!--<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-alias">Alias</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="alias" id="w1-alias" value="{{ $cliente->alias }}">
									</div>
								</div>-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-fecha-nacimiento">Fecha Nacimiento</label>
									<div class="col-md-7">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input id="w1-fecha-nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ $cliente->fecha_nacimiento }}">
										</div>
									</div>
								</div>
								<!--<div class="form-group">
									<label class="col-md-4 control-label" for="w1-estado-civil">Estado Civil</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate select2-ajax" name="estado_civil" id="w1-estado-civil" style="width: 100%">
											<option value="{{ $cliente->estado_civil }}" selected>{{ $cliente->estado_civil }}</option>
											<option value="">::Seleccionar::</option>
											<option value="Casado">Casado</option>
											<option value="Soltero">Soltero</option>
											<option value="Viudo">Viudo</option>
											<option value="Divorciado">Divorciado</option>
											<option value="Separado Judicialmente">Separado Judicialmente</option>
											<option value="Union de Hechos">Union de Hechos</option>
											<option value="Otro">Otro</option>
										</select>
									</div>
								</div>-->
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-tipo" >Tipo de documento</label>
									<div class="col-md-3">
										<select name="tipo_doc" id="w1-tipo" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											<option value="" {{ $cliente->tipo_doc == '' || $cliente->tipo_doc==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="CIF" {{ $cliente->tipo_doc == 'CIF' ? 'selected' : '' }}>CIF</option>
											<option value="NIF" {{ $cliente->tipo_doc == 'NIF' ? 'selected' : '' }}>NIF</option>
											<option value="Pasaporte" {{ $cliente->tipo_doc == 'Pasaporte' ? 'selected' : '' }}>Pasaporte</option>
											<option value="NIE" {{ $cliente->tipo_doc == 'NIE' ? 'selected' : '' }}>NIE</option>
											<option value="DNI" {{ $cliente->tipo_doc == 'DNI' ? 'selected' : '' }}>DNI</option>
											<option value="Otros" {{ $cliente->tipo_doc == 'Otros' ? 'selected' : '' }}>Otros</option>
										</select>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control input-sm" name="tipo_doc_num" id="w1-tipo-number"  value="{{ $cliente->tipo_doc_num }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for="w1-idioma">Idioma</label>
									<div class="col-md-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id">
											@if($cliente->idioma_id == null)
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($idiomas as $idioma)
												<option value="{{ $idioma->id }}" {{ $cliente->idioma_id == $idioma->id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-tipo-cliente">Tipo Clientes</label>
									<div class="col-sm-7">
										<select name="tipo_cliente" id="w1-tipo-cliente" data-plugin-selectTwo class="form-control populate" style="width: 100%" >
											<option value="" {{ $cliente->tipo_cliente == '' || $cliente->tipo_cliente ==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Inversor" {{ $cliente->tipo_cliente == 'Inversor' ? 'selected' : '' }}>Inversor</option>
											<option value="Cliente final" {{ $cliente->tipo_cliente == 'Cliente final' ? 'selected' : '' }}>Cliente final</option>

											<!--<option value="Accionista">Accionista</option>
											<option value="Agencia Colaboradora">Agencia Colaboradora</option>
											<option value="Arrendador">Arrendador</option>
											<option value="Asociado">Asociado</option>
											<option value="Colaborador">Colaborador</option>
											<option value="Competencia">Competencia</option>
											<option value="Comprador">Comprador</option>
											<option value="Constructor">Constructor</option>
											<option value="Copropietario">Copropietario</option>
											<option value="Inquilino">Inquilino</option>
											<option value="Inversor">Inversor</option>
											<option value="Operador">Operador</option>
											<option value="Permutante">Permutante</option>
											<option value="Potencial Arrendador">Potencial Arrendador</option>
											<option value="Potencial Inquilino">Potencial Inquilino</option>
											<option value="Potencial Comprador">Potencial Comprador</option>
											<option value="Potencial Vendedor">Potencial Vendedor</option>
											<option value="Prensa Especializada">Prensa Especializada</option>
											<option value="Promotor">Promotor</option>
											<option value="Traspasante">Traspasante</option>
											<option value="Vendedor">Vendedor</option>
											<option value="Banco">Banco</option>-->
										</select>
									</div>
									<div class="col-md-1">
										<div class="demo-icon-hover" data-toggle="tooltip" data-placement="bottom" title="Indica el tipo de clientes para poder realizar búsquedas específicas agrupando los clientes.">
											<i class="el el-info-circle"></i>
										</div>
									</div>
								</div>
								<!--<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-origen">Origen</label>
									<div class="col-sm-7">
										<select name="origen" id="w1-origen" data-plugin-selectTwo class="form-control populate" style="width: 100%">
											@if($cliente->origen != null)
												<option value="{{ $cliente->origen }}">{{ $cliente->origen }}</option>
											@else
												<option value="">::Seleccionar::</option>
											@endif
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
								</div>-->
								<!--<div class="form-group">
									<label class="col-md-4 control-label" for="w1-fecha-alta">Fecha Alta</label>
									<div class="col-md-7">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-calendar"></i>
											</span>
											<input id="w1-fecha-alta" type="date" class="form-control" name="fecha_alta" value="{{ $cliente->fecha_alta }}">
										</div>
									</div>
								</div>-->
								<!--<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-estado">Estado</label>
									<div class="col-sm-7">
										<select name="estado" id="w1-estado" data-plugin-selectTwo class="form-control populate" style="width: 100%" >
											@if($cliente->estado != null)
												<option value="{{ $cliente->estado }}">{{ $cliente->estado }}</option>
											@else
												<option value="">::Seleccionar::</option>
											@endif
											<option value="Inactivo">Inactivo</option>
											<option value="Activo">Activo</option>
											<option value="Potencial">Potencial</option>
											<option value="Activo A">Activo A</option>
											<option value="Activo B">Activo B</option>
											<option value="Activo C">Activo C</option>
											<option value="Activo D">Activo D</option>
										</select>
									</div>
								</div>-->
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-visitas">Visitas</label>
									<div class="col-md-8">
										<textarea class="form-control" rows="3" name="visitas" id="w1-visitas">{{ $cliente->visitas }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-presupuesto">Presupuesto</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="presupuesto" id="w1-presupuesto"  value="{{ $cliente->presupuesto }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" id="w1-mcontacto">Estado</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-mcontacto" name="estado">
											<option value="Compro" {{ $cliente->estado == 'Compro' ? 'selected' : '' }}>Compro</option>
											<option value="No compro" {{ $cliente->estado == 'No compro' ? 'selected' : '' }}>No compro</option>
										</select>
									</div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos de Contacto</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-4 control-label" id="w1-mcontacto">Medio de contacto</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-mcontacto" name="medio_contacto">
											<option value="" {{ $cliente->medio_contacto == '' || $cliente->medio_contacto ==null ? 'selected' : '' }}>::Seleccionar::</option>
											<option value="Papeles" {{ $cliente->medio_contacto == 'Papeles' ? 'selected' : '' }}>Papeles</option>
											<option value="Idealista" {{ $cliente->medio_contacto == 'Idealista' ? 'selected' : '' }}>Idealista</option>
											<option value="Fotocasa" {{ $cliente->medio_contacto == 'Fotocasa' ? 'selected' : '' }}>Fotocasa</option>
											<option value="Cartel" {{ $cliente->medio_contacto == 'Cartel' ? 'selected' : '' }}>Cartel</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-xs-12 col-md-4 control-label" for="w1-movil">
									Móvil 
										<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
									</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="movil" id="w1-movil" value="{{ $cliente->movil }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-web">Web</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="web" id="w1-web" value="{{ $cliente->web }}">
									</div>
								</div>
							</div>
						</section>
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Datos Dirección</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-sm-4 control-label" id="w1-pais">País</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" id="w1-pais" name="pais_id">
											@if($cliente->pais_id == null || $cliente->pais_id=="")
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($paises as $pais)
												<option value="{{ $pais->id }}" {{ $cliente->pais_id == $pais->id ? 'selected' : '' }}>{{ $pais->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="codigo_postal" id="w1-codigo-postal" value="{{ $cliente->codigo_postal }}">
										<p>
											¿Dudas de tu código postal? <a href="www.correos.es">www.correos.es</a> 
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Municicpio</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="municipio_id">
											@if($cliente->municipio_id == null)
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($municipios as $municipio)
												<option value="{{ $municipio->id }}" {{ $cliente->municipio_id == $municipio->id ? 'selected' : '' }}>{{ $municipio->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-tipovia">Tipo de Vía</label>
									<div class="col-sm-7">
										<select data-plugin-selectTwo class="form-control populate" name="via_id" id="w1-tipovia">
											@if($cliente->via_id == null)
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($vias as $via)
												<option value="{{ $via->id }}" {{ $cliente->via_id == $via->id ? 'selected' : '' }}>{{ $via->nombre }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-calle">Calle</label>
									<div class="col-sm-7">
										<input type="text" class="form-control input-sm" name="calle" id="w1-calle" value="{{ $cliente->calle }}">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 col-md-4 control-label" for="w1-numero">No.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="numero" id="w1-numero" value="{{ $cliente->numero }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-piso">Piso.</label>
									<div class="col-sm-7 col-md-3">
										<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso">
											@if($cliente->piso == null)
												<option value="" selected>::Seleccionar::</option>
											@endif
											@foreach($pisos as $piso)
												<option value="{{ $piso }}" {{ $cliente->piso == $piso ? 'selected' : '' }}>{{ $piso }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label" for="w1-escalera">Esc.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera"  value="{{ $cliente->escalera }}">
									</div>
									<label class="col-sm-4 col-md-1 control-label" for="w1-puerta">Pta.</label>
									<div class="col-sm-7 col-md-3">
										<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" value="{{ $cliente->puerta }}">
									</div>
								</div>
								<!--<div class="form-group">
									<div class="col-md-7 col-md-offset-4">
										<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="el el-map-marker-alt"></i> Comprobar dirección en el mapa</button>
									</div> 
								</div>-->
							</div>
						</section>
						<!--<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Otras Personas de Contacto</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<a class="btn btn-warning" role="button" data-toggle="collapse" href="#nuevoContacto" aria-expanded="false" aria-controls="collapseNuevoContacto">
											<i class="fa fa-plus" aria-hidden="true"></i> Añadir Datos de otro Contacto
										</a>
									</div>
								</div>
								<div class="collapse" id="nuevoContacto">
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-tiporelacion">Tipo</label>
										<div class="col-sm-7">
											<select name="tiporelacion" id="w1-tiporelacion" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="">::Seleccionar::</option>
												<option value="Hija/Hijo">Hija/Hijo</option>
												<option value="Madre/Padre">Madre/Padre</option>
												<option value="Esposa/Esposo">Esposa/Esposo</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<div class="hidden-xs hidden-sm col-md-1"></div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-primary">
												<input type="radio" id="calificativo_otrocont" name="calificativo_otrocont">
												<label for="calificativo_otrocont">Señor (Sr.)</label>
											</div>
										</div>
										<div class="col-xs-12 col-sm-4 col-md-3">
											<div class="radio-custom radio-warning">
												<input type="radio" id="calificativo_otrocont2" name="calificativo_otrocont">
												<label>Señora (Sra.)</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-nombre_otrocont">Nombre (*)</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="nombre_otrocont" id="w1-nombre_otrocont" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-ape_otrocont">Apellidos</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="ape_otrocont" id="w1-ape_otrocont" >
										</div>
									</div>	
									<div class="form-group">
										<label class="col-xs-12 col-md-4 control-label" for="w1-tel-otrocont">
										Teléfono 
											<i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
										</label>
										<div class="col-xs-6 col-md-3">
											<input type="text" class="form-control input-sm" name="tel_otrocont" id="w1-tel-otrocont" >
										</div>
										<div class="col-xs-6 col-md-2">
											<select name="tel_otrocont_de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="" selected>::Seleccionar::</option>
												<option value="Casa">Casa</option>
												<option value="Otro">Otro</option>
												<option value="Personal">Personal</option>
												<option value="Principal">Principal</option>
												<option value="Trabajo">Trabajo</option>
											</select>
										</div>
										<div class="col-md-2">Añadir
											<a role="button" data-toggle="collapse" href="#telefonootro2" aria-expanded="false" aria-controls="collapseOtroContactoTelefono">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</a>
										</div>
									</div>
									<div class="form-group">
										<div class="collapse" id="telefonootro2">
											<label class="col-md-4 control-label" for="w1-tel-otrocont2">
												Teléfono <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
											</label>
											<div class="col-md-3">
												<input type="text" class="form-control input-sm" name="tel_otrocont2" id="w1-tel-otrocont2" >
											</div>
											<div class="col-md-2">
												<select name="tel_otrocont_de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
													<option value="" selected>::Seleccionar::</option>
													<option value="Casa">Casa</option>
													<option value="Otro">Otro</option>
													<option value="Personal">Personal</option>
													<option value="Principal">Principal</option>
													<option value="Trabajo">Trabajo</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-mov-otrocont">
											Móvil <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
										</label>
										<div class="col-md-3">
											<input type="text" class="form-control input-sm" name="mov_otrocont" id="w1-mov-otrocont" >
										</div>
										<div class="col-md-2">
											<select name="mov_otrocont_de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="" selected>::Seleccionar::</option>
												<option value="Casa">Casa</option>
												<option value="Otro">Otro</option>
												<option value="Personal">Personal</option>
												<option value="Principal">Principal</option>
												<option value="Trabajo">Trabajo</option>
											</select>
										</div>
										<div class="col-md-2">Añadir
											<a role="button" data-toggle="collapse" href="#movilotro2" aria-expanded="false" aria-controls="collapsemovilotro2">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</a>
										</div>
									</div>
									<div class="form-group">
										<div class="collapse" id="movilotro2">
											<label class="col-md-4 control-label" for="w1-mov-otrocont2">
												Móvil <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
											</label>
											<div class="col-md-3">
												<input type="text" class="form-control input-sm" name="mov_otrocont2" id="w1-mov-otrocont2" >
											</div>
											<div class="col-md-2">
												<select name="mov_otrocont_de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
													<option value="" selected>::Seleccionar::</option>
													<option value="Casa">Casa</option>
													<option value="Otro">Otro</option>
													<option value="Personal">Personal</option>
													<option value="Principal">Principal</option>
													<option value="Trabajo">Trabajo</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-fax-otrocont">
											Fax <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
										</label>
										<div class="col-md-3">
											<input type="text" class="form-control input-sm" name="fax_otrocont" id="w1-fax-otrocont" >
										</div>
										<div class="col-md-2">
											<select name="fax_otrocont_de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="" selected>::Seleccionar::</option>
												<option value="Casa">Casa</option>
												<option value="Otro">Otro</option>
												<option value="Personal">Personal</option>
												<option value="Principal">Principal</option>
												<option value="Trabajo">Trabajo</option>
											</select>
										</div>
										<div class="col-md-2">Añadir
											<a role="button" data-toggle="collapse" href="#faxotro2" aria-expanded="false" aria-controls="collapsemfaxotro2">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</a>
										</div>
									</div>
									<div class="form-group">
										<div class="collapse" id="faxotro2">
											<label class="col-md-4 control-label" for="w1-fax-otrocont2">
												Fax <i class="el el-info-circle"  data-toggle="tooltip" data-placement="bottom" title="Introduce los números sin espacios ni otros signos."></i>
											</label>
											<div class="col-md-3">
												<input type="text" class="form-control input-sm" name="fax_otrocont2" id="w1-fax-otrocont2" >
											</div>
											<div class="col-md-2">
												<select name="fax_otrocont_de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
													<option value="" selected>::Seleccionar::</option>
													<option value="Casa">Casa</option>
													<option value="Otro">Otro</option>
													<option value="Personal">Personal</option>
													<option value="Principal">Principal</option>
													<option value="Trabajo">Trabajo</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-email-otrocont">Correo Electrónico</label>
										<div class="col-md-3">
											<input type="email" class="form-control input-sm" name="email_otrocont" id="w1-email-otrocont" >
										</div>
										<div class="col-md-2">
											<select name="email_otrocont_de" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="" selected>::Seleccionar::</option>
												<option value="Casa">Casa</option>
												<option value="Otro">Otro</option>
												<option value="Personal">Personal</option>
												<option value="Principal">Principal</option>
												<option value="Trabajo">Trabajo</option>
											</select>
										</div>
										<div class="col-md-2">Añadir
											<a role="button" data-toggle="collapse" href="#emailotro2" aria-expanded="false" aria-controls="collapseemailotro2">
												<i class="fa fa-plus-circle" aria-hidden="true"></i>
											</a>
										</div>
									</div>
									<div class="form-group">
										<div class="collapse" id="emailotro2">
											<label class="col-md-4 control-label" for="w1-email-otrocont2">Correo Electrónico</label>
											<div class="col-md-3">
												<input type="email" class="form-control input-sm" name="email_otrocont2" id="w1-email-otrocont2" >
											</div>
											<div class="col-md-2">
												<select name="email_otrocont_de2" data-plugin-selectTwo class="form-control populate" style="width: 100%">
													<option value="" selected>::Seleccionar::</option>
													<option value="Casa">Casa</option>
													<option value="Otro">Otro</option>
													<option value="Personal">Personal</option>
													<option value="Principal">Principal</option>
													<option value="Trabajo">Trabajo</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-fecha-nac-otrocon">Fecha Nacimiento</label>
										<div class="col-md-7">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</span>
												<input id="w1-fecha-nac-otrocon" type="date" class="form-control" name="fecha_nac_otrocon">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-estado-civil-otro">Estado Civil</label>
										<div class="col-md-7">
											<select data-plugin-selectTwo class="form-control populate select2-ajax" name="estado_civil_otrocon" id="w1-estado-civil-otro" style="width: 100%">
												<option value="">::Seleccionar::</option>
												<option value="Casado">Casado</option>
												<option value="Soltero">Soltero</option>
												<option value="Viudo">Viudo</option>
												<option value="Divorciado">Divorciado</option>
												<option value="Separado Judicialmente">Separado Judicialmente</option>
												<option value="Union de Hechos">Union de Hechos</option>
												<option value="Otro">Otro</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-tipo-otro">Tipo</label>
										<div class="col-md-3">
											<select name="tipo_doc_otrocon" id="w1-tipo-otro" data-plugin-selectTwo class="form-control populate" style="width: 100%">
												<option value="">::Seleccionar::</option>
												<option value="CIF">CIF</option>
												<option value="NIF">NIF</option>
												<option value="Pasaporte">Pasaporte</option>
												<option value="NIE">NIE</option>
												<option value="DNI">DNI</option>
												<option value="Otros">Otros</option>
											</select>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control input-sm" name="tipo_doc_num_otrocon">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label" for="w1-idioma-otro">Idioma</label>
										<div class="col-md-7">
											<select data-plugin-selectTwo class="form-control populate" id="w1-idioma-otro" name="idioma_otrocon" style="width: 100%">
												<option value="">::Seleccionar::</option>
												@foreach($idiomas as $idioma)
													<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" id="w1-pais-otro">País</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" id="w1-pais-otro" name="pais_otrocont" style="width: 100%">
												<option value="">::Seleccionar::</option>
												@foreach($paises as $pais)
													<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-codigo-postal-otro">C.P.</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="codigo_postalotrocont" id="w1-codigo-postal-otro" >
											<p>
												¿Dudas de tu código postal? <a href="www.correos.es" target="_blank">www.correos.es</a> 
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="num-otro-cont">Municicpio</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" id="num-otro-cont" name="municipio_idotrocont" style="width: 100%">
												<option value="">::Seleccionar::</option>
												@foreach($municipios as $municipio)
													<option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-tipovia-otro">Tipo de Vía</label>
										<div class="col-sm-7">
											<select data-plugin-selectTwo class="form-control populate" name="via_idotrocont" id="w1-tipovia-otro" style="width: 100%">
												<option value="">::Seleccionar::</option>
												@foreach($vias as $via)
													<option value="{{ $via->id }}">{{ $via->nombre }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-calle-otro">Calle</label>
										<div class="col-sm-7">
											<input type="text" class="form-control input-sm" name="calle_otrocont" id="w1-calle-otro" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 col-md-4 control-label" for="w1-numero-otro">No.</label>
										<div class="col-sm-7 col-md-3">
											<input type="text" class="form-control input-sm" name="numero_otrocont" id="w1-numero-otro" >
										</div>
										<label class="col-sm-4 col-md-1 control-label" for="w1-piso-otro">Piso.</label>
										<div class="col-sm-7 col-md-3">
											<select data-plugin-selectTwo class="form-control populate" id="w1-piso-otro" name="piso_otrocont" style="width: 100%">
												<option value="">::Seleccionar::</option>
												@foreach($pisos as $piso)
													<option value="{{ $pisoid++ }}">{{ $piso }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-4 control-label" for="w1-escalera-otro">Esc.</label>
										<div class="col-sm-7 col-md-3">
											<input type="text" class="form-control input-sm" name="escalera_otrocont" id="w1-escalera-otro" >
										</div>
										<label class="col-sm-4 col-md-1 control-label" for="w1-puerta-otro">Pta.</label>
										<div class="col-sm-7 col-md-3">
											<input type="text" class="form-control input-sm" name="puerta_otrocont" id="w1-puerta-otro" >
										</div>
									</div>
								</div>
							</div>
						</section>-->
						<section class="panel panel-featured panel-featured-primary">
							<header class="panel-heading">
								<h2 class="panel-title">Comentarios</h2>
							</header>
							<div class="panel-body">
								<div class="form-group">
									<label class="col-md-4 control-label" for="comentarios">Comentarios</label>
									<div class="col-md-8">
										<textarea class="form-control" rows="3" name="comentarios" id="comentarios">{{ $cliente->comentarios }}</textarea>
									</div>
								</div>
							</div>
						</section>
			</div>
			<div class="col-xs-12">
				<div class="row text-center">
					<button type="submit" class="mb-xs mt-xs mr-xs btn btn-success btn-submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{ $texto_submit }} Usuario</button> <!--  btn-submit -->
				</div>
				<br><br>
			</div>
		</form>
	</div>
</div>