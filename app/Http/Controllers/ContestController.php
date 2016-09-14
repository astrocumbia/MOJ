<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Envios;
use Auth;

use App\Problem;
use App\Concurso;
use App\Mensajes;
use App\Scoreboard;
use DB;

class ContestController extends Controller
{
    public function showDescription( Request $request ){
        return url('/files/').'/'.$request->input('name');
    }


    public function test($id)
    {
        Scoreboard::getTime();
    }

    public function judgeRun( Request $request ){
        
        $penalizacion = Concurso::getTime( $request->input('id_envio') );

        if( $request->input('veredicto') != 1 ){
            $penalizacion+=20;            
        }
        
        $resuelto = Envios::resuelto( $request->input('id_envio') );
        if( $resuelto == true )
        {
            $penalizacion = 0;
        }

        Envios::where( 'id' , $request->input('id_envio') )
            ->update([
                'estado'    => 2,
                'veredicto' => $request->input('veredicto'),
                'penalizacion' => $penalizacion,
                'id_juez'    => Auth::user()->id
            ]);

        return redirect('contest/envios/'.$request->input('concurso'));
        
    }

    public function downloadFile( Request $request  ){
        return url('/files/codigos/').'/'.$request->input('name');
    }


    public function addEnvio( Request $request ){

        $codigo = $request->file('codigo');
        $random = rand(1,100000);
        $codigo->move('files/codigos', $random.$codigo->getClientOriginalName());
        $idProblema = $request->input('id_problema');
        $problema = Problem::find( $idProblema );
        $nombrePrograma = $random.$codigo->getClientOriginalName();
        $lenguaje = $request->input('lenguaje');


        if( $lenguaje == 2 ){ //c++

            $suite_path      = '/Users/alejandro/Sites/moj';
            $outans_path     = $suite_path.'/public/files/'.$problema->out;
            $judge_path      = $suite_path.'/judge/';
            $userProblemPath = $suite_path.'/public/files/codigos/'.$nombrePrograma;

            shell_exec( 'cp '.$outans_path.' '.$judge_path.'ans.out');
            shell_exec( 'cp '.$userProblemPath.' '.$judge_path.'user.cpp');
            $respuesta = shell_exec( 'python '.$judge_path.'script.py');

        }

        else if ( $lenguaje == 1 ) { // c
            
            $suite_path      = '/Users/alejandro/Sites/moj';
            $outans_path     = $suite_path.'/public/files/'.$problema->out;
            $judge_path      = $suite_path.'/judge/';
            $userProblemPath = $suite_path.'/public/files/codigos/'.$nombrePrograma;

            shell_exec( 'cp '.$outans_path.' '.$judge_path.'ans.out');
            shell_exec( 'cp '.$userProblemPath.' '.$judge_path.'user.cpp');
            $respuesta = shell_exec( 'python '.$judge_path.'scriptc.py');
        }
        else{
            
            $respuesta = 10;
        }

        $envio = new Envios(array(

            'id_usuario' => Auth::user()->id,
            'id_concurso' => $request->input('id_concurso'),
            'estado' => 1,
            'veredicto' => intval( $respuesta ),
            'id_juez' => -1,
            'codigo' => $nombrePrograma,
            'id_problema' => $idProblema,
            'lenguaje' => $request->input('lenguaje')
        ));

        $envio->save();
        return redirect('/contest/envios/'.$request->input('id_concurso') );


    }

    public function showEnvios( $contest_id )
    {

        if( Auth::user()->rol == 1 || Auth::user()->rol == 2 ){
            $envios = Envios::where('id_concurso' , $contest_id )
                ->orderBy('id' , 'desc' )
                ->get();
        }
        else{
            $envios = Envios::where( 'id_concurso' , $contest_id )
                ->where( 'id_usuario' , Auth::user()->id )
                ->orderBy('id' , 'desc' )
                ->get();
        }

        $contest = Concurso::find( $contest_id );

        return view('contest/envios' , ['envios' => $envios ,  'contest' => $contest ] );
    }


    public function saveProblemas( Request $request )
    {
        $data = $request->input();
        $id   = $request->input('contest_id');
        Concurso::insertProblemContest($data);
        return redirect('contest/problemas/'.$id);
    }

    public function updateProblemas (Request $request)
    {

        DB::table('contest_problem')
            ->where('problem_id', $request->input('problem_id') )
            ->where('contest_id', $request->input('contest_id') )
            ->update(['color' =>  $request->input('color') ]);
        return redirect('contest/problemas/'.$request->input('contest_id'));   
    }

    public function delProblemas( Request $request ){
        //print_r( $request->input() );
        DB::table('contest_problem')
            ->where('problem_id', $request->input('problem_id') )
            ->where('contest_id', $request->input('contest_id') )
            ->delete();

    }

    public function showProblemas( $contest_id )
    {
        $contest = Concurso::find( $contest_id );
        
        $data = [
            'contest' => $contest,
            'problemas' => Problem::all(),
            ];

        return view('contest/problemas', $data );
        
    }

    public function showClarificaciones( $contest_id )
    {
        $mensajes_recibidos = Mensajes::
            where('id_concurso' , $contest_id )
            ->where('id_usuario' ,'!=', Auth::user()->id ) //mensajes que este usuario no envio
            ->orderBy('id' , 'desc' )
            ->paginate( 10 );

        $mensajes_enviados = Mensajes::

              where('id_concurso' , $contest_id )
            ->where('id_usuario' , Auth::user()->id ) //mensajes que este usuario no envio
            ->orderBy('id' , 'desc' )
            ->paginate( 10 );


        $contest = Concurso::find( $contest_id );
        return view('contest/clarificaciones', ['contest' => $contest , 'recibidos' =>$mensajes_recibidos , 'enviados'=>$mensajes_enviados ]);
    }

    public function addMensaje( Request $request ){

        $mensaje = new Mensajes(array(

            'id_usuario' => Auth::user()->id,
            'id_concurso' => $request->input('id_concurso'),
            'estado' => 0,
            'asunto' => $request->input('asunto'),
            'mensaje' => $request->input('mensaje'),
        ));

        $mensaje->save();

        return redirect('/contest/clarificaciones/'.$request->input('id_concurso') );
    }

    public function getMsg( Request  $request ){

        Mensajes::where( 'id' , $request->input('id') )
            ->update([
                'estado'    => 1,
            ]);

        $mensajes = Mensajes::where('id' , $request->input('id') )->first();
        return $mensajes->mensaje;
    }


    public function showScore($id)
    {
        $contest    =  Concurso::find($id);
        $problemas  =  $contest->problems()->get();
        $score      =  Scoreboard::get( $id ); 
        
        
        return view('contest/score',
                    [   'contest' => $contest,
                        'num' => count($problemas),
                        'score' => $score
                    ]);   

        
    }




  
}
