<div class="card bottom-md">
    <div class="card-header card-rs360p" >
        <h4>DATOS PRINCIPALES DEL INMUEBLE</h4>
    </div>
    <div class="card-content">
        <form action="{{ url($url) }}" method="POST" enctype="multipart/form-data" id="{{ $forId }}">
            <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
            <input type="hidden" name="_method" value="{{ $method }}">
            <div class="row">
                <div class="col-xs-12 col-md-8">
                    <div class="row">
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label" for="calle">Calle</label>
                                <input type="text" name="calle" class="form-control" value="{{ $inmueble->calle }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label" for="numero">Número</label>
                                <input type="text" name="numero" class="form-control" value="{{ $inmueble->calle }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Ciudad</label>
                                <select name="ciudad_id" id="" class="form-control">
                                	<option value="1" selected>Madrid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label">Código Postal</label>
                                <input type="text" name="codigo_postal" class="form-control" value="{{ $inmueble->codigo_postal }}">
                            </div> 
                        </div>
                    </div> 
                    <div class="row">
                        <!-- inmueble Type -->
                        <!--div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Título de la Publicación</label>
                                <input type="text" class="form-control" name='nombre' value=" inmueble->nombre " placeholder="Ejemplo: Local Comercial en Alquiler.">
                            </div>
                        </div-->
                        <div class="col-xs-12 col-md-3">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="type_id">Tipo de Inmueble</label>
                                    <select name="tipo_id" id="tipo_id" class="form-control">
                                        @if($inmueble->tipo)
                                            <option value="{{ $inmueble->tipo->id }}" selected>{{ $inmueble->tipo->nombre }}</option>
                                        @else
                                            <option value="">:: Seleccionar ::</option>
                                        @endif
                                        @foreach($tipos as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="col-xs-12 col-md-3">
                                <div class="checkbox-custom checkbox-primary col-xs-12">
                                    <input type='hidden' name='venta' value=0>
                                    <input type='checkbox' 
                                           name='venta' 
                                           id='venta' 
                                           class='operation-active'
                                           data-id=1 
                                           value=1 
                                           @if($inmueble->modalidad)
                                            @if($inmueble->modalidad->venta) checked @else '' @endif
                                           @endif>
                                    <label for="venta">Venta</label>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group input-group-icon {{ $errors->has('ventaprecio') ? ' has-error' : '' }}">
                                            <input type='text' 
                                                class="form-control" 
                                                name='ventaprecio' 
                                                id='operation_1'
                                                disabled
                                                value=@if($inmueble->modalidad)
                                                            @if($inmueble->modalidad->venta) {{ $inmueble->modalidad->ventaprecio }} @else "0.00" @endif
                                                        @else
                                                            0.00
                                                        @endif>
                                            <span class="input-group-addon">
                                                <span class="icon"><i class="fa fa-eur"></i></span>
                                            </span>
                                        </div>
                                        @if ($errors->has('ventaprecio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('ventaprecio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                                <div class="checkbox-custom checkbox-primary col-xs-12">
                                    <input type='hidden' name='alquiler_residencial' value=0>
                                    <input type='checkbox' 
                                           name='alquiler_residencial' 
                                           id='alquiler_residencial' 
                                           class='operation-active'
                                           data-id=2
                                           value=1
                                           @if($inmueble->modalidad)
                                            @if($inmueble->modalidad->alquiler_residencial) checked @else '' @endif
                                           @endif>
                                    <label for="alquiler_residencial">Alquiler</label>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="input-group input-group-icon {{ $errors->has('alqresprecio') ? 'has-error' : '' }}">
                                            <input type='text'
                                                class="form-control" 
                                                name='alqresprecio' 
                                                id='operation_2' 
                                                disabled
                                                value=@if($inmueble->modalidad)
                                                            @if($inmueble->modalidad->alquiler_residencial) {{ $inmueble->modalidad->alqresprecio }} @else "0.00" @endif
                                                        @else
                                                            0.00
                                                        @endif>
                                            <span class="input-group-addon">
                                                <span class="icon"><i class="fa fa-eur"></i></span>
                                            </span>
                                        </div>
                                        @if ($errors->has('alqresprecio'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('alqresprecio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <select name="periodicidad" class="form-control" id="periodicidad" disabled>
                                            @if($inmueble->modalidad)
                                                @if($inmueble->modalidad->alquiler_residencial)
                                                    <option value="{{ $inmueble->modalidad->periodicidad }}" selected>{{ $inmueble->modalidad->periodicidad }}</option>
                                                @endif
                                            @endif
                                            <option value="mes">M</option>
                                            <option value="semana">S</option>
                                            <option value="dia">D</option>
                                            <option value="horas">H</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="panel-body">
								<div class="form-group">
                                    <!-- AIRE ACONDICIONADO -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='aire_acondicionado'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->aire_acondicionado)
                                                    <input type="checkbox" value=1 id="aire-acondicionado" name="aire_acondicionado" checked="cheched">
                                                @else
                                                    <input type="checkbox" value=1 id="aire-acondicionado" name="aire_acondicionado">
                                                @endif
                                            @else
											    <input type="checkbox" value=1 id="aire-acondicionado" name="aire_acondicionado">
                                            @endif
											<label for="aire-acondicionado" aria-expanded="false" aria-controls="aire-acondicionado">Aire Acondicionado</label>
											<br>
										</div>
									</div>
                                    <!-- CALEFACCION -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='calefaccion_int'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->calefaccion_int)
                                                    <input type="checkbox" value=1 id="calefaccion_int" name="calefaccion_int" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="calefaccion_int" name="calefaccion_int">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="calefaccion_int" name="calefaccion_int">
                                            @endif
                                            <label for="calefaccion_int" aria-expanded="false" aria-controls="calefaccion_int">Calefacción</label>
											<br>
										</div>
									</div>
                                    <!-- AMUEBLADO -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='amueblado'>
											@if($inmueble->interiores)
                                                @if($inmueble->interiores->amueblado)
                                                    <input type="checkbox" value=1 id="amueblado" name="amueblado" checked="checked">
                                                @else  
                                                    <input type="checkbox" value=1 id="amueblado" name="amueblado">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="amueblado" name="amueblado">
                                            @endif
											<label for="amueblado" aria-expanded="false" aria-controls="amueblado">Amueblado</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
                                    <!-- COCINA -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='cocina_equipada'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->cocina_equipada)
											        <input type="checkbox" value=1 id="cocina_equipada" name="cocina_equipada" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="cocina_equipada" name="cocina_equipada">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="cocina_equipada" name="cocina_equipada">
                                            @endif
											<label for="cocina_equipada" aria-expanded="false" aria-controls="cocina_equipada">Cocina Equipada</label>
											<br>
										</div>
									</div>
                                    <!-- HORNO -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='horno'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->horno)
											        <input type="checkbox" value=1 id="horno" name="horno" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="horno" name="horno">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="horno" name="horno">
                                            @endif
											<label for="horno" aria-expanded="false" aria-controls="horno">Horno</label>
											<br>
										</div>
									</div>
                                    <!-- MICROONDAS -->
                                    <div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='microondas'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->microondas)
											        <input type="checkbox" value=1 id="microondas" name="microondas" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="microondas" name="microondas">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="microondas" name="microondas">
                                            @endif
											<label for="microondas" aria-expanded="false" aria-controls="microondas">Microondas</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
                                    <!-- NEVERA -->
                                    <div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='nevera'>
											@if($inmueble->interiores)
                                                @if($inmueble->interiores->nevera)
                                                    <input type="checkbox" value=1 id="nevera" name="nevera" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="nevera" name="nevera">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="nevera" name="nevera">
                                            @endif
											<label for="nevera" aria-expanded="false" aria-controls="nevera">Nevera</label>
											<br>
										</div>
									</div>
                                    <!-- INTERNET -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='internet'>
											@if($inmueble->interiores)
                                                @if($inmueble->interiores->internet)
                                                    <input type="checkbox" value=1 id="internet" name="internet" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="internet" name="internet">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="internet" name="internet">
                                            @endif
											<label for="internet" aria-expanded="false" aria-controls="internet">Internet</label>
											<br>
										</div>
									</div>
                                    <!-- WIFI -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='wifi'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->wifi)
											        <input type="checkbox" value=1 id="wifi" name="wifi" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="wifi" name="wifi">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="wifi" name="wifi">
                                            @endif
											<label for="wifi" aria-expanded="false" aria-controls="wifi">Wifi</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
                                    <!-- LAVADORA -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='lavadora'>
											@if($inmueble->interiores)
                                                @if($inmueble->interiores->lavadora)
                                                    <input type="checkbox" value=1 id="lavadora" name="lavadora" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="lavadora" name="lavadora">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="lavadora" name="lavadora">
                                            @endif
											<label for="lavadora" aria-expanded="false" aria-controls="lavadora">Lavadora</label>
											<br>
										</div>
									</div>
                                    <!-- WIFI -->
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='mascotas'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->mascotas)
											        <input type="checkbox" value=1 id="mascotas" name="mascotas" checked="checked">
                                                @else
                                                    <input type="checkbox" value=1 id="mascotas" name="mascotas">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="mascotas" name="mascotas">
                                            @endif
											<label for="mascotas" aria-expanded="false" aria-controls="mascotas">Se aceptan mascotas</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='television'>
											@if($inmueble->interiores)
                                                @if($inmueble->interiores->television)
                                                    <input type="checkbox" value=1 id="television" name="television" checked="checked">
                                                @else  
                                                    <input type="checkbox" value=1 id="television" name="television">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="television" name="television">
                                            @endif
											<label for="television" aria-expanded="false" aria-controls="television">Televisión</label>
											<br>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='piscina'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->piscina)
											        <input type="checkbox" value=1 id="piscina" name="piscina" checked="checked">
                                                @else  
                                                    <input type="checkbox" value=1 id="piscina" name="piscina">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="piscina" name="piscina">
                                            @endif
											<label for="piscina" aria-expanded="false" aria-controls="piscina">Piscina</label>
											<br>
										</div>
									</div>
									<div class="col-xs-12 col-md-4">
										<div class="checkbox-custom checkbox-info checkbox-inline mt-sm ml-md mr-md">
											<input type='hidden' value=0 name='salida_de_humos'>
                                            @if($inmueble->interiores)
                                                @if($inmueble->interiores->salida_de_humos)
											        <input type="checkbox" value=1 id="salida_de_humos" name="salida_de_humos" checked="checked">
                                                @else   
                                                    <input type="checkbox" value=1 id="salida_de_humos" name="salida_de_humos">
                                                @endif
                                            @else
                                                <input type="checkbox" value=1 id="salida_de_humos" name="salida_de_humos">
                                            @endif
											<label for="salida_de_humos" aria-expanded="false" aria-controls="salida_de_humos">Salida de Humos</label>
											<br>
										</div>
									</div>
								</div>
							</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción del Inmueble</label>
                                <textarea class="form-control" name="descripcion_corta" rows="4">{{ $inmueble->descripcion_corta }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4">
                 <div class="row">
                        <div class="colo-xs-12">
                            @if($inmueble->id_portada)
                                <img src="{{ asset('files_img/'.$inmueble->id_portada) }}" alt="" class="img-responsive img-thumbnail" id="img_facade">
                            @endif
                                <!-- inmueble Post Image  -->
                                <div class="form-group label-floating">
                                    <label for="image" class="control-label">Imagen de Portada</label>
                                    <input id="image" name="image" type="file" class="file-loading" >
                                </div>
                        </div>
                 </div>
                </div>  
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-create-property pull-right">
                <i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-search i-shown"></i>&nbsp;<strong><span id="btn-txt">{{ $btn_submit }}</span></strong>
            </button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>