<form class="form-horizontal form-bordered" action="{{ url($url) }}" method="POST">
    <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
    <input type="hidden" name="_method" id="method" value="{{ $method }}">
    <div class="col-xs-12 col-md-6">
        <h4>Inmuebles Accesibles a: </h4>
        <blockquote>
            <div class="form-group">
                <label class="control-label col-md-10">Profesionales y Agencias Inmobiliarias</label>
                <div class="col-xs-2 switch switch-sm switch-info">
                    <input type="hidden" name="tratar_profesionales" value=0/>
                    <input  type="checkbox" 
                            name="tratar_profesionales" 
                            data-plugin-ios-switch 
                            value=1
                            {{ $preferenciasArray['tratar_profesionales'] }} />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-10">Firmas Comerciales, Marcas Comerciales y Usuarios Particulares</label>
                <div class="col-xs-2 switch switch-sm switch-info">
                    <input type="hidden" name="tratar_demandantes" value=0/>
                    <input type="checkbox" 
                        name="tratar_demandantes" 
                        data-plugin-ios-switch 
                        value=1
                        {{ $preferenciasArray['tratar_demandantes'] }}/>
                </div>
            </div>
        </blockquote>
    </div>
    <div class="col-xs-12 col-md-6">
        <h4>Requerimientos:</h4>  
        <blockquote class="blockquote-info">
            <div class="form-group">
                <div class="form-group">
                    <label class="control-label col-md-6">Precio no Negociable</label>
                    <div class="col-xs-6 switch switch-sm switch-info">
                        <input type="hidden" name="precio_no_negociable" value=0/>
                        <input type="checkbox" 
                            name="precio_no_negociable" 
                            data-plugin-ios-switch 
                            value=1
                            {{ $preferenciasArray['precio_no_negociable'] }}/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-6">Imprescindibe Aval</label>
                    <div class="col-xs-6 switch switch-sm switch-info">
                        <input type="hidden" name="imprescindible_aval" value=0/>
                        <input type="checkbox" 
                            name="imprescindible_aval" 
                            data-plugin-ios-switch 
                            value=1
                            {{ $preferenciasArray['imprescindible_aval'] }}/>
                    </div>
                </div>
            </div>
        </blockquote>
    </div>
    <hr>
    <div class="col-xs-12 text-center">
        <button id="propietaries" type="submit" class="btn btn-primary btn-preferences"><i class="fa fa-save"></i>&nbsp;{{ $btn_submit }}</button>
    </div>
    <hr>
    <div class="col-xs-12">
        <br>
        <div id="mensaje" >
                          
        </div>
    </div>
</form>