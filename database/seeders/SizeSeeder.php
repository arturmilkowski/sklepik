<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sizes')->insert([
            'slug' => 'xs',
            'name' => 'Bardzo mały',
            'description' => 'Próbka',
        ]);
        DB::table('sizes')->insert([
            'slug' => 's',
            'name' => 'Mały',
            'description' => 'Butelka',
        ]);
        DB::table('sizes')->insert([
            'slug' => 'm',
            'name' => 'Średni',
            'description' => '',
        ]);
    }
}
