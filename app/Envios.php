<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\problem;
Use DB;

class Envios extends Model
{
    protected $table = 'envios';


    protected $fillable = [
        'id_usuario',
        'id_concurso',
        'id_problema',
        'id_juez',
        'estado',
        'codigo',
        'lenguaje',
        'veredicto'];

    public function problema()
    {
        return $this->belongsTo('App\Problem', 'id_problema');
    }

    public static function resuelto( $id_problema )
    {
        $envio = Envios::find( $id_problema );
        
        $existe = DB::table('envios')
                    ->select( DB::raw('envios.*,count(id) as resuelto') )
                    ->where('id_usuario', $envio->id_usuario )
                    ->where('id_concurso', $envio->id_concurso)
                    ->where('id_problema', $envio->id_problema)
                    ->where('veredicto', 1)
                    ->get();

        if( $existe ){
            $ans = $existe[0];
            if( $ans->resuelto >= 1 )
                return true;
        }
        return false;

    }
}

