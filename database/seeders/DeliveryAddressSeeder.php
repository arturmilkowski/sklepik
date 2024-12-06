<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('delivery_addresses')->insert([
            'profile_id' => 1,
            'voivodeship_id' => 4,
            'street' => 'Piłsudskiego 1A',
            'zip_code' => '32-600',
            'city' => 'Oświęcim',
        ]);
    }
}
