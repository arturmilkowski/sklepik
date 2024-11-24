<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'artur',
            'email' => 'artur-milkowski@tlen.pl',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'staszek',
            'email' => 'staszek@tlen.pl',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'józek',
            'email' => 'jozek@tlen.pl',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
        ]);
    }
}
