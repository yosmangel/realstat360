<section role="main" class="content-body">
    <header class="page-header">
        <h2>SISTEMA INMOBILIARIO</h2>
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>INICIO</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <section class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="img-responsive">
                                <img class="appear-animation  pull-left" width="500px" src="{{ asset('images/logo5.png') }}" data-appear-animation="fadeInRightBig">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xs-12 col-md-6">
                <section class="panel form-wizard" id="w4">
                    <header class="panel-heading">
                        <h2 class="panel-title">Efectividad de tus Anuncios</h2>
                    </header>
                    <div class="panel-body">
                        <div class="wizard-progress wizard-progress-md">
                            <div class="steps-progress">
                                <div class="progress-indicator"></div>
                            </div>
                            <ul class="wizard-steps" id="abuelo">
                                <li class="item-efectividad active">
                                    <a class="btn-efectividad" href="#"><span>1</span>Ayer</a>
                                </li>
                                <li class="item-efectividad">
                                    <a class="btn-efectividad" href="#"><span>2</span>7 días</a>
                                </li>
                                <li class="item-efectividad">
                                    <a class="btn-efectividad" href="#"><span>3</span>30 días</a>
                                </li>
                                <li class="item-efectividad">
                                    <a class="btn-efectividad" href="#"><span>4</span>90 días</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
        </div>
        <div class="col-xs-12 col-md-6">
            <section class="panel">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>
                    <h2 class="panel-title">
                        {{ $dia_sem }} {{ $arrayFecha[0] }}<br>
                        <small>{{ $mes }} {{ $arrayFecha[3] }}</small>
                    </h2>
                </header>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                                <div class="panel-body">
                                  @if( count($agentes) > 0)
                                    <!--div class="panel-body" data-loading-overlay data-loading-overlay-options='{ "startShowing": true }' style="min-height: 150px;" ic-get-from="/example-lazy-load" ic-trigger-on="load"-->
                                    <div class="alert alert-default">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        <a href="" class="alert-link">&nbsp;&nbsp;{{ $acciones }}</a>&nbsp;&nbsp;<strong>Acciones</strong> pendientes.
                                    </div>
                                    <br>
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label" for="w1-agente">Seleccionar Agente</label>
                                            <div class="col-md-8">
                                                <select class="form-control" id="w1-agente" name="agente_id">
                                                    @foreach($agentes as $agente)
                                                        <option value="{{ $agente->id }}">{{ $agente->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div><br>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5" style="margin-right: 1px; padding-right: 1px;">
                                                <button type="button" class="btn btn-default btn-block"><i class="fa fa-refresh"></i> Sincronizar</button>
                                            </div>
                                            <div class="col-md-1" style="margin-left: 1px; padding-left: 1px;">
                                                <i class="el el-info-circle" data-toggle="tooltip" data-placement="bottom" title="Descripción del botón de Sincronizar."></i>
                                            </div>
                                            <div class="col-md-4 col-md-offset-1">
                                                <a href="{{ route('acciones.create') }}" class="btn btn-warning btn-block"><i class="fa fa-plus"></i> Acción</a>
                                            </div>
                                        </div>
                                  @else
                                    <h4>Acciones Pendientes</h4>
                                    <!--
                                    <div class="alert alert-warning">
                                        Aún no ha dado de alta a ningún Agente Inmobiliario.<br>
                                        <a href="{{ route('agentes.create')}}" class="alert-link"><strong>Agregar Agente.</strong></a>
                                    </div>-->
                                  @endif
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>