<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = Author::factory()->count(5)->create();
        $genres = Genre::all();

        Book::factory(200)->create()->each(function ($book) use ($authors, $genres) {
            $randomAuthors = $authors->random(rand(1, 3));
            $book->authors()->attach($randomAuthors);

            $randomGenres = $genres->random(rand(1, 3));
            $book->genres()->attach($randomGenres);
        });
    }
}
