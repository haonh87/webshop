<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Product;
use Illuminate\Support\Collection;
use LaravelLocalization;

class Category extends Model
{
    protected $fillable = array('name');
    protected $table = 'categories';
    /**
     * Relationship product
     * Return all product of category 
     **/
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * get sub category of this
     * @return all category is children.
     * @parram int category id
     *  
     * */
    public static function getSubCategoryById($id)
    {
        return Category::where('parrent_id',$id)->get();
    }


    /**
     * Return all categories include children and grandchildren ...., which has not sub categorie(s)
     * @param , return category array.
     **/
    public function getCategorieAndSubCategories(array &$categories)
    {
    	$sub_cates = Category::where('parrent_id',$this->id)->get();
        if($sub_cates->count() > 0){
            foreach ($sub_cates as $cate) {
                $cate->getCategorieAndSubCategories($categories);
            }
        }
        else{
            $categories[] = $this;
        }
        return $categories;
    }
    /**
     * get posts of current category and posts of sub category
     * sub category which belongsto current category. Then sorted by view_count  for product reicepted.
     * 
     * @return all posts of categories as collection type
     * @parram a reference category array
     * 
     * */
    public static function getPostsFromCategories(array $categories,array $arrayParram)
    {
        $products = new Collection;
        foreach ($categories as $key =>$category) {
            $productInCategory = $category->product()->orderBy($arrayParram['field'], $arrayParram['option'])->take($arrayParram['take'])->get();
            foreach($productInCategory as $product) {
                $products->push($product);
            }
        }
        //dump($products);
        if($arrayParram['option']=='DESC'){
            return $products->sortByDesc($arrayParram['field']);
        }
        else{
            return $products->sortBy($arrayParram['field']);
        }
    }
    /**
     * Function print menu for view
     * @parram array object
     * @parram string reference
     * @return  String unorder list for menu
     * */
    public static function getMenu($categories, &$menu){
        foreach($categories as $category){
            //$menu .= '<li><a href=' . '{{route("category",' . '["id"=>' . $category->id . '])' . '}}>' .$category->localeName().'</a>';
            $menu .= '<li><a href="#">'.$category->localeName().'</a>';
            $sub_cates = Category::getSubCategoryById($category->id);
            if(!$sub_cates->isEmpty()){
                $menu.="<ul>";
                Category::getMenu($sub_cates, $menu);
                $menu.="</ul>";
            }
            $menu.= "</li>";
        }
        return $menu;
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
}
