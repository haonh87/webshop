<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        $data = [
        	["name" => "admin"],
        	['name' => "staff"],
        	["name"	=> "member"],
            [
                "name" 	=> "social_member",
            ]
        ];
        Role::insert($data);
    }
}
