<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            'slug' => 'placed',
            'name' => 'Złożone',
            'description' => 'Zamówienie wysłane do sklepu'
        ]);
        DB::table('statuses')->insert(
            [
                'slug' => 'paid',
                'name' => 'Opłacone',
                'description' => 'Zamówienie zostało opłacone'
            ]
        );
        DB::table('statuses')->insert(
            [
                'slug' => 'in_progress',
                'name' => 'W trakcie realizacji',
                'description' => 'Zamówienie jest w trakcie realizacji'
            ]
        );
        DB::table('statuses')->insert(
            [
                'slug' => 'shipped',
                'name' => 'Wysłane',
                'description' => 'Zamówienie zostało wysłane'
            ]
        );
        DB::table('statuses')->insert(
            [
                'slug' => 'completed',
                'name' => 'Zrealizowane',
                'description' => 'Zamówienie zostało zrealizowane'
            ]
        );
        DB::table('statuses')->insert(
            [
                'slug' => 'canceled',
                'name' => 'Anulowane',
                'description' => 'Zamówienie zostało anulowane'
            ]
        );
    }
}
