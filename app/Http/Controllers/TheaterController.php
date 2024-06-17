<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Theater;
use Illuminate\Http\RedirectResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use DB;

class TheaterController extends Controller
{
    public function index(): View
    {
        $theaters = Theater::all();

        return view('theaters.index')->with('theaters', $theaters);
    }

    public function create(): View
    {
        $newTheater = new Theater();
        return view('theaters.create')->with('theater', $newTheater);
    }

    public function store(Request $request): RedirectResponse
    {
        Theater::create($request->all());
        return redirect('/theaters');
    }

    public function edit(Theater $theater)
    {
        return view('theaters.edit', compact('theater'));
    }

    public function update(Request $request, Theater $theater)
    {
        $request->validate([
            'name' => 'required|string|between:1,20',
            'photo_filename' => 'nullable|string',
        ]);

        $theater->name = $request->name;
        $theater->photo_filename = $request->photo_filename;
        $theater->save();

        return redirect()->route('theaters')->with('success', 'Theater updated successfully.');
    }

    public function softDelete(Theater $theater)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Executar o soft delete (marcar como excluído)
        Theater::where('id', $theater->id)->delete();

        // Restaurar restrições de chave estrangeira
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('theaters')
            ->with('success', 'Theater deleted successfully.');
    }
}
