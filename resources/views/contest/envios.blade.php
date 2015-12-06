
        <!-- END Stats -->

        <!-- Page Content -->
        <div class="content">

            <div class="row" style="padding: 0px 15px 10px 0px">
                <div class="col-md-12">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-fadein" type="button"><i class="fa fa-send"></i>  Enviar problema</button>
                </div>
            </div>


            <div class="col-lg-12">
                <!-- Bordered Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">id</th>
                                <th class="text-center">problema</th>
                                <th class="text-center">alias</th>
                                <th class="text-center" style="width: 20%;">Estado</th>
                                <th class="text-center" style="width: 100px;">Veredicto</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-center">1293</td>
                                <td class="text-center">Suma de números</td>
                                <td class="text-center">A</td>
                                <td class="text-center">
                                    <span class="label label-info">Enviado</span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-info"></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1221</td>
                                <td class="text-center">Los puentes de Kracovia</td>
                                <td class="text-center">B</td>
                                <td class="text-center">
                                    <span class="label label-info">Juzgado</span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-success">Aceptado</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">1523</td>
                                <td class="text-center">Rayo láser</td>
                                <td class="text-center">F</td>
                                <td class="text-center">
                                    <span class="label label-info">Juzgado</span>
                                </td>
                                <td class="text-center">
                                    <span class="label label-danger">Error de compilación</span>
                                </td>
                            </tr>




                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Bordered Table -->
            </div>



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
                                <h3 class="block-title"><i class="fa fa-send"></i> Enviar un nuevo problema</h3>
                            </div>

                            <div class="block-content">

                                <form class="form-horizontal push-10-t push-10" action="base_forms_premade.html" method="post" onsubmit="return false;">

                                    <div class="form-group">
                                        <label class="col-md-3 " for="example-select2">Problema: </label>
                                        <div class="col-md-9">
                                            <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                                <option value="1">A - suma de números</option>
                                                <option value="2">B - Puentes de Acatlima</option>
                                                <option value="3">C - Mochilazo</option>
                                                <option value="4">D - El cumpleaños del pochu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 " for="example-select2">Lenguaje: </label>
                                        <div class="col-md-9">
                                            <select class="js-select2 form-control" id="example-select2" name="example-select2" style="width: 100%;" data-placeholder="Choose one..">
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
                                            <input type="file" id="example-file-input" name="example-file-input">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <button class="btn btn-sm btn-danger pull-right" type="submit"><i class="fa fa-remove"></i> Cancelar</button>
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


        </div>
        <!-- END Page Content -->



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
