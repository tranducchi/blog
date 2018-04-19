<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     
        DB::table('users')->insert([
        	'name'=>'David Name',
        	'email'=>'chitranduc9@gmail.com',
        	'password'=>bcrypt('123456'),
        	'role'=>'2'
        ]);
        DB::table('users')->insert([
        	'name'=>'Long LeeAdmin',
        	'email'=>'chitran539@gmail.com',
        	'password'=>bcrypt('123456'),
        	'role'=>'2'
        ]);
        DB::table('users')->insert([
        	'name'=>'Adam Mirk',
        	'email'=>'chitran@gmail.com',
        	'password'=>bcrypt('123456'),
        	'role'=>'2'
        ]);
    }
}
