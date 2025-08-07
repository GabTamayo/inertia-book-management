<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Arr;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $table = 'book_listings';
    protected $hidden = ['created_at', 'updated_at'];

    public function addGenres(string|array $genres)
    {
        $genres = Arr::wrap($genres);

        $genreModels = Genre::whereIn('genre', $genres)->get();
        $this->genres()->syncWithoutDetaching($genreModels);
    }

    public function addAuthors(string|array $authors)
    {
        $authors = Arr::wrap($authors);

        $authorModels = collect();

        foreach ($authors as $authorName) {
            $authorModels->push(
                Author::firstOrCreate(['name' => $authorName])
            );
        }

        $this->authors()->syncWithoutDetaching($authorModels);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }
}
