<?php

namespace App\Providers;
use App\Brand;
use App\category;
use Illuminate\Support\Facades\Auth;
use View;
use App\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        View::share('key', 'value');
        View::composer('front-end.includes.header', function ($view){
            $view->with('categories', category::where('publication_status', 1)->get());
        });
        View::composer('front-end.includes.footer',function ($view){
           $view->with('brands', Brand::where('publication_status', 1)->get());
        });
    }
}
