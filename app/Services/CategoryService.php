<?php

namespace App\Services;

use App\Models\Category;

/**
 * Class CategoryService
 * @package App\Services
 */
class CategoryService
{
    public $parentIdDefault = 0;
    private $categoryModel;
    private $MWcategory = ['Women', 'Men'];
    /**
     * CategoryService constructor.
     */
    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
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
            $categories = Category::where($field, $operation, $value)->get();
        } else {
            $categories = Category::paginate($pagination);
        }

        if (count($categories) > 0) {
            foreach ($categories as $cateKey => $catevalue) {
                $parentCateName = $catevalue->name;
                if ($catevalue->parent_id && $catevalue->parent_id != 0) {
                    $parentCate = Category::where('id', '=', $catevalue->parent_id)->first();
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
                $category = new Category();
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
                $category = Category::findOrFail($id);
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
        $category = Category::findOrFail($id);
        if ($category->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllCategories()
    {
        return $this->categoryModel->where('id', '!=', '')->get();
    }

    public function getWMCategory()
    {
        return $this->categoryModel->whereIn('name', $this->MWcategory)->get();
    }

    public function findIdByName($categoryName = null)
    {
        return $this->categoryModel->where('name', $categoryName)->first();
    }

    public function findIdBySlug($categorySlug = null)
    {
        return $this->categoryModel->where('slug', $categorySlug)->first();
    }
}
