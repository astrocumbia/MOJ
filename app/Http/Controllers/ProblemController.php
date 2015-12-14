<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use App\Http\Controllers\Controller;

//Modelos
use App\User;
use App\Concurso;
use App\Problem;
use Symfony\Component\Translation\Dumper\PoFileDumper;


class ProblemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function showProblems(){

        $problemas = Problem::orderBy('id' , 'asc' )->paginate( 5 );
        return view('admin/problemas' , ['problemas' => $problemas] );
    }


    public function showDescription( Request $request ){
        return '/files/'.$request->input('name');
    }

    public function showDescriptionget( $name ){
        //aqui falta validar que el concurso no este activo o que sea administrador
            return '/files/'.$name;
    }

    public function downloadFile( Request $request ){
        return '/files/'.$request->input('name');
        //return response()->download('files/'.$request->input('name'));
    }


    public function addProblems( Request $request )
    {
        $pdf        = $request->file('pdf');
        $entrada    = $request->file('entrada');
        $salida     = $request->file('salida');

        $random = rand(1,100000);

        $pdf->move('files', $random.$pdf->getClientOriginalName());
        $entrada->move('files', $random.$entrada->getClientOriginalName());
        $salida->move('files', $random.$salida->getClientOriginalName());

        $problema = new Problem( array(
            'nombre'    => $request->input('nombre'),
            'memoria'   => $request->input('memoria'),
            'tiempo'    => $request->input('tiempo'),
            'pdf'       => $random.$pdf->getClientOriginalName(),
            'in'        => $random.$entrada->getClientOriginalName(),
            'out'       => $random.$salida->getClientOriginalName(),
            'categoria' => $request->input('categoria')
        ));

        $problema->save();

        return redirect('admin/problem');
    }

    public function  loadProblem( Request $request ){
        $problema = Problem::find( $request->input('id') );
        return $problema;
    }

    public function editProblem( Request $request ){

        $pdf        = $request->file('pdf');
        $entrada    = $request->file('entrada');
        $salida     = $request->file('salida');

        $random = rand(1,100000);

        $pdf->move('files', $random.$pdf->getClientOriginalName());
        $entrada->move('files', $random.$entrada->getClientOriginalName());
        $salida->move('files', $random.$salida->getClientOriginalName());


        Problem::where( 'id' , $request->input('id') )
            ->update([
                'nombre'    => $request->input('nombre'),
                'memoria'   => $request->input('memoria'),
                'tiempo'    => $request->input('tiempo'),
                'categoria' => $request->input('categoria'),
                'pdf'       => $random.$pdf->getClientOriginalName(),
                'in'        => $random.$entrada->getClientOriginalName(),
                'out'       => $random.$salida->getClientOriginalName()
            ]);

        return redirect('admin/problem');

    }


    public function deleteProblem( Request $request ){

        $problema = Problem::find( $request->input('id') );
        $problema->delete();
        return redirect('admin/problem');

    }


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
