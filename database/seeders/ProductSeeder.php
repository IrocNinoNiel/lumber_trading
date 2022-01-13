<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Lumber',
                'product_img' => '2.jpg',
            ],
            [
                'name' => 'Plywood',
                'product_img' => '1.jpg',
            ]
        ]);
    }
}
