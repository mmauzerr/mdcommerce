<?php

namespace App\Model\Products;


use Illuminate\Database\Eloquent\Model;
use App\Model\Products\Category;
use App\Model\Products\Dimension;
use App\Model\Products\Color;
use App\Model\Products\Foam;
use App\Model\Products\Price;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function dimensions(){
        return $this->hasMany(Dimension::class);
    }
    public function colors(){
        return $this->hasMany(Color::class);
    }
    public function foams(){
        return $this->hasMany(Foam::class);
    }
    public function prices(){
        return $this->hasMany(Foam::class);
    }
    
    
}
