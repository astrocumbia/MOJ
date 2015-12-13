<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $table = 'problemas';

    protected $fillable = ['nombre',
                            'pdf',
                            'in',
                            'out',
                            'memoria',
                            'tiempo',
                            'umodificacion'];

}
