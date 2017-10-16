<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\Page;
use App\Model\Products\Category;

class MenusController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Menu $menu){
        
        if(!empty($menu->id)){
            // first level is with parent_id = $menu->id
            $menusFirstLevel = Menu::withParent($menu->id)->orderBy('priority', 'asc')->get();
            $parentId = $menu->parent_id;
        }else{
            // first level is with parent_id = 0
            $menusFirstLevel = Menu::withParent(0)->orderBy('priority', 'asc')->get();
            $parentId = 0;
        }
        
        if(count($menusFirstLevel) == 0){
            if($parentId == 0){
                return redirect(route('menus-list'));
            }else{
                return redirect(route('menus-list', $parentId));
            }
        }
        
        return view('menus.index', compact('menusFirstLevel', 'subMenus', 'menu'));
    }
    
    public function reorder(){
        $menuId = request('menu');
        $newState = request('new-state');
        $newState = explode(",", $newState);
        
        if(count($newState) > 0){
            foreach ($newState as $key => $value) {
                $menu = Menu::find($value);
                if($menu){
                    $menu->priority = $key;
                    $menu->save();
                }
            }
        }
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Menus reordered successfully"
        ]);
        
        return back();
        
        
    }
    
    public function create(){
        $menusFirstLevel = Menu::firstLevelMenu()->get();
        
        $menuPossibleValues = "0";
        if(count($menusFirstLevel) > 0){
            foreach ($menusFirstLevel as $menu) {
                $menuPossibleValues .= "," . $menu->id;
                if(count($menu->submenus) > 0){
                    foreach ($menu->submenus as $value) {
                        $menuPossibleValues .= "," . $value->id;
                    }
                }
            }
        }
        
        $pages = Page::active()->get();
        $pagesPossibleValues = "";
        if(count($pages) > 0){
            $i = 0;
            foreach ($pages as $page) {
                if($i != 0){
                    $pagesPossibleValues .= ',';
                }
                $pagesPossibleValues .= $page->id;
                $i++;
            }
        }
        
        $categories = Category::all();
        $categoriesPossibleValues = "";
        if(count($categories) > 0){
            $i = 0;
            foreach ($categories as $category) {
                if($i != 0){
                    $categoriesPossibleValues .= ',';
                }
                $categoriesPossibleValues .= $category->id;
                $i++;
            }
        }
        
        
        
        
        if(request()->isMethod('post')){
            $this->validate(request(),[
                'title' => 'required|max:191',
                'parent_id' => "required|in:$menuPossibleValues",
                'position' => 'required|array',
                'position.*' => 'in:top,header,sidebar,footer',
                'type' => 'required|in:just-title,internal-link,external-link,page,products'
            ]);
            
            $type = request('type');
            $typeValue = NULL;
            switch ($type) {
                case 'internal-link':
                    $this->validate(request(),[
                        'internal-link-value' => 'required'
                    ]);
                    $typeValue = request('internal-link-value');
                break;
                case 'external-link':
                    $this->validate(request(),[
                        'external-link-value' => 'required|url'
                    ]);
                    $typeValue = request('external-link-value');
                break;
                case 'page':
                    $this->validate(request(),[
                        'page-value' => "required|in:$pagesPossibleValues"
                    ]);
                    $typeValue = request('page-value');
                break;
                case 'products':
                    $this->validate(request(),[
                        'products-value' => "required|in:$categoriesPossibleValues"
                    ]);
                    $typeValue = request('products-value');
                break;
            }
            
            $menu = new Menu();
            $menu->title = request('title');
            $menu->parent_id = request('parent_id');
            $menu->type = request('type');
            $menu->type_value = $typeValue;
            
            $positions = request('position');
            foreach($positions as $key => $position){
                $positions[$key] = "#" . $position . "#";
            }
            $menu->position = implode(",", $positions);
            $menu->priority = Menu::getLastPosition(request('parent_id'));
            
            $menu->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Menu: $menu->title is created successfully"
            ]);
            
            return redirect()->route('menus-list');
        }
        
        return view('menus.create', compact('menusFirstLevel', 'pages','categories'));
    }
    
    public function edit(Menu $menu){
        $menusFirstLevel = Menu::firstLevelMenu()->get();
        
        $menuPossibleValues = "0";
        if(count($menusFirstLevel) > 0){
            foreach ($menusFirstLevel as $value) {
                $menuPossibleValues .= "," . $value->id;
                if(count($value->submenus) > 0){
                    foreach ($value->submenus as $value2) {
                        $menuPossibleValues .= "," . $value2->id;
                    }
                }
            }
        }
        
        $pages = Page::active()->get();
        $pagesPossibleValues = "";
        if(count($pages) > 0){
            $i = 0;
            foreach ($pages as $page) {
                if($i != 0){
                    $pagesPossibleValues .= ',';
                }
                $pagesPossibleValues .= $page->id;
                $i++;
            }
        }
        
        if(request()->isMethod('post')){
            $this->validate(request(),[
                'title' => 'required|max:191',
                'parent_id' => "required|in:$menuPossibleValues",
                'position' => 'required|array',
                'position.*' => 'in:top,header,sidebar,footer',
                'type' => 'required|in:just-title,internal-link,external-link,page'
            ]);
            
            $type = request('type');
            $typeValue = NULL;
            switch ($type) {
                case 'internal-link':
                    $this->validate(request(),[
                        'internal-link-value' => 'required'
                    ]);
                    $typeValue = request('internal-link-value');
                break;
                case 'external-link':
                    $this->validate(request(),[
                        'external-link-value' => 'required|url'
                    ]);
                    $typeValue = request('external-link-value');
                break;
                case 'page':
                    $this->validate(request(),[
                        'page-value' => "required|in:$pagesPossibleValues"
                    ]);
                    $typeValue = request('page-value');
                break;
            }
            
            // if new parent != old parent_id
            if(request('parent_id') != $menu->parent_id){
                $menu->priority = Menu::getLastPosition(request('parent_id'));
            }
            
            $menu->title = request('title');
            $menu->parent_id = request('parent_id');
            $menu->type = request('type');
            $menu->type_value = $typeValue;
            
            $positions = request('position');
            foreach($positions as $key => $position){
                $positions[$key] = "#" . $position . "#";
            }
            $menu->position = implode(",", $positions);
            
            $menu->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Menu: $menu->title updated successfully"
            ]);
            
            if($menu->parent_id > 0){
                return redirect(route('menus-list', $menu->parent_id));
            }else{
                return redirect(route('menus-list'));
            }
        }
        
        return view('menus.edit', compact('menusFirstLevel', 'pages', 'menu'));
    }
    
    public function changeStatus(Menu $menu){
       
        if($menu->visible == 1){
            $menu->visible = 0;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Menu: $menu->title is hidden successfully"
            ]);
        }else{
            $menu->visible = 1;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Menu: $menu->title is activated successfully"
            ]);
        }
        
        $menu->save();
        

        if($menu->parent_id > 0){
            return redirect(route('menus-list', $menu->parent_id));
        }else{
            return redirect(route('menus-list'));
        }
    }
    
    public function delete(Menu $menu){
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Menu: $menu->title was deleted successfully"
        ]);

        $parentId = $menu->parent_id;
        $menu->delete();
        
        if($parentId > 0){
            return redirect(route('menus-list', $parentId));
        }else{
            return redirect(route('menus-list'));
        }
    }
}
