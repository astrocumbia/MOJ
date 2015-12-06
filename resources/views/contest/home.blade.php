@include('contest.includes.head')


    <!-- Main Container -->
    <main id="main-container">

    <!-- Block Tabs Animated Slide Right -->
    <div class="block">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active">
                <a href="#problemas-tab">
                    <i class="fa fa-file-code-o"></i>
                    Problemas
                </a>
            </li>
            <li class="">
                <a href="#envios-tab">
                    <i class="fa fa-paper-plane-o"></i>
                    Envios
                </a>
            </li>
            <li class="">
                <a href="#clarificaciones-tab">
                    <i class="fa fa-weixin"></i>
                    Clarificaciones
                </a>
            </li>
            <li class="">
                <a href="#score-tab">
                    <i class="fa fa-trophy"></i>
                    Scoreboard
                </a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <div class="tab-pane fade fade-right active in" id="problemas-tab">
                <h4 class="font-w300 push-15">Problemas</h4>
                <p>Content slides in to the right..</p>
            </div>
            <div class="tab-pane fade fade-right" id="envios-tab">
                <h4 class="font-w300 push-15">Envios</h4>
                <p>Content slides in to the right..</p>
            </div>
            <div class="tab-pane fade fade-right" id="clarificaciones-tab">
                <h4 class="font-w300 push-15">clarificaciones</h4>
                <p>Content slides in to the right..</p>
            </div>
            <div class="tab-pane fade fade-right" id="score-tab">
                <h4 class="font-w300 push-15">Score</h4>
                <p>Content slides in to the right..</p>
            </div>
        </div>
    </div>
    <!-- END Block Tabs Animated Slide Right -->

    </main>
    <!-- END Main Container -->

@include('admin.includes.footer')