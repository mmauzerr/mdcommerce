<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Product;

class Foams extends Controller
{
     public function product(){
        return $this->belongsTo(Product::class);
    }
}
