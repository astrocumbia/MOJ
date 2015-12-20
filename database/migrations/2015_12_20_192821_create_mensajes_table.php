<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{

    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_concurso');
            $table->integer('id_usuario');
            $table->text('mensaje');
            $table->text('asunto');
            $table->integer('estado');//1-leido, 0-no leido
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('mensajes');
    }
}
