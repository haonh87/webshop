<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class ProductImage extends BaseModel
{
    protected $table = 'product_images';

    protected $fillable = array('product_id', 'img_path', 'created_at', 'updated_at');
}
