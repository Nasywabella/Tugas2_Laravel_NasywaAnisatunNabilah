<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    private $genres = [
        [
            'id' => 1, 
            'name' => 'Fiction', 
            'description' => 'A literary work based on the imagination and not necessarily on fact.'
        ],
        [
            'id' => 2, 
            'name' => 'Non-Fiction', 
            'description' => 'A literary work based on facts and real events.'
        ],
        [
            'id' => 3, 
            'name' => 'Science Fiction', 
            'description' => 'A genre that deals with imaginative and futuristic concepts.'
        ],
        [
            'id' => 4, 
            'name' => 'Fantasy', 
            'description' => 'A genre of speculative fiction involving magical elements.'
        ],
        [
            'id' => 5, 
            'name' => 'Mystery', 
            'description' => 'A genre focused on the solving of a crime or unraveling secrets.'
        ],
    ];

    public function getGenres(){
        return $this->genres;
    }
}
