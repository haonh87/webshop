<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\WishProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;


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
        $count_wishlist = 0;
        $menu = '<ul class = "menu sf-menu">';
        $categories = Category::where('parent_id', 0)->get();
        $menu = Category::getMenu($categories, $menu);
        $menu.='</ul>';
        if(Auth::check())
        {
            $count_wishlist = Auth::user()->wishList()->count();
        }

        $listConfig = \App\Models\Configuration::whereIn('id', [
            \App\Models\Configuration::ADDRESS_ID,
            \App\Models\Configuration::PHONE_NUMBER_ID,
            \App\Models\Configuration::MOBILE_PHONE_ID,
            \App\Models\Configuration::EMAIL_ID])
            ->get();

        $footerCopyright = \App\Models\Configuration::where('id', \App\Models\Configuration::COPYRIGHT_ID)->first();

        \View::share('menu', $menu);
        \View::share('count_wishlist', $count_wishlist);
        \View::share('listConfig', $listConfig);
        \View::share('footerCopyright', $footerCopyright);
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
