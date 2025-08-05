<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GenreController extends Controller
{
    public function index()
    {
        $grouped_genres = Genre::all()
            ->groupBy('category')
            ->map(function ($group) {
                return $group->map(fn($genre) => [
                    'id' => $genre->id,
                    'genre' => $genre->genre,
                ]);
            });

        return Inertia::render('Books/Books', [
            'genres' => $grouped_genres,
        ]);
    }
}
