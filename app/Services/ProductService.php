<?php

namespace App\Services;

use App\Models\Product;
use Auth;
use DB;

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

    public function saveProduct($dataProduct, $dataColor)
    {
        $dataProduct['product_color_ids'] = isset($dataColor) ? implode(',', $dataColor) : '';
        $dataProduct['product_size_ids'] = isset($dataProduct['product_size_ids']) ? implode(',', $dataProduct['product_size_ids']) : '';
        $dataProduct['create_user_id'] = Auth::user()->id;
        $this->productModel->fill($dataProduct)->save();
        return $this->productModel->id;
    }

    public function updateProduct($dataProduct, $dataColor, $id)
    {
        $dataProduct['product_color_ids'] = isset($dataColor) ? implode(',', $dataColor) : '';
        $dataProduct['product_size_ids'] = isset($dataProduct['product_size_ids']) ? implode(',', $dataProduct['product_size_ids']) : '';
        $dataProduct['modified_user_id'] = Auth::user()->id;
        $product = $this->productModel->find($id);
        $product->update($dataProduct);
    }

    public function deleteProduct($productId)
    {
        $this->productModel->find($productId)->delete();
    }

    public function searchProduct($proName, $cateId)
    {
        return $this->productModel->where('id', '!=', '')
            ->where('category_id', $cateId)
            ->where('name', 'like', '%'.$proName.'%')
            ->with('category')->with('productImages');
    }

    public function getFeatureProducts($numberProducts)
    {
        return $this->productModel->with('category')->with('productImages')
            ->select('*', 'votes.product_id', DB::raw('AVG(votes.star) as total_star'))
            ->rightJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('votes.product_id')->orderBy('total_star', 'desc')
            ->limit($numberProducts)->get();
    }

    public function getNewProduct($numberProducts)
    {
        return $this->productModel->with('category')->with('productImages')
            ->select('*', 'votes.product_id', DB::raw('AVG(votes.star) as total_star'))
            ->rightJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('votes.product_id')->orderBy('products.created_at', 'desc')
            ->limit($numberProducts)->get();
    }

    public function getAllProductForView($categoryId)
    {
        $result = $this->productModel->with('category')->with('productImages')
            ->select('*', 'votes.product_id', DB::raw('AVG(votes.star) as total_star'))
            ->rightJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('votes.product_id')->orderBy('products.created_at', 'desc');
        if (!empty($categoryId)) {
            $result->where('products.category_id', $categoryId);
        }
        return $result;
    }

    public function getMaxMinPrice()
    {
        return $this->productModel->select(DB::raw("MAX(price) AS max_price"), DB::raw("MIN(price) AS min_price"))->first();
    }
}