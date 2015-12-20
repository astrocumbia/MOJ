<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Envios;
use Auth;

use App\Problem;
use App\Concurso;

class ContestController extends Controller
{


    public function showEnvios( Request $request )
    {

        $problemas = Problem::all();


        if( Auth::user()->rol == 1 || Auth::user()->rol == 2 ){
            $envios = Envios::where('id_concurso' , $request->input('id_concurso') )
                ->orderBy('id' , 'asc' )
                ->paginate( 10 );
        }
        else{
            $envios = Envios::where( 'id_concurso' , $request->input('id_concurso') )
                ->where( 'id_usuario' , Auth::user()->id )
                ->orderBy('id' , 'asc' )
                ->paginate( 10 );
        }

        return view('contest/envios' , ['envios' => $envios , 'problemas' => $problemas ] );
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

    public function showClarificaciones()
    {
        return view('contest/clarificaciones');      
    }


    public function showScore()
    {
        return view('contest/score');   
    }


  
}
