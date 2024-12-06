<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoivodeshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voivodeships')->insert(['name' => 'dolnośląskie']);
        DB::table('voivodeships')->insert(['name' => 'kujawsko-pomorskie']);
        DB::table('voivodeships')->insert(['name' => 'lubelskie']);
        DB::table('voivodeships')->insert(['name' => 'lubuskie']);
        DB::table('voivodeships')->insert(['name' => 'łódzkie']);
        DB::table('voivodeships')->insert(['name' => 'małopolskie']);
        DB::table('voivodeships')->insert(['name' => 'mazowieckie']);
        DB::table('voivodeships')->insert(['name' => 'opolskie']);
        DB::table('voivodeships')->insert(['name' => 'podkarpackie']);
        DB::table('voivodeships')->insert(['name' => 'podlaskie']);
        DB::table('voivodeships')->insert(['name' => 'pomorskie']);
        DB::table('voivodeships')->insert(['name' => 'śląskie']);
        DB::table('voivodeships')->insert(['name' => 'świętokrzyskie']);
        DB::table('voivodeships')->insert(['name' => 'warmińsko-mazurskie']);
        DB::table('voivodeships')->insert(['name' => 'wielkopolskie']);
        DB::table('voivodeships')->insert(['name' => 'zachodniopomorskie']);
    }
}
