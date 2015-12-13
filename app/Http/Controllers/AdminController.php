<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Modelos
use App\User;
use App\Concurso;
use App\Team;

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


/*
|--------------------------------------------------------------------------
|  CONTEST
|--------------------------------------------------------------------------
|
*/
    public function ShowContests()
    {
        $data = Concurso::orderBy('id', 'desc')->paginate(7);
       // $data = Concurso::paginate(5);
        return view('admin/concursos',['concursos'=>$data]);   
    }

    public function saveContests(Request $request)
    {

        $data = $request->input();
        $contest = new Concurso( $data );
        $contest->save();

        return redirect('admin/contest');
    }


    public function loadContest( Request $request ){
        $contest = Concurso::find( $request->input('id') );
        return $contest;
    }

    
    public function editContest( Request $request ){

        Concurso::where( 'id' , $request->input('id') )
                ->update([
                    'nombre' => $request->input('nombre'),
                    'descripcion' => $request->input('descripcion'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_fin' => $request->input('fecha_fin'),
                    'hora_inicio' => $request->input('hora_inicio'),
                    'hora_fin' => $request->input('hora_fin')
                ]);

        return redirect('admin/contest');
    }


    public function deleteContest( $id ){
        $contest = Concurso::find($id);
        $contest->delete();
        return redirect('/admin/contest');
    }      


/*
|--------------------------------------------------------------------------
|  USERS
|--------------------------------------------------------------------------
|
*/    
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


/*
|--------------------------------------------------------------------------
|  TEAMS
|--------------------------------------------------------------------------
|
*/
    public function ShowTeams()
    {
        $data = Team::orderBy('id' , 'desc' )->paginate( 10 );
        return view('admin/equipo',['teams' => $data ]);   
    }

    public function addTeams( Request $request )
    {
        $team = new Team( $request->input() );
        $team->save();
        return redirect('admin/team');
    }

    public function loadTeams( Request $request )
    {
        $id = $request->input('id');
        $team = Team::find( $id );
        
        return $team;
    }

    public function editTeams( Request $request )
    {
        $id = $request->input( 'id' );
        Team::where( 'id' , $request->input('id') )
                ->update([
                    'nombre' => $request->input('nombre'),
                    'universidad' => $request->input('universidad'),
                    'categoria' => $request->input('categoria')
                ]);

        return redirect('admin/team');
    }       

    public function deleteTeam( $id ){
        $team = Team::find($id);
        $team->delete();
        return redirect('/admin/team');
    }  

/*
|--------------------------------------------------------------------------
|  problems
|--------------------------------------------------------------------------
|
*/
    public function showProblems(){
        return view('admin/problemas');      
    }

}
