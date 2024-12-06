<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            'user_id' => 1,
            'voivodeship_id' => 4,
            'surname' => 'miłkowski',
            'street' => 'Bałandy 4B/8',
            'zip_code' => '32-600',
            'city' => 'Oświęcim',
            'phone' => '123456789',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
