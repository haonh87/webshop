<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        $data = 
        [
        	[
        		"artice_id" 	=> 1212,
                "name_en"       => "Super dress",
        		"name_ru"		=> "Супер платье",
        		"category_id"=> 1,
        		"price"		=> 123,
                "model"     =>"ПЛ-159",
                "silk_id"   =>1,
                "description_en"=>"product description for website! product of Dress",
        		"description_ru"=>"Описание продукта для сайта! продукт платье",
        		"sell_count"	=> 12,
        		"view_count"	=> 12,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
        	],
        	[
        		"artice_id" 	 => 1212123,
                "name_en"            => "Super super top 1",
        		"name_ru"		     => "Супер Super Top 1",
        		"category_id"=> 4,
        		"price"		=> 153,
                "model"     =>"ПЛ-159",
                "silk_id"   =>2,
                "description_en"=>"this is production for test category top 1",
        		"description_ru"=>"это продукция для тестирования категории сверху 1",
        		"sell_count"=> 12,
        		"view_count"	=> 13,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
        	],
        	[
        		"artice_id" 	=> 12123,
                "name_en"       => "Super top1",
        		"name_ru"		=> "Супер top1",
        		"category_id"=> 4,
        		"price"		=> 123,
                "model"     =>"ПЛ-159",
                "silk_id"   =>3,
                "description_en"=>"this is production for test category top 1",
        		"description_ru"=>"это продукция для тестирования категории сверху 1",
        		"sell_count"	=> 12,
        		"view_count"	=> 13,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
        	],
        	[
                "artice_id"     => 1212345,
                "name_en"      => "super top2",
                "name_ru"      => "Супер top2",
                "category_id"=> 5,
                "price"     => 123,
                "model"     =>"ПЛ-155",
                "silk_id"   =>3,
                "description_en"=>"this is production for test category top 2",
                "description_ru"=>"это продукция для тестирования категории сверху 2",
                "sell_count"    => 12,
                "view_count"    => 123,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
            ],
            [
                "artice_id"     => 5555555,
                "name_en"      => "Super sweeter",
                "name_ru"      => "Супер слаще",
                "category_id"=> 7,
                "price"     => 8888.00,
                "model"     =>"ПЛ-155",
                "silk_id"   =>1,
                "description_en"=>"Image test for sweeter category!",
                "description_ru"=>"Тест изображения для сладкого категории!",
                "sell_count"    => 12,
                "view_count"    => 123,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
            ],
            [
                "artice_id"     => 666666666,
                "name_en"      => "Super Jeans",
                "name_ru"      => "Супер Джинс",
                "category_id"=> 6,
                "price"     => 66666.00,
                "model"     =>"ПЛ-155",
                "silk_id"   =>2,
                "description_en"=>"Image test for Jeans category!",
                "description_ru"=>"Тест изображения для Jeans категории!",
                "sell_count"    => 16,
                "view_count"    => 126,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
            ],
            [
        		"artice_id" 	=> 77777,
                "name_en"       => "Super coat&jacket",
        		"name_ru"		=> "Супер пальто куртки &",
        		"category_id"=> 7,
        		"price"		=> 66666.00,
                "model"     =>"ПЛ-155",
                "silk_id"   =>3,
                "description_en"=>"Image test for Super coat&jacket category!",
        		"description_ru"=>"Тест изображения для Super Coat & куртки категории!",
        		"sell_count"	=> 16,
        		"view_count"	=> 126,
                "status_en"        =>"In Stock",
                "status_ru"        =>"В наличии",
        	],

        ];
        //Product::insert($data);
    }
}
