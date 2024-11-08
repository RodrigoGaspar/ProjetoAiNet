<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Screening;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MovieFormRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class MovieController extends Controller
{

    use AuthorizesRequests;


    public function twoWeeksLater()
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
        $allMovies = Movie::orderBy('title')->get();
        //$allMovies = Movie::all();

        $genres = Genre::all();

        return view('movies.index')->with('movies', $allMovies)->with('genres', $genres);
    }

    public function create(): View
    {
        $newMovie = new Movie();
        $genres = Genre::all();
        return view('movies.create', compact('genres'))->with('movie', $newMovie);
    }

    public function show(Movie $movie): View
    {
        $today = Carbon::today();
        $end_date = Carbon::now()->addWeeks(2)->format('Y-m-d');
        $screenings = Screening::where('movie_id', $movie->id)->whereBetween('date', [$today, $end_date])->get();
        return view('movies.show')->with('movie', $movie)->with('screenings', $screenings);
    }

    public function store(Request $request): RedirectResponse
    {
        Movie::create($request->all());
        return redirect('/movies');
    }


    public function getPhotoFullUrlAttribute()
    {
        if ($this->poster_filename && Storage::exists("public/posters/{$this->poster_filename}")) {
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

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete(); // Realiza o soft delete

        // Se precisar deletar fisicamente a imagem
        if (Storage::exists('posters/' . $movie->poster_filename)) {
            Storage::delete('posters/' . $movie->poster_filename);
        }

        return redirect()->route('movies')->with('success', 'Movie deleted successfully.');
    }
}
