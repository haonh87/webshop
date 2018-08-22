<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
         $data = [
            [
                "parent_id"=>0,
                "name" => "Fitness - GYM",
                "description" => "This is Fitness - GYM!",
                "image_url" => null,
                "lang_code" => "vi",
                "create_user_id" => 1
            ],
            [
                "parent_id"=>0,
                "name" => "T-Shirt Sport",
                "description" => "This is T-shirt Sport!",
                "image_url" => null,
                "lang_code" => "vi",
                "create_user_id" => 1
            ],
            [
                "parent_id"=>1,
                "name" => "Women",
                "description" => "This is Fitness - GYM for Women!",
                "image_url" => null,
                "lang_code" => "vi",
                "create_user_id" => 1
            ],          
            [
                "parent_id"=>1,
                "name" => "Men",
                "description" => "This is Fitness - GYM for Men!",
                "image_url" => null,
                "lang_code" => "vi",
                "create_user_id" => 1
            ]
        ];
        Category::insert($data);
    }
}
