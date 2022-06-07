<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 11; $i++) {
            DB::table('products')->insert([
                'title' => 'Product' . rand(10, 200),
                'price' => rand(200, 1500),
                'in_stock' => 1,
                'description' => 'lorem ipsum '
            ]);
        }
    }
}
