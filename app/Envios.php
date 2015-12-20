<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\problem;

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
}

