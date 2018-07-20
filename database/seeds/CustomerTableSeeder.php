<?php

use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerTableSeeder extends Seeder {

    public function run()
    {
        Customer::truncate();
        $data = [

            [
                "name"      => "Louis",
                "address"   => "Ho Chi Minh",
                "email"     => "louis@louis.com",
                "phone"     => "11111111111",
                "mobile"    => "0911111111",
                "gender"    => 1,
                "status"    => 2,
                "DOB"       => "1990/01/01",
            ],
            [
                "name"      => "Alex",
                "address"   => "Nam Dinh",
                "email"     => "alex@alex.com",
                "phone"     => "222222222",
                "mobile"    => "091222222",
                "gender"    => 1,
                "status"    => 2,
                "DOB"       => "1987/01/01",
            ],
            [
                "name"      => "alibaba",
                "address"   => "Macao",
                "email"     => "alibaba@alibaba.com",
                "phone"     => "3333333333",
                "mobile"    => "0933333333",
                "gender"    => 1,
                "status"    => 2,
                "DOB"       => "1981/01/01",
            ],
            [
                "name"      => "oliver",
                "address"   => "Bat da",
                "email"     => "oliver@oliver.com",
                "phone"     => "4444444444",
                "mobile"    => "094444444444",
                "gender"    => 1,
                "status"    => 2,
                "DOB"       => "1980/01/01",
            ],

        ];
        Customer::insert($data);
    }

}