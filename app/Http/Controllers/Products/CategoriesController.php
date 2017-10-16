<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Model\Products\Category;

class CategoriesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Category $categories )
    {
        $categories = Category::all();
        return  view('products.categories.index',compact('categories'));
    } 
    
    
   public function create(Request $request){
    
        if($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|max:191',
                'text' => 'required',
                'image' => 'file|mimes:jpeg,bmp,png'
            ]);
            $category = new Category();
            $category->name = $request->input('name');
            $category->text = $request->input('text');
            
            $image = "";
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.product-categories-uploads-path');
               
                $fileName = str_slug($request->input('name'), '-') . "." . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($directory), $fileName);
                $image =  $directory . $fileName;
                
                // resize image
                $img = Image::make(public_path($directory) . $fileName);
                $img->resize(817, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-xl." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(450, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-l." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-m." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-s." . $request->file('image')->getClientOriginalExtension(), 100);

            }
            
            
            $category->image = $image;
            
            $category->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Page: $category->name is created successfully"
            ]);
            
            return redirect()->route('products-category-list');
        }
        
        
        return view('products.categories.create');
    }
    
    public function edit(Request $request, Category $category){
    
        if($request->isMethod('post')){
            $this->validate($request, [
                'name' => 'required|max:191',
                'text' => 'required',
                'image' => 'file|mimes:jpeg,bmp,png'
            ]);
            
            $category->name = $request->input('name');
            $category->text = $request->input('text');
            
            $image = "";
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.product-categories-uploads-path');
               
                $fileName = str_slug($request->input('name'), '-') . "." . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($directory), $fileName);
                $image =  $directory . $fileName;
                
                // resize image
                $img = Image::make(public_path($directory) . $fileName);
                $img->resize(817, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-xl." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(450, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-l." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-m." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('name'), '-') . "-s." . $request->file('image')->getClientOriginalExtension(), 100);

            }
            
            
            $category->image = $image;
            
            $category->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Category: $category->name is created successfully"
            ]);
            
            return redirect()->route('products-category-list');
        }
        
        
        return view('products.categories.edit',compact('category'));
    }
    
    public function deleteImage(Category $category){
        $category->image = "";
        $category->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Image for page: $category->name is deleted successfully"
        ]);

        return redirect()->route('products-category-list');
    }
    
    public function delete(Category $category){
        $category->deleted = 1;
        $category->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Category: $category->name is deleted successfully"
        ]);

       return redirect()->route('products-category-list');
    }
    
      public function changeStatus(Category $category){
       
        if($category->visible == 1){
            $category->visible = 0;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Category: $category->name is hidden successfully"
            ]);
        }else{
            $category->visible = 1;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Category: $category->name is activated successfully"
            ]);
        }
        
        $category->save();
        

        return redirect()->route('products-category-list');
    }
    
}
