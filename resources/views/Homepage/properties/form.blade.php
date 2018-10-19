<div class="card bottom-md">
    <div class="card-header card-rs360p" >
        <h4>DATOS PRINCIPALES DEL INMUEBLE</h4>
    </div>
    <div class="card-content">
        <form action="{{ url($url) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="{{ $method }}">
            <div class="row">
                <div class="col-xs-8">
                    <div class="row">
                        <!-- Publication Title -->
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Título de la Publicación</label>
                                <input type="text" class="form-control" name='name' value="{{ $property->name }}">
                            </div>
                        </div>
                        <!-- Property Type -->
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label" for="type_id">Tipo de Inmueble</label>
                                <select name="type_id" id="type_id" class="form-control">
                                    @if($property->name)
                                        <option value="{{ $property->type->id }}">{{ $property->type->name }}</option>
                                    @endif
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label" for="province_id">Provincia</label>
                                <select name="province_id" id="province_id" class="form-control">
                                    @if($property->name)
                                        <option value="{{ $property->province->id }}">{{ $property->province->name }}</option>
                                    @endif
                                    @foreach($provinces as $province)
        	                        		<option value="{{ $province->id }}">{{ $province->name }}</option>
        	                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Ciudad</label>
                                <select name="city_id" id="" class="form-control">
                                	@foreach($cities as $city)
                                		<option value="{{ $city->id }}">{{ $city->name }}</option>
                                	@endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Zona</label>
                                <input type="text" name="zone" class="form-control" value="{{ $property->zone }}">
                            </div> 
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Direción</label>
                                <input type="text" name="address" class="form-control" value="{{ $property->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="checkbox-custom checkbox-primary col-xs-12 col-md-2">
                                    <input type='hidden' name='in_sale' id='in_sale' value=0>
                                    <input type='checkbox' 
                                           name='in_sale' 
                                           id='in_sale' 
                                           class='operation-active'
                                           data-id=1 
                                           value=1 
                                           @if($property->operation)
                                            @if($property->operation->in_sale) checked @else '' @endif
                                           @endif>
                                    <label for="in_sale">Venta</label>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="input-group input-group-icon {{ $errors->has('sale_price') ? ' has-error' : '' }}">
                                        <input type='text' 
                                               class="form-control" 
                                               name='sale_price' 
                                               id='operation_1'
                                               disabled
                                               value=@if($property->operation)
                                                        @if($property->operation->in_sale) {{ $property->operation->sale_price }} @else "0.00" @endif
                                                     @else
                                                        0.00
                                                     @endif>

                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-eur"></i></span>
                                        </span>
                                    </div>
                                    @if ($errors->has('sale_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sale_price') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="checkbox-custom checkbox-primary col-xs-12 col-md-2">
                                    <input type='hidden' name='in_rent' id='in_rent' value=0>
                                    <input type='checkbox' 
                                           name='in_rent' 
                                           id='in_rent' 
                                           class='operation-active'
                                           data-id=2
                                           value=1
                                           @if($property->operation)
                                            @if($property->operation->in_rent) checked @else '' @endif
                                           @endif>
                                    <label for="in_rent">Alquiler</label>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <div class="input-group input-group-icon {{ $errors->has('rent_price') ? 'has-error' : '' }}">
                                        <input type='text'
                                               class="form-control" 
                                               name='rent_price' 
                                               id='operation_2' 
                                               disabled
                                               value=@if($property->operation)
                                                        @if($property->operation->in_rent) {{ $property->operation->rent_price }} @else "0.00" @endif
                                                     @else
                                                        0.00
                                                     @endif>
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-eur"></i></span>
                                        </span>
                                    </div>
                                    @if ($errors->has('rent_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('rent_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <select name="rent_by" class="form-control" id="rent_by" disabled>
                                        @if($property->operation)
                                            <option value="{{ $property->operation->rent_by }}" selected>{{ $property->operation->rent_by }}</option>
                                        @endif
                                        <option value="mes">Mes</option>
                                        <option value="semana">Sem</option>
                                        <option value="dia">Día</option>
                                        <option value="horas">Horas</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <div class="checkbox-custom checkbox-primary col-xs-12 col-md-2">
                                    <input type='hidden' name='in_share' id='in_share' value=0>
                                    <input type='checkbox' 
                                           name='in_share' 
                                           id='in_share' 
                                           class='operation-active'
                                           data-id=3
                                           value=1 
                                           @if($property->operation)
                                            @if($property->operation->in_share) checked @else '' @endif
                                           @endif>
                                    <label for="in_share">Compartir</label>
                                </div>
                                <div class="col-xs-12 col-md-4">            
                                    <div class="input-group input-group-icon {{ $errors->has('share_price') ? 'has-error' : '' }}">
                                        <input type='text' 
                                               class="form-control" 
                                               name='share_price' 
                                               id='operation_3'
                                               disabled 
                                               value=@if($property->operation)
                                                        @if($property->operation->in_share) {{ $property->operation->share_price }} @else "0.00" @endif
                                                     @else
                                                        0.00
                                                     @endif>
                                        <span class="input-group-addon">
                                            <span class="icon"><i class="fa fa-eur"></i></span>
                                        </span>
                                    </div>
                                    @if($errors->has('share_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('share_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Descripción del Inmueble</label>
                                <textarea class="form-control" name="description" rows="4">{{ $property->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4">
                        @if($property->facade)
                            <img src="{{ asset('img/propiedades/'.$property->facade->name) }}" alt="" class="img-responsive" id="img_facade">
                        @endif
                        <!-- Property Post Image  -->
                        <div class="form-group label-floating">
                            <label for="image" class="control-label">Imagen de Portada</label>
                            <input id="image" name="image" type="file" class="file-loading" value="@if($property->name) $property->facade->name @endif">
                        </div>
                </div>
            </div>
            <hr>
            <div class="row">
                
                @if($property->name !== null)
                    @include('properties.form_extend')
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary pull-right btn-transparent"><i class="fa fa-{{ $btn_icon }}"></i>&nbsp;{{ $btn_submit }}</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>