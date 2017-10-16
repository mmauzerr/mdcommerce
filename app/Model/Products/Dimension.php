<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products\Product;
use App\Model\Products\Price;

class Dimension extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function price()
    {
        return $this->hasOne(Price::class);
    }
}
