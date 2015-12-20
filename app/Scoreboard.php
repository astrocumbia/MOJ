<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
use App\Problem;
use App\User;

class Scoreboard extends Model
{

	public static function getResueltos($idContest, $idUser)
	{
		$solucion = DB::table('envios')
	            ->where('envios.id_usuario', '=', $idUser)
	            ->where('envios.id_problema', '=', $problem->id)
	            ->where('envios.id_concurso', '=', $idContest)
	            ->where('envios.veredicto', '=', 1)
	            ->select('count(envios.id) as intentos')
	            ->first();	
	}

	public static function getProblems( $idContest, $idUser )
	{
		/*
		$idContest = 1;
		$idUser = 2;
		*/

		$problemas = DB::table('problemas')
					->join('contest_problem', 'contest_problem.problem_id', '=', 'problemas.id')
					->where('contest_problem.contest_id', '=', $idContest)
					->select('problemas.id', 'contest_problem.color')
					->orderBy('problemas.id', 'asc')
					->get();	 
		
		
	    $response = array();
	    foreach ($problemas as $problem) {
	    	       	
	       	$solucion = DB::table('envios')
	            ->where('envios.id_usuario', '=', $idUser)
	            ->where('envios.id_problema', '=', $problem->id)
	            ->where('envios.id_concurso', '=', $idContest)
	            ->where('envios.veredicto', '=', 1)
	            ->select('envios.*')
	            ->first();

	        $intentos = DB::table('envios')
	            ->where('envios.id_usuario', '=', $idUser)
	            ->where('envios.id_problema', '=', $problem->id)
	            ->where('envios.id_concurso', '=', $idContest)
	            ->where('envios.veredicto', '!=', 1)
	            ->select(DB::raw('count(envios.id) as intentos'))
	            ->first();
	        
	        $color = Problem::getColor($idContest, $problem->id );

	        $ans = (object)array( "solucion"=> $solucion, "intentos" =>  $intentos->intentos, 'color' => $color );
	        
	      	array_push($response,  $ans);    
	    }
	    
	    return $response;
	}

	public static function get( $idContest )
	{
		$concursantes = User::where('rol', 3)
							->get(); 

		$contest = array();
		foreach ($concursantes as $equipo){
			$problemas = Scoreboard::getProblems( $idContest , $equipo->id );

			$ans = (object)array( 
						'nombre'=> $equipo->name, 
						'problemas' => $problemas,
					
					);
			array_push($contest,  $ans);
		}
		return $contest;
/*
		return usort($contest,  function compare_weights($a, $b) { 
    								if($a->resueltos == $b->resueltos) {
								        return 0;
								    } 
								    return ($a->resueltos < $b->resueltos) ? -1 : 1;
								} );
*/
	}
}


