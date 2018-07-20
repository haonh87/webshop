<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function product(){
    	return $this->belongsTo('App\Models\Product');
    }

    public function color(){
    	return $this->belongsTo('App\Models\ProductColor','product_color_id');
    }
    public function size(){
    	return $this->belongsTo('App\Models\ProductSize','product_size_id');
    }
}
