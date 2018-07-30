<?php
/**
 * Created by PhpStorm.
 * User: BOSS
 * Date: 7/25/2018
 * Time: 2:36 AM
 */

namespace App\Services;
use App\Models\ProductSize;

/**
 * Class ProductSizeService
 * @package App\Services
 */
class ProductSizeService
{
    public $languageDefault = 'vi';
    public $parentIdDefault = 0;

    /**
     * ProductSizeService constructor.
     */
    public function __construct()
    {
    }

    /**
     *
     * Get product size list
     *
     * @param string $field
     * @param string $value
     * @param string $operation
     * @param int $pagination
     * @return mixed
     */
    public function getProductSizeList($pagination = 0, $field = '', $value = '', $operation = '')
    {
        if ($field && $value && $operation) {
            $productSizes = ProductSize::where($field, $operation, $value)->get();
        } else {
            $productSizes = ProductSize::paginate($pagination);
        }

        return $productSizes;
    }

    /**
     * Create new product size
     *
     * @param $input
     * @return bool
     */
    public function createNewProductSize($input)
    {
        if ($input) {
            $productSize = new ProductSize();
            $input['lang_code'] = $this->languageDefault;

            $productSize->fill($input);
            if ($productSize->save()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }


    /**
     * Update old product size
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateProductSize($id, $input)
    {
        if ($input) {
            $productSize = productSize::findOrFail($id);
            $input['lang_code'] = $this->languageDefault;
            $productSize->fill($input);

            if ($productSize->save()) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }


    /**
     * Delete product size
     *
     * @param $id
     * @return bool
     */
    public function deleteProductSize($id)
    {
        $productSize = productSize::findOrFail($id);
        if ($productSize->delete()) {
            return true;
        } else {
            return false;
        }
    }
}