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

    const COPYRIGHT_ID = 1;
    const PHONE_NUMBER_ID = 3;
    const ADDRESS_ID = 2;
    const MOBILE_PHONE_ID = 4;
    const EMAIL_ID = 5;
}
