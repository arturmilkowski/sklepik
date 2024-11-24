<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            'product_id' => 1,
            'size_id' => 2,
            'slug' => '15-ml',
            'name' => '15 ml',
            'price' => 40,
            'quantity' => 5,
            'description' => 'Szklana butelka z atomizerem zakręcanym na gwint.',
            'img' => '15-ml.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('types')->insert([
            'product_id' => 1,
            'size_id' => 1,
            'slug' => 'probka-4-ml',
            'name' => 'Próbka 4 ml',
            'price' => 15,
            'quantity' => 5,
            'description' => 'Próbka w szklanej buteleczce z atomizerem. zakręcana na gwint.',
            'img' => 'probka-4-ml.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
