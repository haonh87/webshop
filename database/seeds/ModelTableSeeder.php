<?php

use Illuminate\Database\Seeder;
use App\Models\Model;

class ModelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::truncate();
        $data = [
            [
                'name' => 'cotton',
                'create_user_id' => 1
            ],
            [
                'name' => 'body-fit',
                'create_user_id' => 1
            ]
        ];
    }
}
