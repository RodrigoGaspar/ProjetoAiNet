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
        return view('genres.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
            'code' => 'required|string|max:255|unique:genres,code',
        ]);

        $genre = new Genre();
        $genre->name = $validatedData['name'];
        $genre->code = strtoupper($validatedData['name']);
        $genre->save();

        return redirect()->route('genres')->with('success', 'Genre created successfully.');
    }

    public function edit(Genre $genre)
    {
        $genre = Genre::where('code', $genre->code)->firstOrFail();
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, $code)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'code' => 'required|string|max:255|unique:genres,code,' . $code . ',code',
    ]);

    $genre = Genre::where('code', $code)->firstOrFail();
    $genre->name = $validatedData['name'];
    $genre->code = strtoupper($validatedData['name']);
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
