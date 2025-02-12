<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->insert([
            ['name' => 'Latte', 'category_id' => 1, 'supplier_id' => 1, 'stock' => 50, 'price' => 4.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Croissant', 'category_id' => 2, 'supplier_id' => 2, 'stock' => 30, 'price' => 2.99, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cheesecake', 'category_id' => 3, 'supplier_id' => 2, 'stock' => 10, 'price' => 6.99, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
