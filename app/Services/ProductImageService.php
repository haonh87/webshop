<?php

namespace App\Services;

use App\Models\ProductImage;

class ProductImageService
{
    private $productImageModel;

    /**
     * VoteService constructor.
     * @param Vote $voteModel
     */
    public function __construct(ProductImage $productImageModel)
    {
        $this->productImageModel = $productImageModel;
    }

    public function upLoadImage($dataImage, $productId, $dataColor, $nameProduct, $allColor)
    {
        try {
            $data = [];
            foreach($dataImage as $key => $image)
            {
                $name = $nameProduct.'.'.$image->getClientOriginalExtension();
                if ($key > 0) {
                    $name = $nameProduct.'_'.$allColor[$dataColor[$key]].'.'.$image->getClientOriginalExtension();
                }
                $image->move(public_path().'/images/', $name);
                $data[] = [
                    'product_id' => $productId,
                    'img_path' => $name,
                    'color_id' => isset($dataColor[$key]) ? $dataColor[$key] : 0,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
            }
        } catch (\Exception $e) {
            abort('404');
        }
        return $this->productImageModel->insert($data);
    }

    public function removeImage($dataImageRemove, $productId)
    {
        foreach ($dataImageRemove as $image){
            $urlPath = public_path('images/' . $image);
            if(file_exists($urlPath) && !empty($image)) {
                unlink($urlPath);
            }
        }
        return $this->productImageModel->where('product_id', $productId)
            ->whereIn('img_path', $dataImageRemove)->delete();
    }
}