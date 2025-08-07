<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        //Genre Sidebar Display
        $grouped_genres = Genre::all()
            ->groupBy('category')
            ->map(function ($group) {
                return $group->map(fn($genre) => [
                    'id' => $genre->id,
                    'genre' => $genre->genre,
                ]);
            });

        $books = Book::with(['authors', 'genres'])->paginate(10);

        return Inertia::render('Books/Index', [
            'genres' => $grouped_genres,
            'books' => $books,
        ]);
    }
}
