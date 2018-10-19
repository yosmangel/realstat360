    <div class="col-xs-12">
        <h4>DATOS EXTRAS DEL INMUEBLE</h4>
    </div>
    <div class="col-xs-3">
        <div class="form-group">
            <label for="rooms"><strong># Hab</strong></label>
            <div class="input-group">
                <input name="rooms" type="number" min=0 class="form-control" value="{{ $property->rooms }}" title="Debe ser un número"/>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group">
            <label for="bathrooms"><strong># Baños</strong></label>
            <div class="input-group">
                <input name="bathrooms" type="number" min=0 class="form-control" value="{{ $property->bathrooms }}" title="El valor de los metros de vivienda debe ser un número"/>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group">
            <label for="beds"><strong># Camas</strong></label>
            <div class="input-group">
                <input name="beds" type="number" min=0 class="form-control" value="{{ $property->beds }}"  title="Debe ser un número"/>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="form-group{{ $errors->has('sale_price') ? ' has-error' : '' }}">
            <label for="surface"><strong>Superficie</strong></label>
            <div class="input-group">
                <input name="surface" 
                       id="surface" 
                       type="text" 
                       class="form-control" 
                       title="El valor de los metros de vivienda debe ser un número"
                       value=@if($property->surface) 
                                    {{ $property->surface }} 
                             @else 
                                    0.0 
                            @endif  />
                <span class="input-group-addon">
                    m²
                </span>
            </div>
            @if ($errors->has('surface'))
                <span class="help-block">
                    <strong>{{ $errors->first('surface') }}</strong>
                </span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <label class="title advance-trigger">
            <i class="fa fa-plus-square"></i> Otras Características</label>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="form-group"> 
            <blockquote>
                <div class="row">
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                                <input type='hidden' value=0 name='smoke_exit'>
                                @if($property->smoke_exit)
                                    <input type='checkbox' name='smoke_exit' id='smoke_exit' value=1 checked>
                                @else
                                    <input type='checkbox' name='smoke_exit' id='smoke_exit' value=1>
                                @endif
                                <label for="smoke_exit">Salida de Humos</label>
                        </div>
                       
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                                <input type='hidden' value=0 name='air_conditioning'>
                                @if($property->air_conditioning)
                                    <input type='checkbox' name='air_conditioning' id='air_conditioning' value=1 checked>
                                @else
                                    <input type='checkbox' name='air_conditioning' id='air_conditioning' value=1>
                                @endif
                                <label for="air_conditioning">Aire Acondicionado</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                                <input type='hidden' value=0 name='laundry'>
                                @if($property->laundry)
                                    <input type='checkbox' name='laundry' id='laundry' value=1 checked>
                                @else
                                    <input type='checkbox' name='laundry' id='laundry' value=1>
                                @endif
                                <label for="laundry">Lavandería</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                                <input type='hidden' value=0 name='gymnasium'>
                                @if($property->gymnasium)
                                    <input type='checkbox' name='gymnasium' id='gymnasium' value=1 checked>
                                @else
                                    <input type='checkbox' name='gymnasium' id='gymnasium' value=1>
                                @endif
                                <label for="gymnasium">Gimnasio</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='fridge'>
                            @if($property->fridge)
                                <input type='checkbox' name='fridge' id='fridge' value=1 checked>
                            @else
                                <input type='checkbox' name='fridge' id='fridge' value=1>
                            @endif
                            <label for="fridge">Nevera</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='sauna'>
                            @if($property->sauna)
                                <input type='checkbox' name='sauna' id='sauna' value=1 checked>
                            @else
                                <input type='checkbox' name='sauna' id='sauna' value=1>
                            @endif
                            <label for="sauna">Sauna</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='pool'>
                            @if($property->pool)
                                <input type='checkbox' name='pool' id='pool' value=1 checked>
                            @else
                                <input type='checkbox' name='pool' id='pool' value=1>
                            @endif
                            <label for="pool">Piscina</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='microwave'>
                            @if($property->microwave)
                                <input type='checkbox' name='microwave' id='microwave' value=1 checked>
                            @else
                                <input type='checkbox' name='microwave' id='microwave' value=1>
                            @endif
                            <label for="microwave">Microondas</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='tv_cable'>
                            @if($property->tv_cable)
                                <input type='checkbox' name='tv_cable' id='tv_cable' value=1 checked>
                            @else
                                <input type='checkbox' name='tv_cable' id='tv_cable' value=1>
                            @endif
                            <label for="tv_cable">TV Cable</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='refigerator'>
                            @if($property->refigerator)
                                <input type='checkbox' name='refigerator' id='refigerator' value=1 checked>
                            @else
                                <input type='checkbox' name='refigerator' id='refigerator' value=1>
                            @endif
                            <label for="refigerator">Refrigerator</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='wifi'>
                            @if($property->wifi)
                                <input type='checkbox' name='wifi' id='wifi' value=1 checked>
                            @else
                                <input type='checkbox' name='wifi' id='wifi' value=1>
                            @endif
                            <label for="wifi">WiFi</label>
                        </div>
                        <div class="checkbox-custom checkbox-primary col-xs-12 col-md-4">
                            <input type='hidden' value=0 name='internet'>
                            @if($property->internet)
                                <input type='checkbox' name='internet' id='internet' value=1 checked>
                            @else
                                <input type='checkbox' name='internet' id='internet' value=1>
                            @endif
                            <label for="internet">Conexión a Internet</label>
                        </div>
                </div>
            </blockquote>
        </div>
    </div>
