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

    public function saveProduct($dataProduct)
    {
        $dataProduct['product_color_ids'] = isset($dataProduct['product_color_ids']) ? implode(',', $dataProduct['product_color_ids']) : '';
        $dataProduct['product_size_ids'] = isset($dataProduct['product_size_ids']) ? implode(',', $dataProduct['product_size_ids']) : '';
        $dataProduct['create_user_id'] = Auth::user()->id;
        $dataProduct['slug'] = str_slug($dataProduct['name'], '-');
        $this->productModel->fill($dataProduct)->save();
        return $this->productModel->id;
    }

    public function updateProduct($dataProduct, $id)
    {
        $dataProduct['product_color_ids'] = isset($dataProduct['product_color_ids']) ? implode(',', $dataProduct['product_color_ids']) : '';
        $dataProduct['product_size_ids'] = isset($dataProduct['product_size_ids']) ? implode(',', $dataProduct['product_size_ids']) : '';
        $dataProduct['modified_user_id'] = Auth::user()->id;
        $dataProduct['slug'] = str_slug($dataProduct['name'], '-');
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
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id')->orderBy('total_star', 'desc')
            ->limit($numberProducts)->get();
    }

    public function getNewProduct($numberProducts)
    {
        return $this->productModel->with('category')->with('productImages')
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id')->orderBy('products.created_at', 'desc')
            ->limit($numberProducts)->get();
    }

    public function getAllProductForView($categoryId, $dataRequest)
    {
        $result = $this->productModel->with('category')->with('productImages')
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id');
        if (!empty($categoryId)) {
            $result->where('products.category_id', $categoryId);
        }
        if (isset($dataRequest['orderby']) && $dataRequest['orderby'] != 'default') {
            $convert = explode('-', $dataRequest['orderby']);
            $result->orderBy($convert[0], $convert[1]);
        } else {
            $result->orderBy('products.created_at', 'desc');
        }
        if (isset($dataRequest['color']) && $dataRequest['color'] != 'default') {
            $result->where('products.product_color_ids', 'LIKE', '%'.$dataRequest['color'].'%');
        }
        if (isset($dataRequest['size']) && $dataRequest['size'] != 'default') {
            $result->where('products.product_size_ids', 'LIKE', '%'.$dataRequest['size'].'%');
        }
        if (isset($dataRequest['search'])) {
            $result->where('products.name', 'LIKE', '%'.$dataRequest['search'].'%');
        }
        if (isset($dataRequest['price']) && $dataRequest['price'] == 'other') {
            $result->where('products.price', '>=', 100000);
        }elseif(isset($dataRequest['price']) && $dataRequest['price'] != 'other') {
            $result->where('products.price', '<=', $dataRequest['price']);
        }
        return $result;
    }

    public function findProductByIdView($id)
    {
        return $this->productModel->with('category')->with('productImages')
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id')->where('products.id', $id)->first();
    }

    public function getRelateProduct($product)
    {
        return $this->productModel->with('category')->with('productImages')
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id')->where('products.id', '!=',$product->id)
            ->where('products.category_id', $product->category_id)->limit(4)->get();
    }

    public function getMaxMinPrice()
    {
        return $this->productModel->select(DB::raw("MAX(price) AS max_price"), DB::raw("MIN(price) AS min_price"))->first();
    }

    public function getRecentlyProduct($ids = null)
    {
        $result = $this->productModel->with('category')->with('productImages')
            ->select('*', 'products.id',DB::raw('AVG(votes.star) as total_star'))
            ->leftJoin('votes', 'votes.product_id', '=', 'products.id')
            ->groupBy('products.id')->whereIn('products.id', $ids);
        return $result;
    }

    public function updateSellCount($id, $qty) {
        $product = $this->productModel->find($id);
        $dataProduct['sell_count'] = $product->sell_count - $qty;
        if ($dataProduct['sell_count'] < 0) {
            $dataProduct['sell_count'] = 0;
        }
        $product->update($dataProduct);
    }
}