@extends('Homepage.layouts.app')
@section('title', 'Agenda')
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}"  type="text/css" />
@endsection
@section('content')
    <div class="body">
            @include('Homepage.partials.header')
            <div role="main" class="main">
                @include('Homepage.propietaries.sections.title_and_breadcrumbs', ['title' => 'Agenda','path' => '/panel-propietario'])
                    <div class="container">
                        <div class="row ">
                            <div class="col-xs-12">
                                <div class="card bottom-md" style="min-height:300px;">
                                    <div class="card-header card-rs360p account-block form-step active" >
                                        <div class="add-title-tab">
                                            <h4>Eventos relativos a mis operaciones de inmuebles&nbsp;</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="card-content" style="min-height:600px;">
                                        <div class="col-xs-12 col-md-8">
                                             @if(count($eventos)>0) 
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                <i class="fa fa-calendar" aria-hidden="true"></i> Fecha
                                                            </th>
                                                            <th>
                                                                <i class="fa fa-check-square-o" aria-hidden="true"></i> Evento
                                                            </th>
                                                            <th>
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Descripción
                                                            </th>
                                                            <th>
                                                                <i class="fa fa-flash" aria-hidden="true"></i> Acción 
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($inmuebles as $inmueble) 
                                                            @if(count($inmueble->agendas)>0)
                                                                @foreach($inmueble->agendas as $agenda)
                                                                    <tr id="row-{{ $agenda->id }}">
                                                                        <td width="20%">
                                                                            {{ $agenda->date }}
                                                                        </td>
                                                                        <td width="20%">
                                                                            <strong>REF-{{ $inmueble->id }}</strong>: {{ $agenda->title }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $agenda->description }}
                                                                        </td>
                                                                        <td>
                                                                            <form action="{{ url('propietario-agenda-eliminar/'.$agenda->id) }}" method="post">
                                                                                <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                                                                <input type="hidden" name="_method" id="method" value="POST">
                                                                                <a type="submit" class="btn btn-danger btn-sm btn-remove-event" data-valor="{{ $agenda->id }}" >
                                                                                <i class="fa fa-refresh fa-spin" id="i-spinner-{{ $agenda->id }}" style="display: none"></i> <i class="fa fa-times" id="i-shown-{{ $agenda->id }}"></i>&nbsp; <span id="txt-eliminar-{{ $agenda->id }}">Eliminar</span>
                                                                                </a>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif 
                                                        @endforeach 
                                                    </tbody>
                                                </table>
                                            @else
                                                <div class="row">
                                                    <div class="alert alert-secondary">
                                                        Aun no Ha agregado eventos o actividades para sus inmuebles.
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <div class="toggle toggle-primary" data-plugin-toggle>
                                                <section class="toggle active">
                                                    <label>Agregar un evento a la Agenda.</label>
                                                    <div class="toggle-content">
                                                        <br>
                                                        <form id="formInmueble0" method="post" action="{{ route('propietario-agenda-crear') }}" enctype="multipart/form-data">
                                                            <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                                            <input type="hidden" name="_method" id="method" value="POST">
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="date">Fecha del evento</label>
                                                                    <input class="form-control" id="date" name="date" type="date">
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="title">Su Inmueble</label>
                                                                    <select class="form-control" name="inmueble_id" id="id" required>
                                                                        <option value="">:: Seleccionar Inmueble ::</option>
                                                                        @foreach($inmuebles as $inmueble) 
                                                                            <option value="{{ $inmueble->id }}">REF-{{ $inmueble->id }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="title">Título de la nota</label>
                                                                    <input class="form-control" id="title" name="title" placeholder="" type="text" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="description">Descripción</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Redacte la nota sobre el inmueble." required></textarea>
                                                                    <br>
                                                                    <div class="text-right">
                                                                        <button type="submit" data-valor="0" class="btn btn-primary btn-md btn-block btn-create-event">
                                                                            <i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-floppy-o i-shown" aria-hidden="true"></i>&nbsp;
                                                                            <span class="btn-txt">Guardar</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <hr>
            </div>
       @include('Homepage.partials.footer')
    </div>
@endsection
@section('js')
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('front/js/toastr-personalized.js') }}"></script>
@endsection 