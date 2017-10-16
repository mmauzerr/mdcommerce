<?php

namespace App\Model\Products;
use App\Model\Products\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
