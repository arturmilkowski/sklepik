<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            'slug' => 'tag-1',
            'name' => 'Tag 1',
        ]);
        DB::table('tags')->insert([
            'slug' => 'tag-2',
            'name' => 'Tag 2',
        ]);

        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 1,
        ]);
        DB::table('post_tag')->insert([
            'post_id' => 1,
            'tag_id' => 2,
        ]);
        DB::table('post_tag')->insert([
            'post_id' => 2,
            'tag_id' => 1,
        ]);
    }
}
