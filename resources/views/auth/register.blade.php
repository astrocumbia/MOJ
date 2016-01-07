
@include('includes.head')

<body>
<!-- Register Content -->
<div class="content overflow-hidden">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <!-- Register Block -->
            <div class="block block-themed animated fadeIn">
                <div class="block-header bg-info">

                    <h3 class="block-title">Registro</h3>
                </div>
                <div class="block-content block-content-full block-content-narrow">
                    <!-- Register Title -->
                    <h1 class="h2 font-w600 push-30-t push-5">Mictlán Online Judge</h1>
                    <!-- END Register Title -->

                    <!-- Register Form -->
                    <!-- jQuery Validation (.js-validation-register class is initialized in js/pages/base_pages_register.js) -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-register form-horizontal push-50-t push-50" action="{{url('/auth/register')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario...">
                                    <label for="username">Nombre de Usuario*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="text" id="nombre" name="name" placeholder="Ingresa tu nombre...">
                                    <label for="nombre">Nombre*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="text" id="apellidop" name="apellidop" placeholder="Ingresa tu apellido perterno...">
                                    <label for="register-username">Apellido Parterno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="text" id="apellidom" name="apellidom" placeholder="Ingresa tu apellido materno">
                                    <label for="apellidom">Apellido Materno</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico...">
                                    <label for="email">Email*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Elige una contraseña fuerte...">
                                    <label for="register-password">Contraseña*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="form-material form-material-info">
                                    <input class="form-control" type="password" id="password2" name="password_confirmation" placeholder="... confirma tu contraseña">
                                    <label for="register-password2">Confirma contraseña*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12" style="padding:5px 0px">
                                <div class="form-material form-material-info">
                                    <label class="css-input switch switch-sm switch-success">
                                        <input type="checkbox" id="terminos" name="terminos"><span></span> Acepto los términos y condiciones.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button class="btn btn-info pull-right" type="submit"><i class="fa fa-plus pull-right"></i> Registrar</button>
                            </div>
                        </div>
                    </form>
                    <!-- END Register Form -->
                </div>
            </div>
            <!-- END Register Block -->
        </div>
    </div>
</div>
<!-- END Register Content -->

<!-- Register Footer -->
<div class="push-10-t text-center animated fadeInUp" style="padding: 10px 0px 30px 0px">
    Hecho con <i class="fa fa-heart text-city"></i> por <a class="font-w600" href="http://www.mictlan.mx" target="_blank">Mictlán Software</a>
</div>
<!-- END Register Footer -->




<script src="{{ asset('js/core/jquery.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.scrollLock.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.appear.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.countTo.min.js') }}"></script>
<script src="{{ asset('js/core/jquery.placeholder.min.js') }}"></script>
<script src="{{ asset('js/core/js.cookie.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/registro.js') }}"></script>



</body>
</html>