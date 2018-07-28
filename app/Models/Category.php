<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaravelLocalization;

class Category extends Model
{
    protected $table = 'categories';
    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'image_url',
        'lang_code',
        'create_user_id',
        'modified_user_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Relationship product
     * Return all product of category
     **/
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * Get sub category of this
     *
     * @param $id
     * @return mixed
     */
    public static function getSubCategoryById($id)
    {
        return Category::where('parent_id', $id)->get();
    }


    /**
     * Return all categories include children and grandchildren ...., which has not sub categorie(s)
     *
     * @param array $categories
     * @return array
     */
    public function getCategorieAndSubCategories(array &$categories)
    {
        $sub_cates = Category::where('parent_id', $this->id)->get();
        if ($sub_cates->count() > 0) {
            foreach ($sub_cates as $cate) {
                $cate->getCategorieAndSubCategories($categories);
            }
        } else {
            $categories[] = $this;
        }
        return $categories;
    }

    /**
     * get posts of current category and posts of sub category
     * sub category which belongsto current category. Then sorted by view_count  for product reicepted.
     *
     * @param array $categories
     * @param array $arrayParram
     * @return Collection
     */
    public static function getPostsFromCategories(array $categories, array $arrayParram)
    {
        $products = new Collection;
        foreach ($categories as $key => $category) {
            $productInCategory = $category->product()->orderBy($arrayParram['field'], $arrayParram['option'])->take($arrayParram['take'])->get();
            foreach ($productInCategory as $product) {
                $products->push($product);
            }
        }
        //dump($products);
        if ($arrayParram['option'] == 'DESC') {
            return $products->sortByDesc($arrayParram['field']);
        } else {
            return $products->sortBy($arrayParram['field']);
        }
    }

    /**
     * Function print menu for view
     * @parram array object
     * @parram string reference
     * @return  String unorder list for menu
     * */
    public static function getMenu($categories, &$menu)
    {
        foreach ($categories as $category) {
            //$menu .= '<li><a href=' . '{{route("category",' . '["id"=>' . $category->id . '])' . '}}>' .$category->localeName().'</a>';
            $menu .= '<li><a href="#">' . $category->localeName() . '</a>';
            $sub_cates = Category::getSubCategoryById($category->id);
            if (!$sub_cates->isEmpty()) {
                $menu .= "<ul>";
                Category::getMenu($sub_cates, $menu);
                $menu .= "</ul>";
            }
            $menu .= "</li>";
        }
        return $menu;
    }

    public function localeName()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ru')
            return $this->name_ru;
        else {
            if (!empty($this->name_en)) {
                return $this->name_en;
            } else {
                return $this->name_ru;
            }
        }
    }

    public function localeDescription()
    {
        if (LaravelLocalization::getCurrentLocale() == 'ru')
            return $this->description_ru;
        else {

            if (!empty($this->description_en)) {
                return $this->description_en;
            } else {

                return $this->description_ru;
            }
        }
    }
}
