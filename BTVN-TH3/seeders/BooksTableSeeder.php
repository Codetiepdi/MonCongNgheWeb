<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=0;$i<100;$i++){
            DB::table("books")->insert([
                'title' => $faker->sentence,
                'author' => $faker->name,
                'publication_year' => $faker->year,
                'genre' => $faker->randomElement(['Programming', 'Science','Horror','History','Fiction']),
                'library_id' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
