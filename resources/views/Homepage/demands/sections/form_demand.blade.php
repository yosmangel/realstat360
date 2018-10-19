<div class="modal fade" id="formDemandModal" tabindex="-1" role="dialog" aria-labelledby="formDemandModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="formModalLabel">BÚSQUEDA DE INMUEBLES</h4>
                </div>
                <div class="modal-body"> 
                    <div class="row"> 
                        <div class="col-xs-12">
                            <form action="{{ route('busqueda-inmuebles') }}" method="post">
                                <input name="_token" type="hidden" value = "{{ csrf_token() }}" id="token">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label for="descripcion"><strong>¿Que estás buscando?</strong></label>
                                            <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="3" placeholder="Escriba una breve descripción de lo que estás buscando. Ejemplo: Local comercial en Venta en Madrid." autofocus></textarea>
                                        </div>
                                    </div>
                                </div> 
                                <button type="submit" data-id="busqueda" class="btn btn-warning btn-md btn-search-properties">
                                    <i class="fa fa-refresh fa-spin i-spinner" style="display: none"></i> <i class="fa fa-search i-shown"></i>&nbsp;<strong>BUSCAR INMUEBLES</strong>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-xs-12 text-left">
                        <div id="mensaje" >
                        </div>
                    </div><hr>
                    <div class="col-xs-12 text-center">
                        <button class="btn btn-default btn-md btn-close" type="button">
                            <i class="fa fa-window-close-o" aria-hidden="true"></i>&nbsp;Cerrar
                        </button>
                    </div><br>
                </div>
        </div>
    </div>
</div>

