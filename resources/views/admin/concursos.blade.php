@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">




            <div class="row" style="padding: 0px 0px 20px 0px">
                <div class="col-md-12">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-fadein" type="button"><i class="fa fa-plus"></i> Crear nuevo concurso</button>
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
                                <th style="width: 10%;">Descripcion</th>
                                <th style="width: 15%;">Inicio</th>
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
                                        <img class="img-avatar img-avatar48" src="assets/img/logoutm.jpg" alt="">
                                    </td>
                                    <td class="font-w600">
                                        <a class="link-effect" href="/contest/">{{$concurso->nombre}}</a>
                                    </td>
                                    <td>{{$concurso->descripcion}}</td>
                                    <td>{{$concurso->fecha_inicio}} {{$concurso->hora_inicio}}</td>
                                    <td>16:00 Hrs</td>
                                    <td>3 Hrs</td>
                                    <td>
                                        <span class="label label-success">Activo</span>
                                    </td>
                                    <td>Público</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>                                
                            @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

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
                        <h3 class="block-title">Crear un nuevo concurso</h3>
                    </div>

                    <div class="block-content">

                        <form class="form-horizontal push-10-t push-10" action="/admin/contest/save" method="post" >
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input autofocus class="form-control" type="text" id="nombre" name="nombre" autofocus>
                                        <label for="nombre">nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de inicio</label>
                                    <input class="form-control" type="text" id="fecha_ini" name="fecha_ini"  placeholder="DD-MM-YYYY">
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de inicio</label>
                                    <input class="form-control" type="text" id="hora_ini" name="hora_ini" placeholder="HH:MM">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="fecha">Fecha de cierre</label>
                                    <input class="form-control" type="text" id="fecha_fin" name="fecha_fin"  placeholder="DD-MM-YYYY">
                                </div>
                                <div class="col-xs-6">
                                    <label for="fecha">Hora de cierre</label>
                                    <input class="form-control" type="text" id="hora_fin" name="hora_fin" placeholder="HH:MM">
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
    <!-- END Fade In Modal -->

<!-- END Page Container -->
<script type="text/javascript">
    $('#datetimepicker4').datetimepicker();
</script>
@include('admin.includes.footer')