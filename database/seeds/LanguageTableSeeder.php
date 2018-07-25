<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::truncate();

        $data = [
            [
                'code' => 'vi',
                'name' => 'Vietnamese',
                'create_user_id' => 1
            ],
            [
                'code' => 'en',
                'name' => 'English',
                'create_user_id' => 1
            ]
        ];

        Language::insert($data);
    }
}
