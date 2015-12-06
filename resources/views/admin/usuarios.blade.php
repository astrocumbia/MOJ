@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Stats -->

        <!-- END Stats -->











        <!-- Page Content -->
        <div class="content">

            <div class="row" style="padding: 0px 15px 20px 0px">
                <div class="col-md-12">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-fadein" type="button"><i class="fa fa-plus"></i> Crear Usuario</button>
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
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Universidad</th>
                                <th class="text-center">email</th>
                                <th class="text-center">Equipo</th>
                                <th class="text-center" style="width: 15%;">Tipo</th>
                                <th class="text-center" style="width: 100px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Positr0niz</td>
                                <td>Irvin Castellanos Juarez</td>
                                <td>Universidad Tecnológica de la Mixteca</td>
                                <td class="text-center">Irvin@mictlan.mx</td>
                                <td class="text-center">StringTokenizer</td>
                                <td class="text-center">
                                    <span class="label label-success">Administrador</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Editar usuario"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Eliminar usuario"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">DanielAlxx</td>
                                <td >Daniel Alejandro Hernández Gómez</td>
                                <td >Universidad Tecnológica de la Mixteca</td>
                                <td class="text-center">daniel@mictlan.mx</td>
                                <td class="text-center">StringTokenizer</td>
                                <td class="text-center">
                                    <span class="label label-info">Juez</span>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Editar usuario"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Eliminar usuario"><i class="fa fa-times"></i></button>
                                    </div>
                                </td>
                            </tr>





                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Header BG Table -->
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
                            <h3 class="block-title">Crear un nuevo usuario</h3>
                        </div>

                        <div class="block-content">

                            <form class="form-horizontal push-5-t" action="base_forms_premade.html" method="post" onsubmit="return false;">

                                <div class="form-group">
                                    <label class="col-xs-12" for="nombre">Nombre</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12" for="apellidop">Apellido paterno</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="apellidop" name="apellidop" placeholder="Ingresa tu apellido paterno...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="apellidom">Apellido materno</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="apellidom" name="apellidom" placeholder="Ingresa tu apellido materno...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="username">Usuario</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario...">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Universidad</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="universidad" name="universidad" size="1">
                                            <option value="1">Universidad Tecnológica de la Mixteca</option>
                                            <option value="2">Instituto Tecnológico de Oaxaca</option>
                                            <option value="3">Universidad Autónoma Benito Juárez de Oaxaca</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="contact1-subject">Rol</label>
                                    <div class="col-xs-12">
                                        <select class="form-control" id="rol" name="rol" size="1">
                                            <option value="1">Administrador</option>
                                            <option value="2">Juez</option>
                                            <option value="3">Concursante   </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="email">Correo electrónico</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Ingresa tu correo...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12" for="register1-password">Contraseña</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Ingresa tu contraseña">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12" for="password2">confirma tu contraseña</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirma tu contraseña...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus push-5-r"></i> Registrar</button>
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