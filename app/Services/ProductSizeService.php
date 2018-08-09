<?php

namespace App\Services;

use App\Models\ProductSize;

/**
 * Class ProductSizeService
 * @package App\Services
 */
class ProductSizeService
{
    public $parentIdDefault = 0;
    protected $productSizeModel;
    /**
     * ProductSizeService constructor.
     */
    public function __construct(ProductSize $productSizeModel)
    {
        $this->productSizeModel = $productSizeModel;
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
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $productSize = new ProductSize();
                $input['lang_code'] = DEFAULT_LANGUAGE;

                $productSize->fill($input);
                if ($productSize->save()) {
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
     * Update old product size
     *
     * @param $id
     * @param $input
     * @return bool
     */
    public function updateProductSize($id, $input)
    {
        if (!empty($input)) {
            \DB::beginTransaction();
            try {
                $productSize = productSize::findOrFail($id);
                $input['lang_code'] = DEFAULT_LANGUAGE;
                $productSize->fill($input);

                if ($productSize->save()) {
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

    public function getAllProductSize()
    {
        return $this->productSizeModel->where('id', '!=', '')->pluck('name', 'id');
    }
}