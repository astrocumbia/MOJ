<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//Modelos
use App\User;

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

        return view('admin/concursos');   
    }

    
    public function ShowUsers()
    {
        $usuarios = User::all();
        return view('admin/usuarios', ['usuarios' => $usuarios]);   
    }

    public function addUser( Request $request )
    {
        $db_user = new User( $request->input() );
        $db_user->password = bcrypt( $db_user->password );
        $db_user->save();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
