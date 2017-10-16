<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('colors')->insert([
            'name' => 'red'
        ]);
         DB::table('colors')->insert([
            'name' => 'green'
        ]);
         DB::table('colors')->insert([
            'name' => 'blue'
        ]);
         DB::table('colors')->insert([
            'name' => 'violet'
        ]);
    }
}
