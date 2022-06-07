<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++){
            DB::table('product_images')->insert([
               'img' => 'product_' . rand(1, 10),
                'product_id' => 1
            ]);
        }
    }
}
