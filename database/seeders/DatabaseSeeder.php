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

        // ✅ Tambahkan pemanggilan seeder Author dan Book di sini
        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
