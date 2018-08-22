<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['payment_type', 'note', 'deliver_date', 'status', 'total', 'customers_id', 'created_at', 'updated_at'];

    public function orderItem()
    {
    	return $this->hasMany('App\Models\OrderItem');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Models\Customer', 'customers_id', 'id');
    }
}
