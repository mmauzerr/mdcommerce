<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Scope a query to only include active pages.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('deleted', '=', '0');
    }
    
    public function scopeVisible($query)
    {
        return $query->where('visible', '=', '1');
    }
}
