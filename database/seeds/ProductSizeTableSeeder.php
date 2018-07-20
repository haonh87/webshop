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
        		"product_id" 	=> 1,
        		"size"			=> 15,
        	],
        	        	[
        		"product_id" 	=> 1,
        		"size"			=> 25,
        	],
        	        	[
        		"product_id" 	=> 1,
        		"size"			=> 20,
        	],
        	[
        		"product_id" 	=> 2,
        		"size"			=> 15,
        	],
        	        	[
        		"product_id" 	=> 2,
        		"size"			=> 25,
        	],
        	        	[
        		"product_id" 	=> 2,
        		"size"			=> 20,
        	],
        	[
        		"product_id" 	=> 3,
        		"size"			=> 15,
        	],
        	        	[
        		"product_id" 	=> 3,
        		"size"			=> 25,
        	],
        	        	[
        		"product_id" 	=> 3,
        		"size"			=> 20,
        	],
            [
                "product_id"    => 4,
                "size"          => 15,
            ],
                        [
                "product_id"    => 4,
                "size"          => 25,
            ],
                        [
                "product_id"    => 4,
                "size"          => 20,
            ],
            [
                "product_id"    => 5,
                "size"          => 15,
            ],
                        [
                "product_id"    => 5,
                "size"          => 25,
            ],
                        [
                "product_id"    => 5,
                "size"          => 20,
            ],
            [
                "product_id"    => 6,
                "size"          => 15,
            ],
                        [
                "product_id"    => 6,
                "size"          => 25,
            ],
                        [
                "product_id"    => 6,
                "size"          => 20,
            ],
        	[
        		"product_id" 	=> 7,
        		"size"			=> 15,
        	],
        	        	[
        		"product_id" 	=> 7,
        		"size"			=> 25,
        	],
        	        	[
        		"product_id" 	=> 7,
        		"size"			=> 20,
        	]

        ];
        ProductSize::insert($data);
    }
}
