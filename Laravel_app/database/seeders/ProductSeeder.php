<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()->count(500)->make()->each(function ($product) {
            // Assign a random category to the product
            $product->category_id = \App\Models\Category::inRandomOrder()->first()->id;
            // Assign a random existing supplier instead of creating new ones
            $product->supplier_id = \App\Models\Supplier::inRandomOrder()->first()->id;
            $product->save();
        });
    }
}
