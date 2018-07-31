<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use LaravelLocalization;

class ProductSize extends Model
{
    protected $table = 'product_sizes';
    /**
     * @var array
     */
    protected $fillable = [
        'lang_code',
        'name',
        'create_user_id',
        'modified_user_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Relationship product
     * Return all product belong to color
     **/
    public function product()
    {
        return $this->hasMany('App\Models\Product');
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
