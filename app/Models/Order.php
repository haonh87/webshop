<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderItem(){
    	return $this->hasMany('App\OrderItem');
    }
}
