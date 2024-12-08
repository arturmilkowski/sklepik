<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('replies')->insert([
            'comment_id' => 1,
            'user_id' => 1,
            'content' => 'odpowiedź do pierwszego komentarza',
            'author' => 'użytkownik 99',
            'approved' => '1',
        ]);
    }
}
