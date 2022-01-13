<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'name' => '2x2',
                'price' => 100,
                'qty' => 100,
                'product_id' => 1
            ],
            [
                'name' => '4x4',
                'price' => 200,
                'qty' => 100,
                'product_id' => 1
            ],
        ]);
    }
}
