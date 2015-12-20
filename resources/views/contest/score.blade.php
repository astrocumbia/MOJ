@include('contest.includes.head')

<main id="main-container">

            <ul class="nav nav-pills push col-md-12 col-md-offset-3"  style="padding: 60px 0px;">
                <li>
                    <a href="/contest/problemas/{{$contest->id}}" >
                        <i class="fa fa-file-code-o"></i>
                        Problemas
                    </a>
                </li>
            
                <li >
                    <a  href="/contest/envios/{{$contest->id}}" >
                        <i class="fa fa-paper-plane-o"></i>
                                Envios
                    </a>
                </li>
                <li>
                    <a  href="/contest/clarificaciones/{{$contest->id}}">
                        <i class="fa fa-weixin"></i>
                                Clarificaciones
                    </a>
                </li>
                <li class="active">
                    <a  href="/contest/score/{{$contest->id}}">
                        <i class="fa fa-trophy"></i>
                                Scoreboard
                    </a>
                </li>
            </ul>

        <div class="content">
            <div class="col-lg-12">
                <!-- Contextual Table -->
                <div class="block">
                    <div class="block-content">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 20px;">Posición</th>
                                <th class="text-center">Equipo</th>
                                <th class="text-center" style="width: 10%;">Categoría</th>
                                @for($i=0; $i < $num; $i++ )
                                    <th class="text-center" style="width: 10%;">{{ chr(65 + $i) }}</th>
                                @endfor
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($score as $team)

                            <tr class="active">
                                <td class="text-center">
                                    <i class="fa fa-trophy" style="font-size: 2em; color: #FFD700;"></i>
                                </td>
                                <td class="text-center">{{$team->nombre}}</td>
                                <td class="text-center"><span class="label label-primary">Senior</span></td>
                                
                                @foreach($team->problemas as $problema)
                                    @if( empty($problema->solucion) ) 
                                    <td class="text-center">
                                        <span class="label label-danger"> {{$problema->intentos}} intentos </span>
                                    </td>
                                    @else
                                    <td class="text-center">
                                        {{ $problema->intentos > 0 ? $problema->intentos : '' }}
                                        <i class="fa fa-flag" style="font-size: 2em; color: {{$problema->color}};"></i>
                                        
                                    </td>
                                    @endif
                                @endforeach
                            </tr>


                            @endforeach

                         

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Contextual Table -->
            </div>
        </div>
</main>
@include('contest.includes.footer')
