<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    //show
    public function show(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ],404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail resource',
            'data' => $author
        ], 200);
    }

    //update
    public function update(string $id, Request $request)
    {
        // 1. cari author-nya
        $author = Author::find($id);
    
        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ], 404);
        }
    
        // 2. validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
    
        // 3. siapkan data
        $data = [
            'name' => $request->name,
            'bio' => $request->bio,
        ];
    
        // 4. handle image (upload & delete)
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->store('authors', 'public');
    
            // hapus file lama kalau ada
            if ($author->photo) {
                Storage::disk('public')->delete('authors/' . $author->photo);
            }
    
            $data['photo'] = $photo->hashName();
        }
    
        // 5. update database
        $author->update($data);
    
        return response()->json([
            'success' => true,
            'message' => 'Author updated successfully',
            'data' => $author
        ], 200);
    }    

    //destroy
    public function destroy(string $id) {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found'
            ],404);
        }

        if ($author->cover_photo){
            //delete from storage
            Storage::disk('public')->delete('authors/' . $author->cover_photo);
        }

        $author ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Delete resource succsessfully'
        ]);
    }
}
