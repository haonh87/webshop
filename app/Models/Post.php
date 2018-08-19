<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon as Carbon;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    /**
     * @var string
     */
    protected $table = 'posts';
    /**
     * @var array
     */
    protected $fillable = [
        'post_categories_id',
        'title',
        'description',
        'content',
        'image_url',
        'lang_code',
        'create_user_id',
        'modified_user_id'
    ];

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    public function postCategories() {
        return $this->belongsTo(PostCategory::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d,Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d,Y');
    }
}
