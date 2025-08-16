<?php

namespace Database\Seeders;

use App\Models\Category;
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
        Genre::truncate();
        Category::truncate();

        $categories = [
            'Fiction' => [
                'Fantasy',
                'Science Fiction',
                'Dystopian',
                'Action & Adventure',
                'Mystery',
                'Horror',
                'Thriller & Suspense',
                'Historical Fiction',
                'Romance',
                'Contemporary Fiction',
                'Literary Fiction',
                'Magical Realism',
                'Graphic Novel',
                'Short Story',
                'Young Adult',
                'Children’s',
            ],
            'Non-Fiction' => [
                'Memoir & Autobiography',
                'Biography',
                'Food & Drink',
                'Art & Photography',
                'Self-help',
                'History',
                'Travel',
                'True Crime',
                'Humor',
                'Essays',
                'Guide/How-to',
                'Religion & Spirituality',
                'Humanities & Social Sciences',
                'Parenting & Families',
                'Science & Technology',
            ]
        ];

        foreach ($categories as $categoryName => $genres) {
            $category = Category::create(['name' => $categoryName]);

            foreach ($genres as $genreName) {
                Genre::create([
                    'name' => $genreName,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
