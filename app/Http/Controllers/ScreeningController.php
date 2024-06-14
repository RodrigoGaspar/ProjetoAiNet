<?php

namespace App\Http\Controllers;

use App\Models\Screening;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;

class ScreeningController extends Controller
{
    //
    public function index(): View
    {
        $allScreenings = Screening::orderBy('movie_id')->paginate(20)->withQueryString();

        //$allMovies = Movie::all();
        return view('screenings.index')->with('screenings', $allScreenings);
    }
}
