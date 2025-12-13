<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Electronics',
            'Home Appliances',
            'Landry',
            'Furniture',
            'Toys',
            'Books',
            'Clothing',
            'Sports Equipment',
            'Groceries',
            'Health & Beauty',
        ];
        
        foreach ($categories as $categoryName) {
            \App\Models\Category::create([
                'name' => $categoryName,
                'description' => fake()->sentence(),
            ]);
        }
    }
}
