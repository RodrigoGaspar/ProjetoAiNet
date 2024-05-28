<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');


Route::get('movies', [MovieController::class, 'index']);
