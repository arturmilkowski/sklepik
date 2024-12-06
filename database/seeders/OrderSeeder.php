<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            'id' => '02h9dt42pn29hfx499sk7tbh1a',
            // 'orderable_id' => 1,
            // 'orderable_type' => 'App\Models\Customer\Customer',
            // 'status_id' => 1,
            // 'sale_document_id' => 1,
            'total_price' => 100,
            'delivery_cost' => 15,
            'total_price_and_delivery_cost' => 115,
            'delivery_name' => 'Poczta Polska',
            'comment' => 'Komentarz do zamówienia',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        /*
        DB::table('orders')->insert([
            'id' => '01h9zax8drmqt15hn96qghg8gc',
            'orderable_id' => 1,
            'orderable_type' => 'App\Models\User',
            'status_id' => 1,
            'sale_document_id' => 2,
            'total_price' => 40.00,
            'delivery_cost' => 15.00,
            'total_price_and_delivery_cost' => 55.00,
            'delivery_name' => 'Poczta Polska',
            'comment' => 'Wyślijcie szybko',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('orders')->insert([
            'id' => '01h9zdbhzd6949btjhk0wjpazc',
            'orderable_id' => 1,
            'orderable_type' => 'App\Models\User',
            'status_id' => 1,
            'sale_document_id' => 2,
            'total_price' => 15.00,
            'delivery_cost' => 15.00,
            'total_price_and_delivery_cost' => 30.00,
            'delivery_name' => 'Poczta Polska',
            'comment' => 'Wyślijcie szybko',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('orders')->insert([
            'id' => '01h9dt42pn29hfx499sk7tbh1g',
            'orderable_id' => 2,
            'orderable_type' => 'App\Models\Customer\Customer',
            'status_id' => 1,
            'sale_document_id' => 1,
            'total_price' => 200,
            'delivery_cost' => 15,
            'total_price_and_delivery_cost' => 215,
            'delivery_name' => 'Poczta Polska',
            // 'comment' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */
    }
}
