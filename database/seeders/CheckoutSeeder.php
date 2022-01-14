<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('checkouts')->insert([
            [
                'name' => 'Deliver',
                
            ],
            [
                'name' => 'Pickup',
            ]
        ]);
    }
}
