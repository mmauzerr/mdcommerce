<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Products\Product;
use App\Model\Products\Category;
use Intervention\Image\Facades\Image;
use App\Model\Products\Dimension;
use App\Model\Products\Color;
use App\Model\Products\Foam;
use Illuminate\Support\Facades\DB;




class ProductsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(Product $product )
    {
        $products = Product::all();
         
        return  view('products.products.index',compact('products'));
    } 
    
    public function create(Request $request){
        
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
        
        
        $dimensions = Dimension::all();
        $dimensionsPossibleValues = "";
        if(count($dimensions) > 0){
            $i = 0;
            foreach ($dimensions as $dimension) {
                if($i != 0){
                    $dimensionsPossibleValues .= ',';
                }
                $dimensionsPossibleValues .= $dimension->id;
                $i++;
            }
        }
        
       
        
        $colors = Color::all();
         $colorsPossibleValues = "";
        if(count($colors) > 0){
            $i = 0;
            foreach ($colors as $color) {
                if($i != 0){
                    $colorsPossibleValues .= ',';
                }
                $colorsPossibleValues .= $color->id;
                $i++;
            }
        }
        $foams = Foam::all();
        $foamsPossibleValues = "";
        if(count($foams) > 0){
            $i = 0;
            foreach ($foams as $foam) {
                if($i != 0){
                    $foamsPossibleValues .= ',';
                }
                $foamsPossibleValues .= $foam->id;
                $i++;
            }
        }
        
        $heights = DB::table('heights')->get();
        $heightsPossibleValues = "";
        if(count($heights) > 0){
            $i = 0;
            foreach ($heights as $height) {
                if($i != 0){
                    $heightsPossibleValues .= ',';
                }
                $heightsPossibleValues .= $height->id;
                $i++;
            }
        }
        
        if(request()->isMethod('post')){
            
            $this->validate($request, [
                'category_id' => "required|in:$categoriesPossibleValues",
                'name' => 'required|max:191',
                'descrtiption' => 'max:191',
                'text' => 'required',
                'image' => 'file|mimes:jpeg,bmp,png'
            ]);
            
            
            
            
            $product = new Product();
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->text = $request->input('text');
            $product->type = $request->input('type');
            $product->height_id = $request->input('height_id');
            
            $dimensions = request('dimension_id');
            foreach($dimensions as $key => $dimension){
                $dimensions[$key] = "#" . $dimension . "#";
            }
            $product->dimension_id = implode(",", $dimensions);
            $product->color_id = $request->input('color_id');
            $product->foam_id = $request->input('foam_id');
            
            
            $image = "";
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.products-uploads-path');
               
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
            
            
            $product->image = $image;
            
            $product->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Product: $product->name is created successfully"
            ]);
            
            return redirect()->route('products-list');
        }
        return  view('products.products.create',compact('products','categories','dimensions','colors','foams','types','heights'));
    }
    
    public function edit(Request $request, Product $product){
        
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
        
        
        $dimensions = Dimension::all();
        $dimensionsPossibleValues = "";
        if(count($dimensions) > 0){
            $i = 0;
            foreach ($dimensions as $dimension) {
                if($i != 0){
                    $dimensionsPossibleValues .= ',';
                }
                $dimensionsPossibleValues .= $dimension->id;
                $i++;
            }
        }
        
       
        
        $colors = Color::all();
         $colorsPossibleValues = "";
        if(count($colors) > 0){
            $i = 0;
            foreach ($colors as $color) {
                if($i != 0){
                    $colorsPossibleValues .= ',';
                }
                $colorsPossibleValues .= $color->id;
                $i++;
            }
        }
        $foams = Foam::all();
        $foamsPossibleValues = "";
        if(count($foams) > 0){
            $i = 0;
            foreach ($foams as $foam) {
                if($i != 0){
                    $foamsPossibleValues .= ',';
                }
                $foamsPossibleValues .= $foam->id;
                $i++;
            }
        }
        
        $heights = DB::table('heights')->get();
        $heightsPossibleValues = "";
        if(count($heights) > 0){
            $i = 0;
            foreach ($heights as $height) {
                if($i != 0){
                    $heightsPossibleValues .= ',';
                }
                $heightsPossibleValues .= $height->id;
                $i++;
            }
        }
        
        if(request()->isMethod('post')){
            
            $this->validate($request, [
                'category_id' => "required|in:$categoriesPossibleValues",
                'name' => 'required|max:191',
                'descrtiption' => 'max:191',
                'text' => 'required',
                'image' => 'file|mimes:jpeg,bmp,png'
            ]);
            
            
            
            
            
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->text = $request->input('text');
            $product->type = $request->input('type');
            $product->height_id = $request->input('height_id');
            
            $dimensions = request('dimension_id');
            foreach($dimensions as $key => $dimension){
                $dimensions[$key] = "#" . $dimension . "#";
            }
            $product->dimension_id = implode(",", $dimensions);
            $product->color_id = $request->input('color_id');
            $product->foam_id = $request->input('foam_id');
            
            
            $image = "";
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.products-uploads-path');
               
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
            
            
            $product->image = $image;
            
            $product->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Product: $product->name is created successfully"
            ]);
            
            return redirect()->route('products-list');
        }
        return  view('products.products.edit',compact('products','categories','dimensions','colors','foams','types','heights','product'));
    }
    
     public function changeStatus(Product $product){
       
        if($product->visible == 1){
            $product->visible = 0;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Product: $product->name is hidden successfully"
            ]);
        }else{
            $product->visible = 1;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Product: $product->name is activated successfully"
            ]);
        }
        
        $product->save();
        

        return redirect()->route('products-list');
    }
    
    public function deleteImage(Product $product){
        $product->image = "";
        $product->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Image for page: $product->name is deleted successfully"
        ]);

        return redirect()->route('products-list');
    }
    
    public function delete(Product $product){
        $product->deleted = 1;
        $product->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Product: $product->name is deleted successfully"
        ]);

       return redirect()->route('products-list');
    }
}
