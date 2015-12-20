<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Problem extends Model
{
    protected $table = 'problemas';

    protected $fillable = [ 'nombre',
                            'pdf',
                            'in',
                            'out',
                            'memoria',
                            'tiempo',
                            'categoria',
                            'umodificacion'];

    public $timestamps = false;


    public static function getColor( $idContest, $idProblem){
        $data = DB::table('contest_problem')
            ->where('problem_id', $idProblem )
            ->where('contest_id', $idContest )->get();
        $ans = $data[0];
        return $ans->color;
    }

}
