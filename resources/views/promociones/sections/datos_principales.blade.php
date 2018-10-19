<div id="response" class="alert alert-success" role="alert" style="display:none">
</div>
<form class="form-horizontal" id="form-datos-principales" action="{{ route('promociones.store') }}" novalidate="novalidate">
	<input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
	<input name="numform" type="hidden" value = 0>
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Detalles de la Promoción</h2>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-nombre">Nombre promoción</label>
				<div class="col-md-7">
					<input type="text" class="form-control input-sm" name="nombre" id="w1-nombre" required>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el nombre de la promoción.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-constr">Constructor</label>
				<div class="col-md-7">
					<input type="text" class="form-control input-sm" name="constr" id="w1-constr" required>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el nombre de la constructora que realiza la obra.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-md-4 control-label" for="residencial">Tipo promoción</label>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<div class="radio-custom radio-primary">
						<input type="radio" id="residencial" class="tipo_promocion" name="tipo_promocion" value=1 checked="checked">
						<label for="residencial">Residencial</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<div class="radio-custom radio-warning">
						<input type="radio" id="oficina-local" class="tipo_promocion" name="tipo_promocion" value=2>
						<label for="oficina-local">Oficina/Local</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2">
					<div class="radio-custom radio-warning">
						<input type="radio" id="industrial" class="tipo_promocion" name="tipo_promocion" value=3>
						<label for="industrial">Industrial</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-promotor">Promotor</label>
				<div class="col-md-7">
					<input type="text" class="form-control input-sm" name="promotor" id="w1-promotor" required>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el nombre del promotor (Persona física o jurídica), que programa y financia la nueva obra.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-comercializa">Comercializa</label>
				<div class="col-md-7">
					<input type="text" class="form-control input-sm" name="comercializa" id="w1-comercializa" required>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Indica el nombre de la persona física o jurídica que comercializa la nueva obra.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-tipoVPO">Tipo VPO</label>
				<div class="col-md-7">
					<select data-plugin-selectTwo class="form-control populate" name="tipoVPO" id="w1-tipoVPO">
						<option value="" selected='selected' >::Seleccionar::</option>
						<option value="VPO_Vivienda_Prot_Ofi" title="VPO - Vivienda con Protección Oficial" >VPO - Vivienda con Protección Oficial</option>
    					<option value="VPP_Vivienda_Prot_Pub" title="VPP – Vivienda con Protección Pública" >VPP – Vivienda con Protección Pública</option>
    					<option value="VPPL_Vivienda_Prot_Pub_Precio_Limitado" title="VPPL – Vivienda de Protección Pública de Precio Limitado" >VPPL – Vivienda de Protección Pública de Precio Limitado</option>
    					<option value="VPPA_Vivienda_Prot_Pub_para_Arrendamiento" title="VPPA – Vivienda con Protección Pública para Arrendamiento" >VPPA – Vivienda con Protección Pública para Arrendamiento</option>
					</select>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Tipo de vivienda protegida cuya construcción y/o adquisición la Administración Pública prevé ayudas de diversdas índole.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-fecha-entrega">Fecha Entrega</label>
				<div class="col-md-7">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input type="date" class="form-control" name="fecha_entrega" id="w1-fecha-entrega">
					</div>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Fecha en la que se entrega la obra nueva.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-anio-construccion">Año construcción</label>
				<div class="col-md-7">
					<input type="number" class="form-control input-sm" min=1900 max=2025 placeholder="2017" value="2017" name="anio_contruccion" id="w1-anio-construccion" required>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="Fecha en la que se finaliza formalmente la obra nueva.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-cert-energ">Certificado Energético</label>
				<div class="col-md-7">
					<select data-plugin-selectTwo class="form-control populate" name="cert_energ" id="w1-cert-energ">
						<option value="" selected='selected' >::Seleccionar::</option>
						<option value="A" title="A" >A</option>
    					<option value="B" title="B" >B</option>
    					<option value="C" title="C" >C</option>
    					<option value="D" title="D" >D</option>
    					<option value="E" title="E" >E</option>
    					<option value="F" title="F" >F</option>
    					<option value="G" title="G" >G</option>
    					<option value="en tramite" title="en tramite" >En trámite</option>
    					<option value="excento" title="excento" >Excento</option>
					</select>
				</div>
				<div class="col-md-1">
					<div class="demo-icon-hover mb-sm mt-sm col-md-6 col-lg-4 col-xl-3" data-toggle="tooltip" data-placement="bottom" title="De acuerdo al RD 235/2013, de 5 de abril, te recordamos que, en función del tipo de inmueble de que se trate y del consumo previsto, debes indicar su nivel de certificación de eficiencia energética en el desplegable de la ficha del anuncio. Para más información clica aquí.">
						<i class="el el-info-circle"></i>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-fecha-alta">Fecha Alta</label>
				<div class="col-md-7">
					<div class="input-group">
						<span class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</span>
						<input type="date" class="form-control" name="fecha_alta" id="w1-fecha-alta">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" id="w1-estado">Estado</label>
				<div class="col-md-7">
					<select data-plugin-selectTwo class="form-control populate" name="estado" id="w1-estado">
							<option value="disponible">Disponible</option>
							<option value="nodisponible">No disponible</option>
							<option value="enconstruccion">En construcción</option>
					</select>
				</div>
			</div>
		</div>
	</section>
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Dirección de la Promoción</h2>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-sm-4 control-label" id="w1-pais">País</label>
				<div class="col-sm-7">
					<select data-plugin-selectTwo class="form-control populate" id="w1-pais" name="pais_id">
						<option value="">::Seleccionar::</option>
						@foreach($paises as $pais)
							<option value="{{ $pais->id }}">{{ $pais->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-codigo-postal">C.P.</label>
				<div class="col-sm-7">
					<input type="text" class="form-control input-sm" name="codigo_postal" id="w1-codigo-postal" required>
					<p>
						¿Dudas de tu código postal? <a href="www.correos.es">www.correos.es</a> 
					</p>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-municipio-id">Municicpio</label>
				<div class="col-sm-7">
					<select data-plugin-selectTwo class="form-control populate" name="municipio_id" id="w1-municipio-id">
						@foreach($municipios as $municipio)
							<option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-tipovia">Tipo de Vía</label>
				<div class="col-sm-7">
					<select data-plugin-selectTwo class="form-control populate" name="via_id" id="w1-tipovia">
						@foreach($vias as $via)
							<option value="{{ $via->id }}">{{ $via->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-calle">Calle</label>
				<div class="col-sm-7">
					<input type="text" class="form-control input-sm" name="calle" id="w1-calle" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 col-md-4 control-label" for="w1-numero">No.</label>
				<div class="col-sm-7 col-md-3">
					<input type="text" class="form-control input-sm" name="numero" id="w1-numero" required>
				</div>
				<label class="col-sm-4 col-md-1 control-label" for="w1-piso">Piso.</label>
				<div class="col-sm-7 col-md-3">
					<select data-plugin-selectTwo class="form-control populate" id="w1-piso" name="piso">
						<option value="">::Seleccionar::</option>
						<option value="Sotano">Sótano</option>
						<option value="Subsotano">Subsótano</option>
						<option value="Bajos">Bajos</option>
						<option value="Entresuelo">Entresuelo</option>
						<option value="Principal">Principal</option>
						<option value="1ro">1ro</option>
						<option value="2do">2do</option>
						<option value="3ro">3ro</option>
						<option value="4to">4to</option>
						<option value="5to">5to</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="w1-escalera">Esc.</label>
				<div class="col-sm-7 col-md-3">
					<input type="text" class="form-control input-sm" name="escalera" id="w1-escalera" required>
				</div>
				<label class="col-sm-4 col-md-1 control-label" for="w1-puerta">Pta.</label>
				<div class="col-sm-7 col-md-3">
					<input type="text" class="form-control input-sm" name="puerta" id="w1-puerta" required>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-4">
					<button type="button" class="mb-xs mt-xs mr-xs btn btn-danger"><i class="el el-map-marker-alt"></i> Comprobar dirección en el mapa</button>
				</div> 
			</div>
			<div class="form-group">
				<div class="col-md-11 text-right">
					* Indica cómo mostrar la dirección del inmueble en comunicaciones y publicaciones: 
					<br>
					<label class="radio-inline">
						<input type="radio" name="mostrardireccion" class="mostrar_direccion" id="opcionmostrardireccion1" value="1" checked="checked"> Calle y número
					</label>
					<label class="radio-inline">
						<input type="radio" name="mostrardireccion" class="mostrar_direccion" id="opcionmostrardireccion2" value="2"> Sólo calle
					</label>
					<label class="radio-inline">
						<input type="radio" name="mostrardireccion" class="mostrar_direccion" id="opcionmostrardireccion3" value="3" > Zona
					</label>
				</div>
			</div>
			<div class="form-group collapse" id="inputzona">
				<label class="col-sm-4 control-label" for="w1-zona">
					Zona
				</label>
				<div class="col-sm-7"  data-toggle="tooltip" data-placement="bottom" title="La dirección exacta es más fiable para los usuarios. Mostrar sólo la zona o incluso sólo la calle restan calidad al anuncio.">
					<input type="text" class="form-control input-sm" name="zona" id="w1-zona" required>
				</div>
			</div>
		</div>
	</section>
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Extras de la promoción</h2>
		</header>
		<div class="panel-body">
			<div class="form-group collapse in" id="extras-residencial">
				<div class="col-sm-3"></div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="ascensor_prin">
						<input type="checkbox" value=1 name="ascensor_prin" id="ascensor-principal">
						<label for="ascensor-principal">Ascensor principal</label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="ascensor_serv">
						<input type="checkbox" value=1 id="ascensor-servicios" name="ascensor_serv">
						<label for="ascensor-servicios">Ascensor servicios</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="domotica">
						<input type="checkbox" value=1 id="domotica" name="domotica">
						<label for="domotica">Domótica</label>
					</div>
					<div class="checkbox-custom checkbox-warning">
						<input type="hidden" value=0 name="energia_solar">
						<input type="checkbox" value=1 id="energia-solar" name="energia_solar">
						<label for="energia-solar">Energía solar</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="parking_comu">
						<input type="checkbox" value=1 id="parking-comu" name="parking_comu">
						<label for="parking-comu">Parking Comunitario</label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="parking_priv">
						<input type="checkbox" value=1 id="parking-priv" name="parking_priv">
						<label for="parking-priv">Parking privado</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="piscina_priv">
						<input type="checkbox" value=1 id="piscina-priv" name="piscina_priv">
						<label for="piscina-priv">Piscina privada</label>
					</div>
					<div class="checkbox-custom checkbox-warning">
						<input type="hidden" value=0 name="serv_porteria">
						<input type="checkbox" value=1 id="serv-porteria" name="serv_porteria">
						<label for="serv-porteria">Servicio Portería</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="trastero">
						<input type="checkbox" value=1 id="trastero" name="trastero">
						<label for="trastero">Trastero</label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="zona_comu">
						<input type="checkbox" value=1 id="zona-comu" name="zona_comu">
						<label for="zona-comu">Zona comunitaria</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="zona_depor">
						<input type="checkbox" value=1 id="zona-depor" name="zona_depor">
						<label for="zona-depor">Zona deportiva</label>
					</div>
					<div class="checkbox-custom checkbox-warning">
						<input type="hidden" value=0 name="zona_infa">
						<input type="checkbox" value=1 id="zona-infa" name="zona_infa">
						<label for="zona-infa">Zona infantil</label>
					</div>
				</div>
			</div>
			<!-- Oficina/Local -->
			<div class="form-group collapse" id="extras-oflocal">
				<div class="col-sm-3"></div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="alarma">
						<input type="checkbox" value=1 name="alarma" id="alarma">
						<label for="alarma">Alarma</label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="montacargas">
						<input type="checkbox" value=1 id="montacargas" name="montacargas">
						<label for="montacargas">Montacargas</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="park_publico">
						<input type="checkbox" value=1 id="park-publico" name="park_publico">
						<label for="park-publico">Parking Público</label>
					</div>
					<div class="checkbox-custom checkbox-warning">
						<input type="hidden" value=0 name="suelo">
						<input type="checkbox" value=1 id="suelo" name="suelo">
						<label for="suelo">Suelo técnico</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="ascensor">
						<input type="checkbox" value=1 id="ascensor" name="ascensor">
						<label for="ascensor">Ascensor/label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="ofloc_parking_privado">
						<input type="checkbox" value=1 id="ofloc-parking-privado" name="ofloc_parking_privado">
						<label for="ofloc-parking-privado">Parking privado</label>
					</div>
					<div class="checkbox-custom checkbox-warning">
						<input type="hidden" value=0 name="ofloc_servicio_porteria">
						<input type="checkbox" value=1 id="ofloc-servicio-porteria" name="ofloc_servicio_porteria">
						<label for="ofloc-servicio-porteria">Servicio Portería</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="ofloc_trastero">
						<input type="checkbox" value=1 id="ofloc-trastero" name="ofloc_trastero">
						<label for="ofloc-trastero">Trastero</label>
					</div>
				</div>
			</div>
			<!-- Industrial -->
			<div class="form-group collapse" id="extras-industrial">
				<div class="col-sm-3"></div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="ind_ascensor">
						<input type="checkbox" value=1 name="ind_ascensor" id="ind-ascensor">
						<label for="ind-ascensor">Ascensor</label>
					</div>
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="muelles">
						<input type="checkbox" value=1 id="muelles" name="muelles">
						<label for="muelles">Muelles</label>
					</div>
					<div class="checkbox-custom checkbox-success">
						<input type="hidden" value=0 name="ind_parking_publico">
						<input type="checkbox" value=1 id="ind-parking-publico" name="ind_parking_publico">
						<label for="ind-parking-publico">Parking Público</label>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="checkbox-custom checkbox-primary">
						<input type="hidden" value=0 name="ind_montacargas">
						<input type="checkbox" value=1 id="ind-montacargas" name="ind_montacargas">
						<label for="ind-montacargas">Montacargas</label>
					</div>
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="ind_parking_privado">
						<input type="checkbox" value=1 id="ind-parking-privado" name="ind_parking_privado">
						<label for="ind-parking-privado">Parking Privado</label>
					</div>
					<div class="checkbox-custom checkbox-default">
						<input type="hidden" value=0 name="ind_trastero">
						<input type="checkbox" value=1 id="ind-trastero" name="ind_trastero">
						<label for="ind-trastero">Trastero</label>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="obs-extras">Observaciones</label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="obs-extras" name="obs_extras"></textarea>
				</div>
			</div>
		</div>
	</section>
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Descripción</h2>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-idioma">Idioma</label>
				<div class="col-md-7">
					<select data-plugin-selectTwo class="form-control populate" id="w1-idioma" name="idioma_id">
						<option value="">::Seleccionar::</option>
						@foreach($idiomas as $idioma)
							<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="descripcion-corta">Descripción Abreviada</label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="descripcion-corta" name="descripcion_corta"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="descripcion-extendida">Descripción Extendida <i class="el el-info-circle"></i></label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="descripcion-extendida" name="descripcion_extendida" data-toggle="tooltip" data-placement="bottom" title="La descripción debe ser completa pero no demasiado larga. No incluyas características del inmueble que ya aparecen en el detalle y evita el exceso de mayúsculas."></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="slogan">Slogan</label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="slogan" name="slogan"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="slogan-financiero">Slogan Financiero</label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="slogan-financiero" name="slogan_financiero"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="condiciones-economicas">Condiciones Económicas</label>
				<div class="col-md-7">
					<textarea class="form-control" rows="3" id="condiciones-economicas" name="condiciones_economicas"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-md-4  control-label text-left">Memoria Calidades</label>
				<div class="col-md-7 col-md-offset-4">
					<textarea class="form-control" rows="5" id="memoria" name="memoria"></textarea>
					<!--div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></div-->
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-7 col-md-offset-4">
					<a class="btn btn-warning" role="button" data-toggle="collapse" href="#nuevoIdioma" aria-expanded="false" aria-controls="collapseExample">
						<i class="fa fa-plus" aria-hidden="true"></i> Añadir nuevo idioma
					</a>
				</div>
			</div>
			<div class="collapse" id="nuevoIdioma">
					<div class="form-group">
						<label class="col-md-4 control-label" for="w1-idioma2">Idioma</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo class="form-control populate" id="w1-idioma2" name="idioma_id2">
								<option value="">::Seleccionar::</option>
								@foreach($idiomas as $idioma)
									<option value="{{ $idioma->id }}">{{ $idioma->nombre }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="descripcion-corta2">Descripción Abreviada</label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="descripcion-corta2" name="descripcion_corta2"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="descripcion-extendida2">Descripción Extendida <i class="el el-info-circle"></i></label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="descripcion-extendida2" name="descripcion_extendida2" data-toggle="tooltip" data-placement="bottom" title="La descripción debe ser completa pero no demasiado larga. No incluyas características del inmueble que ya aparecen en el detalle y evita el exceso de mayúsculas."></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="slogan2">Slogan</label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="slogan2" name="slogan2"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="slogan-financiero2">Slogan Financiero</label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="slogan-financiero2" name="slogan_financiero2"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label" for="condiciones-economicas2">Condiciones Económicas</label>
						<div class="col-md-7">
							<textarea class="form-control" rows="3" id="condiciones-economicas2" name="condiciones_economicas2"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-md-4  control-label text-left">Memoria Calidades</label>
						<div class="col-md-7 col-md-offset-4">
							<textarea class="form-control" rows="5" id="memoria2" name="memoria2"></textarea>
							<!--div class="summernote" data-plugin-summernote data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></div-->
						</div>
					</div>
			</div>
		</div>
	</section>
	<section class="panel panel-featured panel-featured-primary">
		<header class="panel-heading">
			<h2 class="panel-title">Datos de Contacto en Publicaciones</h2>
		</header>
		<div class="panel-body">
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-persona">Persona de contacto</label>
				<div class="col-md-7">
					<input type="text" class="form-control input-sm" name="persona" id="w1-persona" required>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="w1-mostrar-contacto">Mostrar</label>
				<div class="col-md-7">
					<select data-plugin-selectTwo class="form-control populate" id="w1-mostrar-contacto" name="mostrar_contacto">
						<option value="datos_agencia">Datos de mi Agencia</option>
						<option value="agente_inmueble">Agente del Inmueble</option>
						<option value="otros_datos">Otros datos</option>
					</select>
				</div>
			</div>
			<div id="otros-datos" class="collapse">
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-email-contacto">Email</label>
					<div class="col-md-7">
						<input type="text" class="form-control input-sm" name="email_contacto" id="w1-email-contacto" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-4 control-label" for="w1-telefono-contacto">Teléfono</label>
					<div class="col-md-7">
						<input type="text" class="form-control input-sm" name="telefono_contacto" id="w1-telefono-contacto" required>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="row">
		<div class="col-xs-4"></div> 
		<div class="col-xs-4">
			<button type="button" data-id="form_principales" class="mb-xs mt-xs mr-xs btn btn-success btn-create-ajax"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
		</div>
	</div>
	
	<br><br>
</form>