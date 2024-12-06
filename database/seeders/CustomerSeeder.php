<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'voivodeship_id' => 7,
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'street' => 'Na Wspólnej 1',
            'zip_code' => '00950',
            'city' => 'Warszawa',
            'email' => 'jan.kowalski@gmail.com',
            'phone' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('customers')->insert([
            'voivodeship_id' => 7,
            'name' => 'Józef',
            'surname' => 'Nowak',
            'street' => 'Woronicza 17',
            'zip_code' => '00950',
            'city' => 'Warszawa',
            'email' => 'jo.novak@gmail.com',
            'phone' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
