<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
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
        \App\Models\User::factory(10)->create();
        // Category::factory(10)->create();
        // Product::factory(10)->create();

        // Order::create([
        //     'table' => '15',
        //     'draft' => false,
        //     'name' => 'Teste'
        // ]);
        // Item::create([
        //     'order_id' => 4,
        //     'product_id' => 1,
        //     'amount' => 1
        // ]);
        // Item::create([
        //     'order_id' => 4,
        //     'product_id' => 2,
        //     'amount' => 3
        // ]);
        // Item::create([
        //     'order_id' => 1,
        //     'product_id' => 3,
        //     'amount' => 3
        // ]);
        // Item::create([
        //     'order_id' => 2,
        //     'product_id' => 1,
        //     'amount' => 1
        // ]);
        // Item::create([
        //     'order_id' => 2,
        //     'product_id' => 2,
        //     'amount' => 2
        // ]);
        // Item::create([
        //     'order_id' => 2,
        //     'product_id' => 3,
        //     'amount' => 3
        // ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin',
            'password' => 'admin',
            'is_admin' => true,
        ]);
    }
}
