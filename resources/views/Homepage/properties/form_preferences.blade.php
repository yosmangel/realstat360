<form class="form-horizontal form-bordered" action="{{ url($url) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" id="method" value="{{ $method }}">
    <div class="col-xs-12 col-md-6">
        <h4>Inmuebles visibles a: </h4>
        <blockquote>
            <p>Selecciona el perfil o los perfiles de usuario que podrán 
                encontrar tus inmuebles a partir de la plataforma.
            </p>
            <div class="form-group">
                <label class="control-label col-md-6">Usuarios Demandantes</label>
                <div class="col-xs-6 switch switch-sm switch-info">
                    <input type="checkbox" name="usuarios_demanda" data-plugin-ios-switch />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">Marcas Comerciales</label>
                <div class="col-xs-6 switch switch-sm switch-info">
                    <input type="checkbox" name="marcas" data-plugin-ios-switch />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">Firmas Comerciales</label>
                <div class="col-xs-6 switch switch-sm switch-info">
                    <input type="checkbox" name="firmas" data-plugin-ios-switch />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-6">Todos</label>
                <div class="col-xs-6 switch switch-sm switch-primary">
                    <input type="checkbox" name="todos" data-plugin-ios-switch />
                </div>
            </div>
        </blockquote>
    </div>
    <div class="col-xs-12 col-md-6">
        <h4>Especificaciones:</h4>  
        <blockquote class="blockquote-info">
            <div class="form-group">
                <div class="checkbox-custom checkbox-primary col-xs-12">
                    <input type='hidden' value=0 name='precio_no_negociable'>
                    <input type='checkbox' name='precio_no_negociable' id='precio_no_negociable' value=1>
                    <label for="precio_no_negociable">Precio No Negociable</label>
                </div>
                <p>A los demandantes de inmuebles se les informará que el precio final de todos tus inmuebles
                    es el publicado. Si desea tener diferenciaciones entre sus diferentes inmuebles debe dejar
                    esta casilla sin seleccionar y personalizarla para cada inmueble cuando se editan sus características.
                </p>
                <div class="checkbox-custom checkbox-info col-xs-12">
                    <input type='hidden' value=0 name='imprescindible_aval'>
                    <input type='checkbox' name='imprescindible_aval' id='imprescindible_aval' value=1>
                    <label for="imprescindible_aval">Imprescindible Aval</label>
                </div>
                <p>A los demandantes de inmuebles les exigirá Aval que certifique su confianza como demandante.
                    Tenga presente que si selecciona esta casilla sus inmuebles serán visibles solo para los usuarios
                    que cumplan este requisitos.
                </p>
            </div>
        </blockquote>
    </div>
    <hr>
    <div class="col-xs-12 text-center">
        <button id="btn-submit-preferences" type="submit" class="btn btn-primary btn-transparent"><i class="fa fa-save"></i>&nbsp;{{ $btn_submit }}</button>
    </div>
</form>