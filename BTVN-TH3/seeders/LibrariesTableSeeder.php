<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class LibrariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0;$i<100;$i++){
            DB::table("libraries")->insert([
                'name' => $faker->company,
                'address'=> $faker->address,
                'contact_number' => $faker -> phoneNumber
            ]);
        }
    }
}
