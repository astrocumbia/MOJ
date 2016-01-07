<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                //
        DB::table('users')->insert([
            'name' =>'root',
            'email' => 'root'.'@mictlan.mx',
            'password' => bcrypt('toor'),
            'rol' => 1,
        ]);
    }
}
