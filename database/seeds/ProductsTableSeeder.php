<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Dusek  test 1',
            'description' => 'Dusek  test 1',
            'text' => 'Dusek  test 1',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Dusek  test 2',
            'description' => 'Dusek  test 2',
            'text' => 'Dusek  test 2',  
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 1,
            'name' => 'Dusek  test 3',
            'description' => 'Dusek  test 3',
            'text' => 'Dusek  test 3',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Mebl  test 1',
            'description' => 'Mebl  test 1',
            'text' => 'Mebl  test 1',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Mebl  test 2',
            'description' => 'Mebl  test 2',
            'text' => 'Mebl  test 2',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 2,
            'name' => 'Mebl  test 3',
            'description' => 'Mebl  test 3',
            'text' => 'Mebl  test 3',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Sundjer  test 1',
            'description' => 'Sundjer  test 1',
            'text' => 'Sundjer  test 1',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Sundjer  test 2',
            'description' => 'Sundjer  test 2',
            'text' => 'Sundjer  test 2',
            'visible' => 1
        ]);
        DB::table('products')->insert([
            'category_id' => 3,
            'name' => 'Sundjer  test 3',
            'description' => 'Sundjer  test 3',
            'text' => 'Sundjer  test 3',
            'visible' => 1
        ]);
                
    }
}
