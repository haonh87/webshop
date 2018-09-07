<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';

    protected $fillable = ['id', 'user_id', 'product_id', 'star', 'comment', 'actived'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }
}
