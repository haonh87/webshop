<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;

class ProductColor extends Model
{
    protected $fillable = array('product_id','color_id');

    public function localeColor(){
        if(LaravelLocalization::getCurrentLocale() =='ru')
            return $this->color_ru;
        else{
        	if(!empty($this->color_en)){
            	return $this->color_en;
        	}
        	else{
        		return $this->color_ru;
        	}
        }
    }
}
