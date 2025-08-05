<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::insert([
            ['category' => 'Fiction', 'genre' => 'Fantasy'],
            ['category' => 'Fiction', 'genre' => 'Science Fiction'],
            ['category' => 'Fiction', 'genre' => 'Dystopian'],
            ['category' => 'Fiction', 'genre' => 'Action & Adventure'],
            ['category' => 'Fiction', 'genre' => 'Mystery'],
            ['category' => 'Fiction', 'genre' => 'Horror'],
            ['category' => 'Fiction', 'genre' => 'Thriller & Suspense'],
            ['category' => 'Fiction', 'genre' => 'Historical Fiction'],
            ['category' => 'Fiction', 'genre' => 'Romance'],
            ['category' => 'Fiction', 'genre' => 'Contemporary Fiction'],
            ['category' => 'Fiction', 'genre' => 'Literary Fiction'],
            ['category' => 'Fiction', 'genre' => 'Magical Realism'],
            ['category' => 'Fiction', 'genre' => 'Graphic Novel'],
            ['category' => 'Fiction', 'genre' => 'Short Story'],
            ['category' => 'Fiction', 'genre' => 'Young Adult'],
            ['category' => 'Fiction', 'genre' => 'Children’s'],

            ['category' => 'Non-Fiction', 'genre' => 'Memoir & Autobiography'],
            ['category' => 'Non-Fiction', 'genre' => 'Biography'],
            ['category' => 'Non-Fiction', 'genre' => 'Food & Drink'],
            ['category' => 'Non-Fiction', 'genre' => 'Art & Photography'],
            ['category' => 'Non-Fiction', 'genre' => 'Self-help'],
            ['category' => 'Non-Fiction', 'genre' => 'History'],
            ['category' => 'Non-Fiction', 'genre' => 'Travel'],
            ['category' => 'Non-Fiction', 'genre' => 'True Crime'],
            ['category' => 'Non-Fiction', 'genre' => 'Humor'],
            ['category' => 'Non-Fiction', 'genre' => 'Essays'],
            ['category' => 'Non-Fiction', 'genre' => 'Guide/How-to'],
            ['category' => 'Non-Fiction', 'genre' => 'Religion & Spirituality'],
            ['category' => 'Non-Fiction', 'genre' => 'Humanities & Social Sciences'],
            ['category' => 'Non-Fiction', 'genre' => 'Parenting & Families'],
            ['category' => 'Non-Fiction', 'genre' => 'Science & Technology'],
        ]);
    }
}
