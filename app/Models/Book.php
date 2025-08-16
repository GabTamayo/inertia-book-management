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

    protected $fillable = [
        'title',
        'num_pages',
        'price',
        'format',
        'date_bought',
        'photo',
    ];
    protected $hidden = ['created_at', 'updated_at'];

    public function addGenres(int|array $genreIds)
    {
        $genreIds = Arr::wrap($genreIds);
        $this->genres()->syncWithoutDetaching($genreIds);
    }

    public function addAuthors(string|array $authors)
    {
        $authorIds = collect(Arr::wrap($authors))->map(function ($name) {
            return Author::firstOrCreate(['name' => $name])->id;
        });

        $this->authors()->syncWithoutDetaching($authorIds);
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
