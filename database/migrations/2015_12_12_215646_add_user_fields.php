<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	Schema::table('users', function ($table) {
   		$table->string('username');
        $table->boolean('activo')->default(true);
        $table->string('rol');
        $table->string('apellidom');
		$table->string('apellidop');
		
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
