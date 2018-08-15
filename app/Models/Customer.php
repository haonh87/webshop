<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = array('name', 'address', 'gender', 'phone', 'mobile', 'user_id');
}
