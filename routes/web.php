<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/', 'Dashboard');
Route::inertia('/books', 'Books');
