<?php

namespace App\Services;

use App\Models\WishProduct;

class WishProductService
{
    private $wishProductModel;

    /**
     * WishProductService constructor.
     * @param WishProduct $wishProductModel
     */
    public function __construct(WishProduct $wishProductModel)
    {
        $this->wishProductModel = $wishProductModel;
    }
}