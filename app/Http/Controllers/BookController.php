<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Rules\SameCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index(Request $request)
    {
        //Genre Sidebar Display
        $grouped_genres = Category::with('genres')->get()
            ->mapWithKeys(function ($category) {
                return [
                    $category->name => $category->genres->map(fn($genre) => [
                        'id' => $genre->id,
                        'name' => $genre->name,
                    ])
                ];
            });

        $books = Book::with(['authors', 'genres.category'])
            ->when($request->input('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('authors', fn($q) => $q->where('name', 'like', "%{$search}%"))
                    ->orWhereHas(
                        'genres',
                        fn($q) => $q->where('name', 'like', "%{$search}%")
                            ->orWhereHas('category', fn($q2) => $q2->where('name', 'like', "%{$search}%"))
                    );
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Books/Index', [
            'genres' => $grouped_genres,
            'books' => $books,
            'filters' => $request->only(['search']),
        ]);
    }

    public function create()
    {
        $authors = Author::all()->map(fn($author) => [
            'id' => $author->id,
            'name' => $author->name,
        ]);

        $grouped_genres = Category::with('genres')->get()
            ->mapWithKeys(fn($category) => [
                $category->name => $category->genres->map(fn($genre) => [
                    'id' => $genre->id,
                    'name' => $genre->name,
                ])
            ]);

        return Inertia::render('Books/Create', [
            'authors' => $authors,
            'genres' => $grouped_genres,
        ]);
    }

    public function store(Request $request)
    {
        $messages = [
            'genre_ids.required' => 'Genre is required.',
        ];

        $validated_book = $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:46'],
            'authors' => ['required', 'array', 'min:1', 'max:5'],
            'authors.*' => ['string', 'min:3', 'max:46'],
            'num_pages' => ['required', 'integer', 'min:1', 'max:3000'],
            'price' => ['required', 'numeric', 'regex:/^\d{1,10}(\.\d{1,2})?$/'],
            'genre_ids' => ['required', 'array', 'min:1', 'max:3', new SameCategory()],
            'genre_ids.*' => ['integer', 'exists:genres,id'],
            'format' => ['required', 'string', Rule::in(['Hardcover', 'Paperback', 'Other'])],
            'date_bought' => ['required', 'date'],
            'photo' => ['nullable', 'image', 'mimes:png,jpg', 'max:2048']
        ], $messages);

        if ($request->hasFile('photo')) {
            $validated_book['photo'] = $request->file('photo')->store('book_covers', 'public');
        }

        $book = Book::create($validated_book);

        $book->addAuthors($validated_book['authors']);
        $book->addGenres($validated_book['genre_ids']);

        return redirect('/books');
    }

    public function show() {}
}
