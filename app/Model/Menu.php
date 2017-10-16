<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function topmenu(){
        return $this->belongsTo(Menu::class, 'parent_id');
    }
    
    public function submenus(){
        return $this->hasMany(Menu::class, 'parent_id');
    }
    
    public function scopeVisible($query, $value = 1){
        return $query->where('visible', '=', $value);
    }
    
    public function scopeFirstLevelMenu($query){
        return $query->where('parent_id', '=', 0);
    }
    
    public function scopeWithParent($query, $parentId){
        return $query->where('parent_id', '=', $parentId);
    }
    
    public function scopePosition($query, $position){
        $query->where('position', 'like', "%#$position#%");
    }
    
    public static function getLastPosition($parentId){
        $row = Menu::where('parent_id', '=', $parentId)->orderBy('priority', 'desc')->first();
        if(!empty($row)){
            return $row->priority + 1;
        }else{
            return 0;
        }
    }
    
    public function getSlug(){
        switch ($this->type) {
            case 'just-title':
                return "#";
            break;
            case 'internal-link':
            case 'external-link':
                return $this->type_value;
            break;
            case 'page':
                return "/page/" . $this->type_value . "/" . str_slug($this->title); 
            break;
            case 'products':
                return "/proizvodi/" . $this->type_value . "/" . str_slug($this->title);
            break;
        }
    }
}
