<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreeningController;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Purchase;
use App\Models\Screening;
use App\Models\Seat;
use App\Models\Theather;
use App\Models\Ticket;
use App\Models\User;

Route::view('/', 'home')->name('/');

//Users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Movies
Route::get('movies', [MovieController::class, 'index'])->name('movies');
Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::post('movies', [MovieController::class, 'store']);
Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('movies/{movie}', [MovieController::class, 'update']);

Route::get('screenings', [MovieController::class, 'lastTwoWeeks'])->name('screenings');

Route::get('profile/all', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/manage/{id}', function ($id) {
    $profile = App\Models\User::findOrFail($id);
    return view('profile.manage', compact('profile'));
})->name('profile.manage');

Route::put('/profile/{id}/toggle-blocked', [ProfileController::class, 'toggleBlocked'])->name('profile.toggleBlocked');



require __DIR__.'/auth.php';
