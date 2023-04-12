<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Product::create([
            'name' => 'Aldub Album',
            'price' => 1200.00,
            'stock' => 10,
            'Category_ID' => 1,
            'Fandom_ID' => 1,
            'Seller_ID' => 1
        ]);

        Product::create([
            'name' => 'Cardo Photocard',
            'price' => 250.00,
            'stock' => 3,
            'Category_ID' => 2,
            'Fandom_ID' => 2,
            'Seller_ID' => 2
        ]);

        Product::create([
            'name' => 'Cardo Album',
            'price' => 1500.00,
            'stock' => 16,
            'Category_ID' => 1,
            'Fandom_ID' => 2,
            'Seller_ID' => 2
        ]);

        Product::create([
            'name' => 'Aldub Photocard',
            'price' => 250.00,
            'stock' => 17,
            'Category_ID' => 1,
            'Fandom_ID' => 1,
            'Seller_ID' => 1
        ]);
    }
}
