<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
       $movies = Movie::latest()->paginate(6);
        return view('pages.home', compact('movies'));
    }

    public function detail_movie($id,$slug){
        $movie = Movie::find($id);
        return view('layout.movie_detail', compact('movie'));
    }

    public function create(){
        $categories= Category::all();
        return view('layout.movie_form',compact('categories'));
    }


public function store(Request $request)
{
    // Validasi
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'synopsis' => 'nullable|string',
        'year' => 'required|integer|min:1900|max:'.date('Y'),
        'actors' => 'required|string',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Simpan gambar
    $imagePath = $request->file('cover_image')->store('covers', 'public');

    // Simpan ke database
    Movie::create([
        'title' => $validated['title'],
        'cover_image' => $imagePath,
        'synopsis' => $validated['synopsis'],
        'year' => $validated['year'],
        'actors' => $validated['actors'],
        'category_id' => $validated['category_id'],
    ]);

    return redirect('/')->with('success', 'Movie berhasil ditambahkan!');
}

}
