<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(Product_categoryTableSeeder::class);
        $this->call(ProductsCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(HeightsTableSeeder::class);
        $this->call(DimensionsTableSeeder::class);
        $this->call(FoamsTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        
    }
}
