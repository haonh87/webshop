<?php

namespace App\Services;

use App\Models\ProductColor;

class ProductColorService
{
    private $productColorModel;

    /**
     * ProductColorService constructor.
     * @param ProductColor $productColorModel
     */
    public function __construct(ProductColor $productColorModel)
    {
        $this->productColorModel = $productColorModel;
    }
}