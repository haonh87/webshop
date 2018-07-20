<?php

use Illuminate\Database\Seeder;
use App\Models\Order;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::truncate();
        	$data=[

        		[
        			"customers_id"=>1,
        			"payment_type" =>"test",
        			"note"=>"this is note",
        			"deliver_date"=>"2015/01/01",
        			"status"=>1,
        			"total"=>1234,
        		],
				[
        			"customers_id"=>2,
        			"payment_type" =>"test",
        			"note"=>"this is note",
        			"deliver_date"=>"2015/05/08",
        			"status"=>1,
        			"total"=>1234,
        		]

        	];
        Order::insert($data);
    }
}
