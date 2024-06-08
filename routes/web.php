<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Movies
Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/create', [MovieController::class, 'create']);
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::post('movies', [MovieController::class, 'store']);
Route::get('movies/{movie}/edit', [MovieController::class, 'edit']);
Route::put('movies/{movie}', [MovieController::class, 'update']);

require __DIR__.'/auth.php';
