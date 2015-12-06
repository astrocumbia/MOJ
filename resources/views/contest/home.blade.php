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
                @include('contest.problemas')
            </div>
            <div class="tab-pane fade fade-right" id="envios-tab">
                @include('contest.envios')
            </div>
            <div class="tab-pane fade fade-right" id="clarificaciones-tab">
                @include('contest.clarificaciones')
            </div>
            <div class="tab-pane fade fade-right" id="score-tab">
                @include('contest.score')
            </div>
        </div>
    </div>
    <!-- END Block Tabs Animated Slide Right -->

    </main>
    <!-- END Main Container -->

@include('admin.includes.footer')