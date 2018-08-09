<?php

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerTableSeeder extends Seeder
{

    public function run()
    {
        Customer::truncate();
        $data = [

            [
                "name" => "Louis",
                "address" => "Ho Chi Minh",
                "address2" => null,
                "phone" => "11111111111",
                "mobile" => "0911111111",
                "user_id" => 3,
                "gender" => 1,
                "birthday" => "1990/01/01",
            ],
            [
                "name" => "Alex",
                "address" => "Nam Dinh",
                "address2" => null,
                "phone" => "222222222",
                "mobile" => "091222222",
                "user_id" => 3,
                "gender" => 1,
                "birthday" => "1990/01/01",
            ],
            [
                "name" => "alibaba",
                "address" => "Macao",
                "address2" => null,
                "phone" => "3333333333",
                "mobile" => "0933333333",
                "user_id" => 3,
                "gender" => 1,
                "birthday" => "1990/01/01",
            ],
            [
                "name" => "oliver",
                "address" => "Bat da",
                "address2" => null,
                "phone" => "4444444444",
                "mobile" => "094444444444",
                "user_id" => 3,
                "gender" => 1,
                "birthday" => "1990/01/01",
            ]

        ];
        Customer::insert($data);
    }

}