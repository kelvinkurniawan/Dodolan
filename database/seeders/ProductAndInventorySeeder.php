<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductAndInventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++){
            DB::table('product_and_inventories')->insert([
                'product_id' => $faker->numberBetween(1, 10),
                'inventory_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
