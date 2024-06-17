<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScreeningController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TheaterController;
use App\Models\Theater;
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
Route::post('movies', [MovieController::class, 'store']);
Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('movies/{movie}', [MovieController::class, 'update']);
Route::delete('/movies/{id}', [MovieController::class, 'delete'])->name('movie.delete');


Route::get('screenings', [MovieController::class, 'twoWeeksLater'])->name('screenings');
Route::get('/screenings/{screening}/edit', [ScreeningController::class, 'edit'])->name('screening.edit');
Route::put('screenings/{screening}', [ScreeningController::class, 'update'])->name('screening.update');
Route::delete('/screenings/{screening}', [ScreeningController::class, 'destroy'])->name('screening.destroy');
Route::get('/screenings/{screening}/buy', [ScreeningController::class, 'buy'])->name('screening.buy');

Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics');

Route::get('/theaters', [TheaterController::class, 'index'])->name('theaters');
Route::get('theaters/create', [TheaterController::class, 'create'])->name('theaters.create');
Route::post('theaters', [TheaterController::class, 'store']);
Route::get('/theaters/{theater}/edit', [TheaterController::class, 'edit'])->name('theaters.edit');
Route::put('theaters/{theater}', [TheaterController::class, 'update'])->name('theaters.update');
Route::delete('/theaters/{theater}', [TheaterController::class, 'softDelete'])->name('theaters.delete');

Route::get('/genres', [GenreController::class, 'index'])->name('genres');
Route::get('genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('genres', [GenreController::class, 'store']);
Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{genre}', [GenreController::class, 'softDelete'])->name('genres.delete');

Route::get('profile/all', [ProfileController::class, 'index'])->name('profile.index');
Route::get('profile/manage/{id}', function ($id) {
    $profile = App\Models\User::findOrFail($id);
    return view('profile.manage', compact('profile'));
})->name('profile.manage');
Route::get('/profile/{id}/edit', [ProfileController::class, 'change'])->name('profile.change');
Route::put('/profile/{id}', [ProfileController::class, 'changed'])->name('profile.changed');
Route::delete('/profile/{id}', [ProfileController::class, 'softDelete'])->name('profile.delete');


Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');

Route::put('/profile/{id}/toggle-blocked', [ProfileController::class, 'toggleBlocked'])->name('profile.toggleBlocked');

Route::post('/screenings/{screening}/purchase', [ScreeningController::class, 'purchase'])->name('ticket.purchase');

require __DIR__ . '/auth.php';
