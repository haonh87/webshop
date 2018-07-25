<?php

use Illuminate\Database\Seeder;
use App\Models\ProductColor;

class ProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductColor::truncate();
        $data = [
            [
                "lang_code" => 'vi',
                "code" => "#ff0000",
                "name" => "red",
                "create_user_id" => 1

            ],
            [
                "lang_code" => 'vi',
                "code" => "#fff",
                "name" => "white",
                "create_user_id" => 1
            ],
            [
                "lang_code" => 'vi',
                "code" => "#000",
                "name" => "black",
                "create_user_id" => 1
            ],
            [
                "lang_code" => 'vi',
                "code" => "#008000",
                "name" => "green",
                "create_user_id" => 1
            ]
        ];
        ProductColor::insert($data);
    }
}
