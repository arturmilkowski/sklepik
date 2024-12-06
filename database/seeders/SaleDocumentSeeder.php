<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sale_documents')->insert([
            'slug' => 'none',
            'name' => 'Brak',
            'description' => 'Nie chcę rachunku ani faktury'
        ]);
        DB::table('sale_documents')->insert([
            'slug' => 'bill',
            'name' => 'Rachunek',
            'description' => 'Rachunek'
        ]);
        DB::table('sale_documents')->insert([
            'slug' => 'invoice',
            'name' => 'Faktura',
            'description' => 'Faktura'
        ]);
    }
}
