<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'Goran Loncar',
            'email' => 'goranbloncar@gmail.com',
            'password' => bcrypt('nikola'),
            'address' => 'Vojvode Stepe, Beograd',
            'phone' => '0641924059',
            'role' => 'administrator'
        ]);
    }
    
}
