<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class LaptopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<50;$i++){
            DB::table('laptops')->insert([
            'brand' => $faker->company,
            'model' => $faker->word,
            'specifications' => $faker->randomElement(['i5, 8GB RAM, 256GB SSD','i9, 16GB RAM, 512GB SSD', 'i7, 8GB RAM, 512GB SSD','i9, 16GB RAM, 256GB SSD', 'i3, 8GB RAM, 256GB SSD']),
            'rental_status' => $faker->boolean,
            'renter_id' => $faker->numberBetween(1, 50),
        ]);
    }
    }
}
