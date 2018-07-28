<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Excel;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\Category;
use App\Models\Silk;
use LaravelLocalization;
class Product extends Model
{

     protected $fillable = array('name', 'artice_id', 'category_id', 'silk_id', 'price');

    /**
     * Relation ship with categories table
     * return category which this belongs to
     * */
    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    /**
     * Relation ship with ProductColor table 
     * get all color for this product
     **/
    public function productColor()
    {
    	return $this->hasMany('App\Models\ProductColor');
    }

    /**
     * Relation ship with ProductSize table
     * get all size for this product
     **/
    public function productSize()
    {
    	return $this->hasMany('App\Models\ProductSize');
    }

    /**
     * Relationship vote tables
     * get all vote for this product (star, comment)
     * */

    public function votes()
    {
        return $this->hasMany('App\Models\Vote');
    }

    /**
     * Function get average user vote
     * return num of vote
     * */
    public function getStar()
    {
        $model = DB::table('votes')->join('products', 'votes.product_id', '=', 'products.id')
                    ->select(DB::raw('count(*) as total_vote, sum(votes.star) as total_star'))
                    ->where('votes.product_id', '=', $this->id)
                    ->get();
        $star = 0;
        foreach ($model as $value) {
            if(!empty($value->total_star) && !empty($value->total_vote))
            $star .= $value->total_star/$value->total_vote;
        }
        return $star;
    }

    public function getIndexImage()
    {
        $product_color = DB::table('product_colors')
                        ->join('products', 'product_colors.product_id', '=', 'products.id')
                        ->where('product_colors.product_id', '=', $this->id)
                        ->where('product_colors.show_index', '=', 1)
                        ->select('product_colors.picture')
                        ->get();
        if(!isset($product_color[0])){
            return $this->productColor()->first()->picture;
        }
        return $product_color[0]->picture;
    }

    public static function search($key, $cate=null)
    {   
        if(empty($key) && empty($cate)){
            return Product::paginate(10);
        }
        $products = Product::whereRaw(
            "MATCH(name_en, name_ru, description_en, description_ru) AGAINST(? IN BOOLEAN MODE)", 
            array($key)
        );
        if(!is_null($cate)){
            $products = $products->where('category_id',(int)$cate);
        }
        return $products->paginate(10);

    }

    public static function importProduct($products){

        foreach ($products as $product) {

            $category = Category::where('name_ru',$product['cat_name'])->first();
            if(is_null($category)){
                $category = new Category;
                $category->name_ru=$product['cat_name'];
                $category->save();
            }
            $silk = Silk::where('code',$product['silk_code'])->first();
            if(is_null($silk)){
                $silk = new Silk;
                $silk->code = $product['silk_code'];
                $silk->save();
            }
            $product_id = self::inserProduct($product, $category->id, $silk->id);
            $productSize = ProductSize::where('product_id',$product_id)->where('size',$product['size'])->first();
            if(is_null($productSize)){
                $productSize = new ProductSize;
                $productSize->size = $product['size'];
                $productSize->product_id = $product_id;
                $productSize->save();
            }
            $productColor = ProductColor::where('product_id',$product_id)->where('color_id',$product['color'])->first();
            if(is_null($productColor)){
                $productColor = new ProductColor;
                $productColor->color_id=$product['color'];
                $productColor->product_id=$product_id;
                $productColor->save();
            }
        }
    }

    private static function inserProduct($product,$category_id,$silk_id){
        $dbProduct = Product::where('artice_id',$product['product_code'])->first();
            if(is_null($dbProduct)){
                $dbProduct = new Product;
                $dbProduct->artice_id = $product['product_code'];
            }
            $dbProduct->name_ru=$product['name'];
            $dbProduct->category_id = $category_id;
            $dbProduct->silk_id = $silk_id;
            $dbProduct->model = $product['model'];
            $dbProduct->price = $product['price'];
            $dbProduct->country = $product['country'];
            $dbProduct->save();
            return $dbProduct->id;
    }

    public function localeName(){
        if(LaravelLocalization::getCurrentLocale() =='ru')
            return $this->name_ru;
        else{
            if(!empty($this->name_en)){
                return $this->name_en;
            }
            else{
                return $this->name_ru;
            }
        }
    }
    public function localeDescription(){
        if(LaravelLocalization::getCurrentLocale() =='ru')
            return $this->description_ru;
        else{

            if(!empty($this->description_en)){
                return $this->description_en;
            }
            else{

                return $this->description_ru;
            }
        }
    }
    public function localeStatus(){
        if(LaravelLocalization::getCurrentLocale() =='ru')
            return $this->status_ru;
        else{
            if(!empty($this->status_en)){
                return $this->status_en;
            }
            else{
                return $this->status_ru;
            }
        }
    }
}
