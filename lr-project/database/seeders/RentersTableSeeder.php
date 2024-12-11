<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class RentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $phoneNumbers = [];
        for ($i = 0; $i < 50; $i++) {
            do{
                $phoneNumber = $faker->phoneNumber;
            }while(in_array($phoneNumber, $phoneNumbers));
            $phoneNumbers[] = $phoneNumber;
            DB::table('renters')->insert([
                'name' => $faker->name,
                'phone_number' => $phoneNumber,
                'email' => $faker->unique()->safeEmail()
            ]);
        }
    }
}
