<?php

use Illuminate\Database\Seeder;
use App\Models\ProductColor;
class ProductColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductColor::truncate();
        $data = [
        	[
        		"product_id"	=>1,
                "color_en"   =>"red",
        		"color_ru"			=>"красный",
        		"picture"	    =>"product-10-800x800.png",
                "show_index"    =>true
        	],
        	[
        		"product_id"	=>1,
                "color_en"          =>"green",
        		"color_ru"			=>"зеленый",
        		"picture"	=>"product-11-800x800.png",
                "show_index"    =>false
        	],
        	[
        		"product_id"	=>1,
                "color_en"          =>"yellow",
        		"color_ru"			=>"желтый",
        		"picture"	=>"product-12-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>1,
                "color_en"          =>"white",
        		"color_ru"			=>"белый",
        		"picture"  =>"product-10-800x800.png",
                "show_index"    =>false        	
            ],
        	[
        		"product_id"	=>1,
                "color_en"          =>"black",
        		"color_ru"			=>"черный",
        		"picture"  =>"product-11-800x800.png",
                "show_index"    =>false        	
            ],
        	[
        		"product_id"	=>2,
                "color_en"         =>"red",
        		"color_ru"			=>"красный",
        		"picture"	=>"product-20-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>2,
                "color_en"          =>"green",
        		"color_ru"			=>"зеленый",
        		"picture"	=>"product-21-800x800.png",
 
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>2,
                "color_en"          =>"yellow",
        		"color_ru"			=>"желтый",
        		"picture"	=>"product-22-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>2,
                "color_en"          =>"white",
        		"color_ru"			=>"белый",
        		"picture"  =>"product-20-800x800.png",
                "show_index"    =>false        	
            ],
        	[
        		"product_id"	=>2,
                "color_en"          =>"black",
        		"color_ru"			=>"черный",
        		"picture"	=>"product-21-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>3,
                "color_en"         =>"red",
        		"color_ru"			=>"красный",
        		"picture"	=>"product-30-800x800.png",
                "show_index"    =>true       	
            ],
        	[
        		"product_id"	=>3,
                "color_en"          =>"green",
        		"color_ru"			=>"зеленый",
        		"picture"	=>"product-31-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>3,
                "color_en"          =>"yellow",
        		"color_ru"			=>"желтый",
        		"picture"	=>"product-32-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>3,
                "color_en"          =>"white",
        		"color_ru"			=>"белый",
        		"picture"	=>"product-30-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>3,
                "color_en"          =>"black",
        		"color_ru"			=>"черный",
        		"picture"	=>"product-31-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>4,
                "color_en"         =>"red",
        		"color_ru"			=>"красный",
        		"picture"	=>"product-40-800x800.png",
                "show_index"    =>true       	],

        	[
        		"product_id"	=>4,
                "color_en"          =>"green",
        		"color_ru"			=>"зеленый",
        		"picture"	=>"product-41-800x800.png",
                "show_index"    =>false       	
            ],
        	[
        		"product_id"	=>4,
                "color_en"          =>"yellow",
        		"color_ru"			=>"желтый",
        		"picture"  =>"product-42-800x800.png",
                "show_index"    =>false        	
            ],
        	[
        		"product_id"	=>4,
                "color_en"          =>"white",
        		"color_ru"			=>"белый",
        		"picture"	=>"product-40-800x800.png",
 
                "show_index"    =>false       	
            ],
        	[
                "product_id"    =>4,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-42-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>5,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-51-800x800.png",
                "show_index"    =>true
            ],
            [
                "product_id"    =>5,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-52-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>5,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-53-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>6,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-61-800x800.jpg",
                "show_index"    =>true
            ],
            [
                "product_id"    =>6,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-62-800x800.jpg",
                "show_index"    =>false
            ],
            [
                "product_id"    =>6,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-63-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>6,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-64-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>6,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-65-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-71-800x800.jpg",
                "show_index"    =>true
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-72-800x800.jpg",
                "show_index"    =>false
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-73-800x800.jpg",
                "show_index"    =>false
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-74-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-75-800x800.png",
                "show_index"    =>false
            ],
            [
                "product_id"    =>7,
                "color_en"         =>"black",
                "color_ru"         =>"черный",
                "picture"   =>"product-75-800x800.png",
                "show_index"    =>false
            ]

        ];
        ProductColor::insert($data);
    }
}
