<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index(){
        $books = Book::with('author')->get(); 
        return response()->json([
            "success" => true,
            "message" => "Get all books with authors",
            "data" => $books
        ], 200);
    }

    public function store(Request $request){
        //1. validator
        $Validator = Validator::make($request->all(),[
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'cover_photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        //2. check validator error
        if ($Validator->fails()){
            return response()->json([
                'success' => false,
                'message' => $Validator -> errors()
            ],422);
        }

        //3. upload image
        $image = $request->file('cover_photo');
        $image->store('books', 'public');

        //4. insert data
        $books = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'cover_photo' => $image->hashName(),
            'genre_id' => $request->genre_id,
            'author_id' => $request->author_id,
        ]);

        //5. response
        return response()->json([
            'success' => true,
            'message' => 'Resource addes successfully',
            'data' => $books
        ], 201);
    }
}
