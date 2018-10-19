<form class="form-horizontal form-bordered" action="{{ url($url) }}" method="POST">
    <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
    <input type="hidden" name="_method" id="method" value="{{ $method }}">
    <div class="col-xs-12 col-md-6">
        <h4>Tratar con: </h4>
        <blockquote>
            <p>Selecciona el perfil o los perfiles de usuarios con los que tiene interés de contactar en la búsqueda de inmuebles.
            </p>
            <div class="form-group">
                <label class="control-label col-md-6">Solo Propietarios Directos</label>
                <div class="col-xs-6 switch switch-sm switch-info">
                    <input type="hidden" name="tratar_solo_propietarios" value=0/>
                    <input type="checkbox" name="tratar_solo_propietarios" data-plugin-ios-switch value=1 {{ $preferenciasArray['tratar_solo_propietarios'] }}/>
                </div>
            </div>
        </blockquote>
    </div>
    <div class="col-xs-12 col-md-6">
        <h4>Interesado en:</h4>  
        <blockquote class="blockquote-info">
            <div class="form-group"> 
                <div class="checkbox-custom checkbox-primary col-xs-12">
                    <input type='hidden' value=0 name='compra'>
                    <input type='checkbox' name='compra' id='compra' value=1 {{ $preferenciasArray['compra'] }}>
                    <label for="compra">Comprar</label>
                </div>
                <p>Encontrará resultados de Locales Comerciales que se encuentren en Venta.
                </p>
                <div class="checkbox-custom checkbox-info col-xs-12">
                    <input type='hidden' value=0 name='arrienda'>
                    <input type='checkbox' name='arrienda' id='arrienda' value=1 {{ $preferenciasArray['arrienda'] }}>
                    <label for="arrienda">Arrendar</label>
                </div>
                <p>Encontrará resultados de Locales Comerciales que se encuentren en Alquiler.
                </p>
            </div>
        </blockquote>
    </div>
    <hr>
    <div class="col-xs-12 text-center">
        <button id="demands" type="submit" class="btn btn-primary btn-preferences"><i class="fa fa-save"></i>&nbsp;{{ $btn_submit }}</button>
    </div>
    <hr>
    <div class="col-xs-12">
        <br>
        <div id="mensaje" >
                          
        </div>
    </div>
</form>