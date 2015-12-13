<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamsIDToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
		$table->integer('id_team');
		$table->string('name_team'); //BORRAR ESTO Y USAR RELATHIONSHIPS DEL ORM
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
		$table->dropColumn('id_team');
		$table->dropColumn('name_team');
        });
    }
}
