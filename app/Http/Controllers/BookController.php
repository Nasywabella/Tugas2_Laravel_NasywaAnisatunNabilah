<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get(); // ambil data buku + relasi penulis
        return view('books', ['books' => $books]);
    }


}
