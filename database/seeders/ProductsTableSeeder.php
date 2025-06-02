<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => "Puma Men's Momento Sneakers",
                'description' => "Step out in style with Puma Men's Momento Sneakers — where sleek design meets everyday comfort. Perfect for casual wear with durable build and cushioned support.",
                'image' => json_encode(["img/shopping.webp", "img/shopping (1).webp", "img/shopping (2).webp"]),
                'color' => json_encode(["white"]),
                'size' => json_encode([8, 9, 10]),
                'price' => 699,
                'status' => 1,
                'created_at' => '2025-05-31 02:45:09',
                'updated_at' => '2025-05-31 02:45:09',
            ],
            [
                'id' => 2,
                'name' => "Bridge Comfort Walking Shoes For Men",
                'description' => "Experience all-day comfort with Puma Bridge Comfort Walking Shoes for Men — lightweight, cushioned, and built for everyday walks. Stylish design meets breathable support for active lifestyles.",
                'image' => json_encode(["img/puma1.jpeg", "img/puma2.jpeg", "img/puma3.jpeg"]),
                'color' => json_encode(["white"]),
                'size' => json_encode([8]),
                'price' => 499,
                'status' => 1,
                'created_at' => '2025-06-01 13:23:33',
                'updated_at' => '2025-06-01 13:24:37',
            ],
        ]);
    }
}
