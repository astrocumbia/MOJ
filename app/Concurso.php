<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

use App\Problem;

class Concurso extends Model
{
    //
  /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'concursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 
    			'nombre', 
    			'fecha_inicio',
    			'hora_inicio',
    			'fecha_fin',
    			'hora_fin',
    			'descripcion'];

    public static function insertProblemContest( $data ){
        $row = [
            'problem_id' => $data['problem_id'],
            'contest_id' => $data['contest_id'],
            'color'      => $data['color']
        ];
        return DB::table( 'contest_problem' )->insert($row);
    }


    public function problems(){

        return $this->belongsToMany('App\Problem', 'contest_problem', 'contest_id', 'problem_id');
    }
}
