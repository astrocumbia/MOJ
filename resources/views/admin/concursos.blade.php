@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">




            <div class="row" style="padding: 0px 0px 20px 0px">
                <div class="col-md-6">
                <h2>Concursos</h2>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success pull-right" 
                            data-toggle="modal" data-target="#modal-fadein" 
                            type="button"><i class="fa fa-plus"></i> Crear nuevo concurso</button>
                </div>
            </div>


            <div class="block">
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 80px;"><i class="si si-user"></i></th>
                                <th>Nombre</th>
                                <th style="width: 25%;">Descripcion</th>
                                <th style="width: 10%;">Inicio</th>
                                <th style="width: 10%;">Cierre</th>
                                <th style="width: 5%;">Estado</th>
                                <th style="width: 10%;">Tipo</th>
                                <th class="text-center" style="width: 100px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($concursos as $concurso)
                                <tr>
                                    <td class="text-center">
                                        <img class="img-avatar img-avatar48" src="{{ asset('img/avatars/user.png') }}" />
                                    </td>
                                    <td class="font-w600">
                                        <a class="link-effect" href="/contest/">{{$concurso->nombre}}</a>
                                    </td>
                                    <td>{{$concurso->descripcion}}</td>
                                    <td>{{$concurso->fecha_inicio}} {{$concurso->hora_inicio}}</td>
                                    <td>{{$concurso->fecha_fin}} {{$concurso->hora_fin}}</td>
                                    <td>
                                        <span class="label label-success">Activo</span>
                                    </td>
                                    @if ( $concurso->acceso == 1)
                                        <td>Público</td>
                                    @else
                                        <td>Privado</td>
                                    @endif
                                    
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-primary" 
                                                    type="button" 
                                                    data-toggle="modal" 
                                                    data-target="#modal-edit"
                                                    title="Edit Client"
                                                    onclick="loadContest( {'_token':'{{csrf_token()}}', 'id' : '{{ $concurso->id }}'} , '{{ url('/admin/contest/load') }}' )"
                                                    >
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <a class="btn btn-danger" href="/admin/contest/del/{{$concurso->id}}"><i class="fa fa-times"></i><a/>
                                        </div>
                                    </td>
                                </tr>                                
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        {!! $concursos->render() !!}
                    </div>
                </div>
                
            </div>

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- MODAL CREAR CONCURSO -->
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
                        <h3 class="block-title">Crear un nuevo concurso</h3>
                    </div>

                    <div class="block-content">

                        <form class="form-horizontal push-10-t push-10" action="/admin/contest/save" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input autofocus class="form-control" 
                                                type="text" id="nombre" 
                                                name="nombre" autofocus required>
                                        <label for="nombre">nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de inicio</label>
                                    <input  class="js-datepicker form-control" 
                                            id="fecha_inicio" 
                                            name="fecha_inicio" 
                                            data-date-format="yyyy-mm-dd" 
                                            placeholder="yyyy-mm-dd" 
                                            >
                                    
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de inicio</label>
                                    <input class="form-control" 
                                            type="text" id="hora_ini" 
                                            name="hora_inicio" placeholder="HH:MM"
                                            required >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de cierre</label>
                                    <input  class="js-datepicker form-control" 
                                            id="fecha_fin" 
                                            name="fecha_fin" 
                                            data-date-format="yyyy-mm-dd" 
                                            placeholder="yyyy-mm-dd" 
                                            required
                                            >
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de cierre</label>
                                    <input class="form-control" 
                                            type="text" id="hora_fin" 
                                            name="hora_fin" placeholder="HH:MM"
                                            required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-xs-12" for="descripcion">Descripción:</label>
                                <div class="col-xs-12">
                                                <textarea class="form-control" id="descripcion" name="descripcion" rows="7" placeholder="Enter your message..">
                                                </textarea>

                                </div>
                            </div>




                            <div class="form-group">
                                <div class="col-xs-12">
                                    <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus push-5-r"></i> Crear</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODAL CREAR CONCURSO -->

    <!-- MODAL  -->
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
                        <h3 class="block-title">Editar concurso</h3>
                    </div>

                    <div class="block-content">

                        <form class="form-horizontal push-10-t push-10" action="/admin/contest/edit" method="post" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="id" id="ide" />

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input autofocus class="form-control" 
                                                type="text" id="nombree" 
                                                name="nombre" required>
                                        <label for="nombre">nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de inicio</label>
                                    <input  class="js-datepicker form-control" 
                                            id="fecha_inie" 
                                            name="fecha_inicio" 
                                            data-date-format="yyyy-mm-dd" 
                                            placeholder="yyyy-mm-dd" 
                                            >
                                    
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de inicio</label>
                                    <input class="form-control" 
                                            type="text" id="hora_inie" 
                                            name="hora_inicio" placeholder="HH:MM"
                                            required >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de cierre</label>
                                    <input  class="js-datepicker form-control" 
                                            id="fecha_fine" 
                                            name="fecha_fin" 
                                            data-date-format="yyyy-mm-dd" 
                                            placeholder="yyyy-mm-dd" 
                                            required
                                            >
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de cierre</label>
                                    <input class="form-control" 
                                            type="text" id="hora_fine" 
                                            name="hora_fin" placeholder="HH:MM"
                                            required>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="col-xs-12" for="descripcion">Descripción:</label>
                                <div class="col-xs-12">
                                                <textarea class="form-control" id="descripcione" name="descripcion" rows="7" placeholder="Enter your message..">
                                                </textarea>

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






@include('admin.includes.footer')