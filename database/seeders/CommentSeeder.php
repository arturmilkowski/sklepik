<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([
            'post_id' => 1,
            'user_id' => 1,
            'content' => 'Komentarz do pierwszyego wpisu',
            'author' => 'użytkownik 1',
            'approved' => '0',
            'created_at' => now(),
        ]);
    }
}
