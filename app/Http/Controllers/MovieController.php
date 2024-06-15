<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MovieFormRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class MovieController extends Controller
{

    use AuthorizesRequests;


    public function lastTwoWeeks()
    {
        $today = Carbon::today();

        $twoWeeksLater = $today->copy()->addWeeks(2);

        $movies = Movie::whereHas('screenings', function ($query) use ($today, $twoWeeksLater) {
            $query->whereBetween('date', [$today, $twoWeeksLater]);
        })->get();

        return view('screenings.index')->with('movies', $movies);
    }

    public function index(): View
    {
        // $allMovies = Movie::orderBy('title')->paginate(20)->withQueryString();
        $allMovies = Movie::orderBy('title')->paginate(20)->withQueryString();
        //$allMovies = Movie::all();
        return view('movies.index')->with('movies', $allMovies);
    }

    public function create(): View
    {
        $newMovie = new Movie();
        return view('movies.create')->with('movie', $newMovie);
    }

    public function show(Movie $movie): View
    {
        return view('movies.show')->with('movie', $movie);
    }

    public function store(Request $request): RedirectResponse
    {
        Movie::create($request->all());
        return redirect('/movies');
    }


    public function getPhotoFullUrlAttribute()
    {
        if ($this->poster_filename && Storage::exists("public/movies/{$this->poster_filename}")) {
            return asset("storage/posters/{$this->poster_filename}");
        } else {
            return asset("storage/posters/anonymous.png");
        }
    }


    public function edit(Movie $movie): View
    {
        return view('movies.edit')->with('movie', $movie);
    }

    public function update(Request $request, Movie $movie): RedirectResponse
    {
        $movie->update($request->all());
        return redirect('/movie');

    }
}
