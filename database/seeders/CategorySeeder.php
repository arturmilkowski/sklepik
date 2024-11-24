<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'id' => 1,
            'slug' => 'damska',
            'name' => 'damska'
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'slug' => 'meska',
            'name' => 'męska'
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'slug' => 'damsko-meska',
            'name' => 'damsko męska'
        ]);
    }
}
