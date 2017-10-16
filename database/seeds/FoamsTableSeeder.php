<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foams')->insert([
            'name' => 'pu.pena 2542'        
        ]);
        DB::table('foams')->insert([
            'name' => 'pu.pena 3550'        
        ]);
        DB::table('foams')->insert([
            'name' => 'hr 3536'        
        ]);
        DB::table('foams')->insert([
            'name' => 'memory'        
        ]);
        DB::table('foams')->insert([
            'name' => 'memory pena'        
        ]);
    }
}
