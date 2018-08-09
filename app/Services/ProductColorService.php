<?php

namespace App\Services;

use App\Models\ProductColor;

/**
 * Class ProductColorService
 * @package App\Services
 */
class ProductColorService
{
    public $parentIdDefault = 0;

    /**
     * ProductColorService constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * Get product color list
     *
     * @param string $field
     * @param string $value
     * @param string $operation
     * @param int $pagination
     * @return mixed
     */
    public function getProductColorList($pagination = 0, $field = '', $value = '', $operation = '')
    {
        if ($field && $value && $operation) {
            $productColors = ProductColor::where($field, $operation, $value)->get();
        } else {
            $productColors = ProductColor::paginate($pagination);
        }

        return $productColors;
    }

    /**
     * Create new product color
     *
     * @param $input
     * @return bool
     */
    public function createNewProductColor($input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $productColor = new ProductColor();
                $input['lang_code'] = DEFAULT_LANGUAGE;

                $productColor->fill($input);
                if ($productColor->save()) {
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
     * Update old product color
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateProductColor($id, $input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $productColor = ProductColor::findOrFail($id);
                $input['lang_code'] = DEFAULT_LANGUAGE;
                $productColor->fill($input);

                if ($productColor->save()) {
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
     * Delete product color
     *
     * @param $id
     * @return bool
     */
    public function deleteProductColor($id)
    {
        $productColor = ProductColor::findOrFail($id);
        if ($productColor->delete()) {
            return true;
        } else {
            return false;
        }
    }
}