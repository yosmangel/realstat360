<!-- PREGUNTAS DEL INMUEBLES -->
<div id="preguntas" class="detail-address detail-block target-block">
    <div class="detail-title">
      <h2 class="title-left">PREGUNTAS SOBRE EL INMUEBLE</h2>
        <!--div class="title-right">
        </div-->
    </div>
      @if( count($inmueble) > 0 )
      <div class="row">
          <div class="col-xs-12">
            @if(count($comments) > 0 || count($inicio) > 0)
            <div class="well">
              @foreach($comments as $comment)
                  @if($comment->respuesta == 0)
                    <!-- PARTE DE PREGUNTAS -->
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;
                      <small><em>{{ $interesado->name }} </em></small>&nbsp;<sup><i class="fa fa-comment-o" aria-hidden="true"></i></sup>
                    &nbsp;{{ $comment->comment }}
                    <small></small><br>
                  @else
                    <!-- PARTE DE RESPUESTAS -->
                    <small class="respuesta">
                    <i class="fa fa-user-circle-o" aria-hidden="true" style="color: #ABAFB5;"></i>&nbsp;
                      <em>{{ $propietario->name }}</em>
                      <sup><i class="fa fa-comments-o" aria-hidden="true"></i></sup>
                      &nbsp;{{ $comment->comment }}
                    </small><br>
                  @endif
              @endforeach
                <hr style="border: 1px dash #938686;">
                <a class="link-responder" role="button" data-toggle="collapse" href="#respuesta" aria-expanded="false" aria-controls="respuesta">
                  <em>Responder...</em>
                </a>
                <div class="collapse" id="respuesta">
                  
                  <!-- FORMULARIO DE LA RESPUESTA DEL PROPIETARIO -->
                  <form action="{{ route('inmueble.answer',$inmueble->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="media">
                      <div class="media-body">
                          <div class="form-group has-default has-feedback">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                              <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Tu respuesta..."></textarea>
                            </div>
                          </div>
                      </div>
                      <div class="media-right">
                        <button type="submit" class="btn btn-orange">Enviar</button>
                      </div>
                    </div>
                    <input type="hidden" name="interesado_id" value="{{ $comment->interesado_id }}"> <!--  comment->quien_pregunta_id  -->
                  </form>

                </div>
            </div>
            @else
              
              <!-- FORMULARIO DE PREGUNTAS DEL INTERESADO -->
              @if($inmueble->user_id != Auth::user()->id)
                <form action="{{ route('inmueble.comment',$inmueble->id) }}" method="POST">
                  {{ csrf_field() }}
                  <div class="media">
                    <div class="media-body">
                        <div class="form-group has-warning has-feedback">
                          <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-comment-o" aria-hidden="true"></i></span>
                            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Escribe una pregunta..."></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="media-right">
                      <button type="submit" class="btn btn-warning">Enviar</button>
                    </div>
                  </div>
                </form>
              @endif
              <!-- FIN FORMULARIO DE PREGUNTAS DEL INTERESADO -->
              
            @endif
          </div>
      </div>
      @else
        <div class="well">
          <h3>No hay preguntas sobre este inmueble.</h3>
        </div>
      @endif
</div>