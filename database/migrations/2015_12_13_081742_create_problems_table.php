<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('problemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100 );
            $table->string('pdf', 50 );
            $table->integer('usuario_creacion');
            $table->integer('categoria');
            $table->string('in', 50 );
            $table->string('out', 100 );
            $table->integer('memoria');
            $table->integer('tiempo');
            $table->dateTime('creacion');
            $table->dateTime('umodificacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('problemas');
    }
}
