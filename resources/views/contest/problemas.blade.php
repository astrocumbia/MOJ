@include('contest.includes.head')
        <!-- Main Container -->
    <main id="main-container">

            <ul class="nav nav-pills push col-md-12 col-md-offset-3"  style="padding: 60px 0px;">
                <li class="active">
                    <a href="/contest/problemas/{{$contest->id}}" >
                        <i class="fa fa-file-code-o"></i>
                        Problemas
                    </a>
                </li>
            
                <li >
                    <a  href="/contest/envios/{{$contest->id}}" >
                        <i class="fa fa-paper-plane-o"></i>
                                Envios
                    </a>
                </li>
                <li>
                    <a  href="/contest/clarificaciones/{{$contest->id}}">
                        <i class="fa fa-weixin"></i>
                                Clarificaciones
                    </a>
                </li>
                <li>
                    <a  href="/contest/score/{{$contest->id}}">
                        <i class="fa fa-trophy"></i>
                                Scoreboard
                    </a>
                </li>
            </ul>


        <!-- Page Content -->
        <div class="content">

            <div class="row" style="padding: 0px 15px 10px 0px">
                <div class="col-md-12">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-fadein" type="button">
                        <i class="fa fa-send"></i>  Agregar problema
                    </button>
                </div>
            </div>


            <div class="col-lg-12">
                <!-- Header BG Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-striped table-borderless table-header-bg">
                            <thead>
                            <tr>
                                <th class="text-center">Nombre</th>                                                                                      
                                <th class="text-center">Problema</th>
                                <th class="text-center">Color</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $contest->problems()->get() as  $problem )
                            <tr>                        
                                <td class="text-center">{{$problem->nombre}}</td>
                                <td class="text-center"><a class="link-effect" onclick="showFile( { 'name' : '{{ $problem->pdf }}' , '_token':'{{csrf_token()}}'} , '{{ url('contest/problemas/showDescription') }}' )" >PDF</a></td>
                                <td class="text-center"><i class="fa fa-flag" style="font-size: 2em; color: {{App\Problem::getColor($contest->id,$problem->id)}};"></i></td>
                                <td class="text-center">
                                    @if( $problem->categoria == 1 )
                                        <span class="label label-primary">Senior</span>
                                    @else
                                        <span class="label label-success">Junior</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modal-editar" type="button" onclick="editarProblema({{$problem->id}});">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Header BG Table -->
            </div>
    </div>
</main>



            <!-- Fade In Modal -->
            <div class="modal fade" id="modal-fadein" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent remove-margin-b">

                            <div class="block-header bg-primary-dark">
                                <ul class="block-options">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                    </li>
                                </ul>
                                <h3 class="block-title"><i class="fa fa-send"></i> Agregar problemas</h3>
                            </div>

                            <div class="block-content">

                                <form class="form-horizontal push-10-t push-10" action="/contest/problemas/save" method="post" >
                                    {!! csrf_field() !!}

                                    <input value="{{$contest->id}}" name="contest_id" id="contest_id" type="hidden" />


                                    <div class="form-group">
                                        <label class="col-md-3 " for="example-select2">Problema: </label>
                                        <div class="col-md-9">
                                            <select class="js-select2 form-control" id="problem_id" name="problem_id" style="width: 100%;" data-placeholder="Choose one..">
                                                @foreach( $problemas as $problema )
                                                    <option value="{{$problema->id}}">{{$problema->nombre}}</option>    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 " for="color">Color: </label>
                                        <div class="col-md-9">
                                            <input type="color" class="form-control" id="color" name="color"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger pull-right" type="submit"><i class="fa fa-remove"></i> Cancelar</button>
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
            <!-- END Fade In Modal -->

            <!-- Fade In Modal -->
            <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent remove-margin-b">

                            <div class="block-header bg-primary-dark">
                                <ul class="block-options">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                    </li>
                                </ul>
                                <h3 class="block-title"><i class="fa fa-send"></i> Editar Problema</h3>
                            </div>

                            <div class="block-content">

                                <form class="form-horizontal push-10-t push-10" action="/contest/problemas/update" method="post" >
                                    {!! csrf_field() !!}


                                    <input value="{{$contest->id}}" name="contest_id" id="contest_id" type="hidden" />

                                    <input value="" name="problem_id" id="eproblem_id" type="hidden"/>

                                    <div class="form-group">
                                        <label class="col-md-3 " for="color">Color: </label>
                                        <div class="col-md-9">
                                            <input type="color" class="form-control" id="color" name="color"/>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger pull-right" type="submit"><i class="fa fa-remove"></i> Cancelar</button>
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
            <!-- END Fade In Modal -->            
@include('contest.includes.footer')


