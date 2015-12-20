@include('contest.includes.head')

<!-- Main Container -->
<main id="main-container">


        <ul class="nav nav-pills push col-md-12 col-md-offset-3"  style="padding: 60px 0px;">
            <li >
                <a href="/contest/problemas" >
                    <i class="fa fa-file-code-o"></i>
                    Problemas
                </a>
            </li>

            <li class="active">
                <a  href="/contest/envios" >
                    <i class="fa fa-paper-plane-o"></i>
                            Envios
                </a>
            </li>
            <li>
                <a  href="/contest/clarificaciones">
                    <i class="fa fa-weixin"></i>
                            Clarificaciones
                </a>
            </li>
            <li>
                <a  href="/contest/score">
                    <i class="fa fa-trophy"></i>
                            Scoreboard
                </a>
            </li>
        </ul>
        
        <!-- Page Content -->
        <div class="content">

            @if( Auth::user()->rol == 3 )
                <div class="row" style="padding: 0px 15px 10px 0px">
                    <div class="col-md-12">
                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalenviar" type="button"><i class="fa fa-send"></i>  Enviar problema</button>
                    </div>
                </div>
            @endif


            <div class="col-lg-12">
                <!-- Bordered Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                @if( Auth::user()->rol == 1 || Auth::user()->rol == 2 )
                                    <th class="text-center" style="width: 50px;">id</th>
                                    <th class="text-center">Problema</th>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Lenguaje</th>
                                    <th class="text-center" style="width: 20%;">Estado</th>
                                    <th class="text-center" style="width: 100px;">Veredicto</th>
                                    <th class="text-center">Juzgar</th>
                                @elseif( Auth::user()->rol == 3 )
                                    <th class="text-center" style="width: 50px;">id</th>
                                    <th class="text-center">Problema</th>
                                    <th class="text-center" style="width: 20%;">Estado</th>
                                    <th class="text-center" style="width: 100px;">Veredicto</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                @if( Auth::user()->rol == 1 || Auth::user()->rol == 2 )
                                    @foreach( $envios as $envio )
                                        <td class="text-center">{{ $envio->id }}</td>
                                        <td class="text-center">{{ $envio->id_problema }}</td>
                                        <td class="text-center">Código</td>
                                        <td class="text-center">
                                            @if( $envio->lenguaje == 1 )
                                                <span class="label label-info">
                                                    C
                                                </span>
                                            @elseif( $envio->lenguaje == 2 )
                                                <span class="label label-info">
                                                    C++
                                                </span>
                                            @else
                                                <span class="label label-info">
                                                    Java
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if( $envio->estado == 1 )
                                                <span class="label label-info">
                                                    Enviado
                                                </span>
                                            @else
                                                <span class="label label-success">
                                                    Juzgado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if( $envio->veredicto == 1 )
                                                <span class="label label-success">Aceptado</span>
                                            @elseif( $envio->veredicto == 2 )
                                                <span class="label label-danger">Respuesta incorrecta</span>
                                            @elseif( $envio->veredicto == 3)
                                                <span class="label label-danger">Error de compilación</span>
                                            @elseif( $envio->veredicto == 4)
                                                <span class="label label-danger">Tiempo límite excedido</span>
                                            @elseif( $envio->veredicto == 5)
                                                <span class="label label-danger">Memoria límite excedida</span>
                                            @else
                                                <span class="label label-danger"></span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-success pull-right" data-toggle="modal" data-target="#judgemodal" type="button"><i class="fa fa-gavel"></i></button>
                                        </td>
                                    @endforeach
                                @else
                                    @foreach( $envios as $envio )
                                        <td class="text-center">{{ $envio->id }}</td>
                                        <td class="text-center">{{ $envio->id_problema }}</td>
                                        <td class="text-center">
                                            @if( $envio->estado == 1 )
                                                <span class="label label-info">
                                                    Enviado
                                                </span>
                                            @else
                                                <span class="label label-success">
                                                    Juzgado
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if( $envio->veredicto == 1 )
                                                <span class="label label-success">Aceptado</span>
                                            @elseif( $envio->veredicto == 2 )
                                                <span class="label label-danger">Respuesta incorrecta</span>
                                            @elseif( $envio->veredicto == 3)
                                                <span class="label label-danger">Error de compilación</span>
                                            @elseif( $envio->veredicto == 4)
                                                <span class="label label-danger">Tiempo límite excedido</span>
                                            @elseif( $envio->veredicto == 5)
                                                <span class="label label-danger">Memoria límite excedida</span>
                                            @else
                                                <span class="label label-danger"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                @endif
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Bordered Table -->
            </div>
        </div>
        <!-- END Page Content -->
</main>





                    <div class="modal fade" id="modalenviar" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="block block-themed block-transparent remove-margin-b">

                                    <div class="block-header bg-primary-dark">
                                        <ul class="block-options">
                                            <li>
                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                            </li>
                                        </ul>
                                        <h3 class="block-title"><i class="fa fa-send"></i> Enviar un nuevo problema</h3>
                                    </div>

                                    <div class="block-content">

                                        <form class="form-horizontal push-10-t push-10" action="/contest/envios/addRun" method="post" enctype="multipart/form-data">

                                            {!! csrf_field() !!}
                                            <div class="form-group hidden">
                                                <div class="form-material form-material-info">
                                                    <div class="col-xs-12">
                                                        <input class="form-control" type="text" id="id_concurso" name="id_concurso" value="{{$contest->id}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 " for="example-select2">Problema: </label>
                                                <div class="col-md-9">
                                                    <select class="js-select2 form-control" id="id_problema" name="id_problema" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                        @foreach( $contest->problems()->get() as $problema )
                                                            <option value="{{$problema->id}}">{{$problema->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-3 " for="example-select2">Lenguaje: </label>
                                                <div class="col-md-9">
                                                    <select class="js-select2 form-control" id="lenguaje" name="lenguaje" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                        <option value="1">C</option>
                                                        <option value="2">C++</option>
                                                        <option value="3">Java</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-xs-3" for="example-file-input">Archivo: </label>
                                                <div class="col-xs-9">
                                                    <input type="file" id="codigo" name="codigo">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <div class="col-md-10">
                                                    <button data-dismiss="modal" class="btn btn-sm btn-danger pull-right" type="submit">
                                                        <i class="fa fa-remove"></i> Cancelar
                                                    </button>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-send"></i> Enviar</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


@include('contest.includes.footer')