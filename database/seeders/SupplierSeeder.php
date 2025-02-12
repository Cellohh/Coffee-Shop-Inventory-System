<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            ['name' => 'Local Coffee Roasters', 'email' => 'supplier1@example.com', 'phone' => '123-456-7890', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bakery Supplies Inc.', 'email' => 'supplier2@example.com', 'phone' => '987-654-3210', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
