<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('product_categories')->insert([
            'name' => 'Duseci',
            'text' => 'Dusek kategorija test',
            'image' => 'uploads/products/categories/duseci.jpg',
            'visible' => 1
        ]);
                  DB::table('product_categories')->insert([
            'name' => 'Mebl',
            'text' => 'Mebl kategorija test',
            'image' => 'uploads/products/categories/mebl.jpg',
            'visible' => 1
        ]);
                          DB::table('product_categories')->insert([
            'name' => 'Sundjer',
            'text' => 'Sundjer',
            'image' => 'uploads/products/categories/sundjer.jpg',
            'visible' => 1
        ]);
    }
}
