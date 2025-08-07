<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Database\Seeders\GenreSeeder;

it('belongs to an author', function () {
    $author = Author::factory()->create();
    $book = Book::factory()->create();
    //Act
    $book->authors()->attach($author->id);

    $book->load('authors');

    //Assert
    expect($book->authors->contains($author))->toBeTrue();
});

it('belongs to a genre', function () {
    $this->seed(GenreSeeder::class);
    $genre = Genre::inRandomOrder()->first();
    $book = Book::factory()->create();
    //Act
    $book->genres()->attach($genre->id);

    $book->load('genres');

    //Assert
    expect($book->genres->contains($genre))->toBeTrue();
});
