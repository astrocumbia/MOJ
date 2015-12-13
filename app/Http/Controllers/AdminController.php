<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Modelos
use App\User;
use App\Concurso;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin/home');
    }


    public function ShowContests()
    {

        $data = Concurso::all();
        return view('admin/concursos',['concursos'=>$data]);   
    }

    public function saveContests(Request $request)
    {

        //return view('admin/concursos');
        $data = $request->input();
        $contest = new Concurso( $data );
        $contest->save();
        print_r( $contest );   

    }

    
    public function ShowUsers()
    {
        $usuarios = User::all();
        return view('admin/usuarios', ['usuarios' => $usuarios]);   
    }

    public function addUsers()
    {
        $usuarios = User::all();
        return view('admin/usuarios', ['usuarios' => $usuarios]);   
    }

    public function ShowTeams()
    {
        return view('admin/equipo');   
    }

    public function showProblems(){
        return view('admin/problemas');      
    }

}
