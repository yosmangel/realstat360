<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('demanda') }}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="formModalLabel">¿BUSCAS UN INMUEBLE?</h4>
                </div>
                <div class="modal-body">
                            <div class="row"> 
                                <div class="col-xs-12">
                                    <h5 class="heading-default text-spacing-md text-center">Dinos que estás buscando y te sugerimos las mejores opciones acorde a tus preferencias.</h5>
                                </div>
                                <div class="col-xs-12">
                                        <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                        <input type="hidden" name="user_type" id="tipo_usuario" value="0"> <!-- tipo_usuario = 0 => Propietario -->
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="descripcion"><strong>¿Que estás buscando?</strong></label>
                                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Entra una descripción breve de lo que estás buscando."></textarea>
                                                </div>
                                            </div>
                                            <!--div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="tipo"><strong>Tipo de Inmueble</strong></label>
                                                    <select  class="form-control" name="tipo" id="tipo" required>
                                                        <option value="">:: Seleccionar ::</option>
                                                        @foreach($tipos as $tipo)
                                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div-->
                                            <!--div class="col-xs-12 col-sm-6  col-md-3">
                                                <div class="form-group">
                                                    <label for="inmueble_en"><strong>Inmueble en:</strong></label>
                                                    <select  class="form-control" name="inmueble_en" id="inmueble_en" required>
                                                        <option>:: Seleccionar ::</option>
                                                        <option value="Venta">Venta</option>
                                                        <option value="Alquiler Residencial">Alquiler Residencial</option>
                                                        <option value="Alquiler Vacacional">Alquiler Vacacional</option>
                                                        <option value="Traspaso">Traspaso</option>
                                                        <option value="Compartir">Compartir</option>
                                                    </select>
                                                </div>
                                            </div-->
                                            <!--div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="provincia"><strong>Provincia</strong></label>
                                                    <select  class="form-control" name="provincia" id="provincia" required>
                                                        <option value="">:: Seleccionar ::</option>
                                                        @foreach($provincias as $provincia)
                                                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="ciudad_id"><strong>Ciudad:</strong></label>
                                                    <select  class="form-control" name="ciudad" id="ciudad" required>
                                                        <option value="">:: Seleccionar ::</option>
                                                        <option value="1">Ciudad 1</option>
                                                        <option value="2">Ciudad 2</option>
                                                        <option value="3">Ciudad 3</option>
                                                        <option value="4">Ciudad 4</option>
                                                        <option value="5">Ciudad 5</option>
                                                    </select>
                                                </div>
                                            </div-->
                                        </div>
                                        <hr>
                                        <h5 class="heading-default text-spacing-md text-center">Entra tu información de contacto.</h5>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="name"><strong>Nombre</strong></label>
                                                    <input type="text" name="name" id="name" placeholder="Ingresa tu nombre" value="{{ old('name') }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="lastname"><strong>Apellidos</strong></label>
                                                    <input type="text" name="lastname" id="lastname" placeholder="Ingresa tu nombre" value="{{ old('lastname') }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="telephone"><strong>Teléfono</strong></label>
                                                    <input type="text" name="telephone" id="telephone" placeholder="(123) 45678" value="{{ old('telephone') }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="email"><strong>Correo Electrónico</strong></label>
                                                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="tucorreo@mail.com" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12">
                        <div id="mensaje" >
                            
                        </div>
                    </div>
                    <button id="btn_enviar_solicitud" type="submit" class="btn btn-warning pull-right mb-xl btn-create" data-loading-text="Cargando...">
                        <i class="fa fa-search"></i>&nbsp;<strong>ENVIAR SOLICITUD</strong>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

