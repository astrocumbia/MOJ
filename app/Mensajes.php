<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    protected $table = 'mensajes';


    protected $fillable = [
        'id_usuario',
        'id_concurso',
        'estado',
        'mensaje',
        'asunto'];
}
