<?php

use Illuminate\Database\Seeder;
use App\Models\ProductSize;

class ProductSizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSize::truncate();
        $data = [
            [
                "lang_code" => "vi",
                "name" => "S",
                "create_user_id" => 1
            ],
            [
                "lang_code" 	=> "vi",
                "name"			=> "M",
                "create_user_id" => 1
            ],
            [
                "lang_code" 	=> "vi",
                "name"			=> "L",
                "create_user_id" => 1
            ],
            [
                "lang_code" 	=> "vi",
                "name"			=> "XL",
                "create_user_id" => 1
            ],
            [
                "lang_code" 	=> "vi",
                "name"			=> "XXL",
                "create_user_id" => 1
            ],
            [
                "lang_code" 	=> "vi",
                "name"			=> "XXXL",
                "create_user_id" => 1
            ]
        ];
        ProductSize::insert($data);
    }
}
