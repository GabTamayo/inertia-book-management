<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Category;
use Database\Seeders\GenreSeeder;

it('can attach an author', function () {
    $author = Author::factory()->create();
    $book = Book::factory()->create();

    $book->addAuthors($author->name);
    $book->load('authors');

    expect($book->authors->contains($author))->toBeTrue();
});

it('can attach multiple authors', function () {
    $authors = Author::factory()->count(3)->create();
    $book = Book::factory()->create();

    $book->addAuthors($authors->pluck('name')->toArray());
    $book->load('authors');

    expect($book->authors)->toHaveCount(3);
});

it('can attach genre', function () {
    $this->seed(GenreSeeder::class);
    $book = Book::factory()->create();

    // Get genre id for 'History'
    $historyGenreId = Genre::where('name', 'History')->value('id');

    $book->addGenres($historyGenreId);
    $book->load('genres');

    expect($book->genres)->toHaveCount(1);
});

it('can attach multiple genres', function () {
    $this->seed(GenreSeeder::class);
    $book = Book::factory()->create();

    $genreIds = Genre::whereIn('name', ['History', 'Fantasy'])->pluck('id')->toArray();

    $book->addGenres($genreIds);
    $book->load('genres');

    expect($book->genres)->toHaveCount(2);
});

it('creates a book with authors and genres', function () {
    $authors = Author::factory()->count(2)->create();
    $this->seed(GenreSeeder::class);

    // Get genres under "Fiction"
    $fictionCategory = Category::where('name', 'Fiction')->first();
    $genres = $fictionCategory->genres()->take(2)->pluck('id')->toArray();

    $response = $this->post('/books', [
        'title' => 'Test Book',
        'authors' => $authors->pluck('name')->toArray(),
        'num_pages' => 150,
        'price' => 199.99,
        'genre_ids' => $genres,
        'format' => 'Paperback',
        'date_bought' => '2025-08-12',
    ]);

    $response->assertRedirect('/books');

    $book = Book::where('title', 'Test Book')->first();

    expect($book)->not()->toBeNull();
    expect($book->genres)->toHaveCount(2);
    expect($book->authors)->toHaveCount(2);
    expect($book->authors->pluck('name')->toArray())
        ->toEqualCanonicalizing($authors->pluck('name')->toArray());
});
