<?php

use Illuminate\Database\Seeder;
use App\Models\wishProduct;
class WishProductTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Vote::truncate();
        $data = [
        	[
        		"user_id"	=> 1,
        		"product_id"			=> 1,
        	],
        	[
        		"user_id"	=> 2,
        		"product_id"			=> 2,
        	],
        	[
        		"user_id"	=> 3,
        		"product_id"			=> 3,
        	],
        	[
        		"user_id"	=> 4,
        		"product_id"			=> 4,
        	],

        ];
        Vote::insert($data);
    }
}
