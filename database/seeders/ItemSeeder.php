<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'order_id' => '02h9dt42pn29hfx499sk7tbh1a',
            'type_id' => 1,
            'type_size_id' => '1',
            'type_name' => 'type name',
            'name' => 'name',
            'concentration' => 'concentration',
            'category' => 'category',
            'price' => 100.00,
            'quantity' => 1,
            'subtotal_price' => 100.00,
        ]);
    }
}
