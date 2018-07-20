<?php

use Illuminate\Database\Seeder;
use App\Models\Silk;
class SilkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Silk::truncate();
        $data = [
        	[
                "code" => "ПЛ-155-68",
                "name_en" => "cotton",
                "name_ru" => "хлопок",
            ],
            [
                "code" => "ПЛ-155-70",
                "name_en" => "linen",
                "name_ru" => "белье",
            ],
            [
                "code" => "ПЛ-155-50",
                "name_en" => "lace",
                "name_ru" => "кружево",
            ],
            [
                "code" => "ПЛ-155-55",
                "name_en" => "leather",
                "name_ru" => "кожа",
            ],
        ];
        Silk::insert($data);
    }
}