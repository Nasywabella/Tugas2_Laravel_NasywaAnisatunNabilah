<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Fiction',
                'description' => 'A literary work based on the imagination and not necessarily on fact.'
            ],
            [
                'name' => 'Non-Fiction',
                'description' => 'A literary work based on facts and real events.'
            ],
            [
                'name' => 'Science Fiction',
                'description' => 'A genre that deals with imaginative and futuristic concepts.'
            ],
            [
                'name' => 'Fantasy',
                'description' => 'A genre of speculative fiction involving magical elements.'
            ],
            [
                'name' => 'Mystery',
                'description' => 'A genre focused on the solving of a crime or unraveling secrets.'
            ],
            [
                'name' => 'Romance',
                'description' => 'A genre centered around love and relationships.'
            ],
            [
                'name' => 'Horror',
                'description' => 'A genre intended to scare, unsettle, or horrify the reader.'
            ],
            [
                'name' => 'Biography',
                'description' => 'A detailed description of a person\'s life, written by someone else.'
            ],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
