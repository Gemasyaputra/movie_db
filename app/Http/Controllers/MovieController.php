<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index(){
       $movies = Movie::latest()->paginate(6);
        return view('pages.home', compact('movies'));
    }
}
