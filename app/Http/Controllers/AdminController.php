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
        $data = Concurso::orderBy('id', 'desc')->paginate(7);
       // $data = Concurso::paginate(5);
        return view('admin/concursos',['concursos'=>$data]);   
    }

    public function saveContests(Request $request)
    {

        //return view('admin/concursos');
        $data = $request->input();
        $contest = new Concurso( $data );
        $contest->save();

        return redirect('admin/contest');
    }

    
    public function ShowUsers()
    {
        $usuarios = User::orderBy('id' , 'desc' )->paginate( 5 );

        return view('admin/usuarios', ['usuarios' => $usuarios]);   
    }

    public function addUser( Request $request )
    {
        $db_user = new User( $request->input() );
        $db_user->password = bcrypt( $db_user->password );
        $db_user->save();
        return redirect('admin/user');
    }

    public function editUser( Request $request )
    {
        User::where( 'id' , $request->input('id') )
                ->update([
                    'name' => $request->input('name'),
                    'apellidop' => $request->input('apellidop'),
                    'apellidom' => $request->input('apellidom'),
                    'username' => $request->input('username'),
                    'rol' => $request->input('rol'),
                    'email' => $request->input('email')
                ]);

        return redirect('admin/user');
    }


    public function  loadUser( Request $request ){

        $usuario = User::find( $request->input('id') );
        return $usuario;
    }



    public function ShowTeams()
    {
        return view('admin/equipo');   
    }

    public function showProblems(){
        return view('admin/problemas');      
    }

}
