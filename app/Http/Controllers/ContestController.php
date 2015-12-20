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

class ContestController extends Controller
{

    public function judgeRun( Request $request ){

        Envios::where( 'id' , $request->input('id_envio') )
            ->update([
                'estado'    => 2,
                'veredicto' => $request->input('veredicto'),
                'id_juez'    => Auth::user()->id
            ]);

        return redirect('contest/envios/'.$request->input('concurso'));
    }

    public function downloadFile( Request $request  ){
        return '/files/codigos/'.$request->input('name');
    }


    public function addEnvio( Request $request ){

        $codigo = $request->file('codigo');
        $random = rand(1,100000);

        $codigo->move('files/codigos', $random.$codigo->getClientOriginalName());

        $envio = new Envios(array(

            'id_usuario' => Auth::user()->id,
            'id_concurso' => $request->input('id_concurso'),
            'estado' => 1,
            'veredicto' => 10,
            'id_juez' => -1,
            'codigo' => $random.$codigo->getClientOriginalName(),
            'id_problema' => $request->input('id_problema'),
            'lenguaje' => $request->input('lenguaje')
        ));

        $envio->save();

        return redirect('/contest/envios/'.$request->input('id_concurso') );


    }

    public function showEnvios( $contest_id )
    {

        if( Auth::user()->rol == 1 || Auth::user()->rol == 2 ){
            $envios = Envios::where('id_concurso' , $contest_id )
                ->orderBy('id' , 'asc' )
                ->paginate( 10 );
        }
        else{
            $envios = Envios::where( 'id_concurso' , $contest_id )
                ->where( 'id_usuario' , Auth::user()->id )
                ->orderBy('id' , 'asc' )
                ->paginate( 10 );
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


    public function showProblemas( $contest_id )
    {
        $contest = Concurso::find( $contest_id );
        
        $data = [
            'contest' => $contest,
            'problemas' => Problem::all(),
            ];
        return view('contest/problemas',$data );   
        
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


    public function showScore()
    {
        return view('contest/score');   
    }




  
}
