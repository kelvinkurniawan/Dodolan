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

        for($i = 0; $i < 50; $i++){
            DB::table('inventory_product')->insert([
                'product_id' => $faker->numberBetween(1, 10),
                'inventory_id' => $faker->numberBetween(1, 20),
                'usage' => $faker->numberBetween(1, 5),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
