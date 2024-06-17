<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Genre;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use DB;

class GenreController extends Controller
{
    public function index(): View
    {
        $genres = Genre::all();

        return view('genres.index')->with('genres', $genres);
    }

    public function create(): View
    {
        $newGenre = new Genre();
        return view('genres.create')->with('genre', $newGenre);
    }

    public function store(Request $request): RedirectResponse
    {
        Genre::create($request->all());
        return redirect('/genres');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'code' => 'required|string|between:1,20|regex:/(^([A-Z]))/u',
            'name' => 'required|string|between:1,20',
        ]);

        $genre->code = $request->code;
        $genre->pname = $request->name;
        $genre->save();

        return redirect()->route('genres')->with('success', 'Genre updated successfully.');
    }

    public function softDelete(Genre $genre)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Executar o soft delete (marcar como excluído)
        Genre::where('code', $genre->code)->delete();

        // Restaurar restrições de chave estrangeira
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('genres')
            ->with('success', 'Genres deleted successfully.');
    }
}
