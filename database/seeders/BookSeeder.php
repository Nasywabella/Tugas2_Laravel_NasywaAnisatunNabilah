<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::insert([
            [
                'title' => 'Harry Potter',
                'description' => 'Fantasy novel.',
                'author_id' => 1,
                'price' => 120000,
                'stock' => 15,
                'cover_photo' => 'harry_potter.jpg',
            ],
            [
                'title' => '1984',
                'description' => 'Dystopian novel.',
                'author_id' => 2,
                'price' => 95000,
                'stock' => 20,
                'cover_photo' => '1984.jpg',
            ],
            [
                'title' => 'Kafka on the Shore',
                'description' => 'Magical realism.',
                'author_id' => 3,
                'price' => 110000,
                'stock' => 12,
                'cover_photo' => 'kafka.jpg',
            ],
            [
                'title' => 'Pride and Prejudice',
                'description' => 'Romantic novel.',
                'author_id' => 4,
                'price' => 88000,
                'stock' => 18,
                'cover_photo' => 'pride.jpg',
            ],
            [
                'title' => 'Tom Sawyer',
                'description' => 'Classic American novel.',
                'author_id' => 5,
                'price' => 100000,
                'stock' => 10,
                'cover_photo' => 'tom_sawyer.jpg',
            ],
        ]);        
    }
}
