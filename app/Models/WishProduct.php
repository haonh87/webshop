<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class WishProduct extends Model
{
    protected $table = 'wish_products';

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public static function wishListGetId($product_id, $user_id)
    {
    	return DB::table('wish_products')->where('user_id', $user_id)
    								->where('product_id', $product_id)
    								->delete();;
    }
}
