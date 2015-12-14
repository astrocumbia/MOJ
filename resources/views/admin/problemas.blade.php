@include('admin.includes.head')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Stats -->

        <!-- END Stats -->




        <!-- Page Content -->
        <div class="content">

            <div class="row" style="padding: 0px 15px 20px 0px">
                <div class="col-md-6">
                    <h2>Problemas</h2>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#addProblemModal" type="button"><i class="fa fa-plus"></i> Crear Problema</button>
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
                                <th class="text-center">Problema</th>
                                <th class="text-center">Entrada</th>
                                <th class="text-center">Salida</th>
                                <th class="text-center">Propietario</th>
                                <th class="text-center">Memoria</th>
                                <th class="text-center">tiempo</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-center" style="width: 100px;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach( $problemas as $problema )

                            <tr>
                                <td class="text-center">{{ $problema->id }}</td>
                                <td>{{ $problema->nombre }}</td>
                                <td class="text-center"><a onclick="showFile( { 'name' : '{{ $problema->pdf }}' , '_token':'{{csrf_token()}}'} , '{{ url('admin/problem/showDescription') }}' )" class="link-effect">Descripcion.pdf</a></td>
                                <td class="text-center"><a class="link-effect" onclick="downloadFile( { 'name' : '{{ $problema->in }}' , '_token':'{{csrf_token()}}'}  , '{{ url('admin/problem/downloadFile') }}')">Entrada</a></td>
                                <td class="text-center"><a class="link-effect" onclick="downloadFile( { 'name' : '{{ $problema->out }}' , '_token':'{{csrf_token()}}'} , '{{ url('admin/problem/downloadFile') }}')">Salida</a></td>
                                <td class="text-center">Positr0nix</td>
                                <td class="text-center">{{$problema->memoria}} MB</td>
                                <td class="text-center">{{$problema->tiempo}} S</td>
                                <td class="text-center">
                                    @if( $problema->categoria == 1 )
                                        <span class="label label-primary">Senior</span>
                                    @else
                                        <span class="label label-success">Junior</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn  btn-info" type="button" data-toggle="modal" data-target="#editProblemModal" onclick="loadProblem({ '_token':'{{csrf_token()}}', 'id' : '{{ $problema->id }}' },'{{ url('admin/problem/load') }}')" > <i class="fa fa-pencil"></i> </button>
                                        <button  class="btn  btn-danger" type="button" data-toggle="tooltip" title="Eliminar problema" onclick="deleteProblem(  { '_token':'{{csrf_token()}}', 'id' : '{{ $problema->id }}' },'{{ url('admin/problem/delete') }}' )" ><i id="btndelete"+{{ $problema->id }} class="fa fa-times"></i></button>
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
                    {!! $problemas->render() !!}
                </div>
            </div>

        </div>
        <!-- END Page Content -->


        <!-- Fade In Modal -->
        <div class="modal fade" id="addProblemModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">

                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Agregar un problema</h3>
                        </div>

                        <div class="block-content">

                            <form class="form-horizontal push-5-t" action="/admin/problem/add" method="POST" enctype="multipart/form-data" id="formadd" >

                                {!! csrf_field() !!}

                                <div class="form-group">
                                    <label class="col-xs-12" for="nombre">Nombre</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre del problema...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="memoria">Memoria (en MB)</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="memoria" name="memoria" placeholder="Memoria límite...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="tiempo">Tiempo (en Segundos)</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="tiempo" name="tiempo" placeholder="Tiempo límite...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="pdf">PDF del problema</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="pdf" name="pdf">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-xs-12" for="entrada">Archivo de entrada</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="entrada" name="entrada">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="salida">Archivo de salida</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="salida" name="salida">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="categoria">Categoría</label>
                                    <div class="col-xs-12">
                                        <select class="js-select2 form-control" id="categoria" name="categoria" style="width: 100%;" data-placeholder="Selecciona una categoría...">
                                            <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                                            <option value="0">General</option>
                                            <option value="2">Senior</option>
                                            <option value="1">Junior</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-10">
                                        <button class="btn btn-sm btn-danger pull-right " onclick="clearProblemsForm()" >Cancelar</button>
                                    </div>
                                    <div class="col-xs-2">
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




        <!-- Fade In Modal -->
        <div class="modal fade" id="editProblemModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="block block-themed block-transparent remove-margin-b">

                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Editar problema</h3>
                        </div>

                        <div class="block-content">

                            <form class="form-horizontal push-5-t" action="/admin/problem/edit" method="POST" enctype="multipart/form-data" id="formedit">

                                {!! csrf_field() !!}


                                <div class="form-group hidden">

                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="ide" name="id" >
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="nombre">Nombre</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="nombree" name="nombre" placeholder="Ingresa el nombre del problema...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="memoria">Memoria (en MB)</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="memoriae" name="memoria" placeholder="Memoria límite...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="tiempo">Tiempo (en Segundos)</label>
                                    <div class="col-xs-12">
                                        <input class="form-control" type="text" id="tiempoe" name="tiempo" placeholder="Tiempo límite...">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="pdf">PDF del problema</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="pdf" name="pdf">
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label class="col-xs-12" for="entrada">Archivo de entrada</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="entrada" name="entrada">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-xs-12" for="salida">Archivo de salida</label>
                                    <div class="col-xs-12">
                                        <input type="file" id="salida" name="salida">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-xs-12" for="categoria">Categoría</label>
                                    <div class="col-xs-12">
                                        <select class="js-select2 form-control" id="categorias" name="categoria" style="width: 100%;" data-placeholder="Selecciona una categoría...">
                                            <option value="0">General</option>
                                            <option value="2">Senior</option>
                                            <option value="1">Junior</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-10">
                                        <a class="btn btn-sm btn-danger pull-right" data-dismiss="modal" onclick="clearProblemsForm()">Cancelar</a>
                                    </div>
                                    <div class="col-xs-2">
                                        <button class="btn btn-sm btn-success pull-right" type="submit"><i class="fa fa-plus push-5-r"></i> Editar</button>
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