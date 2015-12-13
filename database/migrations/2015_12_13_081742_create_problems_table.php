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
            $table->longText('pdf');
            $table->integer('usuario_creacion');
            $table->longText('in');
            $table->longText('out');
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
        Schema::drop('problems');
    }
}
