<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    private $productModel;

    /**
     * ProductService constructor.
     * @param Product $productModel
     */
    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }
}