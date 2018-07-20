<?php

use Illuminate\Database\Seeder;
use App\Models\OrderItem;
class OrderItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderItem::truncate();
        $data = [
        	[
        		"order_id" => 1,
        		"product_id"=>1,
        		"quantity"=>12,
                "product_color_id"=>1,
                "product_size_id"=>1
        	],
        	[
        		"order_id" => 2,
        		"product_id"=>2,
        		"quantity"=>10,
                "product_color_id"=>1,
                "product_size_id"=>1
        	]
        ];
        OrderItem::insert($data);
    }
}
