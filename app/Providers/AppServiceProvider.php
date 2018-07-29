<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\WishProduct;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $count_wishlist = 0;
        $menu = '<ul class = "menu sf-menu">';
        $categories = Category::where('parent_id', 0)->get();
        $menu = Category::getMenu($categories, $menu);
        $menu.='</ul>';
        if(Auth::check())
        {
            $count_wishlist = Auth::user()->wishList()->count();
        }

        \View::share('menu', $menu);
        \View::share('count_wishlist', $count_wishlist);
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
