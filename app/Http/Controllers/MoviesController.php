<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\View\View;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index(): View
    {
        $allMovies = Movies::all();
        return view('movies.index')->with('movies', $allMovies);
    }

    public function show(Movies $movies): View
    {
        return view('movies.show')
            ->with('movies', $movies);
    }
}
