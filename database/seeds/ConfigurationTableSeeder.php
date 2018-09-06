<?php

use Illuminate\Database\Seeder;
use App\Models\Configuration;
class ConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configuration::truncate();
        $data = [
        	[
        		"id"	=> 1,
        		"name"	=> 'footer_copyright',
        		"value"	=> '© 2018 Gymbeo Store',
        		"create_user_id"	=> '1',
        		"modified_user_id"	=> '1',
        		"created_at"	=> '2018-08-21 16:53:27',
        		"updated_at"	=> '2018-08-21 16:53:27',
        	],
        	[
                "id"	=> 2,
                "name"	=> 'address',
                "value"	=> '196 Cầu Giấy, Hà Nội, Việt Nam',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
        	],
        	[
                "id"	=> 3,
                "name"	=> 'phone_number',
                "value"	=> '(028) 540 12341',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
        	],
        	[
                "id"	=> 4,
                "name"	=> 'mobile_phone',
                "value"	=> '0914 777 332',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
        	],
            [
                "id"	=> 5,
                "name"	=> 'email',
                "value"	=> 'thecity@rongphuongbac.com',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
            ],
            [
                "id"	=> 6,
                "name"	=> 'slide_01',
                "value"	=> 'http://gymbeo.com/images/slider/1-2.jpg',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
            ],
            [
                "id"	=> 7,
                "name"	=> 'slide_02',
                "value"	=> 'http://gymbeo.com/images/slider/slide-2.jpg',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
            ],
            [
                "id"	=> 8,
                "name"	=> 'slide_03',
                "value"	=> 'http://gymbeo.com/images/slider/slide-3.jpg',
                "create_user_id"	=> '1',
                "modified_user_id"	=> '1',
                "created_at"	=> '2018-08-21 16:53:27',
                "updated_at"	=> '2018-08-21 16:53:27',
            ],

        ];
        Vote::insert($data);
    }
}
