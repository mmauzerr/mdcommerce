<?php

namespace App\Model\Products;

use Illuminate\Database\Eloquent\Model;
use App\Model\Products\Product;

class Category extends Model
{
    protected $table = 'product_categories';
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
