<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            UserSeeder::class,
            VoivodeshipSeeder::class,
            ProfileSeeder::class,
            DeliveryAddressSeeder::class,
            CustomerSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ConcentrationSeeder::class,
            SizeSeeder::class,
            ProductSeeder::class,
            TypeSeeder::class,
            StatusSeeder::class,
            SaleDocumentSeeder::class,
            OrderSeeder::class,
            ItemSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            ReplySeeder::class,
            TagSeeder::class,
        ]);
    }
}
