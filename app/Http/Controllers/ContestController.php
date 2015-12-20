<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Problem;

class ContestController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function showEnvios()
    {
        return view('contest/envios');
    }

    public function showProblemas( $id )
    {
        $data = Problem::all();
        return view('contest/problemas',['problemas'=>$data]);   
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
