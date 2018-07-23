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

                "name" => "Dresses",
                "image_url" => null,
                "description" => "This is dress!",
                "lang_code" => "vi",
                "count_view" => 10,
                "count_sell" => 10,
                "parrent_id"=>0,
            ],
            [
                "name_en" => "Tops",
                "name_ru" => "верхушки",
                "description_en" => "This is top!",
                "description_ru" => "Это топ!",
                "count_view" => 00,
                "count_sell" => 20,
                "parrent_id"=>0,
            ],
            [
                "name_en" => "Top 1",
                "name_ru" => "Топ 1",
                "description_en" => "This is top 1!",
                "description_ru" => "Это верхний 1!",
                "count_view" => 20,
                "count_sell" => 20,
                "parrent_id"=>2,
            ],          
            [
                "name_en" => "Top2",
                "name_ru" => "Tоп 2",
                "description_en" => "This is top 2!",
                "description_ru" => "Это верхний 2!",
                "count_view" => 20,
                "count_sell" => 20,
                "parrent_id"=>3,
            ],
            [
                "name_en" => "Sweaters",
                "name_ru" => "Свитера",
                "description_en" => "This is Sweaters!",
                "description_ru" => "Это Свитера!",
                "count_view" => 10,
                "count_sell" => 10,
                "parrent_id"=>0,
            ],
            [
                "name_en" => "Jeans",
                "name_ru" => "джинсы",
                "description_en" => "This is Jeans!",
                "description_ru" => "Это джинсы!",
                "count_view" => 10,
                "count_sell" => 10,
                "parrent_id"=>0,
            ],
        	[
                "name_en" => "Coats & Jackets",
                "name_ru" => "Пальто и куртки",
                "description_en" => "This is Coats & Jackets!",
                "description_ru" => "Это пальто и куртки!",
                "count_view" => 10,
                "count_sell" => 10,
                "parrent_id"=>2,
            ],

        ];
        Category::insert($data);
    }
}
