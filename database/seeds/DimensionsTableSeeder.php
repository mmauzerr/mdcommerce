<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DimensionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dimensions')->insert([
            'height' => 80,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 80,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 90,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 90,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 120,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 120,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 140,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 140,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 160,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 160,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 180,
            'width' => 190         
        ]);
        DB::table('dimensions')->insert([
            'height' => 180,
            'width' => 200         
        ]);
        DB::table('dimensions')->insert([
            'height' => 200,
            'width' => 200         
        ]);
    }
}
