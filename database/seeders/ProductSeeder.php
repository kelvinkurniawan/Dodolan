<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
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
        //

        $faker = Faker::create('id_ID');

        for($i = 0; $i < 10; $i++){
            DB::table('products')->insert([
                'name' => $faker->name,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(),
                'stock' => $faker->randomDigit,
                'created_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
