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
         // seeding admin
         $products = ModelsProducts::create([
            'product_name' => 'cellphone',
            'categories' => 'gadget',
            'quantity' => '3',
            'expiration_date' => '2024-02-02 12:42:50',
        ]);
    }
}
