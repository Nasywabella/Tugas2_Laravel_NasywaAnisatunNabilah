<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Isi yang boleh diisi massal (opsional tapi baik ditambahkan)
    protected $fillable = ['title', 'description', 'price', 'stock', 'cover_photo', 'author_id'];

    // Relasi: satu buku dimiliki oleh satu penulis
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
