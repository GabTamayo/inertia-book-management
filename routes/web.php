<?php

use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Dashboard');
Route::get('/books', [GenreController::class, 'index']);
