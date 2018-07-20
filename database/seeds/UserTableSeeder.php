<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $data = 
        [
        	[
        		"name"=>"admin",
        		"email"=>"admin@admin.com",
        		"password"=>Hash::make('123456'),
        		"gender"=>1,
        		"role_id"=>1,
        		"birthdate" => date('Y/m/d'),
                "customer_id"=>null,

        	],
            [
                "name"=>"staff",
                "email"=>"staff@staff.com",
                "password"=>Hash::make('123456'),
                "gender"=>1,
                "role_id"=>1,
                "birthdate" => date('Y/m/d'),
                "customer_id"=>null,

            ],
            [
                "name"=>"customer1",
                "email"=>"customer1@cus.com",
                "password"=>Hash::make('123456'),
                "gender"=>1,
                "role_id"=>3,
                "birthdate" => date('Y/m/d'),
                "customer_id"=>1,

            ],
        	[
        		"name"=>"customer2",
        		"email"=>"customer2@cus.com",
        		"password"=>Hash::make('123456'),
        		"gender"=>1,
        		"role_id"=>3,
                "birthdate" => date('Y/m/d'),
                "customer_id"=>2,

        	],

        ];
        User::insert($data);
    }
}
