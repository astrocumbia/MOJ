<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_user');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('foto_perfil')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('nivel');
            $table->integer('acceso')->default(1); //1) publico 2)privado
            $table->integer('tipo')->default(1); //1)Equipo 2)individual
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('concursos');
    }
}
