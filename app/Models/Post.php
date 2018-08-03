<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(PostCategory::class, 'post_categories_id');
    }
}
