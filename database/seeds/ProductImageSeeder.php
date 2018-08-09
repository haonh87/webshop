<?php

use Illuminate\Database\Seeder;
use App\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImage::truncate();
        $data = [
            [
                "product_id" => 1
            ],
            [
                "product_id" => 2
            ],
            [
                "product_id" => 3
            ],
            [
                "product_id" => 4
            ],
            [
                "product_id" => 5
            ],
            [
                "product_id" => 6
            ],
            [
                "product_id" => 7
            ]
        ];
        ProductImage::insert($data);
    }
}
