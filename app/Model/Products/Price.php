<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products\Product;
use App\Model\Products\Dimension;

class Price extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function dimension(){
        return $this->hasOne(Dimension::class);
    }
}
