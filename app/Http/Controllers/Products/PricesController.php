<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Product;
use App\Model\Products\Dimension;
use App\Model\Products\Category;
use App\Model\Products\Price;

class PricesController extends Controller {

    
    function index(){
        $prices = Price::all();
        $categories = Category::all();
        $products = Product::all();
        $dimensions = Dimension::all();
        
        return view('products.prices.index', compact('categories', 'products', 'dimensions','prices'));
        
    }
    
    function create() {

        $categories = Category::all();
        $products = Product::all();
        $dimensions = Dimension::all();
        
        
        
        $categoriesPossibleValues = "";
        if (count($categories) > 0) {
            $i = 0;
            foreach ($categories as $category) {
                if ($i != 0) {
                    $categoriesPossibleValues .= ',';
                }
                $categoriesPossibleValues .= $category->id;
                $i++;
            }
        }

        $productsPossibleValues = "";
        if (count($products) > 0) {
            $i = 0;
            foreach ($products as $product) {
                if ($i != 0) {
                    $productsPossibleValues .= ',';
                }
                $productsPossibleValues .= $product->id;
                $i++;
            }
        }

        $dimensionsPossibleValues = "";
        if (count($dimensions) > 0) {
            $i = 0;
            foreach ($dimensions as $dimension) {
                if ($i != 0) {
                    $dimensionsPossibleValues .= ',';
                }
                $dimensionsPossibleValues .= $dimension->id;
                $i++;
            }
        }


        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'category_id' => "required|in:$categoriesPossibleValues",
                'product_id' => "required|in:$productsPossibleValues",              
                'price' => 'required|integer|min:0',
                'discount' => 'integer|min:0|max:100'
            ]);

            $dimension2 = request('category_id');
            $typeValue = NULL;
            switch ($dimension2) {
                case '1':
                    $this->validate(request(),[
                        'dimension_id' => "required|in:$dimensionsPossibleValues",
                    ]);
                    $typeValue = request('dimension_id');
                break;
            }

            $price = new Price();
            $price->category_id = request('category_id');
            $price->product_id = request('product_id');
            $price->dimension_id = request('dimension_id');
            $price->price = request('price');
            $price->discount = request('discount');
            

        

            $price->save();

            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Price: $price->product_id is created successfully"
            ]);

            return redirect()->route('products-prices-list');
        }

        return view('products.prices.create', compact('categories', 'products', 'dimensions'));
    }
    
     function edit(Price $price) {

        $categories = Category::all();
        $products = Product::all();
        $dimensions = Dimension::all();
        
        
        
        $categoriesPossibleValues = "";
        if (count($categories) > 0) {
            $i = 0;
            foreach ($categories as $category) {
                if ($i != 0) {
                    $categoriesPossibleValues .= ',';
                }
                $categoriesPossibleValues .= $category->id;
                $i++;
            }
        }

        $productsPossibleValues = "";
        if (count($products) > 0) {
            $i = 0;
            foreach ($products as $product) {
                if ($i != 0) {
                    $productsPossibleValues .= ',';
                }
                $productsPossibleValues .= $product->id;
                $i++;
            }
        }

        $dimensionsPossibleValues = "";
        if (count($dimensions) > 0) {
            $i = 0;
            foreach ($dimensions as $dimension) {
                if ($i != 0) {
                    $dimensionsPossibleValues .= ',';
                }
                $dimensionsPossibleValues .= $dimension->id;
                $i++;
            }
        }


        if (request()->isMethod('post')) {
            $this->validate(request(), [
                'category_id' => "required|in:$categoriesPossibleValues",
                'product_id' => "required|in:$productsPossibleValues",              
                'price' => 'required|integer|min:0',
                'discount' => 'integer|min:0|max:100'
            ]);

            $dimension2 = request('category_id');
            $typeValue = NULL;
            switch ($dimension2) {
                case '1':
                    $this->validate(request(),[
                        'dimension_id' => "required|in:$dimensionsPossibleValues",
                    ]);
                    $typeValue = request('dimension_id');
                break;
            }

            
            $price->product_id = request('product_id');
            $price->dimension_id = request('dimension_id');
            $price->price = request('price');
            $price->discount = request('discount');
            

        

            $price->save();

            // set message to other page
            session()->flash('message', [
//                'status' => 'success',
                'text' => "Price: $price->product_id is created successfully"
            ]);

            return redirect()->route('products-prices-list');
        }

        return view('products.prices.edit', compact('categories', 'products', 'dimensions','price'));
    }
    public function delete(Price $price){
        
        $price->delete();
        
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Product: $price->product_id is deleted successfully"
        ]);

       return redirect()->route('products-prices-list');
    }

}
