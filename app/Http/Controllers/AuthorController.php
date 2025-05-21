<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // Read all authors
    public function index()
    {
        $authors = Author::all();
        return response()->json([
            "success" => true,
            "message" => "Get all authors",
            "data" => $authors
        ], 200);
    }

    // Create a new author
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);        

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->store('authors', 'public'); 
            $photoName = $photo->hashName();
        } else {
            $photoName = null;
        }
        
        // simpan data
        $authors = Author::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $photoName,
        ]);
        

        return response()->json([
            'success' => true,
            'message' => 'Author created successfully',
            'data' => $authors,
        ], 201);
    }
}
