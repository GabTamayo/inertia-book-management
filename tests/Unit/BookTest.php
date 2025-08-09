<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
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

    $book->addGenres('History');
    $book->load('genres');

    expect($book->genres)->toHaveCount(1);
});

it('can attach multiple genres', function () {
    $this->seed(GenreSeeder::class);
    $book = Book::factory()->create();

    $book->addGenres(['History', 'Fantasy']);
    $book->load('genres');

    expect($book->genres)->toHaveCount(2);
});

it('can create book with authors and genres attached', function () {
    $authors = Author::factory()->count(2)->create();
    $this->seed(GenreSeeder::class);

    $book = Book::factory()
        ->afterCreating(function (Book $book) use ($authors) {
            $book->addAuthors($authors->pluck('name')->toArray());
            $book->addGenres(['History']);
        })
        ->create();

    $book->load(['authors', 'genres']);

    expect($book->authors)->toHaveCount(2);
    expect($book->genres)->toHaveCount(1);
});
