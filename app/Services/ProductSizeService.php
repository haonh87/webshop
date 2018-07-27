<?php

namespace App\Services;

use App\Models\ProductSize;

class ProductSizeService
{
    private $productSizeModel;

    /**
     * ProductSizeService constructor.
     * @param ProductSize $productSizeModel
     */
    public function __construct(ProductSize $productSizeModel)
    {
        $this->productSizeModel = $productSizeModel;
    }
}