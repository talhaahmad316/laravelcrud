<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) {
            DB::table('data')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'image' => $this->generateRandomImageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Generate a random image URL.
     *
     * @return string
     */
    private function generateRandomImageUrl(): string
    {
        // You can use any image placeholder service or URLs to actual images.
        // Here's an example using lorempixel.com for placeholder images.
        $width = 200; // Adjust width as needed
        $height = 200; // Adjust height as needed
        return "https://picsum.photos/{$width}/{$height}";
    }
}
