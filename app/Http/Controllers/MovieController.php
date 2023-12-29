<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::all(); // fetch all data from movie table
    }

    public function show($id)
    {
        return Movie::findOrFail($id); // find a movie by its ID
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'movie_name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        return Movie::create($validatedData);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'movie_name' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $book = Movie::findOrFail($id);
        $book->update($validatedData);

        return $book;
    }

    public function destroy($id)
    {
        $book = Movie::findOrFail($id);
        $book->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }
}
