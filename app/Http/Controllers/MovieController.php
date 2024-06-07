<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
    public function index(): View
    {
        $allMovies = Movie::orderBy('title')->paginate(20)->withQueryString();

        //$allMovies = Movie::all();
        return view('movies.index')->with('movies', $allMovies);

    }

    public function create(): View
    {
        $newCourse = new Movie();
        return view('movies.create')->with('movie', $newCourse);
    }

    public function store(Request $request): RedirectResponse
    {
        Movie::create($request->all());
        return redirect('/movies');
    }
}
