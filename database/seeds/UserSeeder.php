<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Talha',
        	'email' => 'talha@gmail.ca',
        	'password' => bcrypt('pass')
        ]);

        DB::table('users')->insert([
        	'name' => 'Talha 2',
        	'email' => 'talha@hotmail.ca',
        	'password' => bcrypt('pass')
        ]);
    }
}
