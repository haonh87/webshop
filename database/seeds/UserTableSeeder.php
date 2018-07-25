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
        		"username"=>"admin",
        		"email"=>"admin@admin.com",
                "fullname" => "Administrator",
        		"password"=>Hash::make('123456'),
        		"role_id"=>1
        	],
            [
                "username"=>"staff",
                "email"=>"staff@staff.com",
                "fullname" => "Staff",
                "password"=>Hash::make('123456'),
                "role_id"=>1

            ],
            [
                "username"=>"user1",
                "email"=>"user1@gmail.com",
                "fullname" => "Customer 1",
                "password"=>Hash::make('123456'),
                "role_id"=>1

            ]
        ];
        User::insert($data);
    }
}
