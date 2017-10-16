<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Page;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Model\Products\Category;
use App\Model\Products\Product;
use App\Model\Products\Dimension;

class OpenController extends Controller {

    public function page(Page $page) {

        if ($page->visible == 0) {
            abort(404, "Page not found");
        }

        return view('open.page', compact('page'));
    }

    public function contactForm() {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ]);

        // send email to user
        Mail::to(request('email'))->send(new ContactForm(request('name'), request('email'), request('text')));

        // send email to admin
        Mail::to('goranbloncar@gmail.com')->send(new ContactForm(request('name'), request('email'), request('text')));


        session()->flash('message', [
            'status' => 'success',
            'text' => "Thank you for your contact."
        ]);

        return back();
    }

    public function products(Category $category) {
        $products = Product::where('category_id', '=', $category->id)->get();

        return view('open.products.products', compact('products'));
    }

    public function product(Product $product) {
       
        $dimensions = Dimension::all();
        $mattresses = Product::where('category_id',1)->get();
       
        switch ($product->category_id) {
            case 1:
                if($product->category_id == 1){
                   
                  return view('open.mattress', compact('product','dimensions','mattresses'));  
                }
                

                break;
            case 2:
                if($product->category_id == 2){
                  return view('open.upholstery', compact('product'));  
                }

                break;
            case 3:

                if($product->category_id == 3){
                  return view('open.sponges', compact('product'));  
                }
                break;
        }
        
    }

}
