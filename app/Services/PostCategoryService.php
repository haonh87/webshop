<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:36 AM
 */

namespace App\Services;

use App\Models\PostCategory;

/**
 * Class PostCategoryService
 * @package App\Services
 */
class PostCategoryService
{
    public $parentIdDefault = 0;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * Get category list
     *
     * @param string $field
     * @param string $value
     * @param string $operation
     * @param int $pagination
     * @return mixed
     */
    public function getCategoryList($pagination = 0, $field = '', $value = '', $operation = '')
    {
        if ($field && $value && $operation) {
            $categories = PostCategory::where($field, $operation, $value)->get();
        } else {
            $categories = PostCategory::paginate($pagination);
        }

        if (count($categories) > 0) {
            foreach ($categories as $cateKey => $catevalue) {
                $parentCateName = $catevalue->name;
                if ($catevalue->parent_id && $catevalue->parent_id != 0) {
                    $parentCate = PostCategory::where('id', '=', $catevalue->parent_id)->first();
                    $parentCateName = $parentCate['name'];
                }
                $categories[$cateKey]['parent_name'] = $parentCateName;
            }
        }

        return $categories;
    }

    /**
     * Create new category
     *
     * @param $input
     * @return bool
     */
    public function createNewCategory($input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $category = new PostCategory();
                $input['lang_code'] = DEFAULT_LANGUAGE;

                if (!$input['parent_id']) {
                    $input['parent_id'] = $this->parentIdDefault;
                }
                $category->fill($input);
                if ($category->save()) {
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
     * Update old category
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateCategory($id, $input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $category = PostCategory::findOrFail($id);

                $input['lang_code'] = DEFAULT_LANGUAGE;

                if (!$input['parent_id']) {
                    $input['parent_id'] = $this->parentIdDefault;
                }

                $category->fill($input);

                if ($category->save()) {
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
     * Delete category
     *
     * @param $id
     * @return bool
     */
    public function deleteCategory($id)
    {
        $category = PostCategory::findOrFail($id);
        if ($category->delete()) {
            return true;
        } else {
            return false;
        }
    }
}