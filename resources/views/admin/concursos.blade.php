@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Stats -->

        <!-- END Stats -->

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
                                <th style="width: 15%;">Fecha</th>
                                <th style="width: 10%;">Hora</th>
                                <th style="width: 10%;">Duración</th>
                                <th style="width: 5%;">Estado</th>
                                <th style="width: 10%;">Tipo</th>
                                <th class="text-center" style="width: 100px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">
                                    <img class="img-avatar img-avatar48" src="assets/img/logoutm.jpg" alt="">
                                </td>
                                <td class="font-w600"><a>Segundo concurso de programación de la mixteca</a></td>
                                <td>7 de enero de 2015</td>
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

                        <form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <div class="form-material floating">
                                        <input autofocus class="form-control" type="text" id="nombre" name="nombre">
                                        <label for="nombre">nombre</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-4">
                                    <label for="fecha">Fecha de inicio</label>
                                    <input class="form-control" type="text" id="fecha" name="fecha"  placeholder="DD-MM-YYYY">
                                </div>
                                <div class="col-xs-4">
                                    <label for="fecha">Hora de inicio</label>
                                    <input class="form-control" type="text" id="hora" name="hora" placeholder="HH:MM">
                                </div>
                                <div class="col-xs-4">
                                    <label for="fecha">Duración</label>
                                    <input class="form-control" type="text" id="duracion" name="duracion" placeholder="HH:MM">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-xs-12">Acceso:</label>
                                <div class="col-xs-12">
                                    <label class="radio-inline" for="publico">
                                        <input type="radio" id="publico" name="publico" value="1"> Público
                                    </label>
                                    <label class="radio-inline" for="privado">
                                        <input type="radio" id="privado" name="privado" value="0"> Privado
                                    </label>
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
                                <label class="col-xs-12">Tipo:</label>
                                <div class="col-xs-12">
                                    <label class="radio-inline" for="individual">
                                        <input type="radio" id="individual" name="individual" value="1"> Individual
                                    </label>
                                    <label class="radio-inline" for="equipo">
                                        <input type="radio" id="equipo" name="equipo" value="0"> Equipos
                                    </label>
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

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps Block -->
            <div class="block block-themed block-transparent">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Apps</h3>
                </div>
                <div class="block-content">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="index.html">
                                <div class="block-content text-white bg-default">
                                    <i class="si si-speedometer fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Backend</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="block block-rounded" href="frontend_home.html">
                                <div class="block-content text-white bg-modern">
                                    <i class="si si-rocket fa-2x"></i>
                                    <div class="font-w600 push-15-t push-15">Frontend</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Apps Block -->
        </div>
    </div>
</div>
<!-- END Apps Modal -->

@include('admin.includes.footer')