<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Menu;

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
