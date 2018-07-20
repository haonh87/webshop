<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;
class VoteTableSeeder extends Seeder
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
        		"star"					=> 4,
        		"comment"			=>"this is test comment for product 1",
        	],
        	[
        		"user_id"	=> 2,
        		"product_id"			=> 2,
        		"star"					=> 4,
        		"comment"			=>"this is test comment for product 2",
        	],
        	[
        		"user_id"	=> 3,
        		"product_id"			=> 3,
        		"star"					=> 4,
        		"comment"			=>"this is test comment for product 3",
        	],
            [
                "user_id"   => 4,
                "product_id"            => 4,
                "star"                  => 4,
                "comment"           =>"this is test comment for product 4",
            ],
            [
                "user_id"   => 4,
                "product_id"            => 5,
                "star"                  => 5,
                "comment"           =>"this is test comment for product 5",
            ],
            [
                "user_id"   => 4,
                "product_id"            => 6,
                "star"                  => 3,
                "comment"           =>"this is test comment for product 6",
            ],
        	[
        		"user_id"	=> 4,
        		"product_id"			=> 7,
        		"star"					=> 1,
        		"comment"			=>"this is test comment for product 7",
        	]

        ];
        Vote::insert($data);
    }
}
