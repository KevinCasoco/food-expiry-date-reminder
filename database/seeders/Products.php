<?php

namespace Database\Seeders;

use App\Models\Products as ModelsProducts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeding products
         $products = ModelsProducts::create([
            'product_code' => '3038554906',
            'product_name' => 'Piatos',
            'categories' => 'snacks',
            'expiration_date' => '2024-04-20 12:42:50',
            'status' => 'available'

        ]);
    }
}
