<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['product_name' => 'Apple', 'product_discription' => 'Kashmiri Apple'],['product_name' => 'Banana', 'product_discription' => 'Fresh Banana']];

        foreach ($data as $item) {
            DB::table('products')->insert(['product_name' => $item['product_name'], 'product_discription' => $item['product_discription']]);
        }
    }
}
