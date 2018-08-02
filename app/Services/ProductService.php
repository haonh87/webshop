<?php

namespace App\Services;

use App\Models\Product;
use Auth;

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

    public function getAllProduct()
    {
        return $this->productModel->where('id', '!=', '')->with('category')->with('productImages');
    }

    public function findProductById($id = null)
    {
        return $this->productModel->where('id', $id)->with('category')->with('productImages')->first();
    }

    public function saveProduct($dataProduct)
    {
        $dataProduct['product_color_ids'] = implode(',', $dataProduct['product_color_ids']);
        $dataProduct['product_size_ids'] = implode(',', $dataProduct['product_size_ids']);
        $dataProduct['create_user_id'] = Auth::user()->id;
        $this->productModel->fill($dataProduct)->save();
        return $this->productModel->id;
    }
}