@include('contest.includes.head')

<!-- Main Container -->
<main id="main-container">

        <ul class="nav nav-pills push col-md-12 col-md-offset-3"  style="padding: 25px 0px;">
            <li >
                <a href="/contest/problemas" >
                    <i class="fa fa-file-code-o"></i>
                    Problemas
                </a>
            </li>
        
            <li>
                <a  href="/contest/envios" >
                    <i class="fa fa-paper-plane-o"></i>
                            Envios
                </a>
            </li>
            <li  class="active">
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


        <div class="content">
        	<h4 class="font-w300 push-15">clarificaciones</h4>
			<p>Content slides in to the right..</p>
        </div>

</main>

@include('contest.includes.footer')