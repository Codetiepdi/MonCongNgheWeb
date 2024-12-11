<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class HardwareDevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        for ($i = 0; $i < 50; $i++) {
            DB::table('hardware_devices')->insert([
                'device_name' => $faker->word,
                'type' => $faker->randomElement(['Mouse', 'Keyboard', 'Headset']),
                'status' => $faker->boolean,
                'center_id' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
