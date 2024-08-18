<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Omar Kamal',
            'email' => 'omar@mail.com',
            'password' => '123'
        ]);

        for ($i = 0; $i < 20; $i++) {
            $product = "Product {$i}";

            Product::create([
               'name' => "Product {$i}",
               'price' => $i + 2,
               'description' => "This is the description for {$product}",
               'qty' =>  $i + 1
            ]);
        }
    }
}
