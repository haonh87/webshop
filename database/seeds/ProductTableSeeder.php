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
        		"name"		=> "Супер платье",
        		"category_id"=> 1,
        		"price"		=> 123,
                "model_ids"     =>"ПЛ-159",
                "description"=>"product description for website! product of Dress",
        		"sell_count"	=> 12,
        		"view_count"	=> 12,
                "status"        =>0,
                'create_user_id'=> 1,
        	],
        	[
        		"name"		     => "Супер Super Top 1",
        		"category_id"=> 4,
        		"price"		=> 153,
                "model_ids"     =>"ПЛ-159",
                "description"=>"this is production for test category top 1",
        		"sell_count"=> 12,
        		"view_count"	=> 13,
                "status"        =>0,
                'create_user_id'=> 1,
        	],
        	[
        		"name"		=> "Супер top1",
        		"category_id"=> 4,
        		"price"		=> 123,
                "model_ids"     =>"ПЛ-159",
                "description"=>"this is production for test category top 1",
        		"sell_count"	=> 12,
        		"view_count"	=> 13,
                "status"        =>0,
                'create_user_id'=> 1,
        	],
        	[
                "name"      => "Супер top2",
                "category_id"=> 1,
                "price"     => 123,
                "model_ids"     =>"ПЛ-155",
                "description"=>"this is production for test category top 2",
                "sell_count"    => 12,
                "view_count"    => 123,
                "status"        =>0,
                'create_user_id'=> 1,
            ],
            [
                "name"      => "Супер слаще",
                "category_id"=> 2,
                "price"     => 8888.00,
                "model_ids"     =>"ПЛ-155",
                "description"=>"Image test for sweeter category!",
                "sell_count"    => 12,
                "view_count"    => 123,
                "status"        =>0,
                'create_user_id'=> 1,
            ],
            [
                "name"      => "Супер Джинс",
                "category_id"=> 3,
                "price"     => 66666.00,
                "model_ids"     =>"ПЛ-155",
                "description"=>"Image test for Jeans category!",
                "sell_count"    => 16,
                "view_count"    => 126,
                "status"        =>0,
                'create_user_id'=> 1,
            ],
            [
        		"name"		=> "Супер пальто куртки &",
        		"category_id"=> 4,
        		"price"		=> 66666.00,
                "model_ids"     =>"ПЛ-155",
                "description"=>"Image test for Super coat&jacket category!",
        		"sell_count"	=> 16,
        		"view_count"	=> 126,
                "status"        =>0,
                'create_user_id'=> 1,
        	],

        ];
        Product::insert($data);
    }
}
