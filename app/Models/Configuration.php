<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = 'configurations';
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'value',
        'create_user_id',
        'modified_user_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';
}
