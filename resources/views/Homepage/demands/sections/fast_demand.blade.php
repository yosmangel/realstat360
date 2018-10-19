<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('demanda') }}" method="post">
                <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="formModalLabel">¿BUSCAS UN INMUEBLE?</h4>
                </div>
                <div class="modal-body"> 
                            <div class="row" id="form-body"> 
                                <div class="col-xs-12">
                                    <h5 class="heading-default text-spacing-md text-center">Dinos que estás buscando y te sugerimos las mejores opciones acorde a tus preferencias.</h5>
                                </div>
                                <div class="col-xs-12">
                                        
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="descripcion"><strong>¿Que estás buscando?</strong></label>
                                                    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Escriba una breve descripción de lo que estás buscando. Ejemplo: Local comercial en Madrid Centro."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="heading-default text-spacing-md text-center">Escribe tu información de contacto.</h5>
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
                            <div class="row" id="continuar-to-register" style="display: none;">
                                <div class="alert alert-info fade in nomargin text-left">
                                    <h5>¿Deseas continuar y completar tu perfil en 
                                        RealState360?
                                    </h5>
                                    <p>Con tu cuenta de usuario 
                                        podrás personalizar la búsqueda de inmuebles y 
                                        contactar a Propietarios de Inmuebles que están 
                                        afiliados a nuestra plaraforma.
                                    </p>
                                    <a class="btn btn-primary btn-lg" href="/registro/demanda" type="button">
                                        <strong>¡Continuar, Sí, esta es la mejor opción!</strong>
                                    </a>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12">
                        <div id="mensaje" >
                            
                        </div>
                    </div><hr>
                    <div class="col-xs-12 text-center">
                        <button id="btn_enviar_solicitud" type="submit" class="btn btn-warning btn-md btn-create" data-loading-text="Cargando...">
                            <i class="fa fa-search"></i>&nbsp;<strong>ENVIAR SOLICITUD</strong>
                        </button> 
                        <button class="btn btn-default btn-md btn-close-fast-demand" type="button">
                            <i class="fa fa-window-close-o" aria-hidden="true"></i>&nbsp;Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

