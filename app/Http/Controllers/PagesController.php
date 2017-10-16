<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Intervention\Image\Facades\Image;

class PagesController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index(){
        $pages = Page::active()->get();
        
        return view('pages.index', compact('pages'));
    }
    
    public function create(Request $request){
        if($request->isMethod('post')){
            $this->validate($request, [
                'title' => 'required|max:191',
                'text' => 'required',
                'seo_title' => 'required|max:191',
                'seo_description' => 'max:255',
                'seo_keywords' => 'max:255',
                'image' => 'file|mimes:jpeg,bmp,png',
                'contact_form' => 'required|in:0,1',
                'layout' => 'required|in:fullwidth,leftbar,rightbar'
            ]);
            $page = new Page();
            $page->title = $request->input('title');
            $page->description = $request->input('description');
            $page->text = $request->input('text');
            $page->seo_title = $request->input('seo_title');
            $page->seo_description = $request->input('seo_description');
            $page->seo_keywords = $request->input('seo_keywords');
            $page->contact_form = $request->input('contact_form');
            $page->layout = $request->input('layout');
            
            $image = "";
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.pages-uploads-path');
                //$fileName = $request->file('image')->getClientOriginalName();
                $fileName = str_slug($request->input('title'), '-') . "." . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($directory), $fileName);
                $image =  $directory . $fileName;
                
                // resize image
                $img = Image::make(public_path($directory) . $fileName);
                $img->resize(817, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-xl." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(450, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-l." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-m." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-s." . $request->file('image')->getClientOriginalExtension(), 100);

            }
            
            
            $page->image = $image;
            $page->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Page: $page->title is created successfully"
            ]);
            
            return redirect()->route('pages-list');
        }
        
        
        return view('pages.create');
    }
    
    public function edit(Request $request, Page $page){
        if($request->isMethod('post')){
            $this->validate($request, [
                'title' => 'required|max:191',
                'text' => 'required',
                'seo_title' => 'required|max:191',
                'seo_description' => 'max:255',
                'seo_keywords' => 'max:255',
                'image' => 'file|mimes:jpeg,bmp,png',
                'contact_form' => 'required|in:0,1',
                'layout' => 'required|in:fullwidth,leftbar,rightbar'
            ]);

            $page->title = $request->input('title');
            $page->description = $request->input('description');
            $page->text = $request->input('text');
            $page->seo_title = $request->input('seo_title');
            $page->seo_description = $request->input('seo_description');
            $page->seo_keywords = $request->input('seo_keywords');
            $page->contact_form = $request->input('contact_form');
            $page->layout = $request->input('layout');
            
            $image = $page->image;
            // check image (file ) is uploaded
            if ($request->hasFile('image')) {
                $directory = config('filesystems.pages-uploads-path');
                //$fileName = $request->file('image')->getClientOriginalName();
                $fileName = str_slug($request->input('title'), '-') . "." . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->move(public_path($directory), $fileName);
                $image =  $directory . $fileName;
                
                // resize image
                $img = Image::make(public_path($directory) . $fileName);
                $img->resize(817, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-xl." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(450, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-l." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-m." . $request->file('image')->getClientOriginalExtension(), 100);

                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save(public_path($directory) . str_slug($request->input('title'), '-') . "-s." . $request->file('image')->getClientOriginalExtension(), 100);

            }
            
            
            $page->image = $image;
            $page->save();
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Page: $page->title is updated successfully"
            ]);
            
            return redirect()->route('pages-list');
        }
        
        
        return view('pages.edit', compact('page'));
    }
    
    public function delete(Page $page){
        $page->deleted = 1;
        $page->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Page: $page->title is deleted successfully"
        ]);

        return redirect()->route('pages-list');
    }
    
    public function deleteImage(Page $page){
        $page->image = "";
        $page->save();
        
        // set message to other page
        session()->flash('message', [
            'status' => 'success',
            'text' => "Image for page: $page->title is deleted successfully"
        ]);

        return redirect()->route('pages-list');
    }
    
    public function changeStatus(Page $page){
       
        if($page->visible == 1){
            $page->visible = 0;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Page: $page->title is hidden successfully"
            ]);
        }else{
            $page->visible = 1;
            
            // set message to other page
            session()->flash('message', [
                'status' => 'success',
                'text' => "Page: $page->title is activated successfully"
            ]);
        }
        
        $page->save();
        

        return redirect()->route('pages-list');
    }
    
}
