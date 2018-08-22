<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Cart;

class CartComposer
{
    protected $cartShare;
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        $this->cartShare = Cart::content();
    }
    public function compose(View $view)
    {
        $view->with('cartShare', $this->cartShare);
    }
}