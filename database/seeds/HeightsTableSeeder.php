<?php

use Illuminate\Database\Seeder;

class HeightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('heights')->insert([
            'name' => 3
        ]);
        DB::table('heights')->insert([
            'name' => 5
        ]);
        DB::table('heights')->insert([
            'name' => 10
        ]);
        DB::table('heights')->insert([
            'name' => 16
        ]);
        DB::table('heights')->insert([
            'name' => 20
        ]);
        DB::table('heights')->insert([
            'name' => 22
        ]);
        DB::table('heights')->insert([
            'name' => 24
        ]);
        DB::table('heights')->insert([
            'name' => 27
        ]);
        DB::table('heights')->insert([
            'name' => 34
        ]);
    }
}
