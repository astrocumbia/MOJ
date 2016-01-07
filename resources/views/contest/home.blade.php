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




            <div class="col-lg-12">
                <!-- Header BG Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-striped table-borderless table-header-bg">
                            <thead>
                            <tr>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Alias</th>                                                                                       <th class="text-center">Problema</th>
                                <th class="text-center">Color</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>                                                                                                                         <td>Suma de números</td>
                                <td class="text-center">A+B</td>
                                <td class="text-center"><a class="link-effect">A+B.pdf</a></td>
                                <td class="text-center"><i class="fa fa-flag" style="font-size: 2em; color: #0A0;"></i></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Header BG Table -->
            </div>
    </div>
</main>

@include('contest.includes.footer')


