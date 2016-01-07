@include('contest.includes.head')

<!-- Main Container -->
<main id="main-container">

            <ul class="nav nav-pills push col-md-12 col-md-offset-3"  style="padding: 60px 0px;">
                <li>
                    <a href="{{url('/contest/problemas')}}/{{$contest->id}}" >
                        <i class="fa fa-file-code-o"></i>
                        Problemas
                    </a>
                </li>
            
                <li >
                    <a  href="{{url('/contest/envios')}}/{{$contest->id}}" >
                        <i class="fa fa-paper-plane-o"></i>
                                Envios
                    </a>
                </li>
                <li class="active">
                    <a  href="{{url('/contest/clarificaciones')}}/{{$contest->id}}">
                        <i class="fa fa-weixin"></i>
                                Clarificaciones
                    </a>
                </li>
                <li>
                    <a  href="{{url('/contest/score')}}/{{$contest->id}}">
                        <i class="fa fa-trophy"></i>
                                Scoreboard
                    </a>
                </li>
            </ul>


        <div class="content">
            <div class="row">
                <button class="btn btn-primary pull-right" style="margin: 0px 25px 20px 0px;" data-toggle="modal" data-target="#nuevomensajemodal" type="button"><i class="fa fa-send"></i>  Enviar mensaje</button>
                <div class="col-md-12">
                    <div class="block">
                        <ul class="nav nav-tabs nav-tabs-left" data-toggle="tabs">
                            <li class="active">
                                <a href="#entrada">Buzón de entrada</a>
                            </li>
                            <li>
                                <a href="#enviados">Enviados</a>
                            </li>
                        </ul>
                        <div class="block-content tab-content">
                            <div class="tab-pane active" id="entrada">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block">
                                            <div class="block-content">
                                                <div class="pull-r-l">
                                                    <table class="table table-hover table-vcenter">
                                                        <tbody>

                                                        @foreach( $recibidos as  $mensaje)

                                                            <tr id="msg{{ $mensaje->id }}" @if($mensaje->estado == 0 ) class="info" @endif>
                                                                <td class="text-center font-w600" style="width: 200px;">{{ $mensaje->id_usuario }}</td>
                                                                <td class="text-center">
                                                                    <a class="font-w600" data-toggle="modal" data-target="#mensaje-modal" onclick="loadMsg( { 'id' : '{{ $mensaje->id }}' , '_token':'{{csrf_token()}}'}  , '{{ url('contest/clarificaciones/getMsg') }}')" >{{ $mensaje->asunto }}</a>
                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="enviados">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="block">
                                            <div class="block-content">
                                                <div class="pull-r-l">
                                                    <table class="table table-hover table-vcenter">
                                                        <tbody>

                                                        @foreach( $enviados  as $mensaje )
                                                            <tr>
                                                                <td class="text-center font-w600" style="width: 200px;">{{ $mensaje->id_usuario }}</td>
                                                                <td class="text-center">
                                                                    <a class="font-w600" data-toggle="modal" data-target="#mensaje-modal" onclick="loadMsg( { 'id' : '{{ $mensaje->id }}' , '_token':'{{csrf_token()}}'}  , '{{ url('contest/clarificaciones/getMsg') }}')" >{{ $mensaje->asunto }}</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>


<!-- Message Modal -->
<div class="modal fade" id="mensaje-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">

                    <h3 class="block-title"> Mensaje:</h3>

                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="block-content" style="padding: 40px 40px " id="cuerpo-mensaje" ></div>
            </div>
        </div>
    </div>
</div>
<!-- END Message Modal -->



<!-- Compose Modal -->
<div class="modal fade" id="nuevomensajemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><i class="fa fa-pencil"></i>  Nuevo mensaje</h3>
                </div>
                <div class="block-content">
                    <form class="form-horizontal push-10-t push-10" action="{{url('/contest/clarificaciones/add')}}" method="post">

                        {!! csrf_field() !!}

                        <div class="form-group hidden">
                            <div class="form-material form-material-info">
                                <div class="col-xs-12">
                                    <input class="form-control" type="text" id="id_concurso" name="id_concurso" value="{{$contest->id}}">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating input-group">
                                    <input class="form-control" type="text" id="asunto" name="asunto">
                                    <label for="message-subject">Asunto</label>
                                    <span class="input-group-addon"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-primary floating">
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="6"></textarea>
                                    <label for="message-msg">Mensaje</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-send push-5-r"></i> Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Compose Modal -->



@include('contest.includes.footer') 