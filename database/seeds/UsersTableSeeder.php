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
            'name' => 'mdcommerce',
            'email' => 'mdcommerce@gmail.com',
            'password' => bcrypt('mdcommerce'),
            'address' => '',
            'phone' => '',
            'role' => 'administrator'
        ]);
    }
    
}
