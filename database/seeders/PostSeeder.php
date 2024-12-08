<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'witam-na-mojej-stronie',
            'title' => 'witam na mojej stronie',
            'intro' => 'Intro',
            'content' => 'Content',
            'img' => 'witam-na-mojej-stronie.webp',
            'site_description' => 'Witam na mojej stronie. Zapraszam do zapoznania się z wpisami na blogu i produktami',
            'site_keyword' => 'witam, na, mojej, stronie',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2022-12-01 22:11:22.000000',
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'post-1',
            'title' => 'Post 1',
            'intro' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'content' => 'Content Post 1',
            'img' => 'post-1.jpg',
            'site_description' => 'Post 1',
            'site_keyword' => 'post,1',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2023-08-01 23:11:22.000000',
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'post-2',
            'title' => 'Post 2',
            'intro' => 'Intro Post 2',
            'content' => 'Content Post 2',
            'img' => 'post-2.jpg',
            'site_description' => 'Post 2',
            'site_keyword' => 'post,2',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2023-08-01 23:11:22.000000',
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'post-3',
            'title' => 'Post 3',
            'intro' => 'Intro Post 3',
            'content' => 'Content Post 3',
            'img' => 'post-3.jpg',
            'site_description' => 'Post 3',
            'site_keyword' => 'post,3',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2023-09-01 23:11:22.000000',
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'post-4',
            'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
            'intro' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'img' => 'post-4.jpg',
            'site_description' => 'Post 4',
            'site_keyword' => 'post,4',
            'approved' => '1',
            'published' => '1',
            'created_at' => '2023-10-01 23:11:22.000000',
        ]);
        DB::table('posts')->insert([
            'user_id' => 1,
            'slug' => 'post-5',
            'title' => 'Post 5',
            'intro' => 'Intro Post 5',
            'content' => 'Content Post 5',
            'img' => '',
            'site_description' => 'Post 5',
            'site_keyword' => 'post,5',
            'approved' => '0',
            'published' => '0',
            'created_at' => '2023-10-02 23:11:22.000000',
        ]);
    }
}
