<?php

namespace App\Services;

use App\Models\Post;
use App\Models\PostCategory;

/**
 * Class PostService
 * @package App\Services
 */
class PostService
{

    /**
     * PostService constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * Get post list
     *
     * @param string $field
     * @param string $value
     * @param string $operation
     * @param int $pagination
     * @param  boolean $frontend
     * @return mixed
     */
    public function getPostList($pagination = 0, $field = '', $value = '', $operation = '', $frontend = false)
    {
        if ($field && $value && $operation) {
            $post = Post::where($field, $operation, $value)->get();
        }elseif($frontend){
            $post = Post::where('id', '!=', 1)->paginate($pagination);
        }
        else {
            $post = Post::paginate($pagination);
        }

        if (count($post) > 0) {
            foreach ($post as $cateKey => $catevalue) {
                $parentCateName = $catevalue->name;
                if ($catevalue->parent_id && $catevalue->parent_id != 0) {
                    $parentCate = Post::where('id', '=', $catevalue->parent_id)->first();
                    $parentCateName = $parentCate['name'];
                }
                $post[$cateKey]['parent_name'] = $parentCateName;
            }
        }

        return $post;
    }

    /**
     * Create new post
     *
     * @param $input
     * @return bool
     */
    public function createNewPost($input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $Post = new Post();
                $input['lang_code'] = DEFAULT_LANGUAGE;
                $Post->fill($input);
                if ($Post->save()) {
                    \DB::commit();
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $exception) {
                \DB::rollback();
                \Log::error('DB Error', [$exception->getMessage()]);
                return false;
            }
        }
        return false;
    }


    /**
     * Update old post
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updatePost($id, $input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $Post = Post::findOrFail($id);
                $input['lang_code'] = DEFAULT_LANGUAGE;
                $Post->fill($input);

                if ($Post->save()) {
                    \DB::commit();
                    return true;
                } else {
                    return false;
                }
            } catch (\Exception $exception) {
                \DB::rollback();
                \Log::error('DB Error', [$exception->getMessage()]);
                return false;
            }
        }
        return false;
    }


    /**
     * Delete post
     *
     * @param $id
     * @return bool
     */
    public function deletePost($id)
    {
        $Post = Post::findOrFail($id);
        if ($Post->delete()) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $numberPosts
     * @return mixed
     */
    public function getNewestPostList($numberPosts)
    {
        $post = Post::where('id', '!=', 1)->latest()->limit($numberPosts)->get();
        return $post;
    }

}
