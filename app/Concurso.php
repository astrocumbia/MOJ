<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    protected $fillable = ['name', 'email', 'password','apellidom','apellidop','username'];

}
