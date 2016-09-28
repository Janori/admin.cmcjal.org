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
    	DB::table('users')->insert([
    		'name' => 'Edgar',
    		'lastname' => 'Sandoval',
    		'type' => 'Administrador',
    		'email' => 'edgar@admin.com',
    		'password' => bcrypt('1234'),
    		]);
        //
    }
}
