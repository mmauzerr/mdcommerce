<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Product_categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $client = new Client();
//        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/photos');
//        
//        $data = $response->getBody();
//        $data = json_decode($data);
//        
//        if(count($data) > 0){
//            for($i = 1; $i < 10; $i++){
//                foreach ($data as $value) {
//                    DB::table('product_categories')->insert([
//                        
//                        'name' => $value->title . $i,
//                        'image' => $value->url,
//                        'text' => $value->text . " " . $value->text . " " . $value->text
//                    ]);
//                }
//            }
//        }
    }
    
    //factory(Product_category::class,30)->create();
}
