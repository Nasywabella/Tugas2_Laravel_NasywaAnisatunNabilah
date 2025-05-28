<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Contoh seeder user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // ✅ Pemanggilan seeder
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
            GenreSeeder::class,
            UserSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
