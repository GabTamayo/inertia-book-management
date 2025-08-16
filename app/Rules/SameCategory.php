<?php

namespace App\Rules;

use App\Models\Genre;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Arr;

class SameCategory implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $genreIds = Arr::wrap($value);

        $categoryIds = Genre::whereIn('id', $genreIds)
            ->pluck('category_id')
            ->unique();

        if ($categoryIds->count() > 1) {
            $fail('All selected genres must belong to the same category.');
        }
    }
}
