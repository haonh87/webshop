<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $this->call(UserTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
        $this->call(OrderItemTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(ProductColorTableSeeder::class);
        $this->call(ProductSizeTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(SilkTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(VoteTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        Model::reguard();
    }
}
