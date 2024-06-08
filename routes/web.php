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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('movies', [MovieController::class, 'index']);
Route::get('movies/create', [MovieController::class, 'create']);
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::post('movies', [MovieController::class, 'store']);

require __DIR__.'/auth.php';
