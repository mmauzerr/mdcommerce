<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Menu;
use App\Model\Products\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        view()->composer('*', function(){
            $menusHeader = Menu::withParent(0)->visible()->position('header')->orderBy('priority', 'asc')->get();
            view()->share('menusHeader', $menusHeader);
            
            $menusFooter = Menu::withParent(0)->visible()->position('footer')->orderBy('priority', 'asc')->get();
            view()->share('menusFooter', $menusFooter);
            
            $imagesFooters = Product::limit(9)->orderBy('id','desc')->get();
            view()->share('imagesFooters', $imagesFooters);
            
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
