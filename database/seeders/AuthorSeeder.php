<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::insert([
            ['name' => 'J.K. Rowling', 'bio' => 'Author of the Harry Potter series.', 'photo' => 'jk_rowling.jpg'],
            ['name' => 'George Orwell', 'bio' => 'Author of 1984 and Animal Farm.', 'photo' => 'george_orwell.jpeg'],
            ['name' => 'Haruki Murakami', 'bio' => 'Japanese author known for surrealism.', 'photo' => 'murakami.jpeg'],
            ['name' => 'Jane Austen', 'bio' => 'English novelist known for Pride and Prejudice.', 'photo' => 'jane_austen.jpeg'],
            ['name' => 'Mark Twain', 'bio' => 'American writer of Tom Sawyer.', 'photo' => 'mark_twain.jpeg'],
        ]);        
    }
}
