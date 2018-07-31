<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaravelLocalization;
class ProductColor extends Model
{
    protected $table = 'product_colors';
    /**
     * @var array
     */
    protected $fillable = [
        'lang_code',
        'code',
        'name',
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
     * Return all product belong to color
     **/
    public function product()
    {
        return $this->hasMany('App\Models\Product');
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
