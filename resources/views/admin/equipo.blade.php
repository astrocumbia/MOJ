@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Stats -->

        <!-- END Stats -->


        <!-- Page Content -->
        <div class="content">

            <div class="row" style="padding: 0px 15px 20px 0px">
                <div class="col-md-12">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-fadein" type="button">
                        <i class="fa fa-plus"></i> Crear Equipo
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
                                <th class="text-center" style="width: 50px;">id</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Integrantes</th>
                                <th class="text-center">Universidad</th>
                                <th class="text-center">Couch</th>
                                <th class="text-center">Categoria</th>
                                <th class="text-center" style="width: 100px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($teams as $team)
                                <tr>
                                    <td class="text-center"> {{$team->id}} </td>
                                    <td class="text-left"> {{$team->nombre}} </td>
                                    <td>Irvin Castellanos Juarez,<br /> Pepito <br/> Galtzia</td>
                                    <td> {{$team->universidad}} </td>
                                    <td class="text-center">None</td>
                                    <td class="text-center"><span class="label label-info">{{$team->categoria}}</span></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button
                                                class="btn btn-xs btn-default" 
                                                data-toggle="modal" 
                                                data-target="#modal-edit" 
                                                onclick="loadTeam( {'_token':'{{csrf_token()}}', 'id' : '{{ $team->id }}'} , '{{ url('/admin/team/load') }}' )"
                                                type="button">
                                                    <i class="fa fa-pencil"></i>
                                            </button>
                                            <a class="btn btn-xs btn-default" href="/admin/team/del/{{$team->id}}" ><i class="fa fa-times"></i></a>
                                        </div>
                                    </td>
                                </tr>                                
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Header BG Table -->
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    {!! $teams->render() !!}
                </div>
            </div>


        </div>
        <!-- END Page Content -->


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
                            <h3 class="block-title">Crear un nuevo equipo</h3>
                        </div>

                        <div class="block-content">

                            <form class="form-horizontal push-5-t" action="/admin/team/add" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="col-xs-12" for="nombre">Nombre</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombre de equipo">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Universidad</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="universidad" name="universidad" >
                                            <option value="Universidad Tecnológica de la Mixteca">Universidad Tecnológica de la Mixteca</option>
                                            <option value="Otra">Otra</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Categoria</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="universidad" name="categoria" size="1">
                                            <option value="Junior">Junior</option>
                                            <option value="Senior">Senior</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus push-5-r"></i>Registrar</button>
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
        <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">

                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Editar equipo</h3>
                        </div>

                        <div class="block-content">

                            <form class="form-horizontal push-5-t" action="/admin/team/edit" method="post">
                                {!! csrf_field() !!}

                                <input type="hidden" id="ide" name="id" /> 
                                <div class="form-group">
                                    <label class="col-xs-12" for="nombre">Nombre</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="nombree" name="nombre" placeholder="Nombre de equipo">
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Universidad</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="universidade" name="universidad" >
                                            <option value="Universidad Tecnológica de la Mixteca">Universidad Tecnológica de la Mixteca</option>
                                            <option value="Otra">Otra</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Categoria</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="categoriae" name="categoria" size="1">
                                            <option value="Junior">Junior</option>
                                            <option value="Senior">Senior</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus push-5-r"></i>Guardar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Fade In Modal -->




    </main>
    <!-- END Main Container -->




@include('admin.includes.footer')